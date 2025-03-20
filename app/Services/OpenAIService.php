<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;
use Exception;
use Illuminate\Support\Facades\Log;

class OpenAIService
{
    /**
     * The OpenAI API key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * The OpenAI model to use.
     *
     * @var string
     */
    protected $model;

    /**
     * The request timeout in seconds.
     *
     * @var int
     */
    protected $timeout;

    /**
     * Create a new OpenAIService instance.
     *
     * @param string $apiKey
     * @param string $model
     * @param int $timeout
     */
    public function __construct(
        string $apiKey = null,
        string $model = 'gpt-3.5-turbo-1106',
        int $timeout = 30
    ) {
        $this->apiKey = $apiKey;
        $this->model = $model;
        $this->timeout = $timeout;
    }

    /**
     * Generate content using OpenAI
     *
     * @param string $prompt The prompt to send to OpenAI
     * @param array $options Additional options for the OpenAI request
     * @return array|null The generated content as array or null if there's an error
     */
    protected function generateContent(string $prompt, array $options = []): ?array
    {
        try {
            // Default options
            $defaultOptions = [
                'model' => $this->model, // Use the model from constructor
                'temperature' => 0.7,
                'response_format' => ['type' => 'json_object'],
            ];

            // Merge options with defaults
            $options = array_merge($defaultOptions, $options);

            // Create messages array with system and user prompts
            $messages = [
                ['role' => 'system', 'content' => 'You are a helpful assistant that always responds in JSON format.'],
                ['role' => 'user', 'content' => $prompt],
            ];

            // If there are additional messages, add them
            if (isset($options['messages']) && is_array($options['messages'])) {
                $messages = array_merge($messages, $options['messages']);
                unset($options['messages']);
            }

            // Add messages to options
            $options['messages'] = $messages;

            // Make the API call
            $response = OpenAI::chat()->create($options);

            // Parse the response content
            $content = $response->choices[0]->message->content;
            return json_decode($content, true);
        } catch (Exception $e) {
            Log::error('OpenAI API Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Generate service data
     *
     * @param string $serviceName The name of the service
     * @return array|null The generated service data
     */
    public function generateServiceData(string $serviceName): ?array
    {
        $prompt = <<<EOT
        Generate detailed information for a individual service called "{$serviceName}" that is provided individuallly to each clients.
        The service should not have word like our, we, us, etc., it should be like I, me, my, etc.
        This is a personal service tailored to each client's specific needs, not a mass-market product.

        The response should include:
        - A catchy title for the personal service
        - A detailed description of about 150 words that explains how this service is personally delivered to each client
        - Emphasize the one-on-one nature of the service and individual attention each client receives
        - 3-5 key features that highlight the personalized approach
        - 2-3 benefits that focus on the individual client experience
        - 3-5 relevant image search terms that could be used to find a representative image for this personal service on Unsplash (prefer images showing one-on-one interaction)

        Response should be in the following JSON format:
        {
        "title": "The catchy personal service title",
        "description": "Detailed description of the individualized service (about 150 words)",
        "features": [
            {
            "title": "Personalized feature title",
            "description": "How this feature is tailored to individual needs"
            },
            {
            "title": "Another individual-focused feature",
            "description": "Description emphasizing personal attention"
            }
            // more features
        ],
        "benefits": [
            "Individual benefit 1",
            "Personal benefit 2",
            // more benefits
        ],
        "image_search_terms": [
            "Search term 1",
            "Search term 2",
            // more search terms
        ]
        }
        EOT;

        return $this->generateContent($prompt);
    }
}
