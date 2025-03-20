<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UnsplashService
{
    /**
     * The Unsplash API configuration.
     *
     * @var array
     */
    protected $config;

    /**
     * Create a new UnsplashService instance.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * Get an image from Unsplash related to the search terms.
     *
     * @param array $searchTerms
     * @return array|null
     */
    public function getImage(array $searchTerms): ?array
    {
        Log::info('UnsplashService: Searching for image with terms: ' . implode(', ', $searchTerms));
        Log::info('UnsplashService: Config: ' . json_encode($this->config));

        if (empty($searchTerms) || empty($this->config['access_key'])) {
            Log::warning('Unsplash image search failed: Missing search terms or API key');
            return null;
        }

        $query = implode(' ', $searchTerms);
        $perPage = $this->config['per_page'] ?? 5;
        $orientation = $this->config['orientation'] ?? 'landscape';

        Log::info('UnsplashService: Making request with query: ' . $query);

        try {
            $requestUrl = 'https://api.unsplash.com/search/photos';
            $requestParams = [
                'client_id' => $this->config['access_key'],
                'query' => $query,
                'per_page' => $perPage,
                'orientation' => $orientation,
            ];

            Log::info('UnsplashService: Request URL: ' . $requestUrl);
            Log::info('UnsplashService: Request params: ' . json_encode($requestParams));

            $response = Http::get($requestUrl, $requestParams);

            Log::info('UnsplashService: Response status: ' . $response->status());

            if ($response->successful()) {
                $data = $response->json();

                Log::info('UnsplashService: Response data: ' . json_encode(array_slice($data, 0, 50)));

                if (isset($data['results']) && count($data['results']) > 0) {
                    $image = $data['results'][0];
                    $url = $image['urls']['regular'];
                    $photographer = $image['user']['name'];
                    $creditUrl = $image['user']['links']['html'];
                    $filename = Str::slug($query) . '-' . Str::random(6) . '.jpg';

                    // Download image to temporary path
                    $tempPath = storage_path('app/temp/' . $filename);
                    Storage::makeDirectory('temp');

                    $imageContents = file_get_contents($url);
                    file_put_contents($tempPath, $imageContents);

                    return [
                        'path' => $tempPath,
                        'filename' => $filename,
                        'photographer' => $photographer,
                        'credit_url' => $creditUrl
                    ];
                } else {
                    Log::warning('Unsplash search returned no results for query: ' . $query);
                }
            } else {
                Log::error('Unsplash API error: ' . $response->status() . ' - ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Error fetching image from Unsplash: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Generate search terms for a given topic using AI (optional method).
     *
     * @param string $topic
     * @return array
     */
    public function generateSearchTerms(string $topic): array
    {
        // This could be implemented to generate search terms
        // For now, return a simple array based on the topic
        return [
            $topic,
            $topic . ' professional',
            $topic . ' business',
        ];
    }
}
