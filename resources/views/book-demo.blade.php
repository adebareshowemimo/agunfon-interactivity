@extends('layouts.app')

@section('title', 'Book a Demo - Agunfon Enterprise LMS')

@push('styles')
<style>
    .font-accent {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        font-weight: 500;
    }
    .soft-shadow {
        box-shadow: 0 10px 40px -10px rgba(15, 61, 122, 0.08);
    }
    .bg-hex-pattern {
        background-color: #F3F7FC;
        background-image: url('data:image/svg+xml,%3Csvg width="60" height="103.923" viewBox="0 0 60 103.923" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M30 0l25.98 15v30L30 60 4.02 45V15z" fill-opacity="0.03" fill="%230F3D7A" fill-rule="evenodd"/%3E%3C/svg%3E');
    }
    .form-input {
        width: 100%;
        padding: 0.875rem 1rem;
        background-color: #F9FAFB;
        border: 1px solid #E5E7EB;
        border-radius: 0.75rem;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
    }
    .form-input:focus {
        outline: none;
        border-color: #4B8BE8;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(75, 139, 232, 0.1);
    }
    .form-input.is-invalid {
        border-color: #EF4444;
    }
</style>
<script src="https://www.google.com/recaptcha/enterprise.js?render={{ config('services.recaptcha.site_key') }}"></script>
@endpush

