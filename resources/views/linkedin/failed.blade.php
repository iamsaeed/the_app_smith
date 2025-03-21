@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="text-center">
            <svg class="h-16 w-16 text-red-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <circle cx="12" cy="12" r="10" stroke-width="2" stroke="currentColor" fill="none"></circle>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>

            <h2 class="text-2xl font-bold text-gray-800 mb-4">LinkedIn Connection Failed</h2>

            <p class="text-gray-600 mb-8">
                @if(session('error'))
                    {{ session('error') }}
                @else
                    There was a problem connecting your LinkedIn account. Please try again later.
                @endif
            </p>

            <div class="flex justify-center">
                <a href="{{ route('linkedin.auth') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md mr-2">
                    Try Again
                </a>
                <a href="{{ route('home') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-md">
                    Return to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
