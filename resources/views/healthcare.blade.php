@extends('layouts.app')

@section('title', 'Healthcare Industry Solution - Agunfon')

@push('styles')
<style>
    .font-serif-italic {
        font-family: 'Playfair Display', serif;
        font-style: italic;
    }
    .hero-image-frame {
        background: #EAF2FA;
        border-radius: 48px;
        padding: 24px;
    }
    .cta-bg-image {
        background-image: linear-gradient(rgba(6, 24, 51, 0.8), rgba(6, 24, 51, 0.8)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000');
        background-size: cover;
        background-position: center;
    }
    .diagonal-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 60%;
        background: linear-gradient(135deg, transparent 50%, rgba(75, 139, 232, 0.1) 50%);
        background-size: 80px 80px;
        pointer-events: none;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="max-w-3xl mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full border border-gray-100 text-[10px] font-bold text-gray-900 bg-white tracking-widest uppercase mb-8">
                HEALTHCARE INDUSTRY SOLUTION
            </span>
            <h1 class="text-5xl md:text-[64px] font-extrabold text-brand-700 leading-[1.1] mb-8">
                Empower Healthcare Teams With Safe, Compliant, Quality-Driven Training
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed max-w-2xl">
                Deliver essential training for clinical and non-clinical teams — from onboarding to continuous professional development.
            </p>
        </div>
        <div class="relative">
            <div class="hero-image-frame">
                <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&q=80&w=2000" alt="Healthcare professionals using a digital tablet" class="w-full h-auto rounded-[32px] shadow-2xl object-cover aspect-[21/9]">
            </div>
        </div>
    </div>
</section>

<!-- Industry Overview -->
<section class="py-24 bg-white">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-brand-700 mb-10">Industry Overview</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                Healthcare professionals require accurate, timely training to ensure patient safety and regulatory compliance. Agunfon supports hospitals, clinics, and training institutions with scalable, up-to-date learning pathways tailored to medical environments.
            </p>
        </div>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20 mb-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] p-8 md:p-16 flex flex-col lg:flex-row gap-16 items-center shadow-2xl relative">
            <div class="w-full lg:w-1/2 aspect-square lg:aspect-[4/3] rounded-[48px] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1559839734-2b71f1536785?auto=format&fit=crop&q=80&w=1200" alt="Healthcare professional at laptop" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-6 py-2.5 rounded-full bg-white mb-10 shadow-sm">
                    <span class="text-brand-700 font-extrabold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Regulatory & compliance learning</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Clinical & non-clinical onboarding</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Advanced data security standards</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Continuous Professional Development (CPD)</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Emergency response & safety training</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Multi-department LMS management</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 lg:py-32">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="cta-bg-image rounded-[64px] min-h-[580px] flex items-center p-12 lg:p-24 shadow-2xl overflow-hidden relative">
            <div class="diagonal-overlay"></div>
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-[1.15]">
                    <span class="font-serif-italic text-brand-500">Deploy</span> Agunfon LMS to train your healthcare team
                </h2>
                <p class="text-xl text-gray-300 mb-12 font-medium">Get in touch with our team to get started</p>
                <a href="/book-demo" class="inline-flex items-center px-10 py-5 bg-brand-500 text-white font-bold rounded-xl hover:bg-opacity-90 transition-all hover:-translate-y-1 shadow-xl">Request a Demo</a>
            </div>
        </div>
    </div>
</section>
@endsection
