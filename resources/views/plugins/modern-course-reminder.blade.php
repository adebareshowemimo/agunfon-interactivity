@extends('layouts.app')

@section('title', 'Modern Course Reminder for Moodle - Agunfon')

@section('content')
<!-- ============ HERO ============ -->
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center">
        <div class="max-w-xl">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                MOODLE PLUGIN
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Course completion that <span class="font-serif italic text-brand-500">runs itself</span>
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed mb-10">
                Modern Course Reminder finds the learners who are stalling, nudges them automatically, and escalates to their manager when they don't act — turning manual follow-up into an auditable, measurable system inside your Moodle.
            </p>
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="#pricing" class="inline-flex items-center px-9 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1 active:translate-y-0">Buy now</a>
                <a href="/book-demo" class="inline-flex items-center px-9 py-4 border border-gray-200 text-brand-700 font-bold rounded-xl hover:bg-gray-50 transition-all">Book a demo</a>
            </div>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-500 font-medium">
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:shield-check" class="text-brand-500"></iconify-icon> GDPR-ready</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:accessibility" class="text-brand-500"></iconify-icon> WCAG 2.1 AA</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:clock" class="text-brand-500"></iconify-icon> Runs on cron</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:check-circle" class="text-brand-500"></iconify-icon> Moodle 4.5–5.2</span>
            </div>
        </div>

        <!-- Product mockup card (on-brand, built with utilities) -->
        <div class="relative">
            <div class="bg-white rounded-[32px] shadow-2xl border border-gray-100 p-5 hero-dashboard">
                <div class="flex items-center gap-1.5 px-2 pb-4">
                    <span class="w-3 h-3 rounded-full bg-red-400"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                    <span class="w-3 h-3 rounded-full bg-green-400"></span>
                    <span class="ml-3 text-xs text-gray-400">moodle.yourschool.edu › reminders</span>
                </div>
                <div class="grid grid-cols-3 gap-3 mb-3">
                    <div class="rounded-2xl border border-gray-100 bg-brand-50 p-4">
                        <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500">Inactive 30d+</div>
                        <div class="text-2xl font-extrabold text-brand-700">128</div>
                    </div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-4">
                        <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500">Overdue</div>
                        <div class="text-2xl font-extrabold text-red-500">42</div>
                    </div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-4">
                        <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500">Sent today</div>
                        <div class="text-2xl font-extrabold text-green-600">317</div>
                    </div>
                </div>
                <div class="rounded-2xl border border-gray-100 p-4">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-[11px] font-bold uppercase tracking-wide text-gray-500">Reminders · last 7 days</span>
                        <span class="text-xs font-bold text-green-600">▲ 18%</span>
                    </div>
                    <div class="flex items-end gap-2 h-20">
                        <div class="flex-1 rounded-t-md bg-brand-200" style="height:42%"></div>
                        <div class="flex-1 rounded-t-md bg-brand-500" style="height:64%"></div>
                        <div class="flex-1 rounded-t-md bg-brand-200" style="height:50%"></div>
                        <div class="flex-1 rounded-t-md bg-brand-500" style="height:82%"></div>
                        <div class="flex-1 rounded-t-md bg-brand-200" style="height:70%"></div>
                        <div class="flex-1 rounded-t-md bg-brand-500" style="height:94%"></div>
                        <div class="flex-1 rounded-t-md bg-brand-200" style="height:68%"></div>
                    </div>
                </div>
            </div>
            <!-- floating chips -->
            <div class="hidden md:flex items-center gap-2 absolute -top-4 -left-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700">
                <iconify-icon icon="lucide:trending-up" class="text-brand-500"></iconify-icon> Completion +23%
            </div>
            <div class="hidden md:flex items-center gap-2 absolute -bottom-4 -right-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700">
                <iconify-icon icon="lucide:user-check" class="text-brand-500"></iconify-icon> Escalated to manager
            </div>
        </div>
    </div>
</section>

<!-- ============ TRUST / STATS BAND ============ -->
<section class="py-12 md:py-16 bg-brand-50/60 border-y border-blue-50">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <p class="text-center text-xs font-bold tracking-widest uppercase text-gray-400 mb-10">Trusted by Moodle teams in education &amp; enterprise</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div><div class="text-4xl font-extrabold text-brand-700">[XX]%</div><div class="text-sm text-gray-500 mt-1">higher completion after reminders</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">[XX] hrs</div><div class="text-sm text-gray-500 mt-1">saved per cohort, monthly</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">5 min</div><div class="text-sm text-gray-500 mt-1">send cadence on cron</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">100%</div><div class="text-sm text-gray-500 mt-1">auditable delivery log</div></div>
        </div>
        <p class="text-center text-xs text-gray-400 mt-6">Figures are illustrative placeholders — replace with verified deployment data before publishing.</p>
    </div>
</section>

