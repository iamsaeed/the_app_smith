<x-app-layout>
  {{-- SEO Meta Tags --}}
  @push('meta')
    <meta name="description" content="Learn how to build a modern web application using Laravel and Tailwind CSS. This comprehensive guide covers everything from setup to deployment.">
    <meta name="author" content="John Doe">
    <meta name="keywords" content="Laravel, Tailwind CSS, Web Development, PHP, Tutorial">

    {{-- Open Graph --}}
    <meta property="og:title" content="Building a Modern Web Application with Laravel and Tailwind CSS">
    <meta property="og:description" content="Learn how to build a modern web application using Laravel and Tailwind CSS. This comprehensive guide covers everything from setup to deployment.">
    <meta property="og:image" content="https://images.unsplash.com/photo-1461749280684-dccba630ec2f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80">
    <meta property="og:url" content="https://example.com/blog/building-modern-web-application">
    <meta property="og:type" content="article">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Building a Modern Web Application with Laravel and Tailwind CSS">
    <meta name="twitter:description" content="Learn how to build a modern web application using Laravel and Tailwind CSS. This comprehensive guide covers everything from setup to deployment.">
    <meta name="twitter:image" content="https://images.unsplash.com/photo-1461749280684-dccba630ec2f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80">

    {{-- Article Specific --}}
    <meta property="article:published_time" content="2024-03-20T10:00:00+00:00">
    <meta property="article:author" content="John Doe">
    <meta property="article:section" content="Web Development">
    <meta property="article:tag" content="Laravel">
    <meta property="article:tag" content="Tailwind CSS">
    <meta property="article:tag" content="Web Development">
    <meta property="article:tag" content="PHP">
    <meta property="article:tag" content="Tutorial">
  @endpush

  <!-- Hero Section -->
  <section class="relative pt-24 md:pt-28 pb-16 bg-gradient-to-r from-blue-600 to-indigo-700 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
      <div class="absolute inset-0 bg-[url('/img/grid.svg')] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
    </div>
    <div class="container relative z-10 mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Breadcrumbs -->
      <nav class="flex items-center space-x-2 text-sm text-blue-100 mb-8" aria-label="Breadcrumb">
        <a href="/" class="hover:text-white transition-colors">Home</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <a href="/blog" class="hover:text-white transition-colors">Blog</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <a href="/blog/web-development" class="hover:text-white transition-colors">Web Development</a>
      </nav>

      <div class="max-w-4xl mx-auto text-center">
        <!-- Category & Tags -->
        <div class="flex flex-wrap gap-2 justify-center mb-6">
          <a href="/blog/web-development"
            class="px-3 py-1 bg-white/20 text-white text-sm font-medium rounded-full hover:bg-white/30 transition-colors">
            Web Development
          </a>
          <a href="/blog/tag/laravel"
            class="px-3 py-1 bg-white/10 text-blue-100 text-sm font-medium rounded-full hover:bg-white/20 transition-colors">
            Laravel
          </a>
          <a href="/blog/tag/tailwind"
            class="px-3 py-1 bg-white/10 text-blue-100 text-sm font-medium rounded-full hover:bg-white/20 transition-colors">
            Tailwind CSS
          </a>
          <a href="/blog/tag/php"
            class="px-3 py-1 bg-white/10 text-blue-100 text-sm font-medium rounded-full hover:bg-white/20 transition-colors">
            PHP
          </a>
        </div>

        <!-- Title -->
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
          Building a Modern Web Application with Laravel and Tailwind CSS
        </h1>

        <!-- Author Info -->
        <div class="flex items-center justify-center mt-8">
          <img
            src="https://ui-avatars.com/api/?name=John+Doe&background=0D9488&color=fff"
            alt="John Doe"
            class="w-12 h-12 rounded-full border-2 border-white/30"
          >
          <div class="ml-4 text-left">
            <h3 class="font-medium text-white">John Doe</h3>
            <div class="flex items-center text-sm text-blue-100">
              <time datetime="2024-03-20T10:00:00+00:00">March 20, 2024</time>
              <span class="mx-2">•</span>
              <span>8 min read</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Wave Design -->
    <div class="absolute bottom-0 left-0 right-0">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="text-white">
        <path fill="currentColor" fill-opacity="1" d="M0,128L60,138.7C120,149,240,171,360,181.3C480,192,600,192,720,176C840,160,960,128,1080,117.3C1200,107,1320,117,1380,122.7L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
      </svg>
    </div>
  </section>

  <!-- Main Article Section -->
  <section class="py-12 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-4xl mx-auto">
        <!-- Featured Image -->
        <div class="rounded-2xl overflow-hidden shadow-lg mb-10">
          <img
            src="https://images.unsplash.com/photo-1461749280684-dccba630ec2f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
            alt="Building a Modern Web Application with Laravel and Tailwind CSS"
            class="w-full h-auto object-cover"
          >
        </div>

        <!-- Share Buttons -->
        <div class="flex items-center justify-between border-b border-gray-200 pb-6 mb-8">
          <div class="text-lg font-medium text-gray-700">Share this article:</div>
          <div class="flex items-center space-x-4">
            <button class="text-gray-500 hover:text-blue-500 transition-colors" aria-label="Share on Twitter">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
              </svg>
            </button>
            <button class="text-gray-500 hover:text-blue-700 transition-colors" aria-label="Share on LinkedIn">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
              </svg>
            </button>
            <button class="text-gray-500 hover:text-blue-600 transition-colors" aria-label="Share on Facebook">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
              </svg>
            </button>
            <button class="text-gray-500 hover:text-purple-600 transition-colors" aria-label="Copy link">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
              </svg>
            </button>
          </div>
        </div>

        <!-- Article Content -->
        <div class="prose prose-lg max-w-none mb-12">
          <p>In this comprehensive guide, we'll walk through the process of building a modern web application using Laravel and Tailwind CSS. We'll cover everything from initial setup to deployment, including best practices and common pitfalls to avoid.</p>

          <h2>Getting Started</h2>
          <p>First, let's set up our development environment. We'll need PHP 8.1 or higher, Composer, and Node.js installed on our system. Once we have these prerequisites, we can create a new Laravel project using the following command:</p>

          <pre><code>composer create-project laravel/laravel my-project</code></pre>

          <h2>Installing Tailwind CSS</h2>
          <p>Next, we'll install Tailwind CSS and configure it for our project. We'll use the official Tailwind CSS installation guide for Laravel:</p>

          <pre><code>npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p</code></pre>

          <h2>Building the Layout</h2>
          <p>With our environment set up, we can start building our application's layout. We'll create a responsive design that works well on all devices. Here's a basic example of our layout structure:</p>

          <pre><code>&lt;div class="min-h-screen bg-gray-100"&gt;
  &lt;nav class="bg-white shadow-lg"&gt;
    &lt;div class="max-w-7xl mx-auto px-4"&gt;
      &lt;div class="flex justify-between h-16"&gt;
        &lt;div class="flex"&gt;
          &lt;div class="flex-shrink-0 flex items-center"&gt;
            &lt;img class="h-8 w-auto" src="/logo.svg" alt="Logo"&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/nav&gt;
