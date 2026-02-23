@extends('layouts.app')

@section('title', 'Our Services - Agunfon Enterprise LMS')

@push('styles')
<style>
    .service-card-image {
        border-radius: 32px;
        box-shadow: 0 20px 40px -10px rgba(15, 61, 122, 0.12);
        overflow: hidden;
    }
    .feature-box {
        background-color: #E8F2FF;
        border-radius: 24px;
        padding: 24px;
    }
    .btn-dark {
        background-color: #111827;
        color: #ffffff;
        transition: all 0.3s ease;
    }
    .btn-dark:hover {
        background-color: #000000;
        transform: translateY(-2px);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-12 text-center">
    <div class="max-w-3xl mx-auto px-6">
        <h1 class="text-5xl font-bold text-brand-700 mb-6">Our Services</h1>
        <p class="text-gray-500 text-lg leading-relaxed">
            Each service is designed to help organizations build learning systems that are adaptive, future-ready, and built for real impact
        </p>
    </div>
</section>

<!-- Services Grid -->
<div class="max-w-7xl mx-auto px-6 space-y-32 pb-32">
    
    <!-- Service 1: LMS Implementation -->
    <section class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
        <div class="flex-1 order-2 lg:order-1">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">LMS Implementation</h2>
            <p class="text-gray-500 mb-8">
                Purpose-built for Finance, Healthcare, Education, Retail, Manufacturing, Government, Non-Profit, and Corporate sectors.
            </p>
            <div class="feature-box mb-8">
                <p class="text-sm font-bold text-brand-700 mb-4">What's Included</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Platform configuration and environment setup
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Custom branding and visual theme alignment
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Course and learning structure design
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Role mapping and user provisioning
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        HR, CRM, and identity system integrations
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Full testing, QA, and go-live support
                    </li>
                </ul>
            </div>
            <a href="/contact" class="btn-dark px-8 py-3.5 rounded-xl font-bold inline-block">Request a Consultation</a>
        </div>
        <div class="flex-1 order-1 lg:order-2 service-card-image">
            <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&q=80&w=1200" alt="LMS Implementation" class="w-full h-[500px] object-cover">
        </div>
    </section>

    <!-- Service 2: E-Learning Course Development -->
    <section class="flex flex-col lg:flex-row-reverse items-center gap-12 lg:gap-20">
        <div class="flex-1">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">E-Learning Course Development & Gamification</h2>
            <p class="text-gray-500 mb-8">
                Bring learning to life with expert-built digital courses designed for clarity, engagement, and measurable outcomes. From microlearning to gamification, we craft experiences that inspire real performance improvement.
            </p>
            <div class="feature-box mb-8">
                <p class="text-sm font-bold text-brand-700 mb-4">What's Included</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Custom course design and storyboarding
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Access to 120+ expertly built ready-made courses
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Gamification: points, badges, leaderboards
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Interactive quizzes and branching scenarios
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Animation, voice-over, and rich media development
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        SCORM, xAPI, and H5P compatibility
                    </li>
                </ul>
            </div>
            <a href="/contact" class="btn-dark px-8 py-3.5 rounded-xl font-bold inline-block">Request a Consultation</a>
        </div>
        <div class="flex-1 service-card-image border-8 border-brand-700/5">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=1200" alt="E-Learning Development" class="w-full h-[500px] object-cover">
        </div>
    </section>

    <!-- Service 3: UI/UX Design -->
    <section class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
        <div class="flex-1 order-2 lg:order-1">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">UI/UX Design for Learning Systems</h2>
            <p class="text-gray-500 mb-8">
                Create intuitive, learner-first digital experiences. Our UI/UX experts redesign interfaces to feel modern, responsive, and visually aligned with your brand — enhancing clarity, navigation, and engagement.
            </p>
            <div class="feature-box mb-8">
                <p class="text-sm font-bold text-brand-700 mb-4">What's Included</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        LMS UI redesign and theme refinement
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        User journey mapping
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Accessibility and responsive design
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Dashboard and course interface design
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Interaction patterns and micro-interactions
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Usability testing and optimization
                    </li>
                </ul>
            </div>
            <a href="/contact" class="btn-dark px-8 py-3.5 rounded-xl font-bold inline-block">Request a Consultation</a>
        </div>
        <div class="flex-1 order-1 lg:order-2 service-card-image">
            <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?auto=format&fit=crop&q=80&w=1200" alt="UI/UX Design" class="w-full h-[500px] object-cover">
        </div>
    </section>

    <!-- Service 4: Website & Web App Dev -->
    <section class="flex flex-col lg:flex-row-reverse items-center gap-12 lg:gap-20">
        <div class="flex-1">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">Website & Web Application Development</h2>
            <p class="text-gray-500 mb-8">
                Transform your digital presence with secure, scalable websites and applications. From corporate sites to learning extensions, we develop solutions built for performance and long-term growth.
            </p>
            <div class="feature-box mb-8">
                <p class="text-sm font-bold text-brand-700 mb-4">What's Included</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Corporate website design and development
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        LMS-connected portals and learning sites
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Custom modules and dashboards
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        API development and third-party integrations
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Secure hosting and infrastructure setup
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Performance optimization and maintenance
                    </li>
                </ul>
            </div>
            <a href="/contact" class="btn-dark px-8 py-3.5 rounded-xl font-bold inline-block">Request a Consultation</a>
        </div>
        <div class="flex-1 service-card-image">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1200" alt="Web Development" class="w-full h-[500px] object-cover">
        </div>
    </section>

    <!-- Service 5: Moodle Mobile -->
    <section class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
        <div class="flex-1 order-2 lg:order-1">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">Moodle Mobile Application Development</h2>
            <p class="text-gray-500 mb-8">
                Extend learning beyond the desktop. We build branded Moodle mobile apps that deliver seamless, on-the-go learning — even without internet access.
            </p>
            <div class="feature-box mb-8">
                <p class="text-sm font-bold text-brand-700 mb-4">What's Included</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Fully branded mobile applications
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Offline learning functionality
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Push notifications and reminders
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Progress syncing and reporting
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Mobile UI/UX enhancements
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        App Store and Play Store deployment
                    </li>
                </ul>
            </div>
            <a href="/contact" class="btn-dark px-8 py-3.5 rounded-xl font-bold inline-block">Request a Consultation</a>
        </div>
        <div class="flex-1 order-1 lg:order-2 service-card-image">
            <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&q=80&w=1200" alt="Moodle Mobile" class="w-full h-[500px] object-cover">
        </div>
    </section>

    <!-- Service 6: HR System Automation -->
    <section class="flex flex-col lg:flex-row-reverse items-center gap-12 lg:gap-20">
        <div class="flex-1">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">HR System Automation</h2>
            <p class="text-gray-500 mb-8">
                Integrate and automate HR processes to reduce manual work and support a more connected employee experience. Connect your HR tools directly to your learning ecosystem for smoother operations.
            </p>
            <div class="feature-box mb-8">
                <p class="text-sm font-bold text-brand-700 mb-4">What's Included</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Onboarding, confirmation, and exit workflow automation
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Attendance and leave system integrations
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Performance and learning workflow alignment
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        HRIS data synchronization
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Automated reminders, tasks, and reports
                    </li>
                </ul>
            </div>
            <a href="/contact" class="btn-dark px-8 py-3.5 rounded-xl font-bold inline-block">Request a Consultation</a>
        </div>
        <div class="flex-1 service-card-image">
            <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&q=80&w=1200" alt="HR Automation" class="w-full h-[500px] object-cover">
        </div>
    </section>

    <!-- Service 7: Processes & Integration -->
    <section class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
        <div class="flex-1 order-2 lg:order-1">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">Processes & Integration</h2>
            <p class="text-gray-500 mb-8">
                Create a unified digital environment by integrating your LMS with existing enterprise systems. We help organizations streamline data flow and strengthen decision-making with connected systems.
            </p>
            <div class="feature-box mb-8">
                <p class="text-sm font-bold text-brand-700 mb-4">What's Included</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Integration with HR, CRM, ERP and Finance systems
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Single Sign-On (SSO) implementation
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Automated cross-system data flows
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        API customization
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Workflow mapping and process auditing
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Interoperability testing
                    </li>
                </ul>
            </div>
            <a href="/contact" class="btn-dark px-8 py-3.5 rounded-xl font-bold inline-block">Request a Consultation</a>
        </div>
        <div class="flex-1 order-1 lg:order-2 service-card-image">
            <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&q=80&w=1200" alt="Integration" class="w-full h-[500px] object-cover">
        </div>
    </section>

    <!-- Service 8: Project Management -->
    <section class="flex flex-col lg:flex-row-reverse items-center gap-12 lg:gap-20">
        <div class="flex-1">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">Project Management</h2>
            <p class="text-gray-500 mb-8">
                Deliver learning initiatives with clarity and discipline. Our project managers lead planning, communication, risk management, and execution to ensure every project lands on time and in scope.
            </p>
            <div class="feature-box mb-8">
                <p class="text-sm font-bold text-brand-700 mb-4">What's Included</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Detailed project planning and documentation
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Agile delivery frameworks
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Stakeholder communication and reporting
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Milestone and risk management
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        QA, testing, and launch coordination
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Rollout and adoption planning
                    </li>
                </ul>
            </div>
            <a href="/contact" class="btn-dark px-8 py-3.5 rounded-xl font-bold inline-block">Request a Consultation</a>
        </div>
        <div class="flex-1 service-card-image">
            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&q=80&w=1200" alt="Project Management" class="w-full h-[500px] object-cover">
        </div>
    </section>

    <!-- Service 9: Consultancy & Training -->
    <section class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
        <div class="flex-1 order-2 lg:order-1">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">Consultancy & Training</h2>
            <p class="text-gray-500 mb-8">
                Strengthen your internal capacity with expert consulting and hands-on training. We help organizations refine their learning strategies, boost adoption, and build long-term operational maturity.
            </p>
            <div class="feature-box mb-8">
                <p class="text-sm font-bold text-brand-700 mb-4">What's Included</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        LMS strategy and optimization consulting
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Administrator and facilitator training
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Learning program design
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Change management guidance
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Technical training and certification
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Content governance and advisory
                    </li>
                </ul>
            </div>
            <a href="/contact" class="btn-dark px-8 py-3.5 rounded-xl font-bold inline-block">Request a Consultation</a>
        </div>
        <div class="flex-1 order-1 lg:order-2 service-card-image">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=1200" alt="Consultancy" class="w-full h-[500px] object-cover">
        </div>
    </section>

    <!-- Service 10: Application Support -->
    <section class="flex flex-col lg:flex-row-reverse items-center gap-12 lg:gap-20">
        <div class="flex-1">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">Application Support</h2>
            <p class="text-gray-500 mb-8">
                Keep your LMS stable, secure, and performing at its best. Our support team provides continuous technical assistance backed by reliable monitoring and proactive system care.
            </p>
            <div class="feature-box mb-8">
                <p class="text-sm font-bold text-brand-700 mb-4">What's Included</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        24/7 support options
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Ticketing and escalation management
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Performance and system monitoring
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Regular updates and platform patching
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Incident response and issue resolution
                    </li>
                    <li class="flex items-center gap-3 text-sm text-brand-700">
                        <iconify-icon icon="lucide:check-circle-2" class="text-brand-500 text-lg"></iconify-icon>
                        Dedicated client success manager
                    </li>
                </ul>
            </div>
            <a href="/contact" class="btn-dark px-8 py-3.5 rounded-xl font-bold inline-block">Request a Consultation</a>
        </div>
        <div class="flex-1 service-card-image">
            <img src="https://images.unsplash.com/photo-1596524430615-b46475ddff6e?auto=format&fit=crop&q=80&w=1200" alt="Support" class="w-full h-[500px] object-cover">
        </div>
    </section>

</div>
@endsection
