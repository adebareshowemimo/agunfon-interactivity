@extends('layouts.app')

@section('title', 'About Us - Agunfon Enterprise LMS')

@push('styles')
<style>
    .font-serif-italic {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        font-weight: 500;
    }
    .bg-hex-pattern {
        background-image: url('data:image/svg+xml,%3Csvg width="60" height="103.923" viewBox="0 0 60 103.923" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M30 0l25.98 15v30L30 60 4.02 45V15z" fill-opacity="0.03" fill="%23FFFFFF" fill-rule="evenodd"/%3E%3C/svg%3E');
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="pt-12 pb-20 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <div class="inline-block px-4 py-1.5 rounded-full border border-gray-200 text-brand-700 text-xs font-bold tracking-widest bg-white mb-6 uppercase">
            About Us
        </div>
        <h1 class="text-5xl lg:text-[64px] font-bold text-brand-700 leading-tight mb-8">
            We Build Learning Ecosystems That Help <span class="font-serif-italic text-brand-500 italic">Organizations</span> Grow
        </h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">
            At Agunfon, we believe in clear-sighted learning: thoughtful systems that empower teams, transform skills, and drive growth — for businesses of all sizes
        </p>
    </div>
</section>

<!-- Mission / Vision / Values Alternating Cards -->
<section class="py-12 px-6 max-w-7xl mx-auto space-y-12">
    
    <!-- Our Mission -->
    <div class="grid lg:grid-cols-12 gap-8 items-stretch">
        <div class="lg:col-span-3 bg-brand-700 rounded-[32px] p-10 flex items-center justify-center shadow-soft">
            <div class="relative">
                <iconify-icon icon="lucide:target" class="text-white text-8xl opacity-90 drop-shadow-xl"></iconify-icon>
                <!-- Decorative rings around icon -->
                <div class="absolute -inset-4 border-2 border-white/10 rounded-full"></div>
                <div class="absolute -inset-8 border border-white/5 rounded-full"></div>
            </div>
        </div>
        <div class="lg:col-span-9 bg-white rounded-[32px] p-12 border border-brand-100 shadow-soft flex flex-col justify-center">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-1 h-8 bg-brand-500 rounded-full"></div>
                <h2 class="text-3xl font-bold text-brand-700">Our Mission</h2>
            </div>
            <p class="text-gray-500 leading-relaxed text-lg">
                We exist to help organizations unlock the full potential of their people. By creating adaptive, interactive learning experiences, we bridge the gap between what teams need and what modern work demands. Our mission is to understand each organization deeply, design solutions that feel intuitive and human, and deliver technology that turns learning into transformation — measurable, meaningful, and lasting.
            </p>
        </div>
    </div>

    <!-- Our Vision -->
    <div class="grid lg:grid-cols-12 gap-8 items-stretch">
        <div class="lg:col-span-9 lg:order-1 order-2 bg-white rounded-[32px] p-12 border border-brand-100 shadow-soft flex flex-col justify-center">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-1 h-8 bg-brand-500 rounded-full"></div>
                <h2 class="text-3xl font-bold text-brand-700">Our Vision</h2>
            </div>
            <p class="text-gray-500 leading-relaxed text-lg">
                We envision a future where every organization, regardless of size or location, operates as a high-performing learning organization: where knowledge flows freely, employees thrive, and growth is continuous.
            </p>
        </div>
        <div class="lg:col-span-3 lg:order-2 order-1 bg-brand-700 rounded-[32px] p-10 flex items-center justify-center shadow-soft">
            <iconify-icon icon="lucide:eye" class="text-white text-8xl opacity-90 drop-shadow-xl"></iconify-icon>
        </div>
    </div>

    <!-- Our Values -->
    <div class="grid lg:grid-cols-12 gap-8 items-stretch">
        <div class="lg:col-span-3 bg-brand-700 rounded-[32px] p-10 flex items-center justify-center shadow-soft">
            <iconify-icon icon="lucide:gem" class="text-white text-8xl opacity-90 drop-shadow-xl"></iconify-icon>
        </div>
        <div class="lg:col-span-9 bg-white rounded-[32px] p-12 border border-brand-100 shadow-soft flex flex-col justify-center">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-1 h-8 bg-brand-500 rounded-full"></div>
                <h2 class="text-3xl font-bold text-brand-700">Our Values</h2>
            </div>
            <p class="text-gray-500 leading-relaxed text-lg">
                Our values reflect the clarity and forward perspective that define Agunfon. We prioritize clarity in how we communicate, integrity in how we work, partnership in how we collaborate, innovation in how we solve problems, and impact in every solution we deliver. Each principle reinforces our commitment to meaningful learning transformation and strengthens the experience we create for every organization we serve.
            </p>
        </div>
    </div>
</section>

<!-- Why Choose Section -->
<section class="py-24 px-6">
    <div class="max-w-4xl mx-auto text-center mb-16">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-8">
            Why <span class="font-serif-italic text-brand-500 italic">Choose</span> Agunfon?
        </h2>
        <p class="text-gray-500 text-lg leading-relaxed max-w-2xl mx-auto">
            We don't just deliver software; we create learning ecosystems. Whether you're a small team or a large enterprise, we tailor solutions that fit your unique structure, culture, and growth ambitions. With Agunfon, you get more than a tool: you get a partner committed to your long-term learning success
        </p>
    </div>
    <div class="max-w-5xl mx-auto rounded-[48px] overflow-hidden shadow-soft border-4 border-white">
        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=2000" alt="Collaborative team working together on a laptop" class="w-full h-[500px] object-cover hover:scale-105 transition-transform duration-1000">
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 px-6">
    <div class="max-w-5xl mx-auto bg-brand-700 rounded-[48px] p-12 md:p-24 text-center relative overflow-hidden shadow-soft bg-hex-pattern">
        <!-- Decorative elements inside CTA box -->
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-brand-500/20 rounded-full blur-[100px]"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-brand-500/20 rounded-full blur-[100px]"></div>
        
        <div class="relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-8 leading-tight">
                Ready to transform your <span class="font-serif-italic text-brand-500 italic">learning?</span>
            </h2>
            <p class="text-brand-100 text-lg mb-12 max-w-xl mx-auto">
                Let's build a learning journey that aligns with your organization's goals
            </p>
            <a href="/contact" class="inline-block px-12 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-white hover:text-brand-700 transition-all shadow-lg">Get Started</a>
        </div>
    </div>
</section>
@endsection
