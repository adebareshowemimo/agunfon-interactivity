@extends('layouts.app')

@section('title', 'Contact Us - Agunfon LMS')

@push('styles')
<style>
    .font-serif-italic {
        font-family: 'Playfair Display', serif;
        font-style: italic;
    }
    .shadow-soft {
        box-shadow: 0 10px 40px -10px rgba(15, 61, 122, 0.08);
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
<script src="https://www.google.com/recaptcha/enterprise.js?render={{ config('services.recaptcha.site_key') }}"></script>
@endpush

@section('content')
<!-- Hero / Contact Section -->
<main class="flex-grow bg-gradient-to-b from-[#F3F7FC] via-white to-white py-20">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
        <!-- Left Side Copy -->
        <div class="lg:pt-12">
            <span class="inline-block px-4 py-1.5 rounded-full border border-gray-200 text-brand-700 text-xs font-bold tracking-widest mb-6 bg-white/50 uppercase">
                Contact Sales
            </span>
            <h1 class="text-5xl lg:text-6xl font-bold text-brand-700 leading-[1.1] mb-8">
                We're here to help. <br>
                Let's know <span class="font-serif-italic text-brand-500 font-medium italic">How!</span>
            </h1>
            <p class="text-lg text-gray-600 leading-relaxed max-w-lg">
                Reach out for sales inquiries, support requests, or partnership opportunities. Get in touch and discover how Agunfon can support your learning and organizational goals.
            </p>
        </div>

        <!-- Right Side Form Card -->
        <div class="bg-white rounded-[32px] p-8 lg:p-10 shadow-soft border border-white/60">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-brand-700 mb-2">Contact form</h2>
                <p class="text-sm text-gray-500">Tell us a bit about your organization and we'll be in touch!</p>
            </div>

            @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">
                {{ session('error') }}
            </div>
            @endif

            <form id="contact-form" class="space-y-6" action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-900">Name<span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name" class="w-full px-5 py-4 rounded-xl border border-gray-100 bg-[#F9FAFB] focus:outline-none focus:ring-2 focus:ring-brand-400/20 focus:border-brand-400 transition-all @error('name') border-red-500 @enderror" required>
                    @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-900">Company<span class="text-red-500">*</span></label>
                    <input type="text" name="company" value="{{ old('company') }}" placeholder="Your organization or institution" class="w-full px-5 py-4 rounded-xl border border-gray-100 bg-[#F9FAFB] focus:outline-none focus:ring-2 focus:ring-brand-400/20 focus:border-brand-400 transition-all @error('company') border-red-500 @enderror" required>
                    @error('company')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-900">Email<span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="We'll send your confirmation here" class="w-full px-5 py-4 rounded-xl border border-gray-100 bg-[#F9FAFB] focus:outline-none focus:ring-2 focus:ring-brand-400/20 focus:border-brand-400 transition-all @error('email') border-red-500 @enderror" required>
                    @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-900">Phone</label>
                    <div class="flex gap-3">
                        <select name="country_code" class="w-28 px-3 py-4 rounded-xl border border-gray-100 bg-[#F9FAFB] text-sm appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-brand-400/20 focus:border-brand-400">
                            <option value="+234" {{ old('country_code', '+234') == '+234' ? 'selected' : '' }}>🇳🇬 +234</option>
                            <option value="+1" {{ old('country_code') == '+1' ? 'selected' : '' }}>🇺🇸 +1</option>
                            <option value="+44" {{ old('country_code') == '+44' ? 'selected' : '' }}>🇬🇧 +44</option>
                            <option value="+233" {{ old('country_code') == '+233' ? 'selected' : '' }}>🇬🇭 +233</option>
                            <option value="+254" {{ old('country_code') == '+254' ? 'selected' : '' }}>🇰🇪 +254</option>
                            <option value="+27" {{ old('country_code') == '+27' ? 'selected' : '' }}>🇿🇦 +27</option>
                            <option value="+91" {{ old('country_code') == '+91' ? 'selected' : '' }}>🇮🇳 +91</option>
                            <option value="+971" {{ old('country_code') == '+971' ? 'selected' : '' }}>🇦🇪 +971</option>
                            <option value="+49" {{ old('country_code') == '+49' ? 'selected' : '' }}>🇩🇪 +49</option>
                            <option value="+33" {{ old('country_code') == '+33' ? 'selected' : '' }}>🇫🇷 +33</option>
                            <option value="+86" {{ old('country_code') == '+86' ? 'selected' : '' }}>🇨🇳 +86</option>
                            <option value="+81" {{ old('country_code') == '+81' ? 'selected' : '' }}>🇯🇵 +81</option>
                            <option value="+55" {{ old('country_code') == '+55' ? 'selected' : '' }}>🇧🇷 +55</option>
                            <option value="+61" {{ old('country_code') == '+61' ? 'selected' : '' }}>🇦🇺 +61</option>
                            <option value="+1" {{ old('country_code') == '+1-CA' ? 'selected' : '' }}>🇨🇦 +1</option>
                        </select>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Optional" class="flex-grow px-5 py-4 rounded-xl border border-gray-100 bg-[#F9FAFB] focus:outline-none focus:ring-2 focus:ring-brand-400/20 focus:border-brand-400 transition-all">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-900">Message<span class="text-red-500">*</span></label>
                    <textarea rows="4" name="message" placeholder="Tell us what you're looking to achieve with Agunfon" class="w-full px-5 py-4 rounded-xl border border-gray-100 bg-[#F9FAFB] focus:outline-none focus:ring-2 focus:ring-brand-400/20 focus:border-brand-400 transition-all resize-none @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                    @error('message')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- reCAPTCHA Token (hidden) -->
                <input type="hidden" name="g-recaptcha-response" id="recaptcha-token">
                @error('g-recaptcha-response')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                @error('captcha')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror

                <button type="submit" id="submit-btn" class="w-full sm:w-auto px-10 py-4 bg-gray-900 text-white font-bold rounded-xl hover:bg-black transition-all shadow-lg hover:shadow-xl">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</main>

@push('scripts')
<script>
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = this;
    const btn = document.getElementById('submit-btn');
    btn.disabled = true;
    btn.textContent = 'Sending...';
    
    grecaptcha.enterprise.ready(async () => {
        try {
            const token = await grecaptcha.enterprise.execute('{{ config('services.recaptcha.site_key') }}', {action: 'contact_submit'});
            document.getElementById('recaptcha-token').value = token;
            form.submit();
        } catch (error) {
            console.error('reCAPTCHA error:', error);
            btn.disabled = false;
            btn.textContent = 'Send Message';
            alert('reCAPTCHA verification failed. Please try again.');
        }
    });
});
</script>
@endpush
@endsection