@section('content')
<!-- Hero / Form Section -->
<section class="bg-hex-pattern py-16 lg:py-24 px-6">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-start">
        
        <!-- Left Side: Hero Text -->
        <div class="lg:pt-12">
            <div class="inline-block px-4 py-1.5 rounded-full border border-gray-200 text-brand-700 text-xs font-bold tracking-widest bg-white mb-8 uppercase">Book a Demo</div>
            <h1 class="text-5xl lg:text-[64px] font-bold text-brand-700 leading-[1.1] mb-8">
                See Adaptive's Learning Platform <span class="font-accent text-brand-500">in Action!</span>
            </h1>
            <p class="text-lg text-gray-500 max-w-lg leading-relaxed mb-10">
                Schedule a personalized walkthrough or preview a quick demo video to experience how Agunfon streamlines learning, onboarding, and workforce development across your organization
            </p>
        </div>

        <!-- Right Side: Booking Form Card -->
        <div class="bg-white rounded-[40px] p-8 lg:p-12 soft-shadow border border-gray-100">
            <h2 class="text-2xl font-bold text-brand-700 mb-2">Demo Booking Form</h2>
            <p class="text-sm text-gray-400 mb-10">Tell us a bit about your organization, and we'll tailor the demo to your needs.</p>

            @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">
                {{ session('error') }}
            </div>
            @endif

            <form id="demo-form" class="space-y-6" action="{{ route('demo.store') }}" method="POST">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-700 mb-2">Name<span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Elebute Usman" class="form-input @error('name') is-invalid @enderror" required>
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-brand-700 mb-2">Company<span class="text-red-500">*</span></label>
                        <input type="text" name="company" value="{{ old('company') }}" placeholder="Hype360" class="form-input @error('company') is-invalid @enderror" required>
                        @error('company')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-700 mb-2">Email<span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="elebuteusman@gmail.com" class="form-input @error('email') is-invalid @enderror" required>
                    @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-700 mb-2">Phone</label>
                    <div class="flex gap-3">
                        <select name="country_code" class="w-28 bg-[#F9FAFB] border border-gray-200 rounded-xl px-3 py-3 text-sm appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-brand-400/20 focus:border-brand-400">
                            <option value="+234" {{ old('country_code', '+234') == '+234' ? 'selected' : '' }}>🇳🇬 +234</option>
                            <option value="+1" {{ old('country_code') == '+1' ? 'selected' : '' }}>🇺🇸 +1</option>
                            <option value="+44" {{ old('country_code') == '+44' ? 'selected' : '' }}>🇬🇧 +44</option>
                            <option value="+233" {{ old('country_code') == '+233' ? 'selected' : '' }}>🇬🇭 +233</option>
                            <option value="+254" {{ old('country_code') == '+254' ? 'selected' : '' }}>🇰🇪 +254</option>
                            <option value="+27" {{ old('country_code') == '+27' ? 'selected' : '' }}>🇿🇦 +27</option>
                            <option value="+91" {{ old('country_code') == '+91' ? 'selected' : '' }}>🇮🇳 +91</option>
                            <option value="+971" {{ old('country_code') == '+971' ? 'selected' : '' }}>🇦🇪 +971</option>
                            <option value="+49" {{ old('country_code') == '+49' ? 'selected' : '' }}>🇩🇪 +49</option>
                            <option value="+33" {{ old('country_code') == '+33' ? 'selected' : '' }}>🇫🇷 +33</option>
                            <option value="+86" {{ old('country_code') == '+86' ? 'selected' : '' }}>🇨🇳 +86</option>
                            <option value="+81" {{ old('country_code') == '+81' ? 'selected' : '' }}>🇯🇵 +81</option>
                            <option value="+55" {{ old('country_code') == '+55' ? 'selected' : '' }}>🇧🇷 +55</option>
                            <option value="+61" {{ old('country_code') == '+61' ? 'selected' : '' }}>🇦🇺 +61</option>
                            <option value="+1" {{ old('country_code') == '+1-CA' ? 'selected' : '' }}>🇨🇦 +1</option>
                        </select>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="09079682537" class="flex-grow form-input">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-700 mb-2">Industry / Use Case<span class="text-red-500">*</span></label>
                        <select name="industry" class="form-input appearance-none @error('industry') is-invalid @enderror" required>
                            <option value="">Select Industry</option>
                            <option value="Human Resources" {{ old('industry') == 'Human Resources' ? 'selected' : '' }}>Human Resources</option>
                            <option value="Customer Support" {{ old('industry') == 'Customer Support' ? 'selected' : '' }}>Customer Support</option>
                            <option value="Information Technology" {{ old('industry') == 'Information Technology' ? 'selected' : '' }}>Information Technology</option>
                            <option value="Finance" {{ old('industry') == 'Finance' ? 'selected' : '' }}>Finance</option>
                            <option value="Healthcare" {{ old('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                            <option value="Education" {{ old('industry') == 'Education' ? 'selected' : '' }}>Education</option>
                            <option value="Retail" {{ old('industry') == 'Retail' ? 'selected' : '' }}>Retail</option>
                            <option value="Other" {{ old('industry') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('industry')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-brand-700 mb-2">Team Size<span class="text-red-500">*</span></label>
                        <select name="team_size" class="form-input appearance-none @error('team_size') is-invalid @enderror" required>
                            <option value="">Select Size</option>
                            <option value="1-20" {{ old('team_size') == '1-20' ? 'selected' : '' }}>1-20</option>
                            <option value="20-50" {{ old('team_size') == '20-50' ? 'selected' : '' }}>20-50</option>
                            <option value="50-200" {{ old('team_size') == '50-200' ? 'selected' : '' }}>50-200</option>
                            <option value="200-500" {{ old('team_size') == '200-500' ? 'selected' : '' }}>200-500</option>
                            <option value="500+" {{ old('team_size') == '500+' ? 'selected' : '' }}>500+</option>
                        </select>
                        @error('team_size')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-700 mb-2">Project Summary</label>
                    <textarea name="summary" placeholder="To train customer about our product" rows="4" class="form-input resize-none">{{ old('summary') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-700 mb-2">Preferred Date & Time<span class="text-red-500">*</span></label>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="relative">
                            <input type="date" name="preferred_date" value="{{ old('preferred_date') }}" class="form-input pr-10 @error('preferred_date') is-invalid @enderror" required>
                            <iconify-icon icon="lucide:calendar" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></iconify-icon>
                            @error('preferred_date')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="relative">
                            <input type="time" name="preferred_time" value="{{ old('preferred_time') }}" class="form-input pr-10 @error('preferred_time') is-invalid @enderror" required>
                            <iconify-icon icon="lucide:clock" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></iconify-icon>
                            @error('preferred_time')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <!-- reCAPTCHA Token (hidden) -->
                <input type="hidden" name="g-recaptcha-response" id="recaptcha-token">
                @error('g-recaptcha-response')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                @error('captcha')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror

                <button type="submit" id="submit-btn" class="px-8 py-3.5 bg-gray-900 text-white font-bold rounded-xl hover:bg-black transition-all w-full md:w-auto">
                    Book a Demo
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Peek Section -->
<section class="py-24 px-6 bg-white">
    <div class="max-w-7xl mx-auto text-center mb-16">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-6">
            Want a <span class="font-accent text-brand-500">quick</span> look?
        </h2>
        <p class="text-gray-500 max-w-2xl mx-auto">
            Watch a 30-60 second overview of the Agunfon Learning Suite, showcasing core features, automation tools, dashboards, and the learner experience
        </p>
    </div>

    <!-- LMS Mockup Interface -->
    <div class="max-w-6xl mx-auto bg-white rounded-[40px] border border-gray-100 soft-shadow overflow-hidden flex flex-col md:flex-row h-auto md:h-[600px]">
        <!-- Sidebar -->
        <aside class="w-72 bg-[#F3F7FC] border-r border-gray-100 p-8 hidden lg:block">
            <div class="space-y-10">
                <div class="flex items-center gap-3 text-sm font-medium text-gray-600">
                    <iconify-icon icon="lucide:layout-grid" class="text-xl"></iconify-icon>
                    <span>News Feed</span>
                </div>
                <div>
                    <div class="flex items-center justify-between text-brand-700 font-bold mb-6">
                        <div class="flex items-center gap-3">
                            <iconify-icon icon="lucide:book-open" class="text-xl"></iconify-icon>
                            <span>Courses</span>
                        </div>
                        <iconify-icon icon="lucide:chevron-down" class="text-xs"></iconify-icon>
                    </div>
                    <ul class="space-y-4 pl-8 text-xs font-medium text-gray-500">
                        <li class="flex items-center gap-2 text-brand-500">
                            <iconify-icon icon="lucide:check-circle-2"></iconify-icon>
                            <span>Basic Fundamental of...</span>
                        </li>
                        <li class="flex items-center gap-2 text-brand-500">
                            <iconify-icon icon="lucide:check-circle-2"></iconify-icon>
                            <span>Establishing hierarchy</span>
                        </li>
                        <li class="flex items-center gap-2 text-brand-500">
                            <iconify-icon icon="lucide:check-circle-2"></iconify-icon>
                            <span>Empathy</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <iconify-icon icon="lucide:lock" class="opacity-40"></iconify-icon>
                            <span>Learn Typography</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <iconify-icon icon="lucide:lock" class="opacity-40"></iconify-icon>
                            <span>Learn colours</span>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center gap-3 text-sm font-medium text-gray-600">
                    <iconify-icon icon="lucide:award" class="text-xl"></iconify-icon>
                    <span>Certificates</span>
                </div>
                <div class="flex items-center gap-3 text-sm font-medium text-gray-600">
                    <iconify-icon icon="lucide:users" class="text-xl"></iconify-icon>
                    <span>Community</span>
                </div>
            </div>
        </aside>

        <!-- Main App Area -->
        <main class="flex-grow flex flex-col">
            <header class="h-16 bg-brand-700 text-white px-8 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <iconify-icon icon="lucide:menu" class="text-xl"></iconify-icon>
                    <div class="flex items-center gap-2 text-sm font-medium opacity-90">
                        <iconify-icon icon="lucide:arrow-left" class="text-xs"></iconify-icon>
                        <span class="hidden sm:inline">LEARNING PATH: Become a Professional UX Specialist</span>
                        <span class="sm:hidden">Learning Path</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-white/20"></div>
                </div>
            </header>

            <div class="p-8 overflow-y-auto bg-gray-50 flex-grow">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-bold text-brand-700">Courses</h3>
                    <button class="px-4 py-2 bg-gray-900 text-white rounded-lg text-xs font-bold">Visit all</button>
                </div>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
                    <!-- Course Card 1 -->
                    <div class="bg-white rounded-2xl overflow-hidden soft-shadow border border-gray-100 group">
                        <div class="relative h-36 bg-gray-200">
                            <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=400" alt="Course" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-100">
                                <div class="flex items-center gap-2 bg-white/20 backdrop-blur-md px-4 py-2 rounded-full border border-white/30 text-white text-xs font-bold">
                                    <iconify-icon icon="lucide:play-circle" class="text-lg"></iconify-icon>
                                    Play Demo
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-brand-700 text-sm mb-2">Establishing hierarchy</h4>
                            <p class="text-[10px] text-gray-400 mb-4 line-clamp-2">Begin with rudiment of graphic design including typography, layouts, colours...</p>
                            <div class="flex items-center justify-between">
                                <div class="flex-grow mr-4">
                                    <div class="flex justify-between text-[10px] mb-1 font-bold text-gray-400">
                                        <span>5/5 Courses</span>
                                        <span class="text-brand-500">100%</span>
                                    </div>
                                    <div class="h-1 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-brand-500 w-full"></div>
                                    </div>
                                </div>
                                <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-[10px] font-bold text-brand-700">View certificate</button>
                            </div>
                        </div>
                    </div>

                    <!-- Course Card 2 -->
                    <div class="bg-white rounded-2xl overflow-hidden soft-shadow border border-gray-100">
                        <div class="relative h-36 bg-gray-200">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=400" alt="Course" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-brand-700 text-sm mb-2">Empathy</h4>
                            <p class="text-[10px] text-gray-400 mb-4 line-clamp-2">Begin with rudiment of graphic design including typography, layouts, colours...</p>
                            <div class="flex items-center justify-between">
                                <div class="flex-grow mr-4">
                                    <div class="flex justify-between text-[10px] mb-1 font-bold text-gray-400">
                                        <span>5 lessons</span>
                                        <span class="text-brand-500">100%</span>
                                    </div>
                                    <div class="h-1 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-brand-500 w-full"></div>
                                    </div>
                                </div>
                                <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-[10px] font-bold text-gray-400">Completed</button>
                            </div>
                        </div>
                    </div>

                    <!-- Course Card 3 -->
                    <div class="bg-white rounded-2xl overflow-hidden soft-shadow border border-gray-100">
                        <div class="relative h-36 bg-gray-200">
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=400" alt="Course" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-brand-700 text-sm mb-2">Learn colours</h4>
                            <p class="text-[10px] text-gray-400 mb-4 line-clamp-2">Begin with rudiment of graphic design including typography, layouts, colours...</p>
                            <div class="flex items-center justify-between">
                                <div class="flex-grow mr-4">
                                    <div class="flex justify-between text-[10px] mb-1 font-bold text-gray-400">
                                        <span>5 lessons</span>
                                        <span class="text-brand-700">32%</span>
                                    </div>
                                    <div class="h-1 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-brand-700 w-1/3"></div>
                                    </div>
                                </div>
                                <button class="px-3 py-1.5 bg-brand-700 text-white rounded-lg text-[10px] font-bold">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</section>

@push('scripts')
<script>
document.getElementById('demo-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = this;
    const btn = document.getElementById('submit-btn');
    btn.disabled = true;
    btn.textContent = 'Submitting...';
    
    grecaptcha.enterprise.ready(async () => {
        try {
            const token = await grecaptcha.enterprise.execute('{{ config('services.recaptcha.site_key') }}', {action: 'demo_submit'});
            document.getElementById('recaptcha-token').value = token;
            form.submit();
        } catch (error) {
            console.error('reCAPTCHA error:', error);
            btn.disabled = false;
            btn.textContent = 'Book a Demo';
            alert('reCAPTCHA verification failed. Please try again.');
        }
    });
});
</script>
@endpush
@endsection
