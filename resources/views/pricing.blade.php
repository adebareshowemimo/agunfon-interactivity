@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="pt-16 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block px-4 py-1.5 rounded-full border border-gray-200 text-brand-700 text-xs font-bold tracking-widest bg-white mb-6 uppercase">Pricing</div>
            <h1 class="text-5xl lg:text-[64px] font-bold text-brand-900 leading-tight mb-8">
                <span class="font-serif italic text-brand-500 font-medium">Flexible</span> Pricing for Every Organization
            </h1>
            <p class="text-lg text-gray-500 max-w-3xl mx-auto leading-relaxed mb-10">
                Choose from scalable Moodle LMS packages designed to support organizations of all sizes; from small teams to enterprise learning environments
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="/contact" class="w-full sm:w-auto px-8 py-3.5 bg-gray-900 text-white font-bold rounded-xl hover:bg-black transition-all shadow-lg transform hover:-translate-y-0.5">Request a Quote</a>
                <a href="/book-demo" class="w-full sm:w-auto px-8 py-3.5 bg-white text-gray-900 font-bold rounded-xl border border-gray-200 hover:border-gray-300 transition-all">Book a Demo</a>
            </div>
        </div>
    </section>

    <!-- Main Pricing Card -->
    <section class="pb-24 px-6">
        <div class="max-w-[1200px] mx-auto bg-white rounded-[40px] border border-gray-100 p-10 lg:p-16 shadow-soft">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Left: Feature List -->
                <div class="flex flex-col">
                    <h2 class="text-4xl font-bold text-brand-900 mb-4">Everything at a <span class="font-serif italic text-brand-500 font-medium">Standard Price</span></h2>
                    <p class="text-gray-500 mb-10 leading-relaxed">
                        Clear, transparent pricing with everything included; no hidden fees, no unexpected charges. Agunfon plan is crafted to ensure long-term stability and exceptional learning outcomes
                    </p>
                    
                    <div class="bg-brand-900 rounded-[32px] p-8 text-white flex-grow">
                        <div class="bg-white/10 rounded-full px-5 py-2 inline-block text-sm font-semibold mb-8 border border-white/10">Plan Includes:</div>
                        <ul class="space-y-4">
                            <li class="flex items-center gap-3">
                                <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                                <span class="text-sm font-medium opacity-90">Secure cloud hosting</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                                <span class="text-sm font-medium opacity-90">Full LMS setup & configuration</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                                <span class="text-sm font-medium opacity-90">User onboarding & administrator training</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                                <span class="text-sm font-medium opacity-90">Ongoing technical support</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                                <span class="text-sm font-medium opacity-90">Regular updates & security patches</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                                <span class="text-sm font-medium opacity-90">Basic integrations (SSO, HR sync options)</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                                <span class="text-sm font-medium opacity-90">Reporting & analytics access</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                                <span class="text-sm font-medium opacity-90">Mobile-friendly LMS experience</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right: Visual Badge Card -->
                <div class="relative rounded-[32px] overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=800" alt="Professional team" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-900/90 via-transparent to-transparent"></div>
                    <div class="absolute bottom-8 left-8 right-8 bg-brand-900/40 backdrop-blur-md border border-white/20 rounded-2xl p-8 text-center">
                        <div class="text-4xl font-bold text-white mb-6">
                            <span class="font-serif italic text-5xl">$5,000</span> <span class="text-lg font-normal opacity-80">Per User/Mo</span>
                        </div>
                        <a href="/book-demo" class="block w-full py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-colors shadow-lg">Book a Demo</a>
                    </div>
                </div>
            </div>

            <!-- Optional Add-Ons -->
            <div class="mt-16 pt-16 border-t border-gray-100">
                <h3 class="text-xl font-bold text-brand-900 mb-8">Optional Add-Ons (Billed Separately)</h3>
                <div class="grid md:grid-cols-2 gap-y-6 gap-x-12 bg-brand-50 rounded-[24px] p-8">
                    <div class="flex items-center gap-4">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                        <span class="text-sm font-bold text-brand-900">Secure cloud hosting</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                        <span class="text-sm font-bold text-brand-900">User onboarding & administrator training</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                        <span class="text-sm font-bold text-brand-900">Full LMS setup & configuration</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-xl"></iconify-icon>
                        <span class="text-sm font-bold text-brand-900">Ongoing technical support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tailored Plan Section -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1440" alt="Skyscraper background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-brand-900/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-6">
            <div class="max-w-2xl">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Need a <span class="font-serif italic text-brand-500 font-medium">tailored</span> plan?
                </h2>
                <p class="text-lg text-blue-100 mb-10 leading-relaxed">
                    Every organization is unique. Request a custom quote based on your requirements — including user size, hosting specifications, support level, integrations, and additional services organization's goals
                </p>
                <a href="/contact" class="inline-block px-8 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all shadow-lg">Request a Custom Quote</a>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-24 px-6">
        <div class="max-w-[1000px] mx-auto bg-brand-900 rounded-[48px] p-16 text-center relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute top-0 right-0 w-48 h-48 bg-brand-500 rounded-full blur-[80px] opacity-30 -mr-10 -mt-10"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-brand-500 rounded-full blur-[80px] opacity-20 -ml-10 -mb-10"></div>
            
            <div class="relative z-10">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-8 leading-tight">
                    Ready to Build Your Learning <span class="font-serif italic text-brand-500 font-medium">Ecosystem?</span>
                </h2>
                <p class="text-lg text-blue-100 mb-12 max-w-2xl mx-auto">
                    Speak with our team or explore a guided demo to see how Agunfon can support your LMS goals
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                    <a href="/book-demo" class="w-full sm:w-auto px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all shadow-lg">Book a Demo</a>
                    <a href="/contact" class="w-full sm:w-auto px-10 py-4 bg-white text-brand-900 font-bold rounded-xl hover:bg-gray-50 transition-all">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
@endsection
