@extends('layouts.app')

@section('title', 'Educational Sector Solution - Agunfon')

@push('styles')
<style>
    .font-serif-italic {
        font-family: 'Playfair Display', serif;
        font-style: italic;
    }
    .cta-bg-overlay {
        background-image: linear-gradient(rgba(6, 24, 51, 0.85), rgba(6, 24, 51, 0.7)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000');
        background-size: cover;
        background-position: center;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="pt-16 md:pt-24 pb-12">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="max-w-4xl mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                EDUCATION SECTOR SOLUTION
            </span>
            <h1 class="text-5xl md:text-[64px] font-extrabold text-brand-700 leading-[1.1] mb-8">
                Scalable Learning Solutions for Modern Education
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed max-w-2xl">
                Equip schools, universities, and training institutions with a flexible LMS that supports digital learning, assessments, and student engagement
            </p>
        </div>
        <div class="relative rounded-[48px] overflow-hidden bg-gray-100 aspect-[21/9] shadow-2xl">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=2000" alt="Students collaborating" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<!-- Industry Overview -->
<section class="py-24 bg-white">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-brand-700 mb-10">Industry Overview</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                Educational institutions require platforms that support large user bases and diverse course structures. Agunfon delivers a scalable learning experience ideal for online learning, blended classrooms, continuing education, and skill-based programs. Perfect for institutions transitioning from traditional models to modern, technology-driven learning.
            </p>
        </div>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20 mb-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] overflow-hidden p-8 lg:p-16 flex flex-col lg:flex-row gap-16 items-center shadow-2xl">
            <div class="w-full lg:w-1/2 aspect-square lg:aspect-[4/3] rounded-[32px] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1491309055486-24ae511c15c7?auto=format&fit=crop&q=80&w=1200" alt="Educator in library" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-5 py-2 rounded-full bg-white mb-10">
                    <span class="text-brand-700 font-bold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Multi-course & department management</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Academic analytics</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Assessment & examination tools</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Blended learning support</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Student engagement features</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-9 h-9 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md transition-transform group-hover:scale-110">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Integration with academic systems</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="cta-bg-overlay rounded-[64px] min-h-[500px] flex items-center p-12 lg:p-24 relative overflow-hidden shadow-2xl">
            <!-- Abstract diagonal pattern overlay -->
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                    <path d="M0,100 L100,0 L100,100 Z" fill="white" />
                </svg>
            </div>
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-[1.15]">
                    <span class="font-serif-italic text-brand-500">Deploy</span> Agunfon LMS in schools, universities, and training institutions
                </h2>
                <p class="text-xl text-gray-300 mb-10">Get in touch with our team to get started</p>
                <a href="/book-demo" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-opacity-90 transition-all hover:-translate-y-1 shadow-xl">Book a Demo</a>
            </div>
        </div>
    </div>
</section>
@endsection
