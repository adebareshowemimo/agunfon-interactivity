@extends('layouts.app')

@section('title', 'Diversity & Inclusion Solution - Agunfon')

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
    .cta-background {
        background-image: linear-gradient(rgba(6, 24, 51, 0.8), rgba(6, 24, 51, 0.8)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .cta-pattern-overlay {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        width: 50%;
        background: linear-gradient(135deg, transparent 50%, rgba(255, 255, 255, 0.05) 50%);
        background-size: 40px 40px;
        pointer-events: none;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">
        <div class="max-w-2xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-gray-100 text-[10px] font-bold text-gray-900 bg-white tracking-widest uppercase mb-8">
                DIVERSITY & INCLUSION SOLUTION
            </span>
            <h1 class="text-5xl md:text-[64px] font-extrabold text-brand-700 leading-[1.1] mb-8">
                Build an Inclusive, Empowered Organizational Culture
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed max-w-lg">
                Strengthen awareness, empathy, and equitable practices through expert-designed diversity and inclusion experiences
            </p>
        </div>
        <div class="relative">
            <div class="hero-image-frame">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=1200" alt="Diverse group of professionals collaborating" class="w-full h-auto rounded-[32px] shadow-2xl">
            </div>
        </div>
    </div>
</section>

<!-- Solution Overview -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-brand-700 mb-10">Solution Overview</h2>
        <p class="text-lg md:text-xl text-gray-600 leading-relaxed">
            Inclusive cultures unlock innovation. Agunfon provides practical D&I programs that deepen awareness, reduce bias, and equip leaders and teams with the skills required to build a respectful, equitable workplace
        </p>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20 mb-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] p-8 md:p-16 flex flex-col lg:flex-row gap-16 items-center shadow-2xl relative">
            <div class="w-full lg:w-1/2 aspect-square lg:aspect-[4/3] rounded-[48px] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&q=80&w=1200" alt="Team collaborating at desk" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-6 py-2.5 rounded-full bg-white mb-10 shadow-sm">
                    <span class="text-brand-700 font-extrabold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Bias-awareness and reduction modules</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Inclusive communication training</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Cultural sensitivity learning</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Inclusion-focused leadership tools</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-lg transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Real-life case studies and scenarios</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="cta-background rounded-[64px] min-h-[580px] flex items-center p-12 lg:p-24 shadow-2xl overflow-hidden">
            <div class="cta-pattern-overlay"></div>
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-[1.15]">
                    Need to <span class="font-serif-italic text-brand-500">deploy</span> Agunfon LMS for Diversity & Inclusion Solutions?
                </h2>
                <p class="text-xl text-gray-300 mb-12">Get in touch with our team to get started</p>
                <a href="/book-demo" class="inline-flex items-center px-10 py-5 bg-brand-500 text-white font-bold rounded-xl hover:bg-opacity-90 transition-all hover:-translate-y-1 shadow-xl">See It In Action</a>
            </div>
        </div>
    </div>
</section>
@endsection
