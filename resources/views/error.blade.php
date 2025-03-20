<x-app-layout>
  <div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="text-center mb-6">
        <h1 class="text-4xl font-bold text-red-500">{{ $error->status ?? 500 }}</h1>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Error</h2>
        <p class="text-gray-600">{{ $message ?? 'Something went wrong' }}</p>

        @if(config('app.debug'))
          <div class="mt-4 p-4 bg-gray-100 rounded text-left overflow-auto">
            <pre class="text-xs text-gray-700">{{ $error->stack ?? '' }}</pre>
          </div>
        @endif
      </div>

      <div class="text-center mt-6">
        <a href="/" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Return to Home
        </a>
      </div>
    </div>
  </div>
</x-app-layout>
