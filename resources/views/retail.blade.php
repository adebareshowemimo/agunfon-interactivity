@extends('layouts.app')

@section('title', 'Retail Industry Solution - Agunfon')

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
    .diagonal-lines {
        background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255, 255, 255, 0.03) 35px, rgba(255, 255, 255, 0.03) 70px);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="pt-16 md:pt-24 pb-12 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="max-w-3xl mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                RETAIL INDUSTRY SOLUTION
            </span>
            <h1 class="text-5xl md:text-[64px] font-extrabold text-brand-700 leading-[1.1] mb-8">
                Train and Empower Retail Teams Faster Than Ever
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed max-w-2xl">
                Deliver microlearning, product training, and frontline onboarding tailored for fast-paced retail environments.
            </p>
        </div>
        <div class="relative rounded-[48px] overflow-hidden aspect-[21/9] shadow-2xl bg-gray-100">
            <img src="https://images.unsplash.com/photo-1594913785162-e6786b327fa7?auto=format&fit=crop&q=80&w=2000" alt="Retail workspace with ceramics and pottery" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<!-- Industry Overview -->
<section class="py-24 bg-white">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-brand-700 mb-10">Industry Overview</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                Retail teams need quick, flexible learning that fits fast-changing operations. Agunfon provides microlearning experiences, product mastery modules, and scalable onboarding to help teams stay sharp on the shop floor, in customer service, and in daily operations.
            </p>
        </div>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20 mb-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] overflow-hidden p-8 lg:p-16 flex flex-col lg:flex-row gap-16 items-center shadow-2xl relative">
            <div class="w-full lg:w-1/2 aspect-square lg:aspect-[4/3] rounded-[32px] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?auto=format&fit=crop&q=80&w=1200" alt="Warehouse staff collaborating with tablet" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-5 py-2 rounded-full bg-white mb-10 shadow-sm">
                    <span class="text-brand-700 font-bold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Fast microlearning modules</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Gamified learning</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Instant onboarding pathways</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Product knowledge training</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Mobile learning for frontline staff</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-110 transition-transform">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Performance dashboards</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="cta-architecture-bg diagonal-lines rounded-[64px] min-h-[500px] flex items-center p-12 lg:p-24 relative overflow-hidden shadow-2xl">
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-[1.15]">
                    <span class="font-serif-italic text-brand-500">Deploy</span> Agunfon LMS to facilitate sales in your retail processes
                </h2>
                <p class="text-xl text-gray-300 mb-10">Get in touch with our team to get started</p>
                <a href="/book-demo" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-opacity-90 transition-all hover:-translate-y-1 shadow-xl">Book a meeting</a>
            </div>
        </div>
    </div>
</section>
@endsection
