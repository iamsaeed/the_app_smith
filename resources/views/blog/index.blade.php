<x-app-layout>

      <!-- Hero Section -->
  <section class="relative pt-24 md:pt-28 lg:pt-32 pb-12 bg-gradient-to-r from-blue-50 to-indigo-50">
    <div class="absolute inset-0 bg-white/40 z-0"></div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 opacity-0 transform translate-y-4 transition duration-700 ease-out fade-in">
            Our Blog
        </h1>
        <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl mx-auto opacity-0 transform translate-y-4 transition duration-700 delay-100 ease-out fade-in">
            Insights, tutorials, and updates from our team of experts
        </p>
      </div>
    </div>
  </section>

  <!-- Hero Section with Animated Background -->
  <section class="relative py-20 overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-700">
    <div class="container relative z-10 mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-3xl text-center">
        <!-- Search Bar -->
        <div class="mt-8 flex justify-center">
          <div class="w-full max-w-md">
            <form action="{{ route('blog.search') }}" method="GET" class="relative">
              <input
                type="search"
                name="q"
                placeholder="Search for articles..."
                class="w-full rounded-full border-0 bg-white/90 py-3 pl-5 pr-12 shadow-lg focus:ring-2 focus:ring-blue-400"
              >
              <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 rounded-full bg-blue-600 p-2 text-white hover:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
              </button>
            </form>
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

  <!-- Categories and Tags Navigation -->
  <section class="py-8 bg-white border-b border-gray-100">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col space-y-6">
        <!-- Categories Pills -->
        <div>
          <h3 class="text-lg font-medium text-gray-900 mb-3">Categories</h3>
          <div class="flex flex-wrap gap-2" x-data="{ activeCategory: 'all' }">
            <button
              @click="activeCategory = 'all'; window.location.href='{{ route('blog.index') }}'"
              :class="{ 'bg-blue-600 text-white': activeCategory === 'all', 'bg-gray-100 text-gray-800 hover:bg-gray-200': activeCategory !== 'all' }"
              class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200"
            >
              All
            </button>
            <button
              @click="activeCategory = 'web-development'; window.location.href='{{ route('blog.category', 'web-development') }}'"
              :class="{ 'bg-blue-600 text-white': activeCategory === 'web-development', 'bg-gray-100 text-gray-800 hover:bg-gray-200': activeCategory !== 'web-development' }"
              class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200"
            >
              Web Development
            </button>
            <button
              @click="activeCategory = 'mobile'; window.location.href='{{ route('blog.category', 'mobile') }}'"
              :class="{ 'bg-blue-600 text-white': activeCategory === 'mobile', 'bg-gray-100 text-gray-800 hover:bg-gray-200': activeCategory !== 'mobile' }"
              class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200"
            >
              Mobile Development
            </button>
            <button
              @click="activeCategory = 'design'; window.location.href='{{ route('blog.category', 'design') }}'"
              :class="{ 'bg-blue-600 text-white': activeCategory === 'design', 'bg-gray-100 text-gray-800 hover:bg-gray-200': activeCategory !== 'design' }"
              class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200"
            >
              UI/UX Design
            </button>
            <button
              @click="activeCategory = 'ai'; window.location.href='{{ route('blog.category', 'ai') }}'"
              :class="{ 'bg-blue-600 text-white': activeCategory === 'ai', 'bg-gray-100 text-gray-800 hover:bg-gray-200': activeCategory !== 'ai' }"
              class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200"
            >
              AI & Machine Learning
            </button>
            <button
              @click="activeCategory = 'devops'; window.location.href='{{ route('blog.category', 'devops') }}'"
              :class="{ 'bg-blue-600 text-white': activeCategory === 'devops', 'bg-gray-100 text-gray-800 hover:bg-gray-200': activeCategory !== 'devops' }"
              class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200"
            >
              DevOps
            </button>
          </div>
        </div>

        <!-- Popular Tags -->
        <div>
          <h3 class="text-lg font-medium text-gray-900 mb-3">Popular Tags</h3>
          <div class="flex flex-wrap gap-2">
            <a href="{{ route('blog.tag', 'javascript') }}" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 hover:bg-blue-200 transition-colors duration-200">
              <span class="mr-1 text-blue-500">#</span>JavaScript
            </a>
            <a href="{{ route('blog.tag', 'laravel') }}" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 hover:bg-green-200 transition-colors duration-200">
              <span class="mr-1 text-green-500">#</span>Laravel
            </a>
            <a href="{{ route('blog.tag', 'react') }}" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 hover:bg-purple-200 transition-colors duration-200">
              <span class="mr-1 text-purple-500">#</span>React
            </a>
            <a href="{{ route('blog.tag', 'flutter') }}" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 hover:bg-yellow-200 transition-colors duration-200">
              <span class="mr-1 text-yellow-500">#</span>Flutter
            </a>
            <a href="{{ route('blog.tag', 'ux') }}" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-pink-100 text-pink-800 hover:bg-pink-200 transition-colors duration-200">
              <span class="mr-1 text-pink-500">#</span>UX
            </a>
            <a href="{{ route('blog.tag', 'docker') }}" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 hover:bg-red-200 transition-colors duration-200">
              <span class="mr-1 text-red-500">#</span>Docker
            </a>
            <a href="{{ route('blog.tag', 'api') }}" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 hover:bg-indigo-200 transition-colors duration-200">
              <span class="mr-1 text-indigo-500">#</span>API
            </a>
            <a href="{{ route('blog.tag', 'cloud') }}" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-teal-100 text-teal-800 hover:bg-teal-200 transition-colors duration-200">
              <span class="mr-1 text-teal-500">#</span>Cloud
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Post -->
  <section class="py-16 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold text-gray-900 mb-8">Featured Post</h2>

      <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="lg:flex">
          <div class="lg:w-1/2">
            <div class="h-80 lg:h-full relative">
              <img
                src="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80"
                alt="Featured post about AI in web development"
                class="w-full h-full object-cover"
              >
              <div class="absolute top-4 left-4">
                <span class="px-3 py-1 bg-blue-600 text-white text-sm font-medium rounded-full">Featured</span>
              </div>
            </div>
          </div>
          <div class="lg:w-1/2 p-8 lg:p-10">
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">AI</span>
              <span class="px-3 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Web Development</span>
              <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Future Tech</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">
              <a href="{{ route('blog.show', 'how-ai-is-transforming-modern-web-development-2024') }}" class="hover:text-blue-600 transition-colors">How AI is Transforming Modern Web Development in 2024</a>
            </h3>
            <p class="text-gray-600 mb-6 line-clamp-3">
              Artificial intelligence is revolutionizing how websites are built, from automated testing to intelligent code completion and predictive user analytics. Learn how developers are leveraging AI to build better web experiences faster than ever before.
            </p>
            <div class="flex items-center mb-6">
              <img
                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="Author"
                class="w-10 h-10 rounded-full mr-4"
              >
              <div>
                <p class="text-gray-900 font-medium">Emma Rodriguez</p>
                <p class="text-gray-500 text-sm">May 12, 2024 · 8 min read</p>
              </div>
            </div>
            <a href="{{ route('blog.show', 'how-ai-is-transforming-modern-web-development-2024') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
              Read Article
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog Posts Grid -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center mb-10">
        <h2 class="text-3xl font-bold text-gray-900">Latest Articles</h2>
        <div>
          <select class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="newest">Newest First</option>
            <option value="oldest">Oldest First</option>
            <option value="popular">Most Popular</option>
          </select>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Blog Post 1 -->
        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
          <a href="{{ route('blog.show', 'javascript-features-you-might-not-know') }}" class="block">
            <div class="relative h-48">
              <img
                src="https://images.unsplash.com/photo-1618477388954-7852f32655ec?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="JavaScript article"
                class="w-full h-full object-cover"
              >
              <div class="absolute top-4 left-4">
                <span class="px-3 py-1 bg-yellow-500 text-white text-sm font-medium rounded-full">JavaScript</span>
              </div>
            </div>
          </a>
          <div class="p-6">
            <div class="flex flex-wrap gap-2 mb-3">
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Frontend</span>
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">ES2023</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
              <a href="{{ route('blog.show', 'javascript-features-you-might-not-know') }}">10 JavaScript Features You Might Not Know About</a>
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-2">
              Discover lesser-known JavaScript features that can help you write cleaner, more efficient code.
            </p>
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <img
                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                  alt="Author"
                  class="w-8 h-8 rounded-full mr-3"
                >
                <span class="text-sm text-gray-600">David Kim</span>
              </div>
              <span class="text-sm text-gray-500">6 min read</span>
            </div>
          </div>
        </article>

        <!-- Blog Post 2 -->
        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
          <a href="{{ route('blog.show', 'building-performant-react-applications') }}" class="block">
            <div class="relative h-48">
              <img
                src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="React article"
                class="w-full h-full object-cover"
              >
              <div class="absolute top-4 left-4">
                <span class="px-3 py-1 bg-blue-500 text-white text-sm font-medium rounded-full">React</span>
              </div>
            </div>
          </a>
          <div class="p-6">
            <div class="flex flex-wrap gap-2 mb-3">
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Hooks</span>
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Performance</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
              <a href="{{ route('blog.show', 'building-performant-react-applications') }}">Building Performant React Applications</a>
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-2">
              Learn how to optimize your React applications for better performance and user experience.
            </p>
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <img
                  src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                  alt="Author"
                  class="w-8 h-8 rounded-full mr-3"
                >
                <span class="text-sm text-gray-600">Sarah Johnson</span>
              </div>
              <span class="text-sm text-gray-500">9 min read</span>
            </div>
          </div>
        </article>

        <!-- Blog Post 3 -->
        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
          <a href="{{ route('blog.show', 'flutter-vs-react-native-2024') }}" class="block">
            <div class="relative h-48">
              <img
                src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="Mobile development article"
                class="w-full h-full object-cover"
              >
              <div class="absolute top-4 left-4">
                <span class="px-3 py-1 bg-purple-500 text-white text-sm font-medium rounded-full">Flutter</span>
              </div>
            </div>
          </a>
          <div class="p-6">
            <div class="flex flex-wrap gap-2 mb-3">
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Mobile</span>
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Cross-Platform</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
              <a href="{{ route('blog.show', 'flutter-vs-react-native-2024') }}">Flutter vs React Native in 2024</a>
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-2">
              A comprehensive comparison of the top cross-platform mobile development frameworks.
            </p>
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <img
                  src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                  alt="Author"
                  class="w-8 h-8 rounded-full mr-3"
                >
                <span class="text-sm text-gray-600">Alex Rivera</span>
              </div>
              <span class="text-sm text-gray-500">11 min read</span>
            </div>
          </div>
        </article>

        <!-- Blog Post 4 -->
        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
          <a href="{{ route('blog.show', 'implementing-ci-cd-pipelines-github-actions') }}" class="block">
            <div class="relative h-48">
              <img
                src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="DevOps article"
                class="w-full h-full object-cover"
              >
              <div class="absolute top-4 left-4">
                <span class="px-3 py-1 bg-red-500 text-white text-sm font-medium rounded-full">DevOps</span>
              </div>
            </div>
          </a>
          <div class="p-6">
            <div class="flex flex-wrap gap-2 mb-3">
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">CI/CD</span>
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Docker</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
              <a href="{{ route('blog.show', 'implementing-ci-cd-pipelines-github-actions') }}">Implementing CI/CD Pipelines with GitHub Actions</a>
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-2">
              A step-by-step guide to setting up continuous integration and deployment pipelines.
            </p>
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <img
                  src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                  alt="Author"
                  class="w-8 h-8 rounded-full mr-3"
                >
                <span class="text-sm text-gray-600">Michael Chen</span>
              </div>
              <span class="text-sm text-gray-500">8 min read</span>
            </div>
          </div>
        </article>

        <!-- Blog Post 5 -->
        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
          <a href="{{ route('blog.show', 'designing-for-accessibility-best-practices') }}" class="block">
            <div class="relative h-48">
              <img
                src="https://images.unsplash.com/photo-1609921212029-bb5a28e60960?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="UX Design article"
                class="w-full h-full object-cover"
              >
              <div class="absolute top-4 left-4">
                <span class="px-3 py-1 bg-pink-500 text-white text-sm font-medium rounded-full">UI/UX</span>
              </div>
            </div>
          </a>
          <div class="p-6">
            <div class="flex flex-wrap gap-2 mb-3">
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Design</span>
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Accessibility</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
              <a href="{{ route('blog.show', 'designing-for-accessibility-best-practices') }}">Designing for Accessibility: Best Practices</a>
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-2">
              Learn how to create inclusive designs that work for everyone, regardless of ability.
            </p>
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <img
                  src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
                  alt="Author"
                  class="w-8 h-8 rounded-full mr-3"
                >
                <span class="text-sm text-gray-600">Jessica Williams</span>
              </div>
              <span class="text-sm text-gray-500">7 min read</span>
            </div>
          </div>
        </article>

        <!-- Blog Post 6 -->
        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
          <a href="{{ route('blog.show', 'building-robust-apis-with-laravel') }}" class="block">
            <div class="relative h-48">
              <img
                src="https://images.unsplash.com/photo-1633356122102-3fe601e05bd2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="Laravel article"
                class="w-full h-full object-cover"
              >
              <div class="absolute top-4 left-4">
                <span class="px-3 py-1 bg-green-500 text-white text-sm font-medium rounded-full">Laravel</span>
              </div>
            </div>
          </a>
          <div class="p-6">
            <div class="flex flex-wrap gap-2 mb-3">
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">PHP</span>
              <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">Backend</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
              <a href="{{ route('blog.show', 'building-robust-apis-with-laravel') }}">Building Robust APIs with Laravel</a>
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-2">
              A comprehensive guide to building scalable and secure APIs using Laravel.
            </p>
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <img
                  src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                  alt="Author"
                  class="w-8 h-8 rounded-full mr-3"
                >
                <span class="text-sm text-gray-600">Thomas Moore</span>
              </div>
              <span class="text-sm text-gray-500">10 min read</span>
            </div>
          </div>
        </article>
      </div>

      <!-- Load More Button -->
      <div class="mt-12 text-center">
        <button class="px-6 py-3 bg-white border border-gray-300 rounded-lg text-gray-700 font-medium shadow-sm hover:bg-gray-50 hover:text-blue-600 transition-colors">
          Load More Articles
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 inline" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
          </svg>
        </button>
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
</x-app-layout>
