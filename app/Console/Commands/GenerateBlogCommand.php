<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Services\OpenAIService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GenerateBlogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:blog {topic : The topic to generate a blog post about}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a complete blog post with AI research on a given topic';

    /**
     * Execute the console command.
     */
    public function handle(OpenAIService $openAIService)
    {
        $topic = $this->argument('topic');
        $this->info("Generating blog post about: {$topic}");

        try {
            DB::beginTransaction();

            // Step 1: Generate blog content with OpenAI
            $this->info('Researching and generating blog content...');
            $blogData = $openAIService->generateBlogContent($topic);

            if (!$blogData) {
                $this->error('Failed to generate blog content.');
                return 1;
            }

            $this->info('Blog content generated successfully.');
            $this->info('Title: ' . $blogData['title']);

            // Step 2: Find or create the category
            $categoryName = $blogData['category'] ?? 'Uncategorized';
            $this->info('Category: ' . $categoryName);

            $category = Category::firstOrCreate(
                ['name' => $categoryName, 'type' => 'blog'],
                [
                    'slug' => Str::slug($categoryName),
                    'description' => 'Category for ' . $categoryName . ' blog posts',
                    'status' => true,
                    'created_id' => 1,
                    'updated_id' => 1,
                ]
            );

            // Step 3: Create the blog post
            $blog = Blog::create([
                'title' => $blogData['title'],
                'slug' => $blogData['slug'] ?? Str::slug($blogData['title']),
                'excerpt' => $blogData['excerpt'],
                'content' => $blogData['content'],
                'meta_title' => $blogData['meta_title'] ?? $blogData['title'],
                'meta_description' => $blogData['meta_description'] ?? $blogData['excerpt'],
                'meta_keywords' => $blogData['tags'] ?? [],
                'status' => true,
                'featured' => false,
                'published_at' => now(),
                'created_id' => 1,
                'updated_id' => 1,
            ]);

            // Step 4: Attach the category
            $blog->categories()->attach($category);

            // Step 5: Create and attach tags
            if (isset($blogData['tags']) && is_array($blogData['tags'])) {
                foreach ($blogData['tags'] as $tagName) {
                    $tag = Tag::firstOrCreate(
                        ['name' => $tagName],
                        [
                            'slug' => Str::slug($tagName),
                            'status' => true,
                            'created_id' => 1,
                            'updated_id' => 1,
                        ]
                    );
                    $blog->tags()->attach($tag);
                }
                $this->info('Created and attached ' . count($blogData['tags']) . ' tags.');
            }

            // Step 6: Get image for the blog using FetchUnsplashImageCommand
            $this->info('Fetching image for blog...');
            $imageSearchTerm = $blogData['title'];

            // Run the command to fetch image
            $exitCode = Artisan::call('unsplash:get-image', [
                'description' => $imageSearchTerm
            ]);

            if ($exitCode === 0) {
                // Get the output from the command
                $output = Artisan::output();

                // Extract the image path from the output
                if (preg_match('/Public URL: (.+)$/m', $output, $matches)) {
                    $publicUrl = trim($matches[1]);
                    $this->info("Image URL: $publicUrl");

                    // Extract the filename from the URL
                    $filename = basename($publicUrl);
                    $sourcePath = Storage::disk('public')->path('unsplash/' . $filename);

                    // Create the destination directory if it doesn't exist
                    $destinationDir = public_path('images/blogs');
                    if (!File::exists($destinationDir)) {
                        File::makeDirectory($destinationDir, 0755, true);
                    }

                    // Copy the image to the blogs folder
                    $destinationPath = $destinationDir . '/' . $filename;
                    File::copy($sourcePath, $destinationPath);

                    // Add the image to the media library
                    $blog->addMedia($destinationPath)
                        ->usingName($blog->title)
                        ->withCustomProperties([
                            'source' => 'Unsplash'
                        ])
                        ->toMediaCollection('featured_image');

                    $this->info('Image attached to blog successfully.');

                    // Delete the temporary file
                    File::delete($sourcePath);
                    $this->info('Temporary image file cleaned up.');
                } else {
                    $this->warn('Could not extract image path from command output. Blog created without an image.');
                }
            } else {
                $this->warn('Failed to fetch image from Unsplash. Blog created without an image.');
            }

            DB::commit();

            $this->info('Blog generation completed successfully!');
            $this->info("Blog ID: {$blog->id}");
            $this->info("Blog Title: {$blog->title}");
            $this->info("Blog URL: {$blog->url}");

            return 0;
        } catch (\Exception $e) {
            DB::rollback();
            $this->error('Error generating blog: ' . $e->getMessage());
            Log::error('Error generating blog: ' . $e->getMessage());
            return 1;
        }
    }
}
