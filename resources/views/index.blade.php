<x-app-layout>
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center">
        <!-- Background with gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-purple-900/80 z-0">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <!-- Hero background image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                 alt="Programming background"
                 class="w-full h-full object-cover">
        </div>

        <!-- Content Container -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <!-- Headline with animation -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 opacity-0 transform translate-y-4 transition duration-700 ease-out fade-in backdrop-blur-sm bg-black/30 inline-block px-6 py-3 rounded-lg shadow-lg">
                    Transforming Ideas into Reality
                </h1>

                <!-- Subheading with animation -->
                <p class="text-xl md:text-2xl text-gray-200 mb-10 opacity-0 transform translate-y-4 transition duration-700 delay-100 ease-out fade-in backdrop-blur-sm bg-black/30 inline-block px-5 py-2 rounded-lg shadow-md">
                    Expert in crafting innovative software solutions & cutting-edge applications
                </p>

                <!-- CTA Buttons with animation -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 opacity-0 transform translate-y-4 transition duration-700 delay-200 ease-out fade-in">
                    <a href="/products" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-md shadow-lg hover:shadow-xl transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Explore My Work
                    </a>
                    <a href="/about" class="px-8 py-3 bg-transparent hover:bg-white/10 text-white font-bold rounded-md border-2 border-white hover:border-blue-400 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                        Learn More About Me
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll down indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Products/Apps Showcase Section -->
    <section class="py-20 bg-gray-50" id="products">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Projects</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Check out some of my recent work and applications that showcase my expertise and creativity.</p>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105 group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                             alt="Task Manager App" class="w-full h-56 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                            <a href="#" class="text-white bg-blue-600 hover:bg-blue-700 transition-colors font-medium m-4 px-4 py-2 rounded-md">View Demo</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Smart Task Manager</h3>
                        <p class="text-gray-600 mb-4">AI-powered task management application with intelligent prioritization.</p>
                        <a href="/products/1" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                            View Details
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105 group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2015&q=80"
                             alt="Financial Dashboard" class="w-full h-56 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                            <a href="#" class="text-white bg-blue-600 hover:bg-blue-700 transition-colors font-medium m-4 px-4 py-2 rounded-md">View Demo</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Financial Dashboard</h3>
                        <p class="text-gray-600 mb-4">Comprehensive financial analytics platform with real-time data visualization.</p>
                        <a href="/products/2" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                            View Details
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105 group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1607082349566-187342175e2f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                             alt="E-commerce Platform" class="w-full h-56 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                            <a href="#" class="text-white bg-blue-600 hover:bg-blue-700 transition-colors font-medium m-4 px-4 py-2 rounded-md">View Demo</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">E-commerce Platform</h3>
                        <p class="text-gray-600 mb-4">Modern, responsive online store with seamless payment processing.</p>
                        <a href="/products/3" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                            View Details
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="/products" class="inline-flex items-center px-6 py-3 border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors duration-300 rounded-md font-medium">
                    View All Projects
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-white" id="services">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">My Services</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">I offer a wide range of development services to help you bring your ideas to life.</p>
            </div>

            <!-- Services Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="bg-blue-50 rounded-lg p-8 transition-all hover:shadow-lg hover:bg-blue-100">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-900 mb-2">Web Development</h3>
                    <p class="text-center text-gray-600 mb-6">Modern, responsive websites</p>
                    <div class="text-center">
                        <a href="/services#web-development" class="text-blue-600 hover:text-blue-800 font-medium">More Info</a>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div class="bg-purple-50 rounded-lg p-8 transition-all hover:shadow-lg hover:bg-purple-100">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full bg-purple-100 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-900 mb-2">Mobile App Development</h3>
                    <p class="text-center text-gray-600 mb-6">Cross-platform mobile apps</p>
                    <div class="text-center">
                        <a href="/services#mobile-development" class="text-purple-600 hover:text-purple-800 font-medium">More Info</a>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div class="bg-green-50 rounded-lg p-8 transition-all hover:shadow-lg hover:bg-green-100">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full bg-green-100 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-900 mb-2">API Development</h3>
                    <p class="text-center text-gray-600 mb-6">Robust backend services</p>
                    <div class="text-center">
                        <a href="/services#api-development" class="text-green-600 hover:text-green-800 font-medium">More Info</a>
                    </div>
                </div>

                <!-- Service Card 4 -->
                <div class="bg-red-50 rounded-lg p-8 transition-all hover:shadow-lg hover:bg-red-100">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full bg-red-100 text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-900 mb-2">Security Audits</h3>
                    <p class="text-center text-gray-600 mb-6">Application security review</p>
                    <div class="text-center">
                        <a href="/services#security-audits" class="text-red-600 hover:text-red-800 font-medium">More Info</a>
                    </div>
                </div>

                <!-- Service Card 5 -->
                <div class="bg-yellow-50 rounded-lg p-8 transition-all hover:shadow-lg hover:bg-yellow-100">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full bg-yellow-100 text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-900 mb-2">Performance Optimization</h3>
                    <p class="text-center text-gray-600 mb-6">Speed up your applications</p>
                    <div class="text-center">
                        <a href="/services#performance" class="text-yellow-600 hover:text-yellow-800 font-medium">More Info</a>
                    </div>
                </div>

                <!-- Service Card 6 -->
                <div class="bg-indigo-50 rounded-lg p-8 transition-all hover:shadow-lg hover:bg-indigo-100">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-900 mb-2">Consultation</h3>
                    <p class="text-center text-gray-600 mb-6">Expert technical advice</p>
                    <div class="text-center">
                        <a href="/services#consultation" class="text-indigo-600 hover:text-indigo-800 font-medium">More Info</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner Section -->
    <section class="py-16 relative overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1522252234503-e356532cafd5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2025&q=80"
                 alt="Code background"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/90 to-blue-800/90"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white">Ready to start your next project?</h2>
                <p class="text-xl mb-8 text-blue-100">Let's work together to turn your vision into a successful reality.</p>
                <a href="/contact" class="inline-block px-8 py-4 bg-white text-blue-600 font-bold rounded-md shadow-lg hover:bg-blue-50 transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                    Contact Me
                </a>
            </div>
        </div>
    </section>

    <!-- Livewire Counter Example (hidden by default) -->
    <div class="hidden">
        @livewire('counter')
    </div>
</x-app-layout>
