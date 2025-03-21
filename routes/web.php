<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\LinkedInController;
use App\Http\Controllers\BlogController;

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

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/tag/{slug}', [BlogController::class, 'tag'])->name('blog.tag');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

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
