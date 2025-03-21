<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\LinkedInToken;
use App\Services\LinkedInService;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostToLinkedInCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'linkedin:post
                            {blog_id? : The blog ID to post (optional)}
                            {--latest : Post the latest blog}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Share a blog post to LinkedIn';

    /**
     * Execute the console command.
     *
     * @param LinkedInService $linkedInService
     * @return int
     */
    public function handle(LinkedInService $linkedInService)
    {
        try {
            // Find the blog to post
            $blog = null;

            if ($this->argument('blog_id')) {
                $blog = Blog::find($this->argument('blog_id'));
                if (!$blog) {
                    $this->error("Blog with ID {$this->argument('blog_id')} not found.");
                    return 1;
                }
            } elseif ($this->option('latest')) {
                $blog = Blog::latest()->first();
                if (!$blog) {
                    $this->error("No blogs available to post.");
                    return 1;
                }
            } else {
                $this->error("Please provide a blog_id or use the --latest option.");
                return 1;
            }

            $this->info("Preparing to post blog '{$blog->title}' to LinkedIn.");

            // Find a valid LinkedIn token
            $token = LinkedInToken::where('expires_at', '>', Carbon::now())->first();

            if (!$token) {
                $this->error("No valid LinkedIn token found. Please connect to LinkedIn first.");
                return 1;
            }

            // Prepare blog data for posting
            $title = $blog->title;
            $text = $blog->excerpt ?: Str::limit(strip_tags($blog->content), 250);
            $url = url('/blog/' . $blog->slug);

            // Get tags as hashtags
            $hashtags = [];
            if ($blog->tags) {
                foreach ($blog->tags as $tag) {
                    $hashtags[] = str_replace(' ', '', $tag->name);
                }
            }

            // Post to LinkedIn
            $result = $linkedInService->postToLinkedIn(
                $token->access_token,
                $title,
                $text,
                $url,
                $hashtags
            );

            $this->info("Successfully posted to LinkedIn!");
            $this->info("Post URL: {$url}");

            // Update blog with LinkedIn share data
            $blog->shared_to_linkedin = true;
            $blog->linkedin_shared_at = Carbon::now();
            $blog->save();

            return 0;
        } catch (Exception $e) {
            $this->error("Error posting to LinkedIn: {$e->getMessage()}");
            Log::error("LinkedIn Post Error: {$e->getMessage()}", [
                'exception' => $e,
                'blog_id' => $this->argument('blog_id'),
            ]);

            return 1;
        }
    }
}
