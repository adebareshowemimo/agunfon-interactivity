@extends('layouts.app')

@section('title', 'Learning Suite - Agunfon LMS')

@push('styles')
<style>
    .font-accent {
        font-family: 'Playfair Display', serif;
        font-style: italic;
    }
    .bg-grid-pattern {
        background-image: radial-gradient(rgb(75, 139, 232) 0.5px, transparent 0.5px);
        background-size: 24px 24px;
        opacity: 0.1;
    }
    .bento-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .bento-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 30px -5px rgba(15, 61, 122, 0.2);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="pt-12 pb-20 px-6 lg:px-12 max-w-[1440px] mx-auto">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="max-w-2xl">
            <h1 class="text-5xl lg:text-7xl font-bold text-brand-700 leading-[1.1] mb-8">
                <span class="font-accent text-brand-500 font-normal">Transform</span> Learning With the Agunfon Learning Suite
            </h1>
            <p class="text-lg text-gray-500 mb-10 leading-relaxed">
                Instant access to expertly crafted, off-the-shelf courses across webinars, and tools that support smarter modern, flexible learning environment powered by Agunfon
            </p>
            <a href="/contact" class="inline-block px-10 py-4 bg-gray-900 text-white font-semibold rounded-lg hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                Book a Demo
            </a>
        </div>
        <div class="relative">
            <div class="rounded-[32px] overflow-hidden shadow-float bg-white p-2">
                <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=2070&auto=format&fit=crop" alt="Learning Suite Mockup" class="w-full h-auto rounded-[28px] border border-gray-100">
            </div>
            <div class="absolute -top-6 -right-6 w-32 h-32 bg-grid-pattern z-[-1]"></div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-20 px-6 lg:px-12 max-w-[1440px] mx-auto">
    <div class="mb-12">
        <h2 class="text-4xl font-bold text-brand-700 mb-8">Overview</h2>
    </div>
    <div class="flex flex-col lg:flex-row gap-12 items-start">
        <div class="flex-1 text-gray-600 text-lg leading-relaxed">
            The Agunfon Learning Suite is a curated catalog of high-quality, ready-made courses designed to accelerate employee development and simplify organizational learning. Built by subject-matter experts and structured for real-world impact, it enables teams to learn faster, stay compliant, and grow with confidence, without the cost or delay of building content from scratch.
        </div>
        <div class="flex-1 flex justify-center">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop" alt="Team Learning" class="rounded-[24px] shadow-soft w-full max-w-md h-64 object-cover">
        </div>
        <div class="flex-1">
            <p class="text-gray-600 mb-8 text-lg">
                Whether onboarding new hires, upskilling teams, strengthening compliance, or building continuous learning pathways, the Agunfon Learning Suite provides immediate access to intelligent, industry-aligned learning experiences that match your goals.
            </p>
            <div class="flex gap-12">
                <div>
                    <div class="text-3xl font-bold text-brand-500">20+</div>
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Top Organizations<br>using Agunfon Learning Suite</p>
                </div>
                <div>
                    <div class="text-3xl font-bold text-brand-500">4.8 <span class="text-xl">★</span></div>
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Rating per user<br>feedback</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Section -->
<section class="py-20 px-6 lg:px-12">
    <div class="max-w-[1440px] mx-auto grid lg:grid-cols-2 gap-10">
        <div class="relative rounded-[32px] overflow-hidden h-[600px] flex items-center px-12">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop" alt="Background" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-brand-700/80"></div>
            <div class="relative z-10 max-w-sm">
                <h2 class="text-4xl font-bold text-white mb-6">
                    Why Choose the Agunfon <span class="text-brand-500">Learning Suite?</span>
                </h2>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <div class="p-8 rounded-[24px] bg-brand-50 border border-brand-200 shadow-soft group hover:bg-brand-200 transition-all">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Wide Course Variety</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Covering HR, compliance, leadership, sales, customer service, IT, workplace wellness, health & safety, and more.</p>
            </div>
            <div class="p-8 rounded-[24px] bg-brand-50 border border-brand-200 shadow-soft group hover:bg-brand-200 transition-all">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Industry-Specific Learning Paths</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Purpose-built for Finance, Healthcare, Education, Retail, Manufacturing, Government, Non-Profit, and Corporate sectors.</p>
            </div>
            <div class="p-8 rounded-[24px] bg-brand-50 border border-brand-200 shadow-soft group hover:bg-brand-200 transition-all">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Flexibility & Rapid Deployment</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Start delivering training in minutes — not months.</p>
            </div>
            <div class="p-8 rounded-[24px] bg-brand-50 border border-brand-200 shadow-soft group hover:bg-brand-200 transition-all">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Engaging, Expert-Crafted Content</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Featuring videos, quizzes, real-world scenarios, and interactive modules.</p>
            </div>
            <div class="p-8 rounded-[24px] bg-brand-50 border border-brand-200 shadow-soft group hover:bg-brand-200 transition-all">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Mobile-First Learning</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Access anywhere, on any device.</p>
            </div>
            <div class="p-8 rounded-[24px] bg-brand-50 border border-brand-200 shadow-soft group hover:bg-brand-200 transition-all">
                <h3 class="text-xl font-bold text-brand-700 mb-2">Continuous Content Update</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Stay aligned with industry standards, emerging trends, and compliance requirements.</p>
            </div>
        </div>
    </div>
