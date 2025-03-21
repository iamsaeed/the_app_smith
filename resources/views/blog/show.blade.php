<x-app-layout>
    <x-slot name="title">{{ $blog->meta_title ?? $blog->title }}</x-slot>
    <x-slot name="meta_description">{{ $blog->meta_description ?? $blog->excerpt }}</x-slot>
    <x-slot name="meta_keywords">{{ $blog->meta_keywords_string }}</x-slot>

    <!-- Hero Section -->
    <section class="relative pt-24 md:pt-28 lg:pt-32 pb-12 bg-gradient-to-r from-blue-50 to-indigo-50">
        <div class="absolute inset-0 bg-white/40 z-0"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 opacity-0 transform translate-y-4 transition duration-700 ease-out fade-in">
                    {{ $blog->title }}
                </h1>
                <div class="flex items-center justify-center text-gray-500 mb-6 opacity-0 transform translate-y-4 transition duration-700 delay-100 ease-out fade-in">
                    <div class="flex items-center mr-6">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($blog->creator->name) }}" alt="{{ $blog->creator->name }}">
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{ $blog->creator->name }}</p>
                        </div>
                    </div>
                    <span class="mr-4">{{ $blog->published_at->format('M d, Y') }}</span>
                    <span>{{ $blog->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-wrap -mx-4">
            <!-- Main Content -->
            <div class="w-full lg:w-3/4 px-4">
                <!-- Blog Post -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Featured Image -->
                    @if($blog->hasMedia('featured_image'))
                    <div class="relative h-96 w-full overflow-hidden">
                        <img
                            src="{{ $blog->getFirstMediaUrl('featured_image', 'featured') }}"
                            alt="{{ $blog->title }}"
                            class="w-full h-full object-cover"
                        >
                    </div>
                    @endif

                    <div class="p-6 md:p-8">
                        <!-- Categories and Tags -->
                        <div class="flex flex-wrap items-center gap-2 mb-4">
                            @foreach($blog->categories as $category)
                            <a href="{{ url('blog/category/' . $category->slug) }}" class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm font-medium hover:bg-indigo-200">
                                {{ $category->name }}
                            </a>
                            @endforeach
                        </div>

                        <!-- Content -->
                        <div class="prose prose-lg max-w-none mb-8">
                            {!! $blog->content !!}
                        </div>

                        <!-- Tags -->
                        <div class="border-t border-gray-100 pt-6 mt-8">
                            <h3 class="text-lg font-semibold mb-3">Tags</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($blog->tags as $tag)
                                <a href="{{ url('blog/tag/' . $tag->slug) }}" class="inline-block bg-gray-100 text-gray-800 hover:bg-indigo-100 hover:text-indigo-800 px-3 py-1 rounded-full text-sm">
                                    #{{ $tag->name }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Navigation -->
                <div class="flex flex-wrap justify-between mt-8 mb-12">
                    @if($previousBlog)
                    <a href="{{ $previousBlog->url }}" class="bg-white rounded-lg shadow p-4 flex items-center w-full md:w-auto mb-4 md:mb-0 hover:shadow-md transition-shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <div>
                            <div class="text-sm text-gray-500">Previous</div>
                            <div class="text-indigo-600 font-medium">{{ Illuminate\Support\Str::limit($previousBlog->title, 40) }}</div>
                        </div>
                    </a>
                    @else
                    <div></div>
                    @endif

                    @if($nextBlog)
                    <a href="{{ $nextBlog->url }}" class="bg-white rounded-lg shadow p-4 flex items-center w-full md:w-auto text-right hover:shadow-md transition-shadow">
                        <div>
                            <div class="text-sm text-gray-500">Next</div>
                            <div class="text-indigo-600 font-medium">{{ Illuminate\Support\Str::limit($nextBlog->title, 40) }}</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                    @else
                    <div></div>
                    @endif
                </div>

                <!-- Related Posts -->
                @if($relatedBlogs->count() > 0)
                <div class="bg-white rounded-lg shadow-md p-6 md:p-8">
                    <h2 class="text-2xl font-bold mb-6">Related Articles</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach($relatedBlogs as $relatedBlog)
                        <div class="flex flex-col h-full">
                            @if($relatedBlog->hasMedia('featured_image'))
                            <a href="{{ $relatedBlog->url }}" class="block relative h-40 w-full overflow-hidden rounded-lg mb-4">
                                <img
                                    src="{{ $relatedBlog->getFirstMediaUrl('featured_image', 'thumb') }}"
                                    alt="{{ $relatedBlog->title }}"
                                    class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                                >
                            </a>
                            @endif
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold mb-2 hover:text-indigo-600">
                                    <a href="{{ $relatedBlog->url }}">{{ $relatedBlog->title }}</a>
                                </h3>
                                <p class="text-gray-600 text-sm mb-3">{{ Illuminate\Support\Str::limit($relatedBlog->excerpt, 80) }}</p>
                                <span class="text-sm text-gray-500">{{ $relatedBlog->published_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-1/4 px-4 mt-8 lg:mt-0">
                <!-- Search -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Search</h3>
                    <form action="{{ url('blog/search') }}" method="GET" class="flex">
                        <input
                            type="text"
                            name="q"
                            class="form-input flex-grow rounded-l-md focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Search blogs..."
                        >
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-r-md hover:bg-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Share -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Share</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="bg-blue-400 text-white p-2 rounded-full hover:bg-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="bg-blue-800 text-white p-2 rounded-full hover:bg-blue-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                            </svg>
                        </a>
                        <a href="mailto:?subject={{ urlencode($blog->title) }}&body={{ urlencode('Check out this article: ' . url()->current()) }}" class="bg-gray-600 text-white p-2 rounded-full hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="bg-indigo-700 rounded-lg shadow-md p-6 text-white">
                    <h3 class="text-lg font-semibold mb-3">Stay Updated</h3>
                    <p class="text-indigo-100 mb-4">Subscribe to our newsletter to receive the latest articles and updates.</p>
                    <form action="{{ url('newsletter/subscribe') }}" method="POST" class="space-y-3">
                        @csrf
                        <input
                            type="email"
                            name="email"
                            class="form-input w-full rounded-md text-gray-900 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Your email address"
                            required
                        >
                        <button type="submit" class="w-full bg-white text-indigo-700 font-medium px-4 py-2 rounded-md hover:bg-indigo-50">
                            Subscribe
                        </button>
                    </form>
                    <p class="text-indigo-200 text-xs mt-3">We respect your privacy. Unsubscribe at any time.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
