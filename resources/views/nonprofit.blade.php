@extends('layouts.app')

@section('title', 'Non-Profit Sector Solution - Agunfon')

@push('styles')
<style>
    .font-serif-italic {
        font-family: 'Playfair Display', serif;
        font-style: italic;
    }
    .cta-architecture-bg {
        background-image: linear-gradient(rgba(6, 24, 51, 0.85), rgba(6, 24, 51, 0.7)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000');
        background-size: cover;
        background-position: center;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="pt-16 md:pt-24 pb-12 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="max-w-4xl mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                NON-PROFIT SECTOR SOLUTION
            </span>
            <h1 class="text-5xl md:text-[72px] font-extrabold text-brand-700 leading-[1.05] mb-8">
                Flexible, Accessible Learning for Social Impact Organizations
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed max-w-2xl">
                Support staff, volunteers, and partner networks with scalable, budget-conscious learning solutions
            </p>
        </div>
        <div class="relative rounded-[48px] overflow-hidden aspect-[21/9] shadow-2xl bg-gray-100">
            <img src="https://images.unsplash.com/photo-1573166364524-d9dbfd8bbf83?auto=format&fit=crop&q=80&w=2000" alt="Non-profit staff collaborating with masks and laptops" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<!-- Industry Overview -->
<section class="py-24 bg-white">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-brand-700 mb-10">Industry Overview</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg md:text-xl text-gray-600 leading-relaxed">
                Non-profits operate with limited resources but high-impact missions. Agunfon provides accessible learning tools that strengthen volunteer onboarding, compliance, and program delivery — without stretching budgets
            </p>
        </div>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20 mb-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] overflow-hidden p-8 lg:p-16 flex flex-col lg:flex-row gap-16 items-center shadow-2xl relative">
            <div class="w-full lg:w-1/2 aspect-square lg:aspect-[4/3] rounded-[32px] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=1200" alt="Black woman working at laptop in home office" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-5 py-2 rounded-full bg-white mb-10 shadow-sm">
                    <span class="text-brand-700 font-extrabold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="grid grid-cols-1 gap-6">
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Volunteer onboarding pathways</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Donor reporting & transparency tools</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Affordable hosting & content options</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Remote & distributed learning support</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Community learning spaces</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Governance & compliance modules</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="cta-architecture-bg rounded-[64px] min-h-[520px] flex items-center p-12 lg:p-24 relative overflow-hidden shadow-2xl">
            <!-- Geometric pattern overlay -->
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                    <path d="M0,100 L100,0 L100,100 Z" fill="white" />
                </svg>
            </div>
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-[1.15]">
                    <span class="font-serif-italic text-brand-500">Deploy</span> Agunfon LMS in your non profit organization
                </h2>
                <p class="text-xl text-gray-300 mb-10">Get in touch with our team to get started</p>
                <a href="/book-demo" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-opacity-90 transition-all hover:-translate-y-1 shadow-xl">Book a meeting</a>
            </div>
        </div>
    </div>
</section>
@endsection
