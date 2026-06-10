@extends('layouts.app')

@section('title', 'Modern Learner Dashboard for Moodle - Agunfon')

@section('content')
<!-- ============ HERO ============ -->
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center">
        <div class="max-w-xl">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                MOODLE PLUGIN <span class="w-1 h-1 rounded-full bg-blue-300"></span> Premium
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Give every learner a <span class="font-serif italic text-brand-500">home</span>
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed mb-10">
                Modern Learner Dashboard is a Moodle block that gives each learner a compact, personalized view of their courses, completion, upcoming deadlines, grades, badges, and certificates — so they always know what to do next.
            </p>
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="#pricing" class="inline-flex items-center px-9 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1 active:translate-y-0">Buy now</a>
                <a href="/book-demo" class="inline-flex items-center px-9 py-4 border border-gray-200 text-brand-700 font-bold rounded-xl hover:bg-gray-50 transition-all">Book a demo</a>
            </div>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-500 font-medium">
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:layout-dashboard" class="text-brand-500"></iconify-icon> Personalized per learner</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:palette" class="text-brand-500"></iconify-icon> Theme-compatible</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:smartphone" class="text-brand-500"></iconify-icon> Mobile-friendly</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:check-circle" class="text-brand-500"></iconify-icon> Moodle 4.5–5.2</span>
            </div>
        </div>

        <!-- Product mockup: dashboard block -->
        <div class="relative">
            <div class="bg-white rounded-[32px] shadow-2xl border border-gray-100 p-5 hero-dashboard">
                <div class="flex items-center gap-1.5 px-2 pb-4">
                    <span class="w-3 h-3 rounded-full bg-red-400"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                    <span class="w-3 h-3 rounded-full bg-green-400"></span>
                    <span class="ml-3 text-xs text-gray-400">moodle.yourschool.edu › my dashboard</span>
                </div>
                <!-- overview tiles -->
                <div class="grid grid-cols-4 gap-2 mb-3">
                    <div class="rounded-xl border border-gray-100 bg-brand-50 p-3 text-center"><div class="text-lg font-extrabold text-brand-700">68%</div><div class="text-[9px] font-semibold uppercase text-gray-500">Complete</div></div>
                    <div class="rounded-xl border border-gray-100 bg-white p-3 text-center"><div class="text-lg font-extrabold text-amber-500">3</div><div class="text-[9px] font-semibold uppercase text-gray-500">Due soon</div></div>
                    <div class="rounded-xl border border-gray-100 bg-white p-3 text-center"><div class="text-lg font-extrabold text-brand-700">B+</div><div class="text-[9px] font-semibold uppercase text-gray-500">Avg grade</div></div>
                    <div class="rounded-xl border border-gray-100 bg-white p-3 text-center"><div class="text-lg font-extrabold text-green-600">7</div><div class="text-[9px] font-semibold uppercase text-gray-500">Badges</div></div>
                </div>
                <!-- continue learning -->
                <div class="text-[10px] font-bold uppercase tracking-wide text-gray-500 mb-2">Continue learning</div>
                <div class="space-y-2">
                    <div class="rounded-xl border border-gray-100 p-3">
                        <div class="flex items-center justify-between mb-1.5"><span class="text-xs font-semibold text-brand-700">Compliance 101</span><span class="text-[10px] text-gray-400">72%</span></div>
                        <div class="h-1.5 rounded-full bg-gray-100"><div class="h-1.5 rounded-full bg-brand-500" style="width:72%"></div></div>
                    </div>
                    <div class="rounded-xl border border-gray-100 p-3">
                        <div class="flex items-center justify-between mb-1.5"><span class="text-xs font-semibold text-brand-700">Leadership Foundations</span><span class="text-[10px] text-gray-400">40%</span></div>
                        <div class="h-1.5 rounded-full bg-gray-100"><div class="h-1.5 rounded-full bg-brand-500" style="width:40%"></div></div>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-2 absolute -top-4 -left-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700"><iconify-icon icon="lucide:award" class="text-brand-500"></iconify-icon> Badge earned</div>
            <div class="hidden md:flex items-center gap-2 absolute -bottom-4 -right-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700"><iconify-icon icon="lucide:calendar-clock" class="text-brand-500"></iconify-icon> Due in 2 days</div>
        </div>
    </div>
</section>

