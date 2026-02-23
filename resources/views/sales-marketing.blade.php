@extends('layouts.app')

@section('title', 'Sales & Marketing Solution - Agunfon')

@push('styles')
<style>
    .font-serif-italic {
        font-family: 'Playfair Display', serif;
        font-style: italic;
    }
    .cta-bg-overlay {
        background-image: linear-gradient(rgba(6, 24, 51, 0.9), rgba(6, 24, 51, 0.7)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000');
        background-size: cover;
        background-position: center;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">
        <div class="max-w-xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-gray-200 text-[10px] font-bold text-gray-900 bg-white tracking-widest uppercase mb-8">
                SALES & MARKETING SOLUTION
            </span>
            <h1 class="text-5xl md:text-[64px] font-extrabold text-brand-700 leading-[1.1] mb-8">
                Empower Teams to Connect, Engage & Convert
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed">
                Boost performance with sales enablement content, product training, and modern marketing capabilities
            </p>
        </div>
        <div class="relative flex justify-center lg:justify-end">
            <div class="w-full max-w-[580px] aspect-square rounded-[48px] overflow-hidden bg-blue-50 relative">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=1200" alt="Professional Sales Lead" class="w-full h-full object-cover">
                <div class="absolute inset-0 ring-1 ring-inset ring-black/5 rounded-[48px]"></div>
            </div>
        </div>
    </div>
</section>

<!-- Solution Overview -->
<section class="py-20 md:py-32 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-brand-700 mb-8">Solution Overview</h2>
        <p class="text-lg text-gray-600 leading-relaxed">
            Effective sales and marketing teams need clarity, confidence, and alignment. Agunfon delivers learning tracks focused on persuasion, storytelling, digital marketing, product mastery, and objection handling — equipping teams to drive meaningful business outcomes
        </p>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20 mb-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] p-8 md:p-16 flex flex-col lg:flex-row items-center gap-16 shadow-2xl overflow-hidden relative">
            <div class="w-full lg:w-1/2 aspect-square lg:aspect-[4/3] rounded-[48px] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=1200" alt="Workspace collaboration" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-6 py-2.5 rounded-full bg-white mb-10 shadow-sm">
                    <span class="text-brand-700 font-extrabold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-5">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Sales enablement pathways</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Product & solution training</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Lead handling and conversion strategies</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Digital marketing skills development</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Role-play simulations</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Performance dashboards</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="cta-bg-overlay rounded-[64px] min-h-[560px] flex items-center p-12 lg:p-24 relative overflow-hidden shadow-2xl">
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-[1.15]">
                    Need to <span class="font-serif-italic text-brand-500">deploy</span> Agunfon LMS for Sales & Marketing Solution?
                </h2>
                <p class="text-lg text-gray-300 mb-12">Get in touch with our team to get started</p>
                <a href="/book-demo" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-opacity-90 transition-all hover:-translate-y-1 shadow-xl">Request a Demo</a>
            </div>
            <!-- Architecture style diagonal lines -->
            <div class="absolute right-0 bottom-0 top-0 w-1/2 opacity-20 pointer-events-none">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M0,100 L100,0 L100,100 Z" fill="white" />
                </svg>
            </div>
        </div>
    </div>
</section>
@endsection
