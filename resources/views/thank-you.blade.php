<x-app-layout>
  <!-- Hero Section -->
  <section class="relative pt-24 md:pt-28 lg:pt-32 pb-12 bg-gradient-to-r from-blue-50 to-indigo-50">
    <div class="absolute inset-0 bg-white/40 z-0"></div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 opacity-0 transform translate-y-4 transition duration-700 ease-out fade-in">
          Thank You!
        </h1>
        <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl mx-auto opacity-0 transform translate-y-4 transition duration-700 delay-100 ease-out fade-in">
          Your message has been received. I'll be in touch soon.
        </p>
      </div>
    </div>
  </section>

  <!-- Content Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto text-center">
        <div class="bg-green-50 border border-green-200 rounded-lg p-8 mb-8">
          <svg class="w-16 h-16 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
          <h2 class="text-2xl font-bold text-gray-900 mb-4">Message Sent Successfully!</h2>
          <p class="text-lg text-gray-600">
            Thank you for reaching out. I've received your message and will respond as soon as possible.
          </p>
        </div>

        <p class="text-gray-600 mb-8">
          Meanwhile, feel free to explore more of my services or check out my portfolio.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <a href="{{ route('home') }}" class="inline-block px-8 py-4 bg-blue-600 text-white font-bold rounded-md shadow-lg hover:bg-blue-700 transform transition duration-300 hover:scale-105">
            Back to Home
          </a>
          <a href="{{ route('services') }}" class="inline-block px-8 py-4 bg-gray-200 text-gray-800 font-bold rounded-md hover:bg-gray-300 transform transition duration-300 hover:scale-105">
            View Services
          </a>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
