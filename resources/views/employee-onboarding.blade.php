@extends('layouts.app')

@section('title', 'Employee Onboarding - Agunfon')

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
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <div class="max-w-xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                Employee Onboarding
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Simplify Onboarding With Intelligent, Automated Learning Paths
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed mb-10">
                Deliver a seamless, structured, and engaging onboarding experience that accelerates productivity and sets every new hire up for success
            </p>
        </div>
        <div class="relative">
            <div class="aspect-[4/3] rounded-[32px] overflow-hidden border-[12px] border-blue-50 shadow-2xl">
                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&q=80&w=1200" alt="Team Onboarding" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Solution Overview -->
<section class="py-20 md:py-32">
    <div class="max-w-[1280px] mx-auto px-6 text-center max-w-4xl">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-10">Solution Overview</h2>
        <p class="text-lg text-gray-600 leading-relaxed">
            Regulatory expectations evolve constantly, and compliance gaps create unnecessary risk. Agunfon ensures your workforce remains informed and certified throughout the year, with automated training delivery, real-time monitoring, and role-based compliance pathways. From data protection to workplace safety, the platform keeps your teams aligned and your organization audit-ready.
        </p>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="bg-brand-700 rounded-[48px] overflow-hidden p-8 md:p-16 flex flex-col md:flex-row gap-16 items-center shadow-2xl">
            <div class="w-full md:w-1/2 aspect-video rounded-3xl overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=800" alt="Working together" class="w-full h-full object-cover">
            </div>
            <div class="w-full md:w-1/2">
                <div class="inline-block px-4 py-2 rounded-lg bg-white mb-10">
                    <span class="text-brand-700 font-bold text-sm">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-5">
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0">
                            <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                        </div>
                        <span class="text-white font-medium">Secure cloud hosting</span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0">
                            <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                        </div>
                        <span class="text-white font-medium">Full LMS setup & configuration</span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0">
                            <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                        </div>
                        <span class="text-white font-medium">User onboarding & administrator training</span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0">
                            <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                        </div>
                        <span class="text-white font-medium">Ongoing technical support</span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0">
                            <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                        </div>
                        <span class="text-white font-medium">Regular updates & security patches</span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0">
                            <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                        </div>
                        <span class="text-white font-medium">Basic integrations (SSO, HR sync options)</span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0">
                            <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                        </div>
                        <span class="text-white font-medium">Reporting & analytics access</span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0">
                            <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                        </div>
                        <span class="text-white font-medium">Mobile-friendly LMS experience</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 md:py-32 relative">
    <div class="max-w-[1280px] mx-auto px-6 relative z-10">
        <div class="bg-brand-950 rounded-[48px] overflow-hidden relative p-12 md:p-24 flex items-center">
            <!-- Background architectural element -->
            <div class="absolute right-0 top-0 bottom-0 w-1/2 opacity-30 pointer-events-none">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1200" alt="Modern Office Architecture" class="w-full h-full object-cover">
            </div>
            <div class="max-w-2xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    Need to <span class="font-serif-italic text-brand-500">deploy</span> LMS for Employee Onboarding?
                </h2>
                <p class="text-lg text-gray-400 mb-10">Get in touch with our team to get started</p>
                <a href="/book-demo" class="inline-flex items-center px-8 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-0.5">Book a Demo</a>
            </div>
        </div>
    </div>
</section>
@endsection