<!-- ============ SOLUTION OVERVIEW ============ -->
<section class="py-20 md:py-28">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-10">Stop chasing learners by hand</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                You already know who's falling behind — you just don't have the hours to chase every one of them. Core Moodle can send a message, but it can't watch enrolments, apply rules, follow up on a schedule, or escalate when someone keeps ignoring the nudge. Modern Course Reminder turns that manual work into a continuous, auditable process: set your rules once and it re-engages inactive and overdue learners, escalates to managers automatically, and proves exactly what was sent — every cron run.
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
                    ['target', 'Rule-based targeting', 'Reach incomplete, inactive, overdue, or newly enrolled learners — site-wide, per category, cohort, or course.'],
                    ['user-check', 'Manager escalation', 'Escalate overdue learners to their line manager — resolved by Moodle role, profile field, or manual mapping.'],
                    ['mail', 'Manager &amp; admin digests', 'Daily, weekly, or monthly roll-ups of every overdue team member — not a flood of individual alerts.'],
                    ['sparkles', 'AI-drafted templates', 'Branded learner, manager &amp; digest templates with placeholders, live preview, and optional AI drafting via Moodle AI.'],
                    ['repeat', 'Reliable delivery pipeline', 'Evaluate → queue → send → retry, all on cron, with configurable retry limits. Failed sends retry themselves.'],
                    ['bar-chart-3', 'Reports &amp; analytics', 'Learner-risk dashboard, delivery reports, log tables, and a Report Builder datasource for custom reporting.'],
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
        <h2 class="text-3xl md:text-4xl font-bold text-brand-700 mb-4">Set the rules once. It runs forever.</h2>
        <p class="text-gray-500 mb-12 max-w-2xl mx-auto">A fully automated pipeline on Moodle cron — no manual chasing, no page-load slowdown.</p>
        <div class="flex flex-wrap justify-center items-center gap-3">
            @foreach (['Evaluate rules','Build queue','Send','Retry failed','Digest'] as $i => $step)
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
                        <th class="font-bold p-4 md:p-5 bg-brand-50 text-brand-700">Modern Course Reminder</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @php
                    $rows = [
                        ['Send a message to learners', '✅', '✅', '✅'],
                        ['Rule-based targeting', '—', 'Partial', '✅'],
                        ['Automated scheduled follow-up on cron', '—', 'Partial', '✅'],
                        ['Manager escalation', '—', '—', '✅'],
                        ['Manager &amp; admin digests', '—', '—', '✅'],
                        ['Branded templates + AI drafting', '—', 'Partial', '✅'],
                        ['Reports + Report Builder datasource', '—', '—', '✅'],
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

<!-- ============ CASE STUDIES ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-5">Customers</span>
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">Built for real L&amp;D operations</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            @php
            $cases = [
                ['shield-check', 'Enterprise compliance', 'Compliance recovery at scale', 'Standardize follow-up across departments, escalate to managers only when needed, and show auditors who was reminded, escalated, and completed.'],
                ['user-plus', 'Onboarding', 'New-hire onboarding, no extra admin', 'Every new starter gets a consistent nudge until onboarding is complete — enterprise-style discipline for a small team.'],
                ['refresh-cw', 'Re-engagement', 'Re-engage inactive learners', 'Detect silent drop-offs and re-engage them while the program is still relevant — turning inactivity into a visible signal.'],
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
        <div class="max-w-3xl mx-auto bg-brand-50 rounded-[32px] p-10 text-center border border-blue-50">
            <div class="text-brand-500 text-xl mb-4">★★★★★</div>
            <p class="text-xl md:text-2xl font-semibold text-brand-700 leading-relaxed mb-4">“[TESTIMONIAL — a named L&amp;D manager, their institution, and a concrete completion-rate or time-saved result.]”</p>
            <p class="text-gray-500 text-sm">— [Name, Role, Institution]</p>
        </div>
        <p class="text-center text-xs text-gray-400 mt-5">Scenarios from our L&amp;D case-study library — replace with named customer results before publishing.</p>
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
            <!-- Starter -->
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8">
                <h3 class="text-lg font-bold text-brand-700">Starter</h3>
                <div class="text-4xl font-extrabold text-brand-700 my-4">$XX<span class="text-base font-normal text-gray-400">/yr</span></div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 site</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 year updates</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Email support</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl border border-gray-200 font-bold text-brand-700 hover:bg-gray-50 transition-colors">Buy Starter</a>
            </div>
            <!-- Pro (highlighted) -->
            <div class="bg-white rounded-[28px] border-2 border-brand-500 shadow-float p-8 relative md:scale-105">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-brand-500 text-white text-xs font-bold px-4 py-1 rounded-full">Most Popular</span>
                <h3 class="text-lg font-bold text-brand-700">Pro</h3>
                <div class="text-4xl font-extrabold text-brand-500 my-4">$XXX<span class="text-base font-normal text-gray-400">/yr</span></div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Up to 5 sites</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 year updates</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Priority support</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl bg-brand-500 text-white font-bold hover:bg-brand-600 transition-all hover:-translate-y-0.5">Buy Pro</a>
            </div>
            <!-- Institution -->
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8">
                <h3 class="text-lg font-bold text-brand-700">Institution</h3>
                <div class="text-4xl font-extrabold text-brand-700 my-4">Custom</div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Unlimited sites</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Onboarding + SLA</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Invoicing</li>
                </ul>
                <a href="/book-demo" class="block text-center px-6 py-3 rounded-xl border border-gray-200 font-bold text-brand-700 hover:bg-gray-50 transition-colors">Talk to sales</a>
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
                ['Does it work with our theme and the mobile app?', "Yes. It uses Moodle's standard email and notification channels and admin pages, so it works with any theme and respects mobile notification preferences."],
                ['How is learner data handled (GDPR)?', 'A bundled privacy provider declares everything stored and supports full user export and deletion at the system context.'],
                ['Will it slow my site down?', 'No. All processing runs in scheduled cron tasks, not during page loads.'],
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
                    Stop chasing learners. <br><span class="font-serif italic text-brand-500">Let it run.</span>
                </h2>
                <p class="text-lg text-gray-400 mb-10">Install in minutes, set your rules once, and watch completion climb.</p>
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
