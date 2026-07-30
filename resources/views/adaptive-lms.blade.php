@extends('layouts.app')

@section('title', 'Adaptive LMS - Agunfon Enterprise Learning Platform')
@section('description', 'Agunfon\'s Adaptive LMS personalizes every learning path, scales to enterprise teams, and turns training activity into measurable outcomes.')

@push('styles')
<style>
    .font-accent {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        font-weight: 500;
    }
    .bg-grid-pattern {
        background-image: radial-gradient(rgb(75, 139, 232) 0.5px, transparent 0.5px);
        background-size: 24px 24px;
        opacity: 0.05;
    }
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px -5px rgba(15, 61, 122, 0.12);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="pt-12 pb-20 px-6 lg:px-12 max-w-[1440px] mx-auto">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="max-w-2xl">
            <h1 class="text-5xl lg:text-[64px] font-bold text-brand-700 leading-[1.1] mb-8">
                <span class="font-accent text-brand-500 font-normal">Unlock</span> Enterprise Learning With Agunfon <span class="text-brand-500">Adaptive LMS</span>
            </h1>
            <p class="text-lg text-gray-500 mb-10 leading-relaxed max-w-lg">
                A flexible, enterprise-grade learning platform built for complex structures, automated workflows, and personalized learning at scale. Whether managing multiple departments, branches, or subsidiaries, the Agunfon Adaptive LMS brings clarity, governance, and efficiency to the entire organization
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="/book-demo" class="px-8 py-3.5 bg-gray-900 text-white font-bold rounded-xl hover:bg-black transition-all shadow-md">Book a Demo</a>
            </div>
        </div>
        <div class="relative">
            <div class="bg-white rounded-[40px] shadow-soft p-2 border border-gray-100">
                <img src="/images/brand-2026/adaptive-lms-product-team.webp" alt="Dashboard Mockup" class="w-full h-auto rounded-[36px]">
            </div>
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-grid-pattern z-[-1]"></div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-24 px-6 lg:px-12 bg-white max-w-[1440px] mx-auto">
    <div class="mb-12">
        <h2 class="text-4xl font-bold text-brand-700">Overview</h2>
    </div>
    <div class="grid lg:grid-cols-3 gap-16 items-start">
        <div class="space-y-6">
            <p class="text-gray-600 text-lg leading-relaxed">
                The Agunfon Adaptive LMS is engineered for enterprises that require a powerful, unified platform to manage large teams, diverse training needs, and multi-layered organizational structures.
            </p>
            <p class="text-gray-600 text-lg leading-relaxed">
                Built on the robust Moodle Workplace architecture, it enhances traditional LMS capabilities with automation, multi-tenancy, advanced analytics and seamless integrations.
            </p>
        </div>
        <div class="flex justify-center">
            <img src="/images/brand-2026/enterprise-learning-strategy-workshop.webp" alt="Professional Working" class="rounded-[32px] shadow-soft h-[300px] w-full object-cover">
        </div>
        <div class="space-y-12">
            <p class="text-gray-600 text-lg leading-relaxed">
                It is the ideal solution for organizations seeking to streamline onboarding, compliance, continuous learning, and workforce development — all through one secure and scalable system.
            </p>
            <div class="flex gap-12">
                <div>
                    <div class="text-4xl font-bold text-brand-500">20+</div>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mt-2">Top organizations<br>are using agunfon<br>learning suite</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-brand-500">4.8 <span class="text-xl">★</span></div>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mt-2">Rating per user<br>feedback</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Section -->
