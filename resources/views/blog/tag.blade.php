<x-app-layout>
    <x-slot name="title">{{ $tag->name }} - Blog Tag</x-slot>
    <x-slot name="meta_description">Browse all blog posts tagged with {{ $tag->name }}.</x-slot>
    <x-slot name="meta_keywords">{{ $tag->name }}, blog, tag</x-slot>

    <!-- Hero Section -->
    <section class="relative pt-24 md:pt-28 lg:pt-32 pb-12 bg-gradient-to-r from-blue-50 to-indigo-50">
        <div class="absolute inset-0 bg-white/40 z-0"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block px-4 py-1.5 mb-3 text-xs font-semibold leading-5 text-indigo-800 rounded-full bg-indigo-100">Tag</div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 opacity-0 transform translate-y-4 transition duration-700 ease-out fade-in">
                    #{{ $tag->name }}
                </h1>
                @if($tag->description)
                <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl mx-auto opacity-0 transform translate-y-4 transition duration-700 delay-100 ease-out fade-in">
                    {{ $tag->description }}
                </p>
                @endif
            </div>
        </div>
    </section>

    <div class="bg-gray-50">
        <div class="container mx-auto px-4 py-12">
            <!-- Blog Posts -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($blogs as $blog)
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
                @empty
                <div class="col-span-3 text-center py-12">
                    <h3 class="text-xl text-gray-500">No blog posts found with this tag.</h3>
                    <a href="{{ url('blog') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        View All Blogs
                    </a>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
