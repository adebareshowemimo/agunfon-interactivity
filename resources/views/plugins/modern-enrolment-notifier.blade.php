@extends('layouts.app')

@section('title', 'Modern Enrolment Notifier for Moodle - Agunfon')

@section('content')
<!-- ============ HERO ============ -->
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center">
        <div class="max-w-xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                MOODLE PLUGIN
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Every enrolment, <span class="font-serif italic text-brand-500">acknowledged</span>
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed mb-10">
                Modern Enrolment Notifier sends clear, timely messages the moment learners are enrolled, before access expires, and when they complete — to learners, teachers, managers, and even Slack or Teams. Rule-based, multi-channel, and fully automated on Moodle cron.
            </p>
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="#pricing" class="inline-flex items-center px-9 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1 active:translate-y-0">Buy now</a>
                <a href="/book-demo" class="inline-flex items-center px-9 py-4 border border-gray-200 text-brand-700 font-bold rounded-xl hover:bg-gray-50 transition-all">Book a demo</a>
            </div>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-500 font-medium">
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:shield-check" class="text-brand-500"></iconify-icon> GDPR-ready</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:send" class="text-brand-500"></iconify-icon> Email · Slack · Teams</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:clock" class="text-brand-500"></iconify-icon> Runs on cron</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:check-circle" class="text-brand-500"></iconify-icon> Moodle 4.5–5.2</span>
            </div>
        </div>

        <!-- Product mockup card -->
        <div class="relative">
            <div class="bg-white rounded-[32px] shadow-2xl border border-gray-100 p-5 hero-dashboard">
                <div class="flex items-center gap-1.5 px-2 pb-4">
                    <span class="w-3 h-3 rounded-full bg-red-400"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                    <span class="w-3 h-3 rounded-full bg-green-400"></span>
                    <span class="ml-3 text-xs text-gray-400">moodle.yourschool.edu › enrolment notifier</span>
                </div>
                <div class="grid grid-cols-3 gap-3 mb-3">
                    <div class="rounded-2xl border border-gray-100 bg-brand-50 p-4">
                        <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500">Welcomes sent</div>
                        <div class="text-2xl font-extrabold text-brand-700">214</div>
                    </div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-4">
                        <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500">Expiring soon</div>
                        <div class="text-2xl font-extrabold text-amber-500">37</div>
                    </div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-4">
                        <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500">Completed</div>
                        <div class="text-2xl font-extrabold text-green-600">96</div>
                    </div>
                </div>
                <div class="rounded-2xl border border-gray-100 p-4 mb-3">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500 mb-3">Delivery channels</div>
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-brand-700 bg-brand-50 rounded-full px-3 py-1.5"><iconify-icon icon="lucide:mail"></iconify-icon> Email</span>
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-brand-700 bg-brand-50 rounded-full px-3 py-1.5"><iconify-icon icon="lucide:smartphone"></iconify-icon> In-app</span>
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-brand-700 bg-brand-50 rounded-full px-3 py-1.5"><iconify-icon icon="lucide:slack"></iconify-icon> Slack</span>
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-brand-700 bg-brand-50 rounded-full px-3 py-1.5"><iconify-icon icon="lucide:webhook"></iconify-icon> Webhook</span>
                    </div>
                </div>
                <div class="rounded-2xl border border-gray-100 p-4">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Rule: <span class="font-semibold text-brand-700">New enrolment → Welcome</span></span>
                        <span class="text-xs font-bold text-green-600 bg-green-50 rounded-full px-2.5 py-1">Active</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-2 absolute -top-4 -left-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700">
                <iconify-icon icon="lucide:bell-ring" class="text-brand-500"></iconify-icon> Learner welcomed
            </div>
            <div class="hidden md:flex items-center gap-2 absolute -bottom-4 -right-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700">
                <iconify-icon icon="lucide:hourglass" class="text-brand-500"></iconify-icon> Expiry reminder queued
            </div>
        </div>
    </div>
</section>

<!-- ============ SOLUTION OVERVIEW ============ -->
<section class="py-20 md:py-28">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-10">Enrolment communication, without the manual follow-up</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                Every enrolment is a moment that matters — a warm welcome sets the tone, an expiry reminder protects access, a completion message drives the next step. Doing that by hand doesn't scale. Modern Enrolment Notifier is built around notification rules: each rule decides when a message sends, who receives it, which template it uses, and which channel carries it. Messages are queued and delivered by Moodle cron, so enrolment activity stays fast even when email servers or external services are slow.
            </p>
        </div>
    </div>
