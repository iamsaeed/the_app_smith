<x-app-layout>
    <x-slot name="title">Blog - Latest Articles and News</x-slot>
    <x-slot name="meta_description">Explore our blog for the latest articles, tips, and insights.</x-slot>
    <x-slot name="meta_keywords">blog, articles, news, tips</x-slot>

    <!-- Hero Section -->
    <section class="relative pt-24 md:pt-28 lg:pt-32 pb-12 bg-gradient-to-r from-blue-50 to-indigo-50">
        <div class="absolute inset-0 bg-white/40 z-0"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 opacity-0 transform translate-y-4 transition duration-700 ease-out fade-in">
                    Our Blog
                </h1>
                <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl mx-auto opacity-0 transform translate-y-4 transition duration-700 delay-100 ease-out fade-in">
                    Insights, tips, and expert knowledge to help you succeed
                </p>
            </div>
        </div>
    </section>

    <div class="bg-gray-50">
        <div class="container mx-auto px-4 py-12">
            <!-- Featured Blog -->
            @if($featuredBlog)
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
                <div class="flex flex-col md:flex-row">
                    @if($featuredBlog->hasMedia('featured_image'))
                    <div class="md:w-1/2 relative">
                        <img
                            src="{{ $featuredBlog->getFirstMediaUrl('featured_image', 'featured') }}"
                            alt="{{ $featuredBlog->title }}"
                            class="w-full h-full object-cover"
                            style="min-height: 300px;"
                        >
                        <div class="absolute top-4 left-4">
                            <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-sm font-medium">Featured</span>
                        </div>
                    </div>
                    @endif
                    <div class="md:w-1/2 p-6 md:p-10 flex flex-col justify-center">
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($featuredBlog->categories->take(2) as $category)
                            <a href="{{ url('blog/category/' . $category->slug) }}" class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-xs font-medium hover:bg-indigo-200">
                                {{ $category->name }}
                            </a>
                            @endforeach
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                            <a href="{{ $featuredBlog->url }}" class="hover:text-indigo-600">{{ $featuredBlog->title }}</a>
                        </h2>
                        <p class="text-gray-600 mb-6">{{ Illuminate\Support\Str::limit($featuredBlog->excerpt, 150) }}</p>
                        <div class="flex items-center mb-6">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($featuredBlog->creator->name) }}" alt="{{ $featuredBlog->creator->name }}">
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">{{ $featuredBlog->creator->name }}</p>
                                <p class="text-sm text-gray-500">{{ $featuredBlog->published_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <a href="{{ $featuredBlog->url }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                            Read Article
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Blog Filters -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4 md:mb-0">Latest Articles</h1>

                <div class="flex flex-wrap gap-4">
                    <!-- Category Filter -->
                    <div>
                        <label for="category-select" class="sr-only">Filter by Category</label>
                        <select id="category-select" class="form-select rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" onchange="if(this.value) window.location.href=this.value;">
                            <option value="{{ url('blog') }}">All Categories</option>
                            @foreach($categories as $category)
                            <option value="{{ url('blog/category/' . $category->slug) }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sort Options -->
                    <div>
                        <label for="sort-select" class="sr-only">Sort by</label>
                        <select id="sort-select" name="sort" class="form-select rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" onchange="window.location.href='?sort='+this.value">
                            <option value="latest" {{ $sort == 'latest' ? 'selected' : '' }}>Latest</option>
                            <option value="oldest" {{ $sort == 'oldest' ? 'selected' : '' }}>Oldest</option>
                            <option value="popular" {{ $sort == 'popular' ? 'selected' : '' }}>Most Popular</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Blog Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($blogs as $blog)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full">
                    <!-- Featured Image -->
                    @if($blog->hasMedia('featured_image'))
                    <a href="{{ $blog->url }}" class="block relative h-48 w-full overflow-hidden">
                        <img
                            src="{{ $blog->getFirstMediaUrl('featured_image', 'thumb') }}"
                            alt="{{ $blog->title }}"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                        >
                    </a>
                    @endif

                    <div class="p-6 flex-1 flex flex-col">
                        <!-- Categories -->
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($blog->categories->take(2) as $category)
                            <a href="{{ url('blog/category/' . $category->slug) }}" class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-xs font-medium hover:bg-indigo-200">
                                {{ $category->name }}
                            </a>
                            @endforeach
                        </div>

                        <!-- Title -->
                        <h2 class="text-xl font-bold text-gray-900 mb-3">
                            <a href="{{ $blog->url }}" class="hover:text-indigo-600">{{ $blog->title }}</a>
                        </h2>

                        <!-- Excerpt -->
                        <p class="text-gray-600 mb-4 flex-1">{{ Illuminate\Support\Str::limit($blog->excerpt, 120) }}</p>

                        <!-- Meta -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100 mt-auto">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($blog->creator->name) }}" alt="{{ $blog->creator->name }}">
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $blog->creator->name }}</p>
                                </div>
                            </div>
                            <span class="text-sm text-gray-500">{{ $blog->published_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
