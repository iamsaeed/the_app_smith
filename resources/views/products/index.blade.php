<x-app-layout>
    <x-slot name="title">Products - Quality Solutions for Your Needs</x-slot>
    <x-slot name="meta_description">Browse our range of high-quality products designed to meet your needs.</x-slot>
    <x-slot name="meta_keywords">products, solutions, quality items</x-slot>

    <!-- Hero Section -->
    <section class="relative pt-24 md:pt-28 lg:pt-32 pb-12 bg-gradient-to-r from-blue-50 to-indigo-50">
        <div class="absolute inset-0 bg-white/40 z-0"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 opacity-0 transform translate-y-4 transition duration-700 ease-out fade-in">
                    Our Products
                </h1>
                <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl mx-auto opacity-0 transform translate-y-4 transition duration-700 delay-100 ease-out fade-in">
                    Discover high-quality solutions tailored to your specific needs
                </p>
            </div>
        </div>
    </section>

  <!-- Products Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Filters and Search -->
      <div class="mb-8">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
          <!-- Search -->
          <div class="w-full md:w-96">
            <div class="relative">
              <input
                type="text"
                placeholder="Search products..."
                class="w-full px-4 py-2 pl-10 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              >
              <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
          </div>

          <!-- View Toggle -->
          <div class="flex items-center space-x-4">
            <button class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md transition-shadow">
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
              </svg>
            </button>
            <button class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md transition-shadow">
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Products Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <!-- Product Card 1 -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
          <div class="relative">
            <img
              src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
              alt="Wireless Headphones"
              class="w-full h-48 object-cover"
            >
            <div class="absolute top-4 right-4">
              <span class="px-3 py-1 bg-blue-600 text-white text-sm font-medium rounded-full">
                New
              </span>
            </div>
          </div>
          <div class="p-6">
            <div class="flex items-center justify-between mb-2">
              <span class="text-sm text-gray-500">Electronics</span>
              <div class="flex items-center">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.363 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="ml-1 text-sm text-gray-600">4.8</span>
              </div>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">
              <a href="/products/wireless-headphones" class="hover:text-blue-600 transition-colors">
                Premium Wireless Headphones
              </a>
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-2">
              High-quality wireless headphones with noise cancellation and premium sound quality.
            </p>
            <div class="flex items-center justify-between">
              <span class="text-xl font-bold text-gray-900">$299.99</span>
              <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Add to Cart
              </button>
            </div>
          </div>
        </div>

        <!-- Product Card 2 -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
          <div class="relative">
            <img
              src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
              alt="Smart Watch"
              class="w-full h-48 object-cover"
            >
            <div class="absolute top-4 right-4">
              <span class="px-3 py-1 bg-green-600 text-white text-sm font-medium rounded-full">
                In Stock
              </span>
            </div>
          </div>
          <div class="p-6">
            <div class="flex items-center justify-between mb-2">
              <span class="text-sm text-gray-500">Wearables</span>
              <div class="flex items-center">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.363 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="ml-1 text-sm text-gray-600">4.9</span>
              </div>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">
              <a href="/products/smart-watch" class="hover:text-blue-600 transition-colors">
                Smart Watch Pro
              </a>
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-2">
              Advanced smartwatch with health tracking, notifications, and long battery life.
            </p>
            <div class="flex items-center justify-between">
              <span class="text-xl font-bold text-gray-900">$199.99</span>
              <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Add to Cart
              </button>
            </div>
          </div>
        </div>

        <!-- Product Card 3 -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
          <div class="relative">
            <img
              src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
              alt="Wireless Earbuds"
              class="w-full h-48 object-cover"
            >
            <div class="absolute top-4 right-4">
              <span class="px-3 py-1 bg-red-600 text-white text-sm font-medium rounded-full">
                Sale
              </span>
            </div>
          </div>
          <div class="p-6">
            <div class="flex items-center justify-between mb-2">
              <span class="text-sm text-gray-500">Electronics</span>
              <div class="flex items-center">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.363 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="ml-1 text-sm text-gray-600">4.7</span>
              </div>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">
              <a href="/products/wireless-earbuds" class="hover:text-blue-600 transition-colors">
                True Wireless Earbuds
              </a>
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-2">
              Compact wireless earbuds with active noise cancellation and touch controls.
            </p>
            <div class="flex items-center justify-between">
              <div>
                <span class="text-xl font-bold text-gray-900">$149.99</span>
                <span class="ml-2 text-sm text-gray-500 line-through">$199.99</span>
              </div>
              <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Add to Cart
              </button>
            </div>
          </div>
        </div>

        <!-- Product Card 4 -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
          <div class="relative">
            <img
              src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
              alt="Smart Watch"
              class="w-full h-48 object-cover"
            >
            <div class="absolute top-4 right-4">
              <span class="px-3 py-1 bg-yellow-600 text-white text-sm font-medium rounded-full">
                Limited
              </span>
            </div>
          </div>
          <div class="p-6">
            <div class="flex items-center justify-between mb-2">
              <span class="text-sm text-gray-500">Wearables</span>
              <div class="flex items-center">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.363 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="ml-1 text-sm text-gray-600">4.6</span>
              </div>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">
              <a href="/products/smart-watch-sport" class="hover:text-blue-600 transition-colors">
                Sport Smart Watch
              </a>
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-2">
              Rugged smartwatch designed for athletes with advanced fitness tracking.
            </p>
            <div class="flex items-center justify-between">
              <span class="text-xl font-bold text-gray-900">$249.99</span>
              <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <div class="mt-12 flex justify-center">
        <nav class="flex items-center space-x-2">
          <button class="px-3 py-2 rounded-lg bg-white text-gray-500 hover:bg-gray-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button class="px-3 py-2 rounded-lg bg-blue-600 text-white">1</button>
          <button class="px-3 py-2 rounded-lg bg-white text-gray-700 hover:bg-gray-50 transition-colors">2</button>
          <button class="px-3 py-2 rounded-lg bg-white text-gray-700 hover:bg-gray-50 transition-colors">3</button>
          <span class="px-3 py-2 text-gray-500">...</span>
          <button class="px-3 py-2 rounded-lg bg-white text-gray-700 hover:bg-gray-50 transition-colors">8</button>
          <button class="px-3 py-2 rounded-lg bg-white text-gray-500 hover:bg-gray-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </nav>
      </div>
    </div>
  </section>
</x-app-layout>