</section>

<!-- ============ 10 REASONS (slider) ============ -->
@push('styles')
<style>
    .reason-slider-track { scrollbar-width: none; -ms-overflow-style: none; }
    .reason-slider-track::-webkit-scrollbar { display: none; }
    .reason-dot { width: 8px; height: 8px; border-radius: 9999px; background: #D1E3FF; border: 0; padding: 0; cursor: pointer; transition: all .25s ease; }
    .reason-dot.is-active { width: 26px; background: #4B8BE8; }
</style>
@endpush
<section class="py-12 md:py-20 bg-brand-50/40 border-y border-blue-50">
    <div class="max-w-[1100px] mx-auto px-6 lg:px-12">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-5">Why choose it</span>
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">10 reasons to choose <span class="font-serif italic text-brand-500">Modern Enrolment Notifier</span></h2>
            <p class="text-gray-500 mt-4">Swipe through the highlights — click any slide to view it full size.</p>
        </div>
        @php
        $reasonSlides = [
            ['02-one-lifecycle-engine', 'One lifecycle engine'],
            ['03-zero-manual-chase', 'Zero manual chase'],
            ['04-the-right-recipients', 'The right recipients'],
            ['05-never-block-enrolment', 'Never block enrolment'],
            ['06-five-delivery-channels', 'Five delivery channels'],
            ['07-twenty-branded-templates', 'Twenty branded templates'],
            ['08-ai-assisted-drafting', 'AI-assisted drafting'],
            ['09-delegate-safely', 'Delegate, safely'],
            ['10-prove-it-works', 'Prove it works'],
            ['11-enterprise-ready-and-compliant', 'Enterprise-ready & compliant'],
        ];
        $slidesBase = '/images/plugins/modern-enrolment-notifier/ten-reasons/slides';
        @endphp
        <div class="relative" data-reason-slider>
            <div class="reason-slider-track flex overflow-x-auto snap-x snap-mandatory scroll-smooth gap-5 pb-4 -mx-2 px-2" data-slider-track>
                @foreach ($reasonSlides as [$file, $alt])
                <a href="{{ $slidesBase }}/{{ $file }}.png" target="_blank" rel="noopener"
                   class="snap-center shrink-0 w-[88%] sm:w-[72%] lg:w-[62%] rounded-[24px] overflow-hidden border border-gray-100 shadow-soft hover:shadow-float transition-shadow bg-white">
                    <img src="{{ $slidesBase }}/{{ $file }}.png" alt="{{ $alt }}" loading="lazy" class="w-full h-auto block" />
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
        const root = document.querySelector('[data-reason-slider]');
        if (!root) return;
        const track = root.querySelector('[data-slider-track]');
        const slides = Array.from(track.children);
        const prev = root.querySelector('[data-slider-prev]');
        const next = root.querySelector('[data-slider-next]');
        const dotsWrap = root.querySelector('[data-slider-dots]');
        slides.forEach((_, i) => {
            const d = document.createElement('button');
            d.type = 'button';
            d.className = 'reason-dot' + (i === 0 ? ' is-active' : '');
            d.setAttribute('aria-label', 'Go to reason ' + (i + 1));
            d.addEventListener('click', () => scrollToIndex(i));
            dotsWrap.appendChild(d);
        });
        const dots = Array.from(dotsWrap.children);
        function scrollToIndex(i) { const s = slides[i]; if (!s) return; track.scrollTo({ left: s.offsetLeft - (track.clientWidth - s.clientWidth) / 2, behavior: 'smooth' }); }
        function currentIndex() { const center = track.scrollLeft + track.clientWidth / 2; let best = 0, bd = Infinity; slides.forEach((s, i) => { const c = s.offsetLeft + s.clientWidth / 2; const dist = Math.abs(c - center); if (dist < bd) { bd = dist; best = i; } }); return best; }
        function update() { const idx = currentIndex(); dots.forEach((d, i) => d.classList.toggle('is-active', i === idx)); }
        if (prev) prev.addEventListener('click', () => scrollToIndex(Math.max(0, currentIndex() - 1)));
        if (next) next.addEventListener('click', () => scrollToIndex(Math.min(slides.length - 1, currentIndex() + 1)));
        let t;
        track.addEventListener('scroll', () => { clearTimeout(t); t = setTimeout(update, 80); });
        window.addEventListener('resize', update);
    })();
