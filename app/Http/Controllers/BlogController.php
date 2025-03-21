<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     *
     * @param  Request  $request
     * @return View
     */
    public function index(Request $request): View
    {
        // Get the sort parameter or default to 'latest'
        $sort = $request->get('sort', 'latest');

        // Base query with published blogs
        $query = Blog::published()->with(['categories', 'tags', 'creator']);

        // Apply sorting
        switch ($sort) {
            case 'oldest':
                $query->orderBy('published_at', 'asc');
                break;
            case 'popular':
                // If you have a view count or similar metric, use that
                // For now we'll just use a placeholder
                $query->orderBy('view_count', 'desc');
                break;
            case 'latest':
            default:
                $query->orderBy('published_at', 'desc');
                break;
        }

        // Get featured blog for the featured section
        $featuredBlog = Blog::published()
            ->featured()
            ->with(['categories', 'tags', 'creator'])
            ->latest('published_at')
            ->first();

        // Get all other blogs
        $blogs = $query->paginate(9);

        // Get all categories and count their blogs
        $categories = Category::ofType('blog')
            ->where('status', true)
            ->withCount(['blogs' => function ($query) {
                $query->published();
            }])
            ->orderBy('name')
            ->get();

        // Get popular tags
        $tags = Tag::withCount(['blogs' => function ($query) {
                $query->published();
            }])
            ->where('status', true)
            ->orderByDesc('blogs_count')
            ->limit(10)
            ->get();

        return view('blog.index', compact('blogs', 'featuredBlog', 'categories', 'tags', 'sort'));
    }

    /**
     * Display the specified blog.
     *
     * @param  string  $slug
     * @return View
     */
    public function show(string $slug): View
    {
        // Find the blog by slug
        $blog = Blog::where('slug', $slug)
            ->published()
            ->with(['categories', 'tags', 'creator', 'media'])
            ->firstOrFail();

        // Increment view count if you're tracking it
        // $blog->increment('view_count');

        // Get related blogs based on categories and tags
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->whereHas('categories', function ($query) use ($blog) {
                $query->whereIn('categories.id', $blog->categories->pluck('id'));
            })
            ->orWhereHas('tags', function ($query) use ($blog) {
                $query->whereIn('tags.id', $blog->tags->pluck('id'));
            })
            ->latest('published_at')
            ->limit(3)
            ->get();

        // Get next and previous blogs for navigation
        $nextBlog = Blog::published()
            ->where('published_at', '>', $blog->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        $previousBlog = Blog::published()
            ->where('published_at', '<', $blog->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        return view('blog.show', compact('blog', 'relatedBlogs', 'nextBlog', 'previousBlog'));
    }

    /**
     * Display blogs by category.
     *
     * @param  string  $slug
     * @param  Request  $request
     * @return View
     */
    public function category(string $slug, Request $request): View
    {
        // Find the category by slug
        $category = Category::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        // Get the sort parameter or default to 'latest'
        $sort = $request->get('sort', 'latest');

        // Get blogs in this category
        $query = Blog::published()
            ->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category->id);
            })
            ->with(['categories', 'tags', 'creator']);

        // Apply sorting
        switch ($sort) {
            case 'oldest':
                $query->orderBy('published_at', 'asc');
                break;
            case 'popular':
                $query->orderBy('view_count', 'desc');
                break;
            case 'latest':
            default:
                $query->orderBy('published_at', 'desc');
                break;
        }

        $blogs = $query->paginate(9);

        // Get all categories and count their blogs
        $categories = Category::ofType('blog')
            ->where('status', true)
            ->withCount(['blogs' => function ($query) {
                $query->published();
            }])
            ->orderBy('name')
            ->get();

        // Get popular tags
        $tags = Tag::withCount(['blogs' => function ($query) {
                $query->published();
            }])
            ->where('status', true)
            ->orderByDesc('blogs_count')
            ->limit(10)
            ->get();

        return view('blog.category', compact('blogs', 'category', 'categories', 'tags', 'sort'));
    }

    /**
     * Display blogs by tag.
     *
     * @param  string  $slug
     * @param  Request  $request
     * @return View
     */
    public function tag(string $slug, Request $request): View
    {
        // Find the tag by slug
        $tag = Tag::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        // Get the sort parameter or default to 'latest'
        $sort = $request->get('sort', 'latest');

        // Get blogs with this tag
        $query = Blog::published()
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.id', $tag->id);
            })
            ->with(['categories', 'tags', 'creator']);

        // Apply sorting
        switch ($sort) {
            case 'oldest':
                $query->orderBy('published_at', 'asc');
                break;
            case 'popular':
                $query->orderBy('view_count', 'desc');
                break;
            case 'latest':
            default:
                $query->orderBy('published_at', 'desc');
                break;
        }

        $blogs = $query->paginate(9);

        // Get all categories
        $categories = Category::ofType('blog')
            ->where('status', true)
            ->withCount(['blogs' => function ($query) {
                $query->published();
            }])
            ->orderBy('name')
            ->get();

        // Get popular tags
        $tags = Tag::withCount(['blogs' => function ($query) {
                $query->published();
            }])
            ->where('status', true)
            ->orderByDesc('blogs_count')
            ->limit(10)
            ->get();

        return view('blog.tag', compact('blogs', 'tag', 'categories', 'tags', 'sort'));
    }

    /**
     * Search for blogs.
     *
     * @param  Request  $request
     * @return View
     */
    public function search(Request $request): View
    {
        $query = $request->get('q');

        // Search blogs by title, excerpt, and content
        $blogs = Blog::published()
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%{$query}%")
                    ->orWhere('excerpt', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%");
            })
            ->with(['categories', 'tags', 'creator'])
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        // Get all categories
        $categories = Category::ofType('blog')
            ->where('status', true)
            ->withCount(['blogs' => function ($queryBuilder) {
                $queryBuilder->published();
            }])
            ->orderBy('name')
            ->get();

        // Get popular tags
        $tags = Tag::withCount(['blogs' => function ($queryBuilder) {
                $queryBuilder->published();
            }])
            ->where('status', true)
            ->orderByDesc('blogs_count')
            ->limit(10)
            ->get();

        return view('blog.search', compact('blogs', 'query', 'categories', 'tags'));
    }
}
