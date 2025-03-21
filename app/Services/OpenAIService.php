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
        Do not use the word 'Bespoke' in the title.

        The response should include:
        - A simple title for the personal service
        - A detailed description of about 150 words that explains how this service is personally delivered to each client

        Response should be in the following JSON format:
        {
        "title": "The catchy personal service title",
        "description": "Detailed description of the individualized service (about 150 words)"
        }
        EOT;

        return $this->generateContent($prompt);
    }

    /**
     * Generate a blog post with research on a given topic
     *
     * @param string $topic The topic for the blog post
     * @return array|null The generated blog data
     */
    public function generateBlogContent(string $topic): ?array
    {
        $prompt = <<<EOT
        Research and generate a comprehensive, original blog post about "{$topic}".

        The blog post should:
        - Have a modern, engaging title (avoid clickbait)
        - Include a short excerpt/summary (60-80 words)
        - Contain detailed content of 500-1000 words with well-researched information
        - Be organized into clear sections with headings (use markdown ## for headings)
        - Include factual information with references where appropriate
        - Be written in a conversational but professional tone
        - Suggest a relevant category for this blog post from common blog categories
        - Suggest 5-7 SEO tags relevant to the content
        - Include SEO metadata (meta title and meta description)

        The response should be in the following JSON format:
        {
          "title": "Engaging blog post title",
          "slug": "url-friendly-slug-for-the-post",
          "excerpt": "Short summary of the post content (60-80 words)",
          "content": "Full blog post content with simple html formatting for headings. 500-1000 words with references where applicable.",
          "category": "Suggested category for this post",
          "tags": ["tag1", "tag2", "tag3", "tag4", "tag5"],
          "meta_title": "SEO-optimized title (under 60 characters)",
          "meta_description": "SEO-optimized description (under 160 characters)"
        }

        Make sure the content is completely original and not copied from existing sources.
        EOT;

        $options = [
            'temperature' => 0.8, // Slightly higher temperature for creativity
            'max_tokens' => 2000, // Allow longer response for full blog
        ];

        return $this->generateContent($prompt, $options);
    }
}