<!-- ============ SOLUTION OVERVIEW ============ -->
<section class="py-20 md:py-28">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-10">"Where do I start?" — answered</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                Learners log in and face a wall of courses with no sense of priority, progress, or what's due. Modern Learner Dashboard gives each of them a single, personalized home: an overview of completion, due-soon activities, grade average, badges and certificates, continue-learning cards ordered by recent access, and a preview of courses they can still join. It pulls from core Moodle data, needs no learner setup, and is styled to fit the theme you already run.
            </p>
        </div>
    </div>
</section>

<!-- ============ KEY FEATURES (navy panel) ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] overflow-hidden p-8 lg:p-16 shadow-2xl">
            <div class="inline-block px-5 py-2.5 rounded-full bg-white mb-10 shadow-sm">
                <span class="text-brand-700 font-bold text-sm tracking-wide">Key Features &amp; Capabilities</span>
            </div>
            <div class="grid md:grid-cols-2 gap-x-16 gap-y-7">
                @php
                $features = [
                    ['gauge', 'Personalized learner overview', 'Completion rate, due-soon activity count, grade average, badge count, and certificate count — at a glance, for each learner.'],
                    ['play', 'Continue-learning cards', 'Pick up right where they left off, with courses ordered by most recent access.'],
                    ['compass', 'Course library preview', 'Surface visible courses the learner isn&apos;t enrolled in yet, so discovery and self-enrolment are one click away.'],
                    ['award', 'Badges &amp; certificates', 'Badge cards from Moodle&apos;s core badge records, plus a certificate table for Course Certificate activities where available.'],
                    ['bar-chart-2', 'Grades at a glance', 'Clear grade summaries built from core Moodle gradebook data — no extra configuration.'],
                    ['palette', 'Branding &amp; theme-fit', 'Scoped CSS and language-string-driven UI, with tested support for Boost, Boost Union, Classic, Moove, Adaptable, Academi and more.'],
                ];
                @endphp
                @foreach ($features as [$icon, $title, $desc])
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md"><iconify-icon icon="lucide:{{ $icon }}" class="text-xl"></iconify-icon></div>
                    <div><h3 class="text-white text-lg font-bold mb-1">{!! $title !!}</h3><p class="text-blue-100/80 text-sm leading-relaxed">{!! $desc !!}</p></div>
                </div>
                @endforeach
            </div>
            <p class="text-blue-100/70 text-sm mt-10">Built entirely on core Moodle data and the Privacy API — no learner configuration, and it respects the active theme via a generated <code class="text-blue-50">mld-theme-{name}</code> class.</p>
        </div>
    </div>
</section>

