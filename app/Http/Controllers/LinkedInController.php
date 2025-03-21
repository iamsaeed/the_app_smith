<?php

namespace App\Http\Controllers;

use App\Models\LinkedInToken;
use App\Services\LinkedInService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class LinkedInController extends Controller
{
    /**
     * Redirect to LinkedIn OAuth page.
     *
     * @param  LinkedInService  $linkedInService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(LinkedInService $linkedInService)
    {
        return redirect($linkedInService->getAuthorizationUrl());
    }

    /**
     * Handle the callback from LinkedIn OAuth.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  LinkedInService  $linkedInService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(Request $request, LinkedInService $linkedInService)
    {
        // Check for errors
        if ($request->has('error')) {
            return redirect()->route('linkedin.failed')->with('error', 'LinkedIn authentication failed: ' . $request->error_description);
        }

        // Validate state to prevent CSRF
        $state = Cache::pull('linkedin_state');
        if (!$state || $state !== $request->state) {
            return redirect()->route('linkedin.failed')->with('error', 'Invalid state parameter. Authentication failed.');
        }

        try {
            // Exchange authorization code for access token
            $tokenData = $linkedInService->getAccessToken($request->code);

            // Get user profile
            $profile = $linkedInService->getProfile($tokenData['access_token']);

            // Store the token
            $expiresAt = Carbon::now()->addSeconds($tokenData['expires_in']);

            LinkedInToken::updateOrCreate(
                ['linkedin_id' => $profile['id']],
                [
                    'user_id' => Auth::id(),
                    'access_token' => $tokenData['access_token'],
                    'refresh_token' => $tokenData['refresh_token'] ?? null,
                    'expires_at' => $expiresAt,
                ]
            );

            return redirect()->route('linkedin.success')->with('success', 'Successfully connected to LinkedIn!');
        } catch (Exception $e) {
            Log::error('LinkedIn callback error: ' . $e->getMessage());
            return redirect()->route('linkedin.failed')->with('error', 'Failed to authenticate with LinkedIn: ' . $e->getMessage());
        }
    }

    /**
     * Display success page.
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        return view('linkedin.success');
    }

    /**
     * Display failure page.
     *
     * @return \Illuminate\View\View
     */
    public function failed()
    {
        return view('linkedin.failed');
    }

    /**
     * Disconnect LinkedIn account.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disconnect()
    {
        if (Auth::check()) {
            LinkedInToken::where('user_id', Auth::id())->delete();
        }

        return redirect()->back()->with('success', 'LinkedIn account disconnected successfully.');
    }
}