<section class="py-24 px-6 lg:px-12 bg-white">
    <div class="max-w-[1440px] mx-auto grid lg:grid-cols-[0.95fr_1.05fr] gap-8 lg:gap-10 items-stretch">
        <!-- Left Image Card -->
        <div class="relative rounded-[40px] overflow-hidden min-h-[520px] lg:min-h-full group shadow-soft">
            <img src="/images/brand-2026/agunfon-lagos-consultants-hero.webp" alt="Team Background" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
            <div class="absolute inset-0 bg-brand-700/80"></div>
            <div class="absolute inset-0 p-8 md:p-12 lg:p-14 flex items-center">
                <h2 class="text-4xl md:text-5xl font-bold text-white max-w-sm leading-tight">
                    Why Choose the Agunfon <span class="text-brand-500">Adaptive LMS?</span>
                </h2>
            </div>
        </div>
        <!-- Right Feature Cards -->
        <div class="grid sm:grid-cols-2 gap-5">
            <div class="p-6 lg:p-7 bg-white rounded-[24px] border border-brand-100 shadow-soft card-hover">
                <div class="w-11 h-11 rounded-2xl bg-brand-50 text-brand-700 flex items-center justify-center mb-5"><iconify-icon icon="lucide:network" class="text-xl"></iconify-icon></div>
                <h3 class="text-lg font-bold text-brand-700 mb-2 leading-snug">Versatile Multi-Tenant Architecture</h3>
                <p class="text-sm leading-relaxed text-gray-600">Organise learning by department, division, region or subsidiary, while maintaining enterprise-wide oversight.</p>
            </div>
            <div class="p-6 lg:p-7 bg-white rounded-[24px] border border-brand-100 shadow-soft card-hover">
                <div class="w-11 h-11 rounded-2xl bg-brand-50 text-brand-700 flex items-center justify-center mb-5"><iconify-icon icon="lucide:user-round-check" class="text-xl"></iconify-icon></div>
                <h3 class="text-lg font-bold text-brand-700 mb-2 leading-snug">Personalised Learning Experiences</h3>
                <p class="text-sm leading-relaxed text-gray-600">Automatically assign training by role, department, performance or compliance need, with pathways tailored to each learner.</p>
            </div>
            <div class="p-6 lg:p-7 bg-white rounded-[24px] border border-brand-100 shadow-soft card-hover">
                <div class="w-11 h-11 rounded-2xl bg-brand-50 text-brand-700 flex items-center justify-center mb-5"><iconify-icon icon="lucide:chart-no-axes-combined" class="text-xl"></iconify-icon></div>
                <h3 class="text-lg font-bold text-brand-700 mb-2 leading-snug">Meaningful, Real-Time Insights</h3>
                <p class="text-sm leading-relaxed text-gray-600">Monitor compliance, competencies, completion rates and performance trends through cross-tenant reporting.</p>
            </div>
            <div class="p-6 lg:p-7 bg-white rounded-[24px] border border-brand-100 shadow-soft card-hover">
                <div class="w-11 h-11 rounded-2xl bg-brand-50 text-brand-700 flex items-center justify-center mb-5"><iconify-icon icon="lucide:devices" class="text-xl"></iconify-icon></div>
                <h3 class="text-lg font-bold text-brand-700 mb-2 leading-snug">Learn Anywhere, on Any Device</h3>
                <p class="text-sm leading-relaxed text-gray-600">Support desktop, tablet, mobile and offline access for office teams, remote workers and field operations.</p>
            </div>
            <div class="sm:col-span-2 p-6 lg:p-7 bg-brand-700 rounded-[24px] shadow-soft card-hover text-white">
                <div class="flex flex-col md:flex-row md:items-center gap-5 md:gap-7">
                    <div class="w-11 h-11 rounded-2xl bg-white/10 text-white flex items-center justify-center shrink-0"><iconify-icon icon="lucide:plug-zap" class="text-xl"></iconify-icon></div>
                    <div class="min-w-0 flex-1">
                        <h3 class="text-lg font-bold mb-2">Full Enterprise Integrations</h3>
                        <p class="text-sm leading-relaxed text-blue-100">Connect the LMS with the systems your organisation already uses.</p>
                    </div>
                    <div class="flex flex-wrap gap-2 md:max-w-sm">
                        <span class="px-3 py-1.5 rounded-full bg-white/10 text-xs font-semibold">HRIS</span>
                        <span class="px-3 py-1.5 rounded-full bg-white/10 text-xs font-semibold">CRM</span>
                        <span class="px-3 py-1.5 rounded-full bg-white/10 text-xs font-semibold">Finance</span>
                        <span class="px-3 py-1.5 rounded-full bg-white/10 text-xs font-semibold">Active Directory / SSO</span>
                    </div>
                </div>
            </div>
            <div class="p-8 bg-brand-50 rounded-[32px] border border-blue-50 card-hover">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Workflow Automation</h3>
                <p class="text-sm text-gray-600">Automate enrollments, reminders, certification renewals, approvals, and onboarding processes — reducing manual workload.</p>
            </div>
        </div>
    </div>
