<x-app-layout>
  <!-- Product Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Breadcrumbs -->
      <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
        <a href="/" class="hover:text-blue-600 transition-colors">Home</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <a href="/products" class="hover:text-blue-600 transition-colors">Products</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-gray-700">E-Commerce Web Application</span>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Product Preview -->
        <div class="space-y-4">
          <!-- Main Preview -->
          <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden bg-gray-100">
            <img
              src="https://images.unsplash.com/photo-1557821552-17105176677c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
              alt="E-Commerce Web Application Preview"
              class="w-full h-full object-cover"
            >
          </div>

          <!-- Screenshot Gallery -->
          <div class="grid grid-cols-4 gap-4">
            <button class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <img
                src="https://images.unsplash.com/photo-1557821552-17105176677c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                alt="Dashboard View"
                class="w-full h-full object-cover"
              >
            </button>
            <button class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <img
                src="https://images.unsplash.com/photo-1557821552-17105176677c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                alt="Product Management"
                class="w-full h-full object-cover"
              >
            </button>
            <button class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <img
                src="https://images.unsplash.com/photo-1557821552-17105176677c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                alt="Order Processing"
                class="w-full h-full object-cover"
              >
            </button>
            <button class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <img
                src="https://images.unsplash.com/photo-1557821552-17105176677c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                alt="Analytics Dashboard"
                class="w-full h-full object-cover"
              >
            </button>
          </div>
        </div>

        <!-- Product Info -->
        <div>
          <!-- Category & Rating -->
          <div class="flex items-center justify-between mb-4">
            <span class="px-3 py-1 bg-blue-100 text-blue-600 text-sm font-medium rounded-full">
              Web Application
            </span>
            <div class="flex items-center">
              <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.363 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              <span class="ml-1 text-sm text-gray-600">4.8 (128 reviews)</span>
            </div>
          </div>

          <!-- Title -->
          <h1 class="text-3xl font-bold text-gray-900 mb-4">
            E-Commerce Web Application
          </h1>

          <!-- Price -->
          <div class="flex items-center mb-6">
            <span class="text-3xl font-bold text-gray-900">$299.99</span>
            <span class="ml-2 text-sm text-gray-500 line-through">$399.99</span>
            <span class="ml-2 px-2 py-1 bg-red-100 text-red-600 text-sm font-medium rounded-full">
              Save 25%
            </span>
          </div>

          <!-- Description -->
          <p class="text-gray-600 mb-8">
            A complete e-commerce solution built with Laravel and Vue.js. Features include product management,
            order processing, customer management, and analytics dashboard. Perfect for online stores and marketplaces.
          </p>

          <!-- Demo Links -->
          <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Demo & Documentation</h3>
            <div class="space-y-3">
              <a href="#" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                <span class="text-gray-700">Live Demo</span>
              </a>
              <a href="#" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="text-gray-700">Documentation</span>
              </a>
              <a href="#" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
                <span class="text-gray-700">GitHub Repository</span>
              </a>
            </div>
          </div>

          <!-- Features -->
          <div class="space-y-4 mb-8">
            <h3 class="text-lg font-semibold text-gray-900">Key Features</h3>
            <div class="grid grid-cols-2 gap-4">
              <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-600">Product Management</span>
              </div>
              <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-600">Order Processing</span>
              </div>
              <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-600">Customer Management</span>
              </div>
              <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-600">Analytics Dashboard</span>
              </div>
            </div>
          </div>

          <!-- Purchase Options -->
          <div class="space-y-4 mb-8">
            <h3 class="text-lg font-semibold text-gray-900">Purchase Options</h3>
            <div class="space-y-3">
              <button class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Purchase License
              </button>
              <button class="w-full px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                Purchase with Support
              </button>
            </div>
          </div>

          <!-- Additional Info -->
          <div class="border-t border-gray-200 pt-8">
            <div class="flex items-center justify-between mb-4">
              <span class="text-sm text-gray-500">Lifetime updates</span>
              <span class="text-sm text-gray-500">6 months support</span>
            </div>
            <div class="flex items-center space-x-4">
              <button class="flex items-center text-gray-600 hover:text-gray-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <span>Add to Wishlist</span>
              </button>
              <button class="flex items-center text-gray-600 hover:text-gray-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                </svg>
                <span>Share</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Product Details Tabs -->
      <div class="mt-16">
        <div class="border-b border-gray-200">
          <nav class="flex space-x-8" aria-label="Tabs">
            <button class="border-b-2 border-blue-600 py-4 px-1 text-sm font-medium text-blue-600">
              Overview
            </button>
            <button class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
              Features
            </button>
            <button class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
              Documentation
            </button>
            <button class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
              Reviews
            </button>
          </nav>
        </div>

        <div class="mt-8">
          <div class="prose prose-lg max-w-none">
            <h2>Product Overview</h2>
            <p>
              Our e-commerce web application is a complete solution for online stores and marketplaces. Built with
              modern technologies and best practices, it provides everything you need to run a successful online business.
            </p>

            <h3>Technology Stack</h3>
            <ul>
              <li>Backend: Laravel 10.x</li>
              <li>Frontend: Vue.js 3.x</li>
              <li>Database: MySQL/PostgreSQL</li>
              <li>Authentication: Laravel Sanctum</li>
              <li>Payment Integration: Stripe/PayPal</li>
              <li>Search: Elasticsearch</li>
            </ul>

            <h3>System Requirements</h3>
            <ul>
              <li>PHP 8.1 or higher</li>
              <li>Node.js 16.x or higher</li>
              <li>Composer 2.x</li>
              <li>MySQL 8.0 or PostgreSQL 13</li>
              <li>Redis (optional)</li>
            </ul>

            <h3>Installation</h3>
            <pre class="bg-gray-50 p-4 rounded-lg overflow-x-auto">
              <code>composer create-project vendor/package-name
