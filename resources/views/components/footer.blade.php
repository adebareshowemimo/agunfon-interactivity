<!-- Footer -->
<footer class="bg-[#061833] text-white pt-24 pb-12 relative z-20 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
            
            <!-- Left Column: Newsletter & Brand -->
            <div class="lg:col-span-5 flex flex-col justify-between">
                <div class="space-y-12">
                    <!-- Newsletter Box -->
                    <div class="rounded-[32px] p-10 border border-white/20 inline-block w-full max-w-[540px]">
                        <h3 class="text-3xl font-bold mb-4 tracking-tight">Subscribe to newsletter</h3>
                        <p class="text-gray-300 text-sm leading-relaxed mb-10 max-w-sm">
                            Be the first to access new articles, case studies, webinars, and tools that support smarter workforce
                        </p>
                        <form action="#" method="POST">
                            @csrf
                            <div class="flex bg-white rounded-xl p-1 shadow-lg h-[60px]">
                                <input type="email" name="email" placeholder="Email Address" class="flex-1 bg-transparent px-5 py-2 outline-none text-brand-950 placeholder-gray-500 font-medium" required>
                                <button type="submit" class="bg-brand-500 text-white px-8 py-2 rounded-lg text-sm font-semibold hover:bg-brand-600 transition-all">
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Brand Description -->
                    <div class="space-y-6">
                        <a href="/" class="flex items-center gap-3">
                            <img src="/images/logos/logo_white.svg" alt="Agunfon" class="h-10 w-auto hover:scale-105 transition-transform">
                        </a>
                        <p class="text-gray-400 text-sm leading-relaxed max-w-[480px]">
                            Agunfon delivers modern, adaptive learning solutions that help organizations build capability with clarity and confidence. From enterprise-grade LMS platforms to expert-built learning content and implementation services, we empower teams to grow, perform, and transform through smarter learning system
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Links Grid -->
            <div class="lg:col-span-7">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-y-12 gap-x-8">
                    
                    <!-- Column 1 -->
                    <div class="space-y-8">
                        <div class="space-y-3">
                            <a href="/about" class="font-bold text-lg text-white hover:text-brand-500 transition-colors">About Us</a>
                        </div>
                        <div class="space-y-5">
                            <h4 class="font-bold text-lg text-white">
                                Solutions-<span class="text-brand-500">By use Case</span>
                            </h4>
                            <ul class="space-y-3 text-sm text-gray-300 border-l-2 border-brand-500/50 pl-4">
                                <li><a href="/employee-onboarding" class="hover:text-white transition-colors">Employee Onboarding</a></li>
                                <li><a href="/compliance-training" class="hover:text-white transition-colors">Compliance Training</a></li>
                                <li><a href="/leadership-development" class="hover:text-white transition-colors">Leadership Development</a></li>
                                <li><a href="/personal-development" class="hover:text-white transition-colors">Personal Development</a></li>
                                <li><a href="/information-technology" class="hover:text-white transition-colors">Information Technology</a></li>
                                <li><a href="/human-resources" class="hover:text-white transition-colors">Human Resources</a></li>
                                <li><a href="/health-wellness" class="hover:text-white transition-colors">Health & Wellness</a></li>
                                <li><a href="/contact" class="hover:text-white transition-colors">Motivation & Insights</a></li>
                                <li><a href="/diversity-inclusion" class="hover:text-white transition-colors">Diversity & Inclusion</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="space-y-12">
                        <div class="space-y-3">
                            <a href="/pricing" class="font-bold text-lg text-white hover:text-brand-500 transition-colors">Pricing</a>
                        </div>
                        <div class="space-y-5">
                            <h4 class="font-bold text-lg text-white">
                                Solutions-<span class="text-brand-500">By Industries</span>
                            </h4>
                            <ul class="space-y-3 text-sm text-gray-300 border-l-2 border-brand-500/50 pl-4">
                                <li><a href="/finance" class="hover:text-white transition-colors">Finance</a></li>
                                <li><a href="/education" class="hover:text-white transition-colors">Education</a></li>
                                <li><a href="/retail" class="hover:text-white transition-colors">Retail</a></li>
                                <li><a href="/nonprofit" class="hover:text-white transition-colors">Non Profit</a></li>
                                <li><a href="/healthcare" class="hover:text-white transition-colors">Health care</a></li>
                            </ul>
                        </div>
                        <div class="space-y-5">
                            <h4 class="font-bold text-lg text-white">Product</h4>
                            <ul class="space-y-3 text-sm text-gray-300 border-l-2 border-brand-500/50 pl-4">
                                <li><a href="/learning-suite" class="hover:text-white transition-colors">Learning Suits</a></li>
                                <li><a href="/adaptive-lms" class="hover:text-white transition-colors">Adaptive LMS</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Column 3 -->
                    <div class="space-y-8">
                        <div class="space-y-5">
                            <h4 class="font-bold text-lg text-white">Resources</h4>
                            <ul class="space-y-3 text-sm text-gray-300 border-l-2 border-brand-500/50 pl-4">
                                <li><a href="/contact" class="hover:text-white transition-colors">Blog</a></li>
                                <li><a href="/contact" class="hover:text-white transition-colors">Guides</a></li>
                                <li><a href="/contact" class="hover:text-white transition-colors">Webinars</a></li>
                                <li><a href="/contact" class="hover:text-white transition-colors">Case studies</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Column 4 -->
                    <div class="space-y-12">
                        <div class="space-y-3">
                            <a href="/services" class="font-bold text-lg text-white hover:text-brand-500 transition-colors">Services</a>
                        </div>
                        <div class="space-y-5">
                            <h4 class="font-bold text-lg text-white">Contact us</h4>
                            <ul class="space-y-3 text-sm text-gray-300 border-l-2 border-brand-500/50 pl-4">
                                <li><a href="mailto:contact@agunfon.com" class="hover:text-white transition-colors">contact@agunfon.com</a></li>
                                <li><a href="tel:+2349079682537" class="hover:text-white transition-colors">+234 9079 682 537</a></li>
                            </ul>
                            <div class="flex gap-3 pt-2 pl-4">
                                <a href="https://instagram.com/agunfon" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-blue-700 flex items-center justify-center text-white hover:bg-blue-600 transition-colors shadow-lg shadow-blue-900/40">
                                    <iconify-icon icon="mdi:instagram" class="text-xl"></iconify-icon>
                                </a>
                                <a href="https://linkedin.com/company/agunfon" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-blue-700 flex items-center justify-center text-white hover:bg-blue-600 transition-colors shadow-lg shadow-blue-900/40">
                                    <iconify-icon icon="mdi:linkedin" class="text-xl"></iconify-icon>
                                </a>
                                <a href="https://twitter.com/agunfon" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-blue-700 flex items-center justify-center text-white hover:bg-blue-600 transition-colors shadow-lg shadow-blue-900/40">
                                    <iconify-icon icon="mdi:twitter" class="text-xl"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-12 border-t border-brand-700/50">
            <div class="flex flex-col space-y-4">
                <p class="text-sm text-gray-300 font-medium">© Agunfon 2025, All Right Reserved</p>
                <div class="flex flex-wrap gap-x-4 gap-y-2 text-sm text-gray-400">
                    <a href="/privacy-policy" class="hover:text-white transition-colors">Privacy Policy</a>
                    <span class="text-gray-600">|</span>
                    <a href="/terms-of-service" class="hover:text-white transition-colors">Terms of Service</a>
                    <span class="text-gray-600">|</span>
                    <a href="/cookies-policy" class="hover:text-white transition-colors">Cookies Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
