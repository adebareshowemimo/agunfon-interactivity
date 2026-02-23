@extends('layouts.app')

@section('title', 'Demo Booked - Agunfon')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-brand-50 to-white flex items-center justify-center py-20">
    <div class="max-w-lg mx-auto text-center px-6">
        <!-- Success Icon -->
        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-8">
            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
        </div>

        <h1 class="text-4xl md:text-5xl font-bold text-brand-900 mb-4">
            Demo Request Submitted!
        </h1>
        
        <p class="text-xl text-gray-600 mb-8">
            Thank you for your interest in Agunfon! Our team will review your request and contact you shortly to confirm your demo session.
        </p>

        <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-8 space-y-4">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-brand-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-brand-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="text-left">
                    <p class="font-semibold text-brand-900">Check your email</p>
                    <p class="text-gray-600 text-sm">We've sent a confirmation with your demo request details.</p>
                </div>
            </div>
            
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-left">
                    <p class="font-semibold text-brand-900">What happens next?</p>
                    <p class="text-gray-600 text-sm">A product specialist will contact you within 1-2 business days to schedule your personalized demo.</p>
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
            <a href="{{ route('features') }}" class="px-8 py-3 border-2 border-brand-700 text-brand-700 rounded-xl hover:bg-brand-50 transition-colors font-semibold inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Explore Features
            </a>
        </div>
    </div>
</section>
@endsection