</section>

<!-- Bento Grid Capabilities Section -->
<section class="py-24 px-6 lg:px-12 max-w-[1440px] mx-auto">
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-brand-700 mb-4">
            Agunfon learning suite core <span class="font-accent text-brand-500">capabilities</span>
        </h2>
        <p class="text-gray-500">Trusted by forward-thinking institutions shaping the future of work and learning</p>
    </div>

    <div class="grid grid-cols-12 gap-6">
        <!-- Card 1: Extensive Course Library -->
        <div class="col-span-12 lg:col-span-5 bg-brand-700 rounded-[32px] p-10 text-white bento-card flex flex-col justify-between">
            <div class="mb-8">
                <div class="inline-block bg-white text-brand-700 px-4 py-2 rounded-lg font-bold mb-10 shadow-lg">
                    120+ Courses
                </div>
                <h3 class="text-3xl font-bold mb-4">Extensive Course Library</h3>
                <p class="text-blue-100 text-sm opacity-80 leading-relaxed">
                    Explore hundreds of ready-to-use courses across essential skills, compliance topics, and professional development areas.
                </p>
            </div>
            <div class="relative flex justify-center">
                <div class="w-full h-40 bg-white/10 rounded-xl flex items-center justify-center border border-white/20">
                    <iconify-icon icon="lucide:library" class="text-7xl opacity-30"></iconify-icon>
                </div>
            </div>
        </div>

        <!-- Card 2: Structured Learning Paths -->
        <div class="col-span-12 lg:col-span-7 bg-brand-700 rounded-[32px] p-10 text-white bento-card relative overflow-hidden flex flex-col md:flex-row gap-8 items-center">
            <div class="flex-1 order-2 md:order-1">
                <div class="space-y-4 max-w-[280px]">
                    <div class="bg-white/10 p-3 rounded-lg border border-white/10 flex items-center justify-between">
                        <span class="text-xs">Certified Financial Analysis & Compliance</span>
                        <iconify-icon icon="lucide:check-circle" class="text-green-400"></iconify-icon>
                    </div>
                    <div class="bg-white/10 p-3 rounded-lg border border-white/10 flex items-center justify-between">
                        <span class="text-xs">Risk Management, Reporting & Regulatory Standards</span>
                        <iconify-icon icon="lucide:check-circle" class="text-green-400"></iconify-icon>
                    </div>
                    <div class="bg-white/10 p-3 rounded-lg border border-white/10 flex items-center justify-between">
                        <span class="text-xs">Advanced Financial Analysis & Decision Making</span>
                        <iconify-icon icon="lucide:check-circle" class="text-green-400"></iconify-icon>
                    </div>
                </div>
            </div>
            <div class="flex-1 order-1 md:order-2">
                <h3 class="text-2xl font-bold mb-4">Structured Learning Paths</h3>
                <p class="text-blue-100 text-sm opacity-80">Streamline operations with intelligent automation that reduces manual tasks and accelerates delivery.</p>
            </div>
        </div>

        <!-- Card 3: Reporting & Analytics -->
        <div class="col-span-12 lg:col-span-6 bg-brand-50 border border-brand-200 rounded-[32px] p-10 bento-card flex flex-col md:flex-row gap-8 items-center">
            <div class="flex-1">
                <div class="w-full h-40 bg-brand-700/5 rounded-xl border border-brand-700/10 flex items-center justify-center">
                    <iconify-icon icon="lucide:bar-chart-3" class="text-6xl text-brand-700 opacity-20"></iconify-icon>
                </div>
            </div>
            <div class="flex-1">
                <h3 class="text-2xl font-bold text-brand-700 mb-4">Reporting & Analytics</h3>
                <p class="text-gray-500 text-sm">Monitor completion rates, engagement levels, compliance status, and skill development in real time.</p>
            </div>
        </div>

        <!-- Card 4: Assessment & Certification -->
        <div class="col-span-12 lg:col-span-6 bg-brand-700 rounded-[32px] p-10 text-white bento-card flex flex-col md:flex-row gap-8 items-center">
            <div class="flex-1">
                <div class="bg-white rounded-xl p-4 shadow-xl">
                    <div class="w-full h-24 bg-gray-100 rounded-lg flex items-center justify-center">
                        <iconify-icon icon="lucide:award" class="text-4xl text-brand-700"></iconify-icon>
                    </div>
                    <div class="mt-3">
                        <div class="h-2 w-20 bg-gray-200 rounded"></div>
                        <div class="h-1.5 w-full bg-gray-100 rounded mt-2"></div>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <h3 class="text-2xl font-bold mb-4">Assessment & Certification</h3>
                <p class="text-blue-100 text-sm opacity-80">Evaluate learning progress with built-in assessments and automated certificates.</p>
            </div>
        </div>

        <!-- Card 5: Multi-Device Access -->
        <div class="col-span-12 lg:col-span-5 bg-brand-700 rounded-[32px] p-10 text-white bento-card relative overflow-hidden min-h-[400px] flex flex-col justify-between">
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=2070&auto=format&fit=crop" alt="Team Meeting" class="absolute inset-0 w-full h-full object-cover opacity-20">
            <div class="relative z-10">
                <h3 class="text-3xl font-bold mb-4">Multi-Device Access</h3>
                <p class="text-blue-100 text-sm opacity-80 leading-relaxed">
                    Reliable access on desktop, tablet, or mobile — wherever your teams learn.
                </p>
            </div>
            <div class="relative z-10 flex gap-4">
                <iconify-icon icon="lucide:smartphone" class="text-3xl opacity-50"></iconify-icon>
                <iconify-icon icon="lucide:tablet" class="text-3xl opacity-50"></iconify-icon>
                <iconify-icon icon="lucide:monitor" class="text-3xl opacity-50"></iconify-icon>
            </div>
        </div>

        <!-- Card 6: Integrations & LMS Compatibility -->
        <div class="col-span-12 lg:col-span-7 bg-brand-50 border border-brand-200 rounded-[32px] p-10 bento-card flex flex-col md:flex-row gap-12 items-center">
            <div class="flex-1 flex items-center justify-center relative">
                <div class="grid grid-cols-2 gap-4">
                    <div class="w-16 h-16 bg-brand-700 rounded-xl flex items-center justify-center shadow-lg transform rotate-6">
                        <iconify-icon icon="logos:slack-icon" class="text-3xl"></iconify-icon>
                    </div>
                    <div class="w-16 h-16 bg-brand-500 rounded-xl flex items-center justify-center shadow-lg transform -rotate-12">
                        <iconify-icon icon="logos:microsoft-teams" class="text-3xl"></iconify-icon>
                    </div>
                    <div class="w-16 h-16 bg-white rounded-xl flex items-center justify-center shadow-lg border border-gray-100">
                        <iconify-icon icon="logos:zoom-icon" class="text-3xl"></iconify-icon>
                    </div>
                    <div class="w-16 h-16 bg-brand-900 rounded-xl flex items-center justify-center shadow-lg transform rotate-12">
                        <iconify-icon icon="lucide:cpu" class="text-3xl text-white"></iconify-icon>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <h3 class="text-2xl font-bold text-brand-700 mb-4">Integrations & LMS Compatibility</h3>
                <p class="text-gray-500 text-sm">Deploy seamlessly within Agunfon's LMS or integrate with your existing platform.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 px-6 lg:px-12 bg-white">
    <div class="max-w-[1440px] mx-auto">
        <div class="text-center mb-16">
            <div class="flex justify-center -space-x-3 mb-6">
                <img class="w-10 h-10 rounded-full border-2 border-white object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop" alt="User">
                <img class="w-10 h-10 rounded-full border-2 border-white object-cover" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=100&h=100&fit=crop" alt="User">
                <img class="w-10 h-10 rounded-full border-2 border-white object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop" alt="User">
                <img class="w-10 h-10 rounded-full border-2 border-white object-cover" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop" alt="User">
            </div>
            <h2 class="text-4xl font-bold text-brand-700 mb-4">
                What our <span class="font-accent text-brand-500">partners</span> are saying
            </h2>
            <p class="text-gray-500">Insights from clients who rely on Agunfon to power their learning, compliance, and<br>workforce development</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-8 bg-white border border-gray-100 rounded-[24px] shadow-soft">
                <iconify-icon icon="fa:quote-left" class="text-2xl text-blue-200 mb-6"></iconify-icon>
                <p class="text-sm text-gray-700 leading-relaxed mb-8">
                    Agunfon transformed the way we deliver training. Courses became easier to manage, engagement increased, and compliance improved across the board.
                </p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-brand-500 text-white rounded-full flex items-center justify-center font-bold text-xs">OZ</div>
                    <div>
                        <p class="text-sm font-bold">Olateju Zainab</p>
                        <p class="text-[10px] text-gray-500">HR Manager, Promasidor</p>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-white border border-gray-100 rounded-[24px] shadow-soft">
                <iconify-icon icon="fa:quote-left" class="text-2xl text-blue-200 mb-6"></iconify-icon>
                <p class="text-sm text-gray-700 leading-relaxed mb-8">
                    With Agunfon, onboarding finally became structured and predictable. New hires now hit productivity faster, and our HR team spends less time chasing manual tasks.
                </p>
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100&h=100&fit=crop" alt="User" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-bold">Alice Windows</p>
                        <p class="text-[10px] text-gray-500">Talent Development Lead, KPMG</p>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-white border border-gray-100 rounded-[24px] shadow-soft">
                <iconify-icon icon="fa:quote-left" class="text-2xl text-blue-200 mb-6"></iconify-icon>
                <p class="text-sm text-gray-700 leading-relaxed mb-8">
                    Agunfon helped us unify learning across multiple branches. Reporting is clearer, managers are more engaged, and our overall learning culture has visibly improved.
                </p>
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=100&h=100&fit=crop" alt="User" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-bold">Taiye Arovjehun</p>
                        <p class="text-[10px] text-gray-500">Logic Lead & Executive, Lafarge</p>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-white border border-gray-100 rounded-[24px] shadow-soft opacity-50">
                <iconify-icon icon="fa:quote-left" class="text-2xl text-blue-200 mb-6"></iconify-icon>
                <p class="text-sm text-gray-700 leading-relaxed mb-8">
                    The automated tracking means I no longer worry about renewal dates for certifications. Everything runs smoothly and the UI is intuitive for all our employees.
                </p>
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&h=100&fit=crop" alt="User" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-bold">Chinenye N.</p>
                        <p class="text-[10px] text-gray-500">Compliance Officer, Diamond</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ready to Explore CTA Section -->
<section class="py-24 px-6 lg:px-12">
    <div class="max-w-[1200px] mx-auto bg-brand-700 rounded-[48px] p-12 lg:p-20 text-center relative overflow-hidden">
        <!-- Decorative Mesh Background -->
        <div class="absolute inset-0 bg-brand-700 opacity-90"></div>
        <div class="absolute top-0 left-0 w-full h-full bg-grid-pattern opacity-10"></div>
        <div class="relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to Explore the Agunfon<br>
                <span class="font-accent text-brand-500 font-normal italic">Learning Suite?</span>
            </h2>
            <p class="text-blue-100 mb-12 max-w-xl mx-auto opacity-80">
                Empower your workforce with expert-built, industry-ready learning content
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="/contact" class="w-full sm:w-auto px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:shadow-lg transition-all transform hover:-translate-y-1">Book a Demo</a>
                <a href="/contact" class="w-full sm:w-auto px-10 py-4 bg-white text-brand-700 font-bold rounded-xl hover:shadow-lg transition-all transform hover:-translate-y-1">Contact Sales</a>
            </div>
        </div>
    </div>
</section>
@endsection