&lt;/div&gt;</code></pre>

          <h2>Working with Data</h2>
          <p>Laravel provides an excellent ORM called Eloquent that makes working with databases a breeze. Here's how we can define a model and its relationships:</p>

          <pre><code>class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'published_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}</code></pre>

          <h2>Deployment</h2>
          <p>When it's time to deploy our application, we have several options. One popular choice is Laravel Forge, which makes it easy to deploy to various cloud providers. Here's a basic deployment checklist:</p>

          <ul>
            <li>Set up your production environment</li>
            <li>Configure your database</li>
            <li>Set up SSL certificates</li>
            <li>Configure your web server</li>
            <li>Deploy your code</li>
          </ul>

          <h2>Conclusion</h2>
          <p>Building a modern web application with Laravel and Tailwind CSS is a powerful combination that allows us to create beautiful, responsive applications quickly and efficiently. By following the best practices outlined in this guide, you'll be well on your way to creating your own amazing web applications.</p>
        </div>

        <!-- Tags Cloud -->
        <div class="border-t border-gray-200 pt-8 mb-10">
          <h3 class="text-lg font-medium text-gray-900 mb-4">Tags</h3>
          <div class="flex flex-wrap gap-2">
            <a href="/blog/tag/laravel"
              class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors duration-200">
              <span class="mr-1 text-blue-500">#</span>Laravel
            </a>
            <a href="/blog/tag/tailwind"
              class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors duration-200">
              <span class="mr-1 text-blue-500">#</span>Tailwind CSS
            </a>
            <a href="/blog/tag/php"
              class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors duration-200">
              <span class="mr-1 text-blue-500">#</span>PHP
            </a>
            <a href="/blog/tag/web-development"
              class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors duration-200">
              <span class="mr-1 text-blue-500">#</span>Web Development
            </a>
            <a href="/blog/tag/tutorial"
              class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors duration-200">
              <span class="mr-1 text-blue-500">#</span>Tutorial
            </a>
          </div>
        </div>

        <!-- Author Bio -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 mb-12">
          <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
            <img
              src="https://ui-avatars.com/api/?name=John+Doe&background=0D9488&color=fff"
              alt="John Doe"
              class="w-20 h-20 rounded-full border-4 border-white shadow-md"
            >
            <div>
              <h3 class="text-xl font-bold text-gray-900 mb-2">Written by John Doe</h3>
              <p class="text-gray-600 mb-4">John is a full-stack developer with over 10 years of experience in web development. He specializes in Laravel and modern frontend technologies.</p>
              <div class="flex space-x-4">
                <a href="https://twitter.com/johndoe" class="text-blue-500 hover:text-blue-700 transition-colors">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                  </svg>
                </a>
                <a href="https://github.com/johndoe" class="text-gray-800 hover:text-gray-600 transition-colors">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
                  </svg>
                </a>
                <a href="https://linkedin.com/in/johndoe" class="text-blue-700 hover:text-blue-900 transition-colors">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Next/Previous Navigation -->
        <div class="flex flex-col sm:flex-row justify-between gap-4 border-t border-gray-200 pt-8 mb-12">
          <a href="/blog/previous-post" class="group flex items-center text-left">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <div>
              <span class="block text-sm text-gray-500">Previous Article</span>
              <span class="block text-gray-900 font-medium group-hover:text-blue-600 transition-colors">Getting Started with Laravel Authentication</span>
            </div>
          </a>

          <a href="/blog/next-post" class="group flex items-center text-right">
            <div>
              <span class="block text-sm text-gray-500">Next Article</span>
              <span class="block text-gray-900 font-medium group-hover:text-blue-600 transition-colors">Deploying Laravel Applications to Production</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Related Posts Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-900 mb-10">You might also like</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <a href="/blog/getting-started-laravel" class="block">
              <div class="relative h-48">
                <img
                  src="https://images.unsplash.com/photo-1555066931-bf19f8e1083d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                  alt="Getting Started with Laravel"
                  class="w-full h-full object-cover"
                >
                <div class="absolute top-4 left-4">
                  <span class="px-3 py-1 bg-blue-600 text-white text-sm font-medium rounded-full">
                    Laravel
                  </span>
                </div>
              </div>
            </a>
            <div class="p-6">
              <div class="flex flex-wrap gap-2 mb-3">
                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Laravel</span>
                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">PHP</span>
                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Tutorial</span>
              </div>
              <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
                <a href="/blog/getting-started-laravel">Getting Started with Laravel</a>
              </h3>
              <p class="text-gray-600 mb-4 line-clamp-2">Learn the basics of Laravel and how to set up your first project with this comprehensive guide.</p>
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <img
                    src="https://ui-avatars.com/api/?name=John+Doe&background=0D9488&color=fff"
                    alt="John Doe"
                    class="w-8 h-8 rounded-full mr-3"
                  >
                  <span class="text-sm text-gray-600">John Doe</span>
                </div>
                <span class="text-sm text-gray-500">5 min read</span>
              </div>
            </div>
          </article>

          <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <a href="/blog/deploying-laravel" class="block">
              <div class="relative h-48">
                <img
                  src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                  alt="Deploying Laravel Applications"
                  class="w-full h-full object-cover"
                >
                <div class="absolute top-4 left-4">
                  <span class="px-3 py-1 bg-blue-600 text-white text-sm font-medium rounded-full">
                    Deployment
                  </span>
                </div>
              </div>
            </a>
            <div class="p-6">
              <div class="flex flex-wrap gap-2 mb-3">
                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Laravel</span>
                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Deployment</span>
                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">DevOps</span>
              </div>
              <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
                <a href="/blog/deploying-laravel">Deploying Laravel Applications to Production</a>
              </h3>
              <p class="text-gray-600 mb-4 line-clamp-2">A step-by-step guide to deploying your Laravel application to production using various hosting platforms.</p>
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <img
                    src="https://ui-avatars.com/api/?name=John+Doe&background=0D9488&color=fff"
                    alt="John Doe"
                    class="w-8 h-8 rounded-full mr-3"
                  >
                  <span class="text-sm text-gray-600">John Doe</span>
                </div>
                <span class="text-sm text-gray-500">7 min read</span>
              </div>
            </div>
          </article>

          <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <a href="/blog/laravel-best-practices" class="block">
              <div class="relative h-48">
                <img
                  src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                  alt="Laravel Best Practices"
                  class="w-full h-full object-cover"
                >
                <div class="absolute top-4 left-4">
                  <span class="px-3 py-1 bg-blue-600 text-white text-sm font-medium rounded-full">
                    Best Practices
                  </span>
                </div>
              </div>
            </a>
            <div class="p-6">
              <div class="flex flex-wrap gap-2 mb-3">
                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Laravel</span>
                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">PHP</span>
                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Development</span>
              </div>
              <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
                <a href="/blog/laravel-best-practices">Laravel Best Practices for 2024</a>
              </h3>
              <p class="text-gray-600 mb-4 line-clamp-2">Discover the latest best practices for Laravel development in 2024, including tips for performance and security.</p>
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <img
                    src="https://ui-avatars.com/api/?name=John+Doe&background=0D9488&color=fff"
                    alt="John Doe"
                    class="w-8 h-8 rounded-full mr-3"
                  >
                  <span class="text-sm text-gray-600">John Doe</span>
                </div>
                <span class="text-sm text-gray-500">6 min read</span>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Section -->
  <section class="py-16 bg-gray-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto text-center">
        <div class="inline-block p-3 bg-blue-600/20 rounded-2xl mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
        </div>
        <h2 class="text-3xl font-bold text-white mb-4">
          Never Miss an Update
        </h2>
        <p class="text-xl text-gray-300 mb-8">
          Subscribe to our newsletter to receive the latest articles, tutorials, and updates directly in your inbox.
        </p>
        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
          @csrf
          <input
            type="email"
            name="email"
            placeholder="Enter your email"
            class="flex-1 px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
            required
          >
          <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
            Subscribe
          </button>
        </form>
        <p class="text-gray-400 text-sm mt-4">
          We respect your privacy. Unsubscribe at any time.
        </p>
      </div>
    </div>
  </section>

  @push('scripts')
  {{-- Schema.org Article Markup --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "Building a Modern Web Application with Laravel and Tailwind CSS",
    "image": "https://images.unsplash.com/photo-1461749280684-dccba630ec2f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
    "author": {
      "@type": "Person",
      "name": "John Doe",
      "url": "https://example.com/about"
    },
    "publisher": {
      "@type": "Organization",
      "name": "LaravelDev",
      "logo": {
        "@type": "ImageObject",
        "url": "https://example.com/images/logo.png"
      }
    },
    "datePublished": "2024-03-20T10:00:00+00:00",
    "dateModified": "2024-03-20T10:00:00+00:00",
    "description": "Learn how to build a modern web application using Laravel and Tailwind CSS. This comprehensive guide covers everything from setup to deployment.",
    "articleBody": "In this comprehensive guide, we'll walk through the process of building a modern web application using Laravel and Tailwind CSS. We'll cover everything from initial setup to deployment, including best practices and common pitfalls to avoid.",
    "keywords": "Laravel, Tailwind CSS, Web Development, PHP, Tutorial"
  }
  </script>
  @endpush
</x-app-layout>
