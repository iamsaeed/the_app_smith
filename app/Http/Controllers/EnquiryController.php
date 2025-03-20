<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Notifications\NewEnquiryNotification;
use App\Services\CaptchaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class EnquiryController extends Controller
{
    protected $captchaService;

    public function __construct(CaptchaService $captchaService)
    {
        $this->captchaService = $captchaService;
    }

    /**
     * Show the contact form with captcha
     */
    public function showContactForm()
    {
        $captcha = $this->captchaService->generateMathCaptcha();
        return view('contact', ['captcha' => $captcha]);
    }

    /**
     * Submit the contact form
     */
    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'captcha_answer' => 'required|numeric',
        ]);

        // Validate the captcha
        if (!$this->captchaService->validateCaptcha($request->captcha_answer)) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['captcha_answer' => 'The captcha answer is incorrect.']);
        }

        // Create the enquiry
        $enquiry = Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        // Send notification to admin
        Notification::route('mail', config('app.admin_email'))
            ->notify(new NewEnquiryNotification($enquiry));

        // Redirect with success message
        return redirect()->route('contact.thank-you')
            ->with('success', 'Your message has been sent successfully!');
    }

    /**
     * Show the thank you page
     */
    public function thankYou()
    {
        return view('thank-you');
    }
}
