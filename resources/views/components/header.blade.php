<!-- Dropdown Backdrop Overlay -->
<div id="dropdown-overlay" class="fixed inset-0 bg-black/30 backdrop-blur-[2px] z-[999] opacity-0 invisible transition-all duration-300 pointer-events-none"></div>

<!-- Header Navigation -->
<header class="fixed top-0 w-full z-[1001] bg-white border-b border-gray-100 transition-all duration-300" id="main-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2 group">
                <img src="/images/logos/logo.svg" alt="Agunfon" class="h-10 w-auto group-hover:scale-105 transition-transform">
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-7">
                <!-- Products Toggle -->
                <div id="products-trigger" class="relative flex items-center gap-1 text-sm font-semibold {{ request()->is('learning-suite*') || request()->is('adaptive-lms*') ? 'text-brand-700' : 'text-gray-700' }} cursor-pointer select-none py-4 hover:text-brand-700 transition-colors">
                    Products 
                    <iconify-icon id="products-chevron" icon="lucide:chevron-down" class="text-xs opacity-50 transition-transform duration-300"></iconify-icon>
                    
                    <!-- Products Dropdown -->
                    <div id="products-dropdown" class="fixed top-20 left-1/2 -translate-x-1/2 pt-4 opacity-0 invisible pointer-events-none transition-all duration-300 transform translate-y-2 scale-95 origin-top">
                        <div class="w-[540px] bg-white rounded-[32px] p-8 shadow-float border border-gray-100">
                            <div class="mb-8">
                                <span class="px-3 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-brand-500 bg-brand-50 tracking-widest uppercase">Our Products</span>
                            </div>
                            <div class="space-y-8">
                                <a href="/learning-suite" class="flex gap-6 group/item">
                                    <div class="w-32 h-32 shrink-0 rounded-[20px] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=300" alt="Learning Suites" class="w-full h-full object-cover group-hover/item:scale-110 transition-transform duration-500">
                                    </div>
                                    <div class="flex flex-col">
                                        <h3 class="text-lg font-bold text-brand-700 mb-2">Agunfon Learning Suits</h3>
                                        <p class="text-xs text-gray-500 leading-relaxed mb-4">Instant access to expertly crafted, off-the-shelf courses across multiple industries, delivered within a modern, flexible learning environment.</p>
                                        <div class="flex items-center gap-1 text-xs font-bold text-brand-700 group-hover/item:text-brand-500 transition-colors">Learn more <iconify-icon icon="lucide:chevron-right"></iconify-icon></div>
                                    </div>
                                </a>
                                <div class="h-[1px] bg-gray-100 w-full"></div>
                                <a href="/adaptive-lms" class="flex gap-6 group/item">
                                    <div class="w-32 h-32 shrink-0 rounded-[20px] overflow-hidden bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=300" alt="Adaptive LMS" class="w-full h-full object-cover group-hover/item:scale-110 transition-transform duration-500">
                                    </div>
                                    <div class="flex flex-col">
                                        <h3 class="text-lg font-bold text-brand-700 mb-2">Agunfon Adaptive LMS</h3>
                                        <p class="text-xs text-gray-500 leading-relaxed mb-4">A flexible, enterprise-grade learning platform built for complex structures and personalized learning at scale.</p>
                                        <div class="flex items-center gap-1 text-xs font-bold text-brand-700 group-hover/item:text-brand-500 transition-colors">Learn more <iconify-icon icon="lucide:chevron-right"></iconify-icon></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="/about" class="text-sm font-semibold {{ request()->is('about') ? 'text-brand-700' : 'text-gray-700' }} hover:text-brand-700 transition-colors">About Agunfon</a>
                
                <!-- Solutions Toggle -->
                <div id="solutions-trigger" class="flex items-center gap-1 text-sm font-semibold text-gray-700 cursor-pointer select-none py-4 hover:text-brand-700 transition-colors">
                    Solutions 
                    <iconify-icon id="solutions-chevron" icon="lucide:chevron-down" class="text-xs opacity-50 transition-transform duration-300"></iconify-icon>
                    
                    <!-- Solutions Mega Menu -->
                    <div id="solutions-dropdown" class="fixed top-20 left-1/2 -translate-x-1/2 pt-4 opacity-0 invisible pointer-events-none transition-all duration-300 transform translate-y-2 scale-95 origin-top">
                        <div class="w-[1000px] bg-white rounded-[32px] overflow-hidden shadow-float border border-gray-100 flex flex-col">
                            
                            <!-- Top Highlight Section -->
                            <div class="bg-brand-50 p-8 flex items-center gap-12 border-b border-blue-50">
                                <div class="relative">
                                    <div class="absolute -top-4 -left-4 px-3 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-brand-500 bg-white tracking-widest uppercase z-10 shadow-sm">
                                        Our Solutions
                                    </div>
                                    <div class="w-[400px] h-[240px] rounded-2xl overflow-hidden shadow-xl">
                                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&q=80&w=800" alt="Solutions Support" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h2 class="text-3xl font-bold text-brand-700 leading-tight mb-4">
                                        Solutions Designed for Real <br>
                                        <span class="font-serif italic text-brand-500">Organizational</span> Challenges
                                    </h2>
                                    <p class="text-sm text-gray-600 leading-relaxed max-w-lg">
                                        Explore Agunfon's end-to-end learning solutions—crafted to support diverse teams, industries, and training goals. From onboarding to compliance, each solution adapts intelligently to your needs.
                                    </p>
                                </div>
                            </div>

                            <!-- Bottom Grid & Sidebar Section -->
                            <div class="flex bg-white min-h-[420px]">
                                <!-- Sidebar Tabs -->
                                <div class="w-56 bg-gray-50/50 p-8 border-r border-gray-100 flex flex-col gap-6">
                                    <button data-tab="usecase" class="sol-tab-btn text-lg font-semibold text-brand-500 flex items-center gap-3 transition-colors text-left">
                                        <div class="active-bar w-1 h-8 bg-brand-500 rounded-full"></div>
                                        <span class="tab-text border-b-2 border-brand-500">Use cases</span>
                                    </button>
                                    <button data-tab="industry" class="sol-tab-btn text-lg font-semibold text-gray-400 hover:text-brand-500 flex items-center gap-3 transition-colors text-left pl-4">
                                        <div class="active-bar w-1 h-8 bg-brand-500 rounded-full hidden"></div>
                                        <span class="tab-text border-b-2 border-transparent">Industry</span>
                                    </button>
                                </div>
                                
                                <!-- Solutions Content Area -->
                                <div class="flex-1 p-10">
                                    <!-- Grid Use Cases (Default) -->
                                    <div id="grid-usecase" class="grid grid-cols-3 gap-x-8 gap-y-6 transition-all duration-300">
                                        <a href="/employee-onboarding" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:user-plus" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Employee Onboarding</span>
                                        </a>
                                        <a href="/compliance-training" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:clipboard-check" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Compliance Training</span>
                                        </a>
                                        <a href="/leadership-development" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:users" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Leadership Development</span>
                                        </a>
                                        <a href="/personal-development" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:star" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Personal Development</span>
                                        </a>
                                        <a href="/customer-service" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:headphones" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Customer Service & Support</span>
                                        </a>
                                        <a href="/sales-marketing" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:trending-up" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Sales & Marketing</span>
                                        </a>
                                        <a href="/health-wellness" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:heart" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Health & Wellness</span>
                                        </a>
                                        <a href="/contact" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:bar-chart-3" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Motivation & Insights</span>
                                        </a>
                                        <a href="/diversity-inclusion" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:globe" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Diversity & Inclusion</span>
                                        </a>
                                    </div>

                                    <!-- Grid Industry (Hidden by default) -->
                                    <div id="grid-industry" class="grid grid-cols-3 gap-x-8 gap-y-6 transition-all duration-300 hidden">
                                        <a href="/finance" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:building-2" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Finance</span>
                                        </a>
                                        <a href="/healthcare" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:activity" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Healthcare</span>
                                        </a>
                                        <a href="/education" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:graduation-cap" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Education</span>
                                        </a>
                                        <a href="/nonprofit" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:heart-handshake" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Non-Profit</span>
                                        </a>
                                        <a href="/retail" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:shopping-bag" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Retail</span>
                                        </a>
                                        <a href="/information-technology" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:cpu" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Technology</span>
                                        </a>
                                        <a href="/contact" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:factory" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Manufacturing</span>
                                        </a>
                                        <a href="/human-resources" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:users" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">HR & People Teams</span>
                                        </a>
                                        <a href="/contact" class="flex items-center gap-3 group/item">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 group-hover/item:bg-brand-500 group-hover/item:text-white transition-all">
                                                <iconify-icon icon="lucide:briefcase" class="text-lg"></iconify-icon>
                                            </div>
                                            <span class="text-[13px] font-medium text-gray-700 group-hover/item:text-brand-700">Professional Services</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resources Toggle -->
                <div id="resources-trigger" class="relative flex items-center gap-1 text-sm font-semibold text-gray-700 cursor-pointer select-none py-4 hover:text-brand-700 transition-colors">
                    Resources 
                    <iconify-icon id="resources-chevron" icon="lucide:chevron-down" class="text-xs opacity-50 transition-transform duration-300"></iconify-icon>
                    
                    <!-- Resources Dropdown -->
                    <div id="resources-dropdown" class="fixed top-20 left-1/2 -translate-x-1/2 pt-4 opacity-0 invisible pointer-events-none transition-all duration-300 transform translate-y-2 scale-95 origin-top">
                        <div class="w-[800px] bg-white rounded-[32px] overflow-hidden shadow-float border border-gray-100 flex flex-col">
                            <!-- Top Content Area -->
                            <div class="bg-brand-50 p-8 relative overflow-hidden">
                                <div class="mb-6">
                                    <span class="px-3 py-1.5 rounded-full border border-blue-100 text-[10px] font-bold text-brand-500 bg-white tracking-widest uppercase">Our Resources</span>
                                </div>
                                <div class="flex items-start gap-10">
                                    <div class="w-80 h-48 rounded-2xl overflow-hidden shadow-lg shrink-0">
                                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=600" alt="Resources featured" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1">
                                        <h2 class="text-2xl font-bold text-brand-700 leading-tight mb-4">
                                            Insights, Case Studies, and Research to Elevate <br>
                                            <span class="font-serif italic text-brand-500">Your Learning Strategy</span>
                                        </h2>
                                        <p class="text-sm text-gray-600 leading-relaxed">
                                            Explore articles, success stories, and expert guidance designed to help you strengthen learning cultures, improve performance, and make informed decisions with confidence.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Grid Items Area -->
                            <div class="p-10 bg-white">
                                <div class="grid grid-cols-2 gap-x-12 gap-y-8">
                                    <!-- Blog -->
                                    <a href="/contact" class="group/res">
                                        <div class="flex gap-4">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 shrink-0">
                                                <iconify-icon icon="lucide:file-text" class="text-lg"></iconify-icon>
                                            </div>
                                            <div>
                                                <h4 class="text-base font-bold text-brand-700 mb-1">Blog</h4>
                                                <p class="text-xs text-gray-500 leading-relaxed mb-2">Practical insights, proven strategies, and emerging trends.</p>
                                                <div class="text-xs font-bold text-brand-500 flex items-center gap-1">Coming soon <iconify-icon icon="lucide:chevron-right"></iconify-icon></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Guides -->
                                    <a href="/contact" class="group/res">
                                        <div class="flex gap-4">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 shrink-0">
                                                <iconify-icon icon="lucide:book-open" class="text-lg"></iconify-icon>
                                            </div>
                                            <div>
                                                <h4 class="text-base font-bold text-brand-700 mb-1">Guides</h4>
                                                <p class="text-xs text-gray-500 leading-relaxed mb-2">Step-by-step playbooks, best practices, and downloadable resources.</p>
                                                <div class="text-xs font-bold text-brand-500 flex items-center gap-1">Coming soon <iconify-icon icon="lucide:chevron-right"></iconify-icon></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Webinar -->
                                    <a href="/contact" class="group/res">
                                        <div class="flex gap-4">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 shrink-0">
                                                <iconify-icon icon="lucide:video" class="text-lg"></iconify-icon>
                                            </div>
                                            <div>
                                                <h4 class="text-base font-bold text-brand-700 mb-1">Webinar</h4>
                                                <p class="text-xs text-gray-500 leading-relaxed mb-2">Live and on-demand sessions with industry experts.</p>
                                                <div class="text-xs font-bold text-brand-500 flex items-center gap-1">Coming soon <iconify-icon icon="lucide:chevron-right"></iconify-icon></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Case Studies -->
                                    <a href="/contact" class="group/res">
                                        <div class="flex gap-4">
                                            <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-500 shrink-0">
                                                <iconify-icon icon="lucide:briefcase" class="text-lg"></iconify-icon>
                                            </div>
                                            <div>
                                                <h4 class="text-base font-bold text-brand-700 mb-1">Case Studies</h4>
                                                <p class="text-xs text-gray-500 leading-relaxed mb-2">Real-world stories from organizations transforming learning with Agunfon.</p>
                                                <div class="text-xs font-bold text-brand-500 flex items-center gap-1">Coming soon <iconify-icon icon="lucide:chevron-right"></iconify-icon></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="/services" class="text-sm font-semibold {{ request()->is('services') ? 'text-brand-700' : 'text-gray-700' }} hover:text-brand-700 transition-colors">Our services</a>
                <a href="/pricing" class="text-sm font-semibold {{ request()->is('pricing') ? 'text-brand-700' : 'text-gray-700' }} hover:text-brand-700 transition-colors">Pricing</a>
            </nav>

            <!-- CTA Buttons -->
            <div class="hidden lg:flex items-center gap-4">
                <a href="/contact" class="px-6 py-2.5 rounded-lg border border-gray-200 text-sm font-bold text-brand-700 hover:bg-gray-50 transition-colors">Contact Sales</a>
                <a href="/book-demo" class="px-6 py-2.5 rounded-lg bg-gray-900 text-white text-sm font-bold hover:bg-black transition-colors shadow-sm">Book a Demo</a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-gray-600 p-2">
                <iconify-icon icon="lucide:menu" class="text-2xl"></iconify-icon>
            </button>
        </div>
    </div>
</header>
