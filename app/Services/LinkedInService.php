<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

class LinkedInService
{
    /**
     * LinkedIn OAuth configuration.
     *
     * @var array
     */
    protected $config;

    /**
     * Create a new LinkedInService instance.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * Get the authorization URL for LinkedIn OAuth.
     *
     * @return string
     */
    public function getAuthorizationUrl(): string
    {
        // Generate and store state for CSRF protection
        $state = Str::random(40);
        Cache::put('linkedin_state', $state, 3600);

        // Determine redirect URI
        $redirectUri = $this->config['redirect_uri'] ?? URL::to('/auth/linkedin/callback');

        // Build authorization URL
        $params = [
            'response_type' => 'code',
            'client_id' => $this->config['client_id'],
            'redirect_uri' => $redirectUri,
            'state' => $state,
            'scope' => implode(' ', [
                'r_liteprofile',
                'r_emailaddress',
                'w_member_social'
            ])
        ];

        return 'https://www.linkedin.com/oauth/v2/authorization?' . http_build_query($params);
    }

    /**
     * Exchange authorization code for an access token.
     *
     * @param string $code
     * @return array
     * @throws Exception
     */
    public function getAccessToken(string $code): array
    {
        try {
            $redirectUri = $this->config['redirect_uri'] ?? URL::to('/auth/linkedin/callback');

            $response = Http::post('https://www.linkedin.com/oauth/v2/accessToken', [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'client_id' => $this->config['client_id'],
                'client_secret' => $this->config['client_secret'],
                'redirect_uri' => $redirectUri,
            ]);

            $data = $response->json();

            if (!isset($data['access_token'])) {
                Log::error('LinkedIn OAuth Error: ' . json_encode($data));
                throw new Exception('Failed to get LinkedIn access token');
            }

            return $data;
        } catch (Exception $e) {
            Log::error('LinkedIn OAuth Exception: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Post content to LinkedIn.
     *
     * @param string $accessToken
     * @param string $title
     * @param string $text
     * @param string $url
     * @param array $hashtags
     * @return array
     * @throws Exception
     */
    public function postToLinkedIn(string $accessToken, string $title, string $text, string $url, array $hashtags = []): array
    {
        try {
            // First, get user profile to get the user URN
            $profileResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'X-Restli-Protocol-Version' => '2.0.0',
            ])->get('https://api.linkedin.com/v2/me');

            $profile = $profileResponse->json();

            if (!isset($profile['id'])) {
                Log::error('LinkedIn API Error: Failed to get user profile', ['response' => $profile]);
                throw new Exception('Failed to get LinkedIn user profile');
            }

            $urn = 'urn:li:person:' . $profile['id'];

            // Format hashtags
            $hashtagsText = '';
            if (!empty($hashtags)) {
                $hashtagsText = ' ' . implode(' ', array_map(function($tag) {
                    return '#' . $tag;
                }, $hashtags));
            }

            // Create post content
            $postData = [
                'author' => $urn,
                'lifecycleState' => 'PUBLISHED',
                'specificContent' => [
                    'com.linkedin.ugc.ShareContent' => [
                        'shareCommentary' => [
                            'text' => $text . $hashtagsText . "\n\nRead more: " . $url
                        ],
                        'shareMediaCategory' => 'ARTICLE',
                        'media' => [
                            [
                                'status' => 'READY',
                                'description' => [
                                    'text' => Str::limit($text, 200)
                                ],
                                'title' => [
                                    'text' => $title
                                ],
                                'originalUrl' => $url
                            ]
                        ]
                    ]
                ],
                'visibility' => [
                    'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC'
                ]
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'X-Restli-Protocol-Version' => '2.0.0',
                'Content-Type' => 'application/json',
            ])->post('https://api.linkedin.com/v2/ugcPosts', $postData);

            $result = $response->json();

            if (!$response->successful()) {
                Log::error('LinkedIn Post Error', ['response' => $result, 'request' => $postData]);
                throw new Exception('Failed to post to LinkedIn: ' . json_encode($result));
            }

            Log::info('Successfully posted to LinkedIn', ['post_id' => $result['id'] ?? null]);

            return $result;
        } catch (Exception $e) {
            Log::error('LinkedIn Post Exception: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get basic profile information using the access token.
     *
     * @param string $accessToken
     * @return array
     * @throws Exception
     */
    public function getProfile(string $accessToken): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'X-Restli-Protocol-Version' => '2.0.0',
            ])->get('https://api.linkedin.com/v2/me');

            $data = $response->json();

            if (!$response->successful()) {
                Log::error('LinkedIn API Error: Failed to get profile', ['response' => $data]);
                throw new Exception('Failed to get LinkedIn profile');
            }

            return $data;
        } catch (Exception $e) {
            Log::error('LinkedIn Profile Exception: ' . $e->getMessage());
            throw $e;
        }
    }
}