</section>

<!-- Core Features Grid -->
<section class="py-24 px-6 lg:px-12 max-w-[1440px] mx-auto">
    <div class="max-w-2xl mb-16">
        <h2 class="text-4xl font-bold text-brand-700 leading-tight">
            Agunfon enterprise-focused Adaptive LMS core <span class="font-accent text-brand-500">features</span>
        </h2>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="bg-white border border-gray-100 rounded-[32px] p-8 shadow-soft card-hover">
            <img src="/images/brand-2026/adaptive-lms-product-team.webp" alt="Workforce" class="w-full h-48 object-cover rounded-2xl mb-6">
            <h3 class="text-xl font-bold text-brand-700 mb-4">Workforce Learning Automation</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Organize learning by departments, divisions, regions, or subsidiaries — each with its own courses, dashboards, and permissions.</p>
        </div>
        <!-- Feature 2 -->
        <div class="bg-brand-700 rounded-[32px] p-8 text-white card-hover overflow-hidden relative">
            <div class="relative z-10">
                <img src="/images/brand-2026/enterprise-learning-strategy-workshop.webp" alt="Dashboard" class="w-full h-40 object-cover rounded-xl mb-6 opacity-80">
                <h3 class="text-xl font-bold mb-4">Organizational Dashboards</h3>
                <p class="text-blue-100 text-sm opacity-80 leading-relaxed">Each tenant can have its own branded dashboard with tailored metrics, deadlines, tasks, and announcements.</p>
            </div>
        </div>
        <!-- Feature 3 -->
        <div class="bg-white border border-gray-100 rounded-[32px] p-8 shadow-soft card-hover">
            <div class="w-full h-48 bg-gray-50 rounded-2xl mb-6 flex items-center justify-center">
                <iconify-icon icon="lucide:lock" class="text-6xl text-brand-700 opacity-20"></iconify-icon>
            </div>
            <h3 class="text-xl font-bold text-brand-700 mb-4">Advanced Security & Permissions</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Control access with precision across administrators, managers, trainers, auditors, and learners.</p>
        </div>
        <!-- Feature 4 -->
        <div class="bg-white border border-gray-100 rounded-[32px] p-8 shadow-soft card-hover">
            <div class="w-full h-48 bg-gray-50 rounded-2xl mb-6 flex items-center justify-center">
                <iconify-icon icon="lucide:network" class="text-6xl text-brand-700 opacity-20"></iconify-icon>
            </div>
            <h3 class="text-xl font-bold text-brand-700 mb-4">Competency Frameworks</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Track skills development, map learning to competencies, and conduct gap analysis to support talent initiatives.</p>
        </div>
        <!-- Feature 5 -->
        <div class="bg-brand-700 rounded-[32px] p-8 text-white card-hover relative group">
            <div class="relative z-10">
                <div class="w-full h-40 bg-white/10 rounded-xl mb-6 flex items-center justify-center">
                    <iconify-icon icon="lucide:database" class="text-5xl opacity-40"></iconify-icon>
                </div>
                <h3 class="text-xl font-bold mb-4">Enterprise Data Management</h3>
                <p class="text-blue-100 text-sm opacity-80 leading-relaxed">Manage audit trails, compliance records, user provisioning, and system-wide reporting with enterprise-grade governance.</p>
            </div>
        </div>
        <!-- Feature 6 -->
        <div class="bg-white border border-gray-100 rounded-[32px] p-8 shadow-soft card-hover">
            <div class="w-full h-48 bg-gray-50 rounded-2xl mb-6 flex items-center justify-center">
                <iconify-icon icon="lucide:bar-chart-3" class="text-6xl text-brand-700 opacity-20"></iconify-icon>
            </div>
            <h3 class="text-xl font-bold text-brand-700 mb-4">Real-Time Reporting</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Generate deep insights and scheduled reports directly to stakeholders across the organization.</p>
        </div>
    </div>
