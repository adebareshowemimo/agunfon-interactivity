@extends('layouts.app')

@section('title', 'Personal Development - Agunfon')

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
<section class="py-20 md:py-32 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">
        <div class="max-w-xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-8">
                Personal Development
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Empower Individual Growth & Lifelong Learning
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed">
                Give employees the tools to grow personally and professionally through self-paced, engaging, and adaptive learning experiences
            </p>
        </div>
        <div class="relative flex justify-center lg:justify-end">
            <div class="relative w-full max-w-[580px] aspect-[4/3] rounded-[48px] overflow-hidden bg-blue-50 flex items-center justify-center p-8">
                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&q=80&w=1200" alt="Professional at laptop" class="w-full h-full object-cover rounded-[32px] shadow-2xl">
            </div>
        </div>
    </div>
</section>

<!-- Solution Overview -->
<section class="py-20 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-10">Solution Overview</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                Personal development inspires confidence and increases retention. Agunfon supports growth with self-paced learning, reflection-based activities, gamified experiences, and personalized recommendations tailored to each learner's strengths and goals
            </p>
        </div>
    </div>
</section>

<!-- Key Feature & Capabilities -->
<section class="py-12 md:py-20 mb-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] overflow-hidden p-8 lg:p-16 flex flex-col lg:flex-row gap-16 items-center shadow-2xl">
            <div class="w-full lg:w-1/2 aspect-video lg:aspect-auto h-full min-h-[400px] rounded-[32px] overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=1200" alt="Working in office" class="w-full h-full object-cover">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="inline-block px-5 py-2.5 rounded-full bg-white mb-10 shadow-sm">
                    <span class="text-brand-700 font-bold text-sm tracking-wide">Key Feature & Capabilities</span>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md">
                            <iconify-icon icon="lucide:check" class="text-brand-500 font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Self-paced personal development library</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md">
                            <iconify-icon icon="lucide:check" class="text-brand-500 font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Gamified challenges & rewards</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md">
                            <iconify-icon icon="lucide:check" class="text-brand-500 font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Personalized feedback & recommendations</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md">
                            <iconify-icon icon="lucide:check" class="text-brand-500 font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Skill-building pathways</span>
                    </li>
                    <li class="flex items-center gap-5">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md">
                            <iconify-icon icon="lucide:check" class="text-brand-500 font-bold"></iconify-icon>
                        </div>
                        <span class="text-white text-lg font-medium">Interactive quizzes & reflection prompts</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 md:py-32 relative">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-950 rounded-[64px] overflow-hidden relative p-12 lg:p-24 flex items-center min-h-[520px] shadow-2xl">
            <div class="absolute inset-0 z-0 opacity-40">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000" alt="Modern Office Architecture" class="w-full h-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/80 to-transparent"></div>
            </div>
            <div class="max-w-3xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Need to <span class="font-serif-italic text-brand-500">deploy</span> Agunfon LMS for <br> employee Personal Development?
                </h2>
                <p class="text-lg text-gray-400 mb-10">Get in touch with our team to get started</p>
                <a href="/learning-suite" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1 active:translate-y-0">Explore Courses</a>
            </div>
        </div>
    </div>
</section>
@endsection
