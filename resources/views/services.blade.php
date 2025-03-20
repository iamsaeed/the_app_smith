<x-app-layout>
  <!-- Hero Section -->
  <section class="relative pt-24 md:pt-28 lg:pt-32 pb-12 bg-gradient-to-r from-blue-50 to-indigo-50">
    <div class="absolute inset-0 bg-white/40 z-0"></div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 opacity-0 transform translate-y-4 transition duration-700 ease-out fade-in">
          My Services
        </h1>
        <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl mx-auto opacity-0 transform translate-y-4 transition duration-700 delay-100 ease-out fade-in">
          Personalized solutions tailored to your individual needs
        </p>
      </div>
    </div>
  </section>

  <!-- Dynamic Services Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-6xl mx-auto">
        @if($services->isEmpty())
          <div class="text-center py-12">
            <h3 class="text-xl text-gray-600">No services available at the moment.</h3>
          </div>
        @else
          <!-- Services Grid -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
              <div class="group">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                  <div class="relative h-48">
                    @if($service->hasMedia('image'))
                      <img
                        src="{{ $service->getFirstMediaUrl('image') }}"
                        alt="{{ $service->name }}"
                        class="w-full h-full object-cover"
                      >
                    @else
                      <img
                        src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2015&q=80"
                        alt="{{ $service->name }}"
                        class="w-full h-full object-cover"
                      >
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                      <h3 class="text-xl font-bold text-white">{{ $service->name }}</h3>
                    </div>
                  </div>
                  <div class="p-6">
                    <p class="text-gray-600 mb-4">
                      {{ \Illuminate\Support\Str::limit($service->description, 150) }}
                    </p>

                    <a href="{{ route('contact') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                      Learn More
                      <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-600">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Get Started?</h2>
        <p class="text-xl text-blue-100 mb-8">
          Let's discuss how I can help you with personalized, one-on-one service.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <a href="/contact" class="inline-block px-8 py-4 bg-white text-blue-600 font-bold rounded-md shadow-lg hover:bg-blue-50 transform transition duration-300 hover:scale-105">
            Get in Touch
          </a>
          <a href="/about" class="inline-block px-8 py-4 bg-transparent text-white font-bold rounded-md border-2 border-white hover:bg-white/10 transform transition duration-300 hover:scale-105">
            Learn More
          </a>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