<!-- ============ 15 REASONS (SLIDER) ============ -->
@push('styles')
<style>
    .mld-slider-track { scrollbar-width: none; -ms-overflow-style: none; }
    .mld-slider-track::-webkit-scrollbar { display: none; }
    .mld-dot { width: 8px; height: 8px; border-radius: 9999px; background: #D1E3FF; border: 0; padding: 0; cursor: pointer; transition: all .25s ease; }
    .mld-dot.is-active { width: 26px; background: #4B8BE8; }
</style>
@endpush
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="text-center mb-10">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-5">Why choose it</span>
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">15 reasons to choose Modern Learner Dashboard</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Swipe through the highlights — click any slide to view it full size.</p>
        </div>

        @php
        $reasonSlides = [
            ['02-one-dashboard-replaces-five.png', 'One dashboard replaces five'],
            ['03-drop-in-zero-infrastructure.png', 'Drop-in, zero infrastructure'],
            ['04-privacy-sign-off-in-minutes.png', 'Privacy sign-off in minutes'],
            ['05-works-with-the-theme-you-already-run.png', 'Works with the theme you already run'],
            ['06-fast-on-big-sites.png', 'Fast on big sites'],
            ['07-drives-course-re-entry.png', 'Drives course re-entry'],
            ['08-cuts-profile-admin-tickets.png', 'Cuts profile-admin tickets'],
            ['09-a-course-storefront-on-the-dashboard.png', 'A course storefront on the Dashboard'],
            ['10-achievement-made-visible.png', 'Achievement made visible'],
            ['11-brand-it-without-touching-theme-code.png', 'Brand it without touching theme code'],
            ['12-never-miss-a-deadline.png', 'Never miss a deadline'],
            ['13-secure-by-construction.png', 'Secure by construction'],
            ['14-no-lock-in-clean-uninstall.png', 'No lock-in, clean uninstall'],
            ['15-current-and-supported.png', 'Current and supported'],
            ['16-an-audit-ready-training-record.png', 'An audit-ready training record'],
        ];
        $slideBase = '/images/plugins/modern-learner-dashboard/ten-reasons/slides';
        @endphp

        <div class="relative" data-mld-slider>
            <div class="mld-slider-track flex overflow-x-auto snap-x snap-mandatory scroll-smooth gap-5 pb-4 -mx-2 px-2" data-slider-track>
                @foreach ($reasonSlides as [$file, $alt])
                <a href="{{ $slideBase }}/{{ $file }}" target="_blank" rel="noopener"
                   class="snap-center shrink-0 w-[88%] sm:w-[70%] lg:w-[58%] rounded-[24px] overflow-hidden border border-gray-100 shadow-soft hover:shadow-float transition-shadow bg-white">
                    <img src="{{ $slideBase }}/{{ $file }}" alt="{{ $alt }}" loading="lazy" class="w-full h-auto block">
                </a>
                @endforeach
            </div>

            <button type="button" data-slider-prev aria-label="Previous reason"
                class="hidden md:flex items-center justify-center absolute top-1/2 -translate-y-1/2 -left-3 lg:-left-5 w-12 h-12 rounded-full bg-white border border-gray-100 shadow-float text-brand-700 hover:bg-brand-50 transition-colors z-10">
                <iconify-icon icon="lucide:chevron-left" class="text-2xl"></iconify-icon>
            </button>
            <button type="button" data-slider-next aria-label="Next reason"
                class="hidden md:flex items-center justify-center absolute top-1/2 -translate-y-1/2 -right-3 lg:-right-5 w-12 h-12 rounded-full bg-white border border-gray-100 shadow-float text-brand-700 hover:bg-brand-50 transition-colors z-10">
                <iconify-icon icon="lucide:chevron-right" class="text-2xl"></iconify-icon>
            </button>

            <div class="flex flex-wrap justify-center gap-2 mt-6" data-slider-dots aria-hidden="true"></div>
        </div>
    </div>
</section>
@push('scripts')
<script>
    (function () {
        const root = document.querySelector('[data-mld-slider]');
        if (!root) return;
        const track = root.querySelector('[data-slider-track]');
        const slides = Array.from(track.children);
        const prev = root.querySelector('[data-slider-prev]');
        const next = root.querySelector('[data-slider-next]');
        const dotsWrap = root.querySelector('[data-slider-dots]');

        slides.forEach((_, i) => {
            const d = document.createElement('button');
            d.type = 'button';
            d.className = 'mld-dot' + (i === 0 ? ' is-active' : '');
            d.setAttribute('aria-label', 'Go to reason ' + (i + 1));
            d.addEventListener('click', () => scrollToIndex(i));
            dotsWrap.appendChild(d);
        });
        const dots = Array.from(dotsWrap.children);

        function scrollToIndex(i) {
            const s = slides[i];
            if (!s) return;
            track.scrollTo({ left: s.offsetLeft - (track.clientWidth - s.clientWidth) / 2, behavior: 'smooth' });
        }
        function currentIndex() {
            const center = track.scrollLeft + track.clientWidth / 2;
            let best = 0, bestDist = Infinity;
            slides.forEach((s, i) => {
                const c = s.offsetLeft + s.clientWidth / 2;
                const dist = Math.abs(c - center);
                if (dist < bestDist) { bestDist = dist; best = i; }
            });
            return best;
        }
        function update() {
            const idx = currentIndex();
            dots.forEach((d, i) => d.classList.toggle('is-active', i === idx));
        }
        if (prev) prev.addEventListener('click', () => scrollToIndex(Math.max(0, currentIndex() - 1)));
        if (next) next.addEventListener('click', () => scrollToIndex(Math.min(slides.length - 1, currentIndex() + 1)));
        let t;
        track.addEventListener('scroll', () => { clearTimeout(t); t = setTimeout(update, 80); });
        window.addEventListener('resize', update);
    })();
</script>
@endpush

<!-- ============ HOW IT WORKS ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-brand-700 mb-4">Add the block. Every learner gets their hub.</h2>
        <p class="text-gray-500 mb-12 max-w-2xl mx-auto">No per-learner setup — drop it on the Dashboard or My home and it personalizes itself.</p>
        <div class="flex flex-wrap justify-center items-center gap-3">
            @foreach (['Add the block','It reads core Moodle data','Each learner sees their view','They continue learning'] as $i => $step)
                @if ($i > 0)<iconify-icon icon="lucide:arrow-right" class="text-brand-200 text-xl hidden sm:block"></iconify-icon>@endif
                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-white border border-gray-100 shadow-soft text-sm font-bold text-brand-700"><span class="w-6 h-6 rounded-full bg-brand-50 text-brand-500 flex items-center justify-center text-xs">{{ $i + 1 }}</span>{!! $step !!}</span>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ COMPARISON ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 text-center mb-12">Why not the core blocks?</h2>
        <div class="max-w-4xl mx-auto bg-white rounded-[32px] border border-gray-100 shadow-soft overflow-hidden">
            <table class="w-full text-sm md:text-base">
                <thead><tr class="border-b border-gray-100 text-gray-500">
                    <th class="text-left font-semibold p-4 md:p-5">Capability</th>
                    <th class="font-semibold p-4 md:p-5">Course overview block</th>
                    <th class="font-semibold p-4 md:p-5">Timeline block</th>
                    <th class="font-bold p-4 md:p-5 bg-brand-50 text-brand-700">Modern Learner Dashboard</th>
                </tr></thead>
                <tbody class="text-gray-700">
                    @php
                    $rows = [
                        ['List my courses', '✅', '—', '✅'],
                        ['Upcoming / due-soon activities', '—', '✅', '✅'],
                        ['Completion rate &amp; grade average', '—', '—', '✅'],
                        ['Continue-learning by recent access', 'Partial', '—', '✅'],
                        ['Badges &amp; certificates in one place', '—', '—', '✅'],
                        ['Course library preview (discover &amp; join)', '—', '—', '✅'],
                        ['Theme-tuned, brandable UI', 'Partial', 'Partial', '✅'],
                    ];
                    @endphp
                    @foreach ($rows as $i => [$cap, $a, $b, $c])
                    <tr class="@if ($i < count($rows) - 1) border-b border-gray-50 @endif">
                        <td class="text-left p-4 md:p-5">{!! $cap !!}</td>
                        <td class="text-center p-4 md:p-5 text-gray-400">{{ $a }}</td>
                        <td class="text-center p-4 md:p-5 text-gray-400">{{ $b }}</td>
                        <td class="text-center p-4 md:p-5 bg-brand-50 font-bold text-brand-700">{{ $c }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ============ USE CASES ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-5">Use cases</span>
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">A better first screen for every learner</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            @php
            $cases = [
                ['compass', 'Orientation', 'New learners know where to start', 'Replace a confusing course list with a clear home — progress, what&apos;s due, and a one-click way back into the right course.'],
                ['heart-pulse', 'Engagement', 'Keep learners coming back', 'Continue-learning cards and visible progress, badges, and grades give learners a reason to return and finish.'],
                ['building-2', 'Branding', 'A dashboard that fits your site', 'Scoped, theme-aware styling means the block looks native on Boost, Moove, Adaptable and more — no custom dev.'],
            ];
            @endphp
            @foreach ($cases as [$icon, $tag, $title, $desc])
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8 hover:shadow-float transition-all">
                <div class="w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center text-brand-500 mb-5"><iconify-icon icon="lucide:{{ $icon }}" class="text-2xl"></iconify-icon></div>
                <span class="text-[11px] font-bold tracking-widest uppercase text-brand-500">{{ $tag }}</span>
                <h3 class="text-xl font-bold text-brand-700 mt-2 mb-3">{{ $title }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{!! $desc !!}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ PRICING ============ -->
<section id="pricing" class="py-20 md:py-28 bg-brand-50/50">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="text-center mb-14">
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-4">Simple, per-site pricing</h2>
            <p class="text-lg text-gray-500">Every tier includes every feature. GPL v3 licensed.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto items-center">
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8">
                <h3 class="text-lg font-bold text-brand-700">Starter</h3>
                <div class="text-4xl font-extrabold text-brand-700 my-4">$99<span class="text-base font-normal text-gray-400">/yr</span></div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 site</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 year updates</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Email support</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl border border-gray-200 font-bold text-brand-700 hover:bg-gray-50 transition-colors">Buy Starter</a>
            </div>
            <div class="bg-white rounded-[28px] border-2 border-brand-500 shadow-float p-8 relative md:scale-105">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-brand-500 text-white text-xs font-bold px-4 py-1 rounded-full">Most Popular</span>
                <h3 class="text-lg font-bold text-brand-700">Pro</h3>
                <div class="text-4xl font-extrabold text-brand-500 my-4">$299<span class="text-base font-normal text-gray-400">/yr</span></div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Up to 5 sites</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 year updates</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Priority support</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl bg-brand-500 text-white font-bold hover:bg-brand-600 transition-all hover:-translate-y-0.5">Buy Pro</a>
            </div>
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8">
                <h3 class="text-lg font-bold text-brand-700">Enterprise</h3>
                <div class="text-4xl font-extrabold text-brand-700 my-4">Custom</div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Tailored pricing for your Moodle setup</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Personalized implementation plan</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Custom admin onboarding &amp; training</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Invoicing</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl border border-gray-200 font-bold text-brand-700 hover:bg-gray-50 transition-colors">Talk to sales</a>
            </div>
        </div>
        <p class="text-center text-sm text-gray-400 mt-8">✓ 30-day money-back guarantee &nbsp;·&nbsp; ✓ GPL v3 — modify freely &nbsp;·&nbsp; ✓ Cancel anytime</p>
    </div>
</section>

<!-- ============ FAQ ============ -->
<section class="py-20 md:py-28">
    <div class="max-w-3xl mx-auto px-6 lg:px-12">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 text-center mb-12">Frequently asked questions</h2>
        <div class="space-y-4">
            @php
            $faqs = [
                ['Which Moodle versions are supported?', 'Moodle 4.5 through 5.2, CI-tested on 4.5, 5.1, and 5.2.'],
                ['Which themes does it work with?', 'It is tested and styled for Boost, Boost Union, Classic, Moove, Adaptable, Academi, and Degrade, and reads the active theme so you can scope your own tweaks.'],
                ['Does each learner need to set it up?', 'No. The block reads core Moodle data and personalizes itself for whoever is viewing it — no learner configuration.'],
                ['Where do the badges and certificates come from?', 'Badges use Moodle&apos;s core badge issue records; certificates come from Course Certificate (mod_coursecertificate) activities when present.'],
                ['How is learner data handled (GDPR)?', 'A bundled privacy provider declares what the block surfaces and supports export and deletion at the system context.'],
                ['Is it really GPL? Can we modify it?', "Yes — GNU GPL v3 or later. You're free to modify it for your own installation."],
            ];
            @endphp
            @foreach ($faqs as [$q, $a])
            <details class="group bg-white rounded-2xl border border-gray-100 shadow-soft p-5 open:shadow-float transition-all">
                <summary class="flex items-center justify-between cursor-pointer list-none font-bold text-brand-700">{!! $q !!}<iconify-icon icon="lucide:chevron-down" class="text-brand-500 transition-transform group-open:rotate-180"></iconify-icon></summary>
                <p class="text-gray-500 text-sm leading-relaxed mt-3">{!! $a !!}</p>
            </details>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ FINAL CTA ============ -->
<section class="py-24 md:py-32 relative">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-950 rounded-[64px] overflow-hidden relative p-12 lg:p-24 flex items-center shadow-2xl min-h-[440px]">
            <div class="absolute inset-0 z-0 opacity-30">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000" alt="" aria-hidden="true" class="w-full h-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/80 to-transparent"></div>
            </div>
            <div class="max-w-2xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">Give learners a reason <br><span class="font-serif italic text-brand-500">to come back.</span></h2>
                <p class="text-lg text-gray-400 mb-10">Add one block and turn the Moodle dashboard into a clear, personalized learner home.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#pricing" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1">Buy now</a>
                    <a href="/book-demo" class="inline-flex items-center px-10 py-4 border border-white/20 text-white font-bold rounded-xl hover:bg-white/10 transition-all">Book a demo</a>
                </div>
                <p class="text-sm text-gray-500 mt-5">Moodle 4.5–5.2 · GPL v3 · No learner setup</p>
            </div>
        </div>
    </div>
</section>
@endsection
