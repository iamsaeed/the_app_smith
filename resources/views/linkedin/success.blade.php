@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="text-center">
            <svg class="h-16 w-16 text-green-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <circle cx="12" cy="12" r="10" stroke-width="2" stroke="currentColor" fill="none"></circle>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
            </svg>

            <h2 class="text-2xl font-bold text-gray-800 mb-4">LinkedIn Connected Successfully!</h2>

            <p class="text-gray-600 mb-8">
                Your LinkedIn account has been successfully connected to our platform.
                You can now share your blog posts directly to LinkedIn.
            </p>

            <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4 justify-center">
                <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">
                    Return to Home
                </a>

                <form action="{{ route('linkedin.disconnect') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-md">
                        Disconnect LinkedIn
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