</script>
@endpush

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
                    ['git-branch', 'Flexible notification rules', 'React to new enrolments, expiring or expired access, and course completion — scoped to all courses, a category, or a single course, with smart condition filters.'],
                    ['send', 'Multi-channel delivery', 'Reach people where they are: email, in-app / mobile notifications, webhooks, Slack, and Microsoft Teams — with a built-in channel test page.'],
                    ['users', 'Every recipient covered', 'Notify the enrolled learner, course teachers, course managers, Moodle course contacts, or the learner&apos;s line manager.'],
                    ['user-cog', 'Manager mapping', 'Resolve line managers from a manual table, a profile field, or Moodle roles — and bulk-import mappings by CSV.'],
                    ['sparkles', 'Professional &amp; AI-drafted templates', 'Ready-made HTML templates for onboarding, compliance, certification and more, with rich placeholders — plus optional AI drafting via Moodle AI.'],
                    ['layout-dashboard', 'Digests, dashboards &amp; logs', 'Group high-volume alerts into daily or weekly digests, and manage everything from dashboards, delivery logs, queue controls, and CSV exports.'],
                ];
                @endphp
                @foreach ($features as [$icon, $title, $desc])
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md">
                        <iconify-icon icon="lucide:{{ $icon }}" class="text-xl"></iconify-icon>
                    </div>
                    <div>
                        <h3 class="text-white text-lg font-bold mb-1">{!! $title !!}</h3>
                        <p class="text-blue-100/80 text-sm leading-relaxed">{!! $desc !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-brand-700 mb-4">Event happens. The right message goes out.</h2>
        <p class="text-gray-500 mb-12 max-w-2xl mx-auto">Enrolment events trigger rules instantly; messages queue and deliver on cron — no manual chasing, no page-load slowdown.</p>
        <div class="flex flex-wrap justify-center items-center gap-3">
            @foreach (['Enrolment event','Match rule','Queue message','Deliver (any channel)','Retry / digest'] as $i => $step)
                @if ($i > 0)<iconify-icon icon="lucide:arrow-right" class="text-brand-200 text-xl hidden sm:block"></iconify-icon>@endif
                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-white border border-gray-100 shadow-soft text-sm font-bold text-brand-700">
                    <span class="w-6 h-6 rounded-full bg-brand-50 text-brand-500 flex items-center justify-center text-xs">{{ $i + 1 }}</span>{{ $step }}
                </span>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ COMPARISON ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 text-center mb-12">Why not just core Moodle?</h2>
        <div class="max-w-4xl mx-auto bg-white rounded-[32px] border border-gray-100 shadow-soft overflow-hidden">
            <table class="w-full text-sm md:text-base">
                <thead>
                    <tr class="border-b border-gray-100 text-gray-500">
                        <th class="text-left font-semibold p-4 md:p-5">Capability</th>
                        <th class="font-semibold p-4 md:p-5">Core Moodle</th>
                        <th class="font-semibold p-4 md:p-5">Basic plugins</th>
                        <th class="font-bold p-4 md:p-5 bg-brand-50 text-brand-700">Modern Enrolment Notifier</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @php
                    $rows = [
                        ['Notify learner on enrolment', 'Basic', '✅', '✅'],
                        ['Rule-based scope &amp; conditions', '—', 'Partial', '✅'],
                        ['Expiry reminders (before / after)', '—', '—', '✅'],
                        ['Completion &amp; next-step messages', '—', 'Partial', '✅'],
                        ['Slack / Teams / webhook delivery', '—', '—', '✅'],
                        ['Manager &amp; multi-recipient routing', '—', '—', '✅'],
                        ['Digests, logs &amp; CSV export', '—', '—', '✅'],
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
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">From first welcome to renewal</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            @php
            $cases = [
                ['bell-ring', 'Onboarding', 'Warm, branded welcomes', 'Greet every new enrollee instantly with a branded message and the exact next step — no one starts a course in silence.'],
                ['hourglass', 'Retention', 'Protect expiring access', 'Send renewal reminders before access ends and follow-ups after, so learners and managers act before a licence lapses.'],
                ['plug', 'Operations', 'Notify the systems you run on', 'Push enrolment and completion events to Slack, Teams, or a webhook to trigger downstream workflows and keep ops in the loop.'],
            ];
            @endphp
            @foreach ($cases as [$icon, $tag, $title, $desc])
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8 hover:shadow-float transition-all">
                <div class="w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center text-brand-500 mb-5">
                    <iconify-icon icon="lucide:{{ $icon }}" class="text-2xl"></iconify-icon>
                </div>
                <span class="text-[11px] font-bold tracking-widest uppercase text-brand-500">{{ $tag }}</span>
                <h3 class="text-xl font-bold text-brand-700 mt-2 mb-3">{{ $title }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
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
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features &amp; channels</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 year updates</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Email support</li>
                </ul>
                <a href="https://marketplace.moodle.com/plugins/76" target="_blank" rel="noopener" class="block text-center px-6 py-3 rounded-xl border border-gray-200 font-bold text-brand-700 hover:bg-gray-50 transition-colors">Buy Starter</a>
            </div>
            <div class="bg-white rounded-[28px] border-2 border-brand-500 shadow-float p-8 relative md:scale-105">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-brand-500 text-white text-xs font-bold px-4 py-1 rounded-full">Most Popular</span>
                <h3 class="text-lg font-bold text-brand-700">Pro</h3>
                <div class="text-4xl font-extrabold text-brand-500 my-4">$299<span class="text-base font-normal text-gray-400">/yr</span></div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Up to 5 sites</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features &amp; channels</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 year updates</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Priority support</li>
                </ul>
                <a href="https://marketplace.moodle.com/plugins/76" target="_blank" rel="noopener" class="block text-center px-6 py-3 rounded-xl bg-brand-500 text-white font-bold hover:bg-brand-600 transition-all hover:-translate-y-0.5">Buy Pro</a>
            </div>
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8">
                <h3 class="text-lg font-bold text-brand-700">Enterprise</h3>
                <div class="text-4xl font-extrabold text-brand-700 my-4">Custom</div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features &amp; channels</li>
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
                ['Which Moodle versions are supported?', 'Moodle 4.5 through 5.2.'],
                ['How do Slack and Teams notifications work?', 'Add a webhook URL for each channel in the settings. A built-in channel-test page lets you confirm each endpoint works before you rely on it.'],
                ['Can course teachers manage their own notifications?', 'Yes. With permission, course managers can enable course notifications, pick a template, write a custom message, preview it, and create course-specific rules — within limits you set as administrator.'],
                ['How is learner data handled (GDPR)?', 'A bundled privacy provider declares everything stored and supports full user export and deletion at the system context.'],
                ['Will it slow my site down?', 'No. Enrolment events are captured instantly, but messages are queued and delivered by Moodle cron — so enrolment stays fast even if email or external services are slow.'],
                ['Is it really GPL? Can we modify it?', "Yes — GNU GPL v3 or later. You're free to modify it for your own installation."],
            ];
            @endphp
            @foreach ($faqs as [$q, $a])
            <details class="group bg-white rounded-2xl border border-gray-100 shadow-soft p-5 open:shadow-float transition-all">
                <summary class="flex items-center justify-between cursor-pointer list-none font-bold text-brand-700">
                    {{ $q }}
                    <iconify-icon icon="lucide:chevron-down" class="text-brand-500 transition-transform group-open:rotate-180"></iconify-icon>
                </summary>
                <p class="text-gray-500 text-sm leading-relaxed mt-3">{{ $a }}</p>
            </details>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ FINAL CTA (dark navy panel) ============ -->
<section class="py-24 md:py-32 relative">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-950 rounded-[64px] overflow-hidden relative p-12 lg:p-24 flex items-center shadow-2xl min-h-[440px]">
            <div class="absolute inset-0 z-0 opacity-30">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000" alt="" aria-hidden="true" class="w-full h-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/80 to-transparent"></div>
            </div>
            <div class="max-w-2xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Welcome every learner. <br><span class="font-serif italic text-brand-500">Automatically.</span>
                </h2>
                <p class="text-lg text-gray-400 mb-10">Install in minutes, set your rules once, and let every enrolment send the right message on the right channel.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#pricing" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1">Buy now</a>
                    <a href="/book-demo" class="inline-flex items-center px-10 py-4 border border-white/20 text-white font-bold rounded-xl hover:bg-white/10 transition-all">Book a demo</a>
                </div>
                <p class="text-sm text-gray-500 mt-5">30-day money-back guarantee · Moodle 4.5–5.2 · GPL v3</p>
            </div>
        </div>
    </div>
</section>
@endsection