</section>

<!-- Use Cases Section -->
<section class="py-24 px-6 lg:px-12 bg-brand-50">
    <div class="max-w-[1440px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-brand-700 mb-4">Use Cases for Agunfon <span class="text-brand-500">Adaptive LMS</span></h2>
            <p class="text-gray-500">Designed for organisations that need flexibility without losing enterprise-wide control.</p>
        </div>
        <div class="max-w-5xl mx-auto rounded-[40px] overflow-hidden shadow-soft mb-16">
            <img src="/images/brand-2026/enterprise-learning-strategy-workshop.webp" alt="Agunfon consultant leading an enterprise learning strategy workshop" class="w-full h-[360px] md:h-[500px] object-cover object-center">
        </div>
        <div class="grid md:grid-cols-2 gap-6 max-w-5xl mx-auto">
            <div class="bg-white p-5 rounded-2xl border border-blue-50 flex items-center gap-4">
                <iconify-icon icon="lucide:check-circle-2" class="text-2xl text-brand-500"></iconify-icon>
                <span class="font-bold text-brand-700">Department-level autonomy with centralized oversight</span>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-blue-50 flex items-center gap-4">
                <iconify-icon icon="lucide:check-circle-2" class="text-2xl text-brand-500"></iconify-icon>
                <span class="font-bold text-brand-700">Complex onboarding workflows</span>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-blue-50 flex items-center gap-4">
                <iconify-icon icon="lucide:check-circle-2" class="text-2xl text-brand-500"></iconify-icon>
                <span class="font-bold text-brand-700">Compliance and certification tracking at scale</span>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-blue-50 flex items-center gap-4">
                <iconify-icon icon="lucide:check-circle-2" class="text-2xl text-brand-500"></iconify-icon>
                <span class="font-bold text-brand-700">Partner or contractor training portals</span>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-blue-50 flex items-center gap-4">
                <iconify-icon icon="lucide:check-circle-2" class="text-2xl text-brand-500"></iconify-icon>
                <span class="font-bold text-brand-700">Multi-country learning delivery</span>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-blue-50 flex items-center gap-4">
                <iconify-icon icon="lucide:check-circle-2" class="text-2xl text-brand-500"></iconify-icon>
                <span class="font-bold text-brand-700">High-volume user management</span>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-blue-50 flex items-center gap-4 md:col-span-2">
                <iconify-icon icon="lucide:check-circle-2" class="text-2xl text-brand-500"></iconify-icon>
                <span class="font-bold text-brand-700">Advanced analytics for leadership, HR, and compliance teams</span>
            </div>
        </div>
    </div>
</section>

<!-- Client Success Stories -->
@include('components.testimonials')

<!-- CTA Section -->
<section class="py-24 px-6 lg:px-12">
    <div class="max-w-5xl mx-auto bg-brand-700 rounded-[48px] p-12 lg:p-20 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
        <div class="relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to Transform Your <br>
                <span class="font-accent text-brand-500">Enterprise Learning?</span>
            </h2>
            <p class="text-blue-100 mb-12 max-w-xl mx-auto opacity-80">
                See how the Agunfon Adaptive LMS enhances efficiency, automates training, and scales learning across your entire organization
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="/book-demo" class="w-full sm:w-auto px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:shadow-lg transition-all">Book a Demo</a>
                <a href="/contact" class="w-full sm:w-auto px-10 py-4 bg-white text-brand-700 font-bold rounded-xl hover:shadow-lg transition-all">Contact Agunfon</a>
            </div>
        </div>
    </div>
</section>
@endsection
