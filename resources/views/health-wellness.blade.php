@extends('layouts.app')

@section('title', 'Health & Wellness Solution - Agunfon')

@push('styles')
<style>
    .font-serif-italic {
        font-family: 'Playfair Display', serif;
        font-style: italic;
    }
    .cta-pattern {
        background-image: linear-gradient(135deg, rgba(6, 24, 51, 0.95) 0%, rgba(6, 24, 51, 0.8) 100%), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000');
        background-size: cover;
        background-position: center;
    }
    .hero-img-container {
        background-color: #EBF2FA;
        border-radius: 48px;
        padding: 24px;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">
        <div class="max-w-xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-gray-200 text-[10px] font-bold text-gray-900 bg-white tracking-widest uppercase mb-8">
                HEALTH & WELLNESS SOLUTION
            </span>
            <h1 class="text-5xl md:text-[64px] font-extrabold text-brand-700 leading-[1.1] mb-8">
                Promote a Healthy, Resilient Workforce
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed max-w-lg">
                Support employee well-being with research-backed programs that foster balance, resilience, and workplace satisfaction
            </p>
        </div>
        <div class="relative flex justify-center lg:justify-end">
            <div class="hero-img-container w-full max-w-[580px] aspect-[4/3] flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&q=80&w=1200" alt="Wellness and Mindfulness" class="w-full h-full object-cover rounded-[32px] shadow-2xl">
            </div>
        </div>
    </div>
</section>

<!-- Solution Overview -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-[54px] font-extrabold text-brand-700 mb-8">Solution Overview</h2>
        <p class="text-lg text-gray-600 leading-relaxed">
            A healthy team performs better. Agunfon offers structured wellness programs that address mental health, resilience, occupational safety, and work-life harmony — helping organizations nurture a supportive and productive environment
        </p>
    </div>
</section>

<!-- Key Features Section -->
<section class="py-12 md:py-20 mb-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] p-8 md:p-16 flex flex-col lg:flex-row items-center gap-16 shadow-2xl relative overflow-hidden">
            <!-- Left: Image -->
            <div class="w-full lg:w-1/2 rounded-[48px] overflow-hidden shadow-xl aspect-square lg:aspect-auto h-full min-h-[480px]">
                <img src="https://images.unsplash.com/photo-1573164574511-73c773193279?auto=format&fit=crop&q=80&w=1200" alt="Health and Productivity" class="w-full h-full object-cover">
            </div>
            <!-- Right: Features -->
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-6 py-2.5 rounded-full bg-white mb-12 shadow-sm">
                    <span class="text-brand-700 font-extrabold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-8">
                    <li class="flex items-center gap-6 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-xl font-medium">Well-being & resilience programs</span>
                    </li>
                    <li class="flex items-center gap-6 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-xl font-medium">Work-life balance tools</span>
                    </li>
                    <li class="flex items-center gap-6 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-xl font-medium">Occupational health & safety modules</span>
                    </li>
                    <li class="flex items-center gap-6 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-xl font-medium">Stress management resources</span>
                    </li>
                    <li class="flex items-center gap-6 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-xl font-medium">Reflection-based activities</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="cta-pattern rounded-[64px] min-h-[540px] flex items-center p-12 lg:p-24 relative overflow-hidden shadow-2xl">
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-[1.15]">
                    Need to <span class="font-serif-italic text-brand-500">deploy</span> Agunfon LMS for Health & Wellness Solutions?
                </h2>
                <p class="text-gray-300 mb-12 text-xl">Get in touch with our team to get started</p>
                <a href="/learning-suite" class="inline-flex items-center px-10 py-5 bg-brand-500 text-white font-bold rounded-xl hover:bg-opacity-90 transition-all hover:-translate-y-1 shadow-xl">Explore Wellness</a>
            </div>
            <!-- Decorative architecture element -->
            <div class="absolute right-0 bottom-0 top-0 w-1/3 hidden lg:block">
                <div class="h-full w-full bg-gradient-to-l from-brand-500/10 to-transparent"></div>
            </div>
        </div>
    </div>
</section>
@endsection
