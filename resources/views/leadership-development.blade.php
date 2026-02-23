@extends('layouts.app')

@section('title', 'Leadership Development - Agunfon')

@push('styles')
<style>
    .font-serif-italic {
        font-family: 'Playfair Display', serif;
        font-style: italic;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
        <div class="max-w-xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-8">
                Leadership Development
            </span>
            <h1 class="text-5xl md:text-6xl lg:text-[72px] font-extrabold text-brand-700 leading-[1.05] mb-8">
                Develop Competent, Future-Ready Leaders
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed max-w-lg">
                Support emerging and experienced leaders with structured coaching, competency development, and analytics-driven insights
            </p>
        </div>
        <div class="relative">
            <div class="rounded-[40px] overflow-hidden shadow-2xl relative">
                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=1200" alt="Leadership Training" class="w-full aspect-[4/5] object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Solution Overview -->
<section class="py-20 md:py-24 border-t border-gray-50">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-brand-700 mb-10">Solution Overview</h2>
        <p class="text-lg text-gray-600 leading-relaxed max-w-4xl mx-auto font-medium">
            Strong leadership is built through continuous development. Agunfon equips leaders with curated programs, mentorship modules, real-world scenarios, and performance analytics that deepen their ability to guide teams, make decisions, and drive organizational progress
        </p>
    </div>
</section>

<!-- Key Features Section -->
<section class="py-12 md:py-20">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="bg-brand-700 rounded-[48px] overflow-hidden p-8 lg:p-16 flex flex-col lg:flex-row gap-16 items-center shadow-2xl">
            <div class="w-full lg:w-[45%] rounded-[32px] overflow-hidden shadow-xl aspect-square">
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=800" alt="Coaching Session" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-[55%]">
                <div class="inline-block px-5 py-2 rounded-lg bg-white mb-12">
                    <span class="text-brand-700 font-extrabold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-lg"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Structured leadership development path</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-lg"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Coaching and mentorship modules</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-lg"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Competency frameworks & tracking</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-lg"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Leadership performance analytics</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-lg"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Scenario-based learning</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-lg"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Communication, empathy, and strategic thinking modules</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 md:py-32 relative">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="bg-brand-950 rounded-[64px] overflow-hidden relative min-h-[540px] flex items-center p-12 lg:p-24 shadow-2xl">
            <div class="absolute inset-0 z-0 opacity-40">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1600" alt="Architecture" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/80 to-transparent"></div>
            </div>
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-[1.15]">
                    Need to <span class="font-serif-italic text-brand-500">deploy</span> Agunfon LMS <br>
                    for Leadership Development?
                </h2>
                <p class="text-xl text-gray-400 mb-12">Get in touch with our team to get started</p>
                <a href="/book-demo" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1 active:translate-y-0">Get started</a>
            </div>
        </div>
    </div>
</section>
@endsection
