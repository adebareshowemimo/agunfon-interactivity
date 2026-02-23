@extends('layouts.app')

@section('title', 'Customer Service & Success Solution - Agunfon')

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
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-16 md:py-24">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">
        <div class="max-w-xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-8">
                CUSTOMER SERVICE & SUCCESS SOLUTION
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Deliver Consistently Excellent Customer Experiences
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed">
                Strengthen service teams with training built for communication, empathy, product mastery, and customer success excellence
            </p>
        </div>
        <div class="relative">
            <div class="rounded-[48px] overflow-hidden shadow-2xl relative aspect-[4/3]">
                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=1200" alt="Customer Service Professional" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Solution Overview -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-brand-700 mb-8">Solution Overview</h2>
        <p class="text-lg text-gray-600 leading-relaxed">
            Service excellence drives loyalty. Agunfon provides structured learning that enhances communication skills, deepens product knowledge, improves service recovery, and empowers teams to deliver meaningful customer experiences at scale.
        </p>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] p-8 md:p-16 flex flex-col lg:flex-row items-center gap-16 shadow-2xl relative overflow-hidden">
            <!-- Left: Image -->
            <div class="w-full lg:w-1/2 rounded-3xl overflow-hidden shadow-xl aspect-square lg:aspect-auto h-full min-h-[400px]">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=1200" alt="Team Collaborating" class="w-full h-full object-cover">
            </div>
            <!-- Right: Features -->
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-5 py-2.5 rounded-full bg-white mb-10 shadow-sm">
                    <span class="text-brand-700 font-bold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-brand-500 shrink-0">
                            <iconify-icon icon="lucide:check" class="text-lg font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Communication & soft skills training</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-brand-500 shrink-0">
                            <iconify-icon icon="lucide:check" class="text-lg font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Service recovery techniques</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-brand-500 shrink-0">
                            <iconify-icon icon="lucide:check" class="text-lg font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">CRM & software training</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-brand-500 shrink-0">
                            <iconify-icon icon="lucide:check" class="text-lg font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Case-study-driven learning</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-brand-500 shrink-0">
                            <iconify-icon icon="lucide:check" class="text-lg font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Customer empathy programs</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-brand-500 shrink-0">
                            <iconify-icon icon="lucide:check" class="text-lg font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Real-time team performance tracking</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
        <div class="cta-pattern rounded-[64px] min-h-[500px] flex items-center p-12 lg:p-24 relative overflow-hidden shadow-2xl">
            <!-- Geometric pattern layer -->
            <div class="absolute inset-0 z-0 opacity-10 pointer-events-none">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <line x1="0" y1="100" x2="100" y2="0" stroke="white" stroke-width="0.5" />
                    <line x1="20" y1="100" x2="100" y2="20" stroke="white" stroke-width="0.5" />
                    <line x1="40" y1="100" x2="100" y2="40" stroke="white" stroke-width="0.5" />
                </svg>
            </div>
            <div class="max-w-2xl relative z-10">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                    Need to <span class="font-serif-italic text-brand-500">deploy</span> Agunfon LMS for Customer Service & Success Solution?
                </h2>
                <p class="text-gray-300 mb-10 text-lg">Get in touch with our team to get started</p>
                <a href="/contact" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-opacity-90 transition-all hover:-translate-y-1 shadow-lg">Talk to an Expert</a>
            </div>
        </div>
    </div>
</section>
@endsection
