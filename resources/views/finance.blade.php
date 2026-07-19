@extends('layouts.app')

@section('title', 'Finance Industry Solution - Agunfon')

@push('styles')
<style>
    .font-serif-italic {
        font-family: 'Playfair Display', serif;
        font-style: italic;
    }
    .cta-architecture-bg {
        background-image: linear-gradient(rgba(6, 24, 51, 0.9), rgba(6, 24, 51, 0.7)), url('/images/brand-2026/finance-compliance-advisory.webp');
        background-size: cover;
        background-position: center;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="pt-16 md:pt-24">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="max-w-4xl mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                FINANCE INDUSTRY SOLUTION
            </span>
            <h1 class="text-5xl md:text-[64px] font-extrabold text-brand-700 leading-[1.1] mb-8">
                Empower Financial Teams With Secure, Compliant Learning
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed max-w-2xl">
                Strengthen compliance, protect sensitive data, and upskill teams with a secure, scalable LMS built for regulated environments
            </p>
        </div>
        <div class="relative rounded-[48px] overflow-hidden aspect-[21/9] shadow-2xl bg-[#E6ECF4]">
            <img src="/images/brand-2026/adaptive-lms-product-team.webp" alt="Financial Professional" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<!-- Industry Overview -->
<section class="py-24 bg-white">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-brand-700 mb-10">Industry Overview</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                Financial institutions operate under strict regulatory expectations. Agunfon supports these environments with a learning ecosystem built for compliance, audit readiness, and continuous professional development. From onboarding to annual certifications and product knowledge training, Agunfon ensures teams stay informed, aligned, and regulation-ready.
            </p>
        </div>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20 mb-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] overflow-hidden p-8 lg:p-16 flex flex-col lg:flex-row gap-16 items-center shadow-2xl relative">
            <div class="w-full lg:w-1/2 aspect-square lg:aspect-[4/3] rounded-[32px] overflow-hidden shadow-xl">
                <img src="/images/brand-2026/agunfon-lagos-consultants-hero.webp" alt="Presentation to financial group" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-5 py-2 rounded-full bg-white mb-10 shadow-sm">
                    <span class="text-brand-700 font-bold text-sm tracking-wide">Key Features & Capabilities</span>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Compliance & certification automation</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Detailed reporting & audit trails</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Secure cloud hosting</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Risk management learning</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Product & systems training</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Support for multi-branch/global operations</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="cta-architecture-bg rounded-[64px] min-h-[500px] flex items-center p-12 lg:p-24 relative overflow-hidden shadow-2xl">
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-[1.15]">
                    <span class="font-serif-italic text-brand-500">Deploy</span> Agunfon LMS and empower your finance and compliance teams
                </h2>
                <p class="text-xl text-gray-200 mb-10">Talk to our team about a secure, role-based learning environment for your organisation.</p>
                <a href="/book-demo" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-opacity-90 transition-all hover:-translate-y-1 shadow-xl">Book a meeting</a>
            </div>
        </div>
    </div>
</section>
@endsection
