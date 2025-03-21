<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\LinkedInController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

// About page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Services Routes
Route::get('/services', [ServicesController::class, 'index'])->name('services.index');

// Blog page
Route::get('/blog', function () {
    return view('blog.index');
})->name('blog.index');

// Blog post page
Route::get('/blog/{slug}', function ($slug) {
    // This will be implemented later to fetch the actual post
    // For now, we'll pass dummy post data
    $post = (object)[
        'title' => 'Modern Web Development Trends in 2024',
        'slug' => $slug,
        'excerpt' => 'Explore the latest trends shaping the future of web development, from AI-powered interfaces to WebAssembly innovations.',
        'content' => '<p>This is a sample blog post content. In a real application, this would be pulled from a database.</p>
                      <p>Here we would have more detailed content about modern web development trends in 2024.</p>',
        'image' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80',
        'category' => 'Web Development',
        'tags' => ['JavaScript', 'React', 'Vue', 'WebAssembly'],
        'publishedAt' => '2024-03-15T10:00:00',
        'updatedAt' => '2024-03-16T14:30:00',
        'publishedDate' => 'March 15, 2024',
        'readTime' => 10,
        'author' => (object)[
            'name' => 'John Doe',
            'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            'bio' => 'John is a senior web developer with over 10 years of experience in creating modern web applications.',
            'twitter' => 'https://twitter.com/johndoe',
            'github' => 'https://github.com/johndoe',
            'linkedin' => 'https://linkedin.com/in/johndoe'
        ]
    ];

    // Dummy related posts data
    $relatedPosts = [
        (object)[
            'title' => 'Essential JavaScript Features for 2024',
            'slug' => 'modern-javascript-features-2024',
            'excerpt' => 'Discover the must-know JavaScript features and techniques that will boost your productivity in 2024.',
            'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80',
            'category' => 'Web Development',
            'readTime' => 8,
            'author' => (object)[
                'name' => 'Sarah Johnson',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80'
            ]
        ],
        (object)[
            'title' => 'Comparing React State Management Solutions',
            'slug' => 'react-state-management-comparison',
            'excerpt' => 'An in-depth analysis of different state management approaches in React applications.',
            'image' => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?auto=format&fit=crop&q=80',
            'category' => 'Web Development',
            'readTime' => 12,
            'author' => (object)[
                'name' => 'Michael Chen',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80'
            ]
        ],
        (object)[
            'title' => 'Next.js vs Remix: Which React Framework to Choose?',
            'slug' => 'nextjs-vs-remix',
            'excerpt' => 'A detailed comparison of Next.js and Remix for building modern React applications.',
            'image' => 'https://images.unsplash.com/photo-1618761714954-0b8cd0026356?auto=format&fit=crop&q=80',
            'category' => 'Web Development',
            'readTime' => 9,
            'author' => (object)[
                'name' => 'Lisa Wang',
                'avatar' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&q=80'
            ]
        ]
    ];

    return view('blog.show', compact('post', 'relatedPosts'));
})->name('blog.show');

// Blog category page
Route::get('/blog/category/{category}', function ($category) {
    return view('blog.index');
})->name('blog.category');

// Blog tag page
Route::get('/blog/tag/{tag}', function ($tag) {
    return view('blog.index');
})->name('blog.tag');

// Blog search page
Route::get('/blog/search', function () {
    return view('blog.index');
})->name('blog.search');

// Newsletter subscription
Route::post('/newsletter/subscribe', function () {
    // This will be implemented later
    return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
})->name('newsletter.subscribe');

// Products index page
Route::get('/products', function () {
    return view('products.index');
})->name('products.index');

// Products show page
Route::get('/products/{slug}', function ($slug) {
    // This will be implemented later to fetch the actual app
    // For now, we'll pass dummy app data
    $app = (object)[
        'title' => ucwords(str_replace('-', ' ', $slug)),
        'slug' => $slug,
        'tagline' => 'Streamline your workflow with our powerful ' . ucwords(str_replace('-', ' ', $slug)) . ' application',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        'banner' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80',
        'demoUrl' => '#',
        'techStack' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL', 'Docker'],
        'features' => [
            (object)[
                'title' => 'Intuitive Dashboard',
                'icon' => 'tachometer-alt',
                'description' => 'A comprehensive dashboard providing all the information you need at a glance.'
            ],
            (object)[
                'title' => 'Smart Automation',
                'icon' => 'robot',
                'description' => 'Automate repetitive tasks and focus on what really matters for your workflow.'
            ],
            (object)[
                'title' => 'Advanced Analytics',
                'icon' => 'chart-line',
                'description' => 'Gain insights from detailed analytics and make data-driven decisions.'
            ],
            (object)[
                'title' => 'Seamless Integration',
                'icon' => 'plug',
                'description' => 'Easily integrate with other tools and services you already use.'
            ],
            (object)[
                'title' => 'Real-time Collaboration',
                'icon' => 'users',
                'description' => 'Work together with your team in real-time for better results.'
            ],
            (object)[
                'title' => 'Responsive Design',
                'icon' => 'mobile-alt',
                'description' => 'Access your work from any device with our responsive interface.'
            ]
        ],
        'screenshots' => [
            'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&q=80'
        ]
    ];

    return view('products.show', compact('app'));
})->name('products.show');

// Contact routes
Route::get('/contact', [EnquiryController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [EnquiryController::class, 'submitContactForm'])->name('contact.submit');
Route::get('/thank-you', [EnquiryController::class, 'thankYou'])->name('contact.thank-you');

// LinkedIn Routes
Route::get('/auth/linkedin', [LinkedInController::class, 'redirect'])->name('linkedin.auth');
Route::get('/auth/linkedin/callback', [LinkedInController::class, 'callback'])->name('linkedin.callback');
Route::get('/linkedin/success', [LinkedInController::class, 'success'])->name('linkedin.success');
Route::get('/linkedin/failed', [LinkedInController::class, 'failed'])->name('linkedin.failed');
Route::post('/linkedin/disconnect', [LinkedInController::class, 'disconnect'])->name('linkedin.disconnect');

// Legal Pages
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy.policy');
