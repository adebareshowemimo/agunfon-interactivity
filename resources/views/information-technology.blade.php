@extends('layouts.app')

@section('title', 'Information Technology Solution - Agunfon')

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
<section class="py-16 md:py-24">
    <div class="max-w-[1280px] mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
        <div class="max-w-xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-8">
                Information Technology Solution
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Build Digital Skills for a Modern Workforce
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed mb-10">
                Upskill teams through curated IT learning paths — including cloud, cybersecurity, DevOps, automation, and emerging technologies
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="/book-demo" class="px-8 py-4 bg-brand-700 text-white rounded-xl font-bold hover:bg-opacity-90 transition-all shadow-lg">Book a Demo</a>
                <a href="#features" class="px-8 py-4 border border-gray-200 text-brand-700 rounded-xl font-bold hover:bg-gray-50 transition-all">Explore solution</a>
            </div>
        </div>
        <div class="relative">
            <div class="rounded-[48px] overflow-hidden shadow-2xl relative bg-brand-700">
                <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=1200" alt="IT Professional with Code" class="w-full aspect-[4/5] object-cover opacity-90">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-700/40 to-transparent"></div>
            </div>
            <!-- Floating Decorative Element -->
            <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-3xl shadow-xl hidden md:block border border-gray-50">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-brand-500">
                        <iconify-icon icon="lucide:code-2" class="text-2xl"></iconify-icon>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 font-bold uppercase tracking-wider">Tech Stack</div>
                        <div class="text-brand-700 font-bold">Adaptive Learning</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Solution Overview -->
<section class="py-24 bg-white">
    <div class="max-w-[1280px] mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-brand-700 mb-10">Solution Overview</h2>
        <p class="text-xl text-gray-600 leading-relaxed max-w-4xl mx-auto">
            Digital skills are the backbone of modern organizations. Agunfon delivers structured IT learning paths, hands-on practice tools, and industry-aligned content that help teams stay confident in fast-evolving technical environments
        </p>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section id="features" class="py-20">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="bg-brand-700 rounded-[64px] overflow-hidden p-8 md:p-16 flex flex-col lg:flex-row gap-16 items-center shadow-2xl relative">
            <!-- Geometric Decor -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full translate-x-1/2 -translate-y-1/2"></div>
            
            <div class="w-full lg:w-1/2 aspect-video lg:aspect-[4/3] rounded-[48px] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1522071823991-b51c1747ad2e?auto=format&fit=crop&q=80&w=1200" alt="IT Team Working Together" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-5 py-2.5 rounded-full bg-white mb-10 shadow-sm">
                    <span class="text-brand-700 font-bold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-5 group">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 group-hover:scale-110 transition-all shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Role-based IT pathways</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 group-hover:scale-110 transition-all shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Cloud, DevOps & security modules</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 group-hover:scale-110 transition-all shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Cybersecurity awareness & advanced training</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 group-hover:scale-110 transition-all shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Automation fundamentals</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 group-hover:scale-110 transition-all shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Technical assessments & certifications</span>
                    </li>
                    <li class="flex items-center gap-5 group">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 group-hover:scale-110 transition-all shadow-lg">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Hands-on labs (where applicable)</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 relative">
    <div class="max-w-[1280px] mx-auto px-6 relative z-10">
        <div class="bg-brand-950 rounded-[64px] overflow-hidden relative min-h-[560px] flex items-center p-12 lg:p-24 shadow-2xl">
            <!-- Background Pattern Layer -->
            <div class="absolute inset-0 z-0 opacity-40">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000" alt="Modern Office Building" class="w-full h-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-br from-brand-950 via-transparent to-transparent"></div>
            </div>
            
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-[1.15]">
                    Need to <span class="font-serif-italic text-brand-500">deploy</span> Agunfon LMS for Information Technology Solution?
                </h2>
                <p class="text-xl text-gray-400 mb-12">Get in touch with our team to get started</p>
                <a href="/learning-suite" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1">Discover IT Learning</a>
            </div>
        </div>
    </div>
</section>
@endsection
