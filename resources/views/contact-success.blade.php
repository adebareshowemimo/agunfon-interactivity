@extends('layouts.app')

@section('title', 'Message Sent - Agunfon')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-brand-50 to-white flex items-center justify-center py-20">
    <div class="max-w-lg mx-auto text-center px-6">
        <!-- Success Icon -->
        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-8">
            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="text-4xl md:text-5xl font-bold text-brand-900 mb-4">
            Message Sent!
        </h1>
        
        <p class="text-xl text-gray-600 mb-8">
            Thank you for contacting us. We've received your message and will get back to you within 24-48 hours.
        </p>

        <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-8">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-brand-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-brand-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="text-left">
                    <p class="font-semibold text-brand-900">Check your inbox</p>
                    <p class="text-gray-600 text-sm">We've sent a confirmation email to you. If you don't see it, please check your spam folder.</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}" class="px-8 py-3 bg-brand-700 text-white rounded-xl hover:bg-brand-900 transition-colors font-semibold inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Back to Home
            </a>
            <a href="{{ route('resources') }}" class="px-8 py-3 border-2 border-brand-700 text-brand-700 rounded-xl hover:bg-brand-50 transition-colors font-semibold inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                Explore Resources
            </a>
        </div>
    </div>
</section>
@endsection
