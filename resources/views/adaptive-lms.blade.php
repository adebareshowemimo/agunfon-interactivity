@extends('layouts.app')

@section('title', 'Adaptive LMS - Agunfon Enterprise Learning Platform')

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
                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=2070&auto=format&fit=crop" alt="Dashboard Mockup" class="w-full h-auto rounded-[36px]">
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
            <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?q=80&w=2070&auto=format&fit=crop" alt="Professional Working" class="rounded-[32px] shadow-soft h-[300px] w-full object-cover">
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
<section class="py-24 px-6 lg:px-12">
    <div class="max-w-[1440px] mx-auto grid lg:grid-cols-2 gap-10">
        <!-- Left Image Card -->
        <div class="relative rounded-[40px] overflow-hidden min-h-[600px] group">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop" alt="Team Background" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
            <div class="absolute inset-0 bg-brand-700/80"></div>
            <div class="absolute inset-0 p-16 flex items-center">
                <h2 class="text-5xl font-bold text-white max-w-sm leading-tight">
                    Why Choose the Agunfon <span class="text-brand-500">Adaptive LMS?</span>
                </h2>
            </div>
        </div>
        <!-- Right Feature Cards -->
        <div class="space-y-4">
            <div class="p-8 bg-brand-50 rounded-[32px] border border-blue-50 card-hover">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Versatile Multi-Tenant Architecture</h3>
                <p class="text-sm text-gray-600">Organize learning by departments, divisions, regions, or subsidiaries — each with its own courses, dashboards, and permissions — while maintaining enterprise-wide oversight.</p>
            </div>
            <div class="p-8 bg-brand-50 rounded-[32px] border border-blue-50 card-hover">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Personalized Learning Experiences</h3>
                <p class="text-sm text-gray-600">Automatically assign training based on role, department, performance, or compliance needs. Deliver adaptive pathways tailored to each learner.</p>
            </div>
            <div class="p-8 bg-brand-50 rounded-[32px] border border-blue-50 card-hover">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Meaningful, Real-Time Insights</h3>
                <p class="text-sm text-gray-600">Monitor compliance, competencies, completion rates, and performance trends using powerful dashboards and cross-tenant reporting.</p>
            </div>
            <div class="p-8 bg-brand-50 rounded-[32px] border border-blue-50 card-hover">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Learn Anywhere — On Any Device</h3>
                <p class="text-sm text-gray-600">Support desktop, tablet, mobile, and offline access. Ideal for office teams, remote workers, and field operations.</p>
            </div>
            <div class="p-8 bg-brand-50 rounded-[32px] border border-blue-50 card-hover">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Full Enterprise Integrations</h3>
                <p class="text-sm text-gray-600 mb-4">Connect with your existing systems, including HRIS (BambooHR, SAP), CRM, and identity management tools.</p>
                <div class="flex flex-wrap gap-4 text-xs font-bold text-gray-400">
                    <span class="uppercase">• HRIS</span>
                    <span class="uppercase">• CRM platforms</span>
                    <span class="uppercase">• Finance systems</span>
                    <span class="uppercase">• Active Directory / SSO</span>
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
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1000&auto=format&fit=crop" alt="Workforce" class="w-full h-48 object-cover rounded-2xl mb-6">
            <h3 class="text-xl font-bold text-brand-700 mb-4">Workforce Learning Automation</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Organize learning by departments, divisions, regions, or subsidiaries — each with its own courses, dashboards, and permissions.</p>
        </div>
        <!-- Feature 2 -->
        <div class="bg-brand-700 rounded-[32px] p-8 text-white card-hover overflow-hidden relative">
            <div class="relative z-10">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1000&auto=format&fit=crop" alt="Dashboard" class="w-full h-40 object-cover rounded-xl mb-6 opacity-80">
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
            <p class="text-gray-500">The Adaptive LMS is designed for organizations that need</p>
        </div>
        <div class="max-w-5xl mx-auto rounded-[40px] overflow-hidden shadow-soft mb-16">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070&auto=format&fit=crop" alt="Team Collaboration" class="w-full h-[500px] object-cover">
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
<section class="py-24 px-6 lg:px-12 bg-white">
    <div class="max-w-[1440px] mx-auto">
        <div class="text-center mb-16">
            <div class="flex justify-center -space-x-2 mb-6">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-white object-cover">
                <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=100&h=100&fit=crop" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-white object-cover">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100&h=100&fit=crop" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-white object-cover">
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-white object-cover">
            </div>
            <h2 class="text-4xl font-bold text-brand-700 mb-4">Client Success Story</h2>
            <p class="text-gray-500">Insights from clients who rely on Agunfon to power their learning, compliance, and<br>workforce development</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-8 bg-white border border-gray-100 rounded-[32px] shadow-soft flex flex-col">
                <iconify-icon icon="fa:quote-left" class="text-2xl text-blue-200 mb-6"></iconify-icon>
                <p class="text-sm text-gray-600 mb-8 leading-relaxed">
                    Agunfon transformed the way we deliver training. Courses became easier to manage, engagement increased, and compliance improved across the board.
                </p>
                <div class="mt-auto flex items-center gap-3">
                    <div class="w-10 h-10 bg-brand-500 rounded-full flex items-center justify-center text-white font-bold text-xs">OZ</div>
                    <div>
                        <p class="text-sm font-bold">Olateju Zainab</p>
                        <p class="text-[10px] text-gray-500 uppercase">HR Manager, Promasidor</p>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-white border border-gray-100 rounded-[32px] shadow-soft flex flex-col">
                <iconify-icon icon="fa:quote-left" class="text-2xl text-blue-200 mb-6"></iconify-icon>
                <p class="text-sm text-gray-600 mb-8 leading-relaxed">
                    With Agunfon, onboarding finally became structured and predictable. New hires now hit productivity faster, and our HR team spends less time chasing manual tasks.
                </p>
                <div class="mt-auto flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100&h=100&fit=crop" alt="User" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-bold">Alice Windows</p>
                        <p class="text-[10px] text-gray-500 uppercase">Talent Development, KPMG</p>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-white border border-gray-100 rounded-[32px] shadow-soft flex flex-col">
                <iconify-icon icon="fa:quote-left" class="text-2xl text-blue-200 mb-6"></iconify-icon>
                <p class="text-sm text-gray-600 mb-8 leading-relaxed">
                    Agunfon helped us unify learning across multiple branches. Reporting is clearer, managers are more engaged, and our overall learning culture has visibly improved.
                </p>
                <div class="mt-auto flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=100&h=100&fit=crop" alt="User" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-bold">Taiye Arovjehun</p>
                        <p class="text-[10px] text-gray-500 uppercase">Logic Lead, Lafarge</p>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-white border border-gray-100 rounded-[32px] shadow-soft flex flex-col opacity-50">
                <iconify-icon icon="fa:quote-left" class="text-2xl text-blue-200 mb-6"></iconify-icon>
                <p class="text-sm text-gray-600 mb-8 leading-relaxed">
                    The automated tracking means I no longer worry about renewal dates for certifications. Everything runs smoothly and the UI is intuitive for all our employees.
                </p>
                <div class="mt-auto flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&h=100&fit=crop" alt="User" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-bold">Chinenye N.</p>
                        <p class="text-[10px] text-gray-500 uppercase">Compliance, Diamond</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