npm install
php artisan key:generate
php artisan migrate
npm run dev</code>
            </pre>

            <h3>Support & Updates</h3>
            <p>
              We provide 6 months of technical support with every purchase. This includes bug fixes, security updates,
              and general assistance. After 6 months, you can extend your support subscription for an additional fee.
            </p>
          </div>
        </div>
      </div>

      <!-- Related Products -->
      <div class="mt-16">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">You may also like</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Related Product 1 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="relative">
              <img
                src="https://images.unsplash.com/photo-1557821552-17105176677c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                alt="Mobile App Template"
                class="w-full h-48 object-cover"
              >
              <div class="absolute top-4 right-4">
                <span class="px-3 py-1 bg-blue-600 text-white text-sm font-medium rounded-full">
                  New
                </span>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-lg font-bold text-gray-900 mb-2">
                <a href="/products/mobile-app-template" class="hover:text-blue-600 transition-colors">
                  Mobile App Template
                </a>
              </h3>
              <p class="text-gray-600 mb-4 line-clamp-2">
                Flutter-based mobile app template with modern UI.
              </p>
              <div class="flex items-center justify-between">
                <span class="text-xl font-bold text-gray-900">$199.99</span>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                  View Details
                </button>
              </div>
            </div>
          </div>

          <!-- Related Product 2 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="relative">
              <img
                src="https://images.unsplash.com/photo-1557821552-17105176677c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                alt="Admin Dashboard"
                class="w-full h-48 object-cover"
              >
              <div class="absolute top-4 right-4">
                <span class="px-3 py-1 bg-green-600 text-white text-sm font-medium rounded-full">
                  Popular
                </span>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-lg font-bold text-gray-900 mb-2">
                <a href="/products/admin-dashboard" class="hover:text-blue-600 transition-colors">
                  Admin Dashboard
                </a>
              </h3>
              <p class="text-gray-600 mb-4 line-clamp-2">
                Modern admin dashboard with analytics and reporting.
              </p>
              <div class="flex items-center justify-between">
                <span class="text-xl font-bold text-gray-900">$149.99</span>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                  View Details
                </button>
              </div>
            </div>
          </div>

          <!-- Related Product 3 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="relative">
              <img
                src="https://images.unsplash.com/photo-1557821552-17105176677c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                alt="API Integration Kit"
                class="w-full h-48 object-cover"
              >
              <div class="absolute top-4 right-4">
                <span class="px-3 py-1 bg-red-600 text-white text-sm font-medium rounded-full">
                  Sale
                </span>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-lg font-bold text-gray-900 mb-2">
                <a href="/products/api-integration" class="hover:text-blue-600 transition-colors">
                  API Integration Kit
                </a>
              </h3>
              <p class="text-gray-600 mb-4 line-clamp-2">
                Complete API integration solution with documentation.
              </p>
              <div class="flex items-center justify-between">
                <div>
                  <span class="text-xl font-bold text-gray-900">$79.99</span>
                  <span class="ml-2 text-sm text-gray-500 line-through">$99.99</span>
                </div>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                  View Details
                </button>
              </div>
            </div>
          </div>

          <!-- Related Product 4 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="relative">
              <img
                src="https://images.unsplash.com/photo-1557821552-17105176677c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                alt="UI Component Library"
                class="w-full h-48 object-cover"
              >
              <div class="absolute top-4 right-4">
                <span class="px-3 py-1 bg-yellow-600 text-white text-sm font-medium rounded-full">
                  Limited
                </span>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-lg font-bold text-gray-900 mb-2">
                <a href="/products/ui-components" class="hover:text-blue-600 transition-colors">
                  UI Component Library
                </a>
              </h3>
              <p class="text-gray-600 mb-4 line-clamp-2">
                Collection of reusable UI components and templates.
              </p>
              <div class="flex items-center justify-between">
                <span class="text-xl font-bold text-gray-900">$129.99</span>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                  View Details
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
