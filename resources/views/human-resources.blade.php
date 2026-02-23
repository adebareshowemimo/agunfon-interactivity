@extends('layouts.app')

@section('title', 'Human Resources Solution - Agunfon')

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
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center">
        <div class="max-w-xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                HUMAN RESOURCES SOLUTION
            </span>
            <h1 class="text-5xl md:text-[64px] font-extrabold text-brand-700 leading-[1.1] mb-8">
                Develop People-Centric, High-Performing HR Teams
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed">
                Equip HR professionals with the training, tools, and insights needed to lead effectively, ensure compliance, and strengthen organizational culture
            </p>
        </div>
        <div class="relative flex justify-center lg:justify-end">
            <div class="relative w-full max-w-[580px] aspect-[4/3] rounded-[48px] overflow-hidden bg-blue-50 flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=1200" alt="HR Team Discussion" class="w-[90%] h-[90%] object-cover rounded-[32px] shadow-2xl">
            </div>
        </div>
    </div>
</section>

<!-- Solution Overview -->
<section class="py-20 md:py-32 bg-white">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-10">Solution Overview</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                HR teams shape the employee experience. Agunfon supports HR excellence through targeted learning on onboarding, compliance, performance management, policy communication, and organizational development
            </p>
        </div>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20 mb-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] overflow-hidden p-8 lg:p-16 flex flex-col lg:flex-row gap-16 items-center shadow-2xl relative">
            <div class="w-full lg:w-1/2 aspect-video lg:aspect-[4/3] rounded-[32px] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=1200" alt="Professional working" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-5 py-2.5 rounded-full bg-white mb-10 shadow-sm">
                    <span class="text-brand-700 font-bold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-5">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Onboarding frameworks</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Compliance & policy training</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Employee relations modules</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Performance management skills</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Reporting & analytics for HR teams</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md">
                            <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Change management learning tracks</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 md:py-32 relative">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-950 rounded-[64px] overflow-hidden relative p-12 lg:p-24 flex items-center shadow-2xl min-h-[500px]">
            <div class="absolute inset-0 z-0 opacity-40">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000" alt="Modern Office Architecture" class="w-full h-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/80 to-transparent"></div>
            </div>
            <div class="max-w-2xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Need to <span class="font-serif-italic text-brand-500">deploy</span> Agunfon LMS for Human Resources Solutions?
                </h2>
                <p class="text-lg text-gray-400 mb-10">Get in touch with our team to get started</p>
                <a href="/contact" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg">Talk to an Expert</a>
            </div>
        </div>
    </div>
</section>
@endsection
