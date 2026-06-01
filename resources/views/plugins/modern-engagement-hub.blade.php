@extends('layouts.app')

@section('title', 'Modern Engagement Hub for Moodle - Agunfon')

@section('content')
<!-- ============ HERO ============ -->
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center">
        <div class="max-w-xl">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                MOODLE PLUGIN <span class="w-1 h-1 rounded-full bg-blue-300"></span> Early access
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Keep every learner <span class="font-serif italic text-brand-500">engaged</span>
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed mb-10">
                Modern Engagement Hub turns one-off messages into orchestrated campaigns: multi-step journeys that nudge the right learners, escalate when there's no response, and prove what worked — all from one Moodle dashboard.
            </p>
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="/book-demo" class="inline-flex items-center px-9 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1 active:translate-y-0">Request early access</a>
                <a href="/book-demo" class="inline-flex items-center px-9 py-4 border border-gray-200 text-brand-700 font-bold rounded-xl hover:bg-gray-50 transition-all">Book a demo</a>
            </div>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-500 font-medium">
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:shield-check" class="text-brand-500"></iconify-icon> GDPR-ready</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:git-merge" class="text-brand-500"></iconify-icon> Multi-step journeys</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:clock" class="text-brand-500"></iconify-icon> Runs on cron</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:check-circle" class="text-brand-500"></iconify-icon> Moodle 4.5+</span>
            </div>
        </div>

        <!-- Product mockup: campaign journey -->
        <div class="relative">
            <div class="bg-white rounded-[32px] shadow-2xl border border-gray-100 p-5 hero-dashboard">
                <div class="flex items-center gap-1.5 px-2 pb-4">
                    <span class="w-3 h-3 rounded-full bg-red-400"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                    <span class="w-3 h-3 rounded-full bg-green-400"></span>
                    <span class="ml-3 text-xs text-gray-400">moodle.yourschool.edu › engagement hub</span>
                </div>
                <div class="grid grid-cols-3 gap-3 mb-3">
                    <div class="rounded-2xl border border-gray-100 bg-brand-50 p-4"><div class="text-[11px] font-bold uppercase tracking-wide text-gray-500">Active campaigns</div><div class="text-2xl font-extrabold text-brand-700">8</div></div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-4"><div class="text-[11px] font-bold uppercase tracking-wide text-gray-500">In journey</div><div class="text-2xl font-extrabold text-brand-700">1,204</div></div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-4"><div class="text-[11px] font-bold uppercase tracking-wide text-gray-500">Responded</div><div class="text-2xl font-extrabold text-green-600">63%</div></div>
                </div>
                <div class="rounded-2xl border border-gray-100 p-4">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500 mb-3">Journey · "Re-engage week 2"</div>
                    <div class="space-y-2">
                        <div class="flex items-center gap-3 text-sm"><span class="w-6 h-6 rounded-full bg-brand-500 text-white flex items-center justify-center text-xs">1</span><span class="text-gray-700">Nudge email</span><span class="ml-auto text-xs text-gray-400">day 0</span></div>
                        <div class="flex items-center gap-3 text-sm"><span class="w-6 h-6 rounded-full bg-brand-200 text-brand-700 flex items-center justify-center text-xs">2</span><span class="text-gray-700">In-app reminder</span><span class="ml-auto text-xs text-gray-400">day 3</span></div>
                        <div class="flex items-center gap-3 text-sm"><span class="w-6 h-6 rounded-full bg-amber-400 text-white flex items-center justify-center text-xs">3</span><span class="text-gray-700">Escalate to teacher</span><span class="ml-auto text-xs text-gray-400">no response</span></div>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-2 absolute -top-4 -left-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700"><iconify-icon icon="lucide:activity" class="text-brand-500"></iconify-icon> Risk learner flagged</div>
            <div class="hidden md:flex items-center gap-2 absolute -bottom-4 -right-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700"><iconify-icon icon="lucide:git-merge" class="text-brand-500"></iconify-icon> Journey advanced</div>
        </div>
    </div>
</section>

<!-- ============ TRUST / STATS BAND ============ -->
<section class="py-12 md:py-16 bg-brand-50/60 border-y border-blue-50">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <p class="text-center text-xs font-bold tracking-widest uppercase text-gray-400 mb-10">Built for engagement teams in education &amp; enterprise</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div><div class="text-4xl font-extrabold text-brand-700">[XX]%</div><div class="text-sm text-gray-500 mt-1">higher response after journeys</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">[XX] hrs</div><div class="text-sm text-gray-500 mt-1">saved on manual outreach</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">1</div><div class="text-sm text-gray-500 mt-1">dashboard for every campaign</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">100%</div><div class="text-sm text-gray-500 mt-1">auditable delivery log</div></div>
        </div>
        <p class="text-center text-xs text-gray-400 mt-6">Figures are illustrative placeholders — replace with verified data before publishing.</p>
    </div>
</section>

<!-- ============ SOLUTION OVERVIEW ============ -->
<section class="py-20 md:py-28">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-10">From scattered messages to orchestrated engagement</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                A single reminder rarely moves the needle. Real engagement is a sequence — the right message, to the right learner, at the right moment, with a follow-up when there's no response. Modern Engagement Hub lets you design those sequences as campaigns and journeys, target them by segment, route approvals through your team, and watch results in one dashboard. Messages queue and deliver on Moodle cron, so your site stays fast.
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
                    ['git-merge', 'Multi-step campaigns &amp; journeys', 'Design sequences of steps with scheduling and delays — send now, schedule, or let learners flow through a journey automatically.'],
                    ['activity', 'Smart interventions &amp; rules', 'Trigger the right outreach when learners hit defined conditions, so at-risk and inactive learners get help before they disengage.'],
                    ['users', 'Segments &amp; recipients', 'Target campaigns to the right cohorts and learners, and choose exactly who each step reaches.'],
                    ['git-pull-request-arrow', 'Escalation that doesn&apos;t drop', 'When a journey ends without a response, escalate automatically — with a delay and an escalation template you control.'],
                    ['clipboard-check', 'Templates with approval workflow', 'Reusable message templates with a built-in approve-before-send workflow for campaigns and templates.'],
                    ['layout-dashboard', 'Reports, logs &amp; dashboards', 'Track every campaign, delivery, and outcome from one dashboard, with delivery logs and reporting.'],
                ];
                @endphp
                @foreach ($features as [$icon, $title, $desc])
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md"><iconify-icon icon="lucide:{{ $icon }}" class="text-xl"></iconify-icon></div>
                    <div><h3 class="text-white text-lg font-bold mb-1">{!! $title !!}</h3><p class="text-blue-100/80 text-sm leading-relaxed">{!! $desc !!}</p></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-brand-700 mb-4">Design once. Engage continuously.</h2>
        <p class="text-gray-500 mb-12 max-w-2xl mx-auto">Build a journey, target a segment, route approval, and let it run on Moodle cron.</p>
        <div class="flex flex-wrap justify-center items-center gap-3">
            @foreach (['Build campaign','Target segment','Approve','Run journey','Escalate &amp; report'] as $i => $step)
                @if ($i > 0)<iconify-icon icon="lucide:arrow-right" class="text-brand-200 text-xl hidden sm:block"></iconify-icon>@endif
                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-white border border-gray-100 shadow-soft text-sm font-bold text-brand-700"><span class="w-6 h-6 rounded-full bg-brand-50 text-brand-500 flex items-center justify-center text-xs">{{ $i + 1 }}</span>{!! $step !!}</span>
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
                <thead><tr class="border-b border-gray-100 text-gray-500">
                    <th class="text-left font-semibold p-4 md:p-5">Capability</th>
                    <th class="font-semibold p-4 md:p-5">Core Moodle</th>
                    <th class="font-semibold p-4 md:p-5">Basic plugins</th>
                    <th class="font-bold p-4 md:p-5 bg-brand-50 text-brand-700">Modern Engagement Hub</th>
                </tr></thead>
                <tbody class="text-gray-700">
                    @php
                    $rows = [
                        ['Send a one-off message', 'Basic', '✅', '✅'],
                        ['Multi-step campaigns &amp; journeys', '—', 'Partial', '✅'],
                        ['Condition-based interventions', '—', '—', '✅'],
                        ['Escalation on no response', '—', '—', '✅'],
                        ['Approval workflow for templates', '—', '—', '✅'],
                        ['Segment targeting', '—', 'Partial', '✅'],
                        ['Campaign dashboards &amp; logs', '—', '—', '✅'],
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
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">Engagement that runs itself</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            @php
            $cases = [
                ['heart-pulse', 'Retention', 'Re-engage at-risk learners', 'Spot inactive or struggling learners and run a journey that nudges them — escalating to a teacher only when they don&apos;t respond.'],
                ['rocket', 'Onboarding', 'Guide new learners in', 'Welcome new starters with a sequenced campaign that introduces the platform, sets expectations, and drives the first action.'],
                ['megaphone', 'Programs', 'Drive program milestones', 'Keep cohorts moving through a program with timed reminders, milestone nudges, and completion celebrations.'],
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
        <div class="max-w-3xl mx-auto bg-brand-50 rounded-[32px] p-10 text-center border border-blue-50">
            <div class="text-brand-500 text-xl mb-4">★★★★★</div>
            <p class="text-xl md:text-2xl font-semibold text-brand-700 leading-relaxed mb-4">“[TESTIMONIAL — an engagement or L&amp;D lead, their institution, and a concrete result, e.g. higher response or retention.]”</p>
            <p class="text-gray-500 text-sm">— [Name, Role, Institution]</p>
        </div>
        <p class="text-center text-xs text-gray-400 mt-5">Scenario-based examples — replace with named customer results before publishing.</p>
    </div>
</section>

<!-- ============ EARLY ACCESS / PRICING ============ -->
<section id="pricing" class="py-20 md:py-28 bg-brand-50/50">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-white tracking-widest uppercase mb-5">Early access</span>
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-4">Join the founding customers</h2>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto">Modern Engagement Hub is in early access. Founding customers get hands-on onboarding, a direct line to the team, and locked-in pricing — and help shape the roadmap.</p>
        </div>
        <div class="max-w-2xl mx-auto bg-white rounded-[32px] border border-gray-100 shadow-float p-10 text-center">
            <div class="grid sm:grid-cols-3 gap-6 mb-8 text-left">
                <div class="flex items-start gap-3"><iconify-icon icon="lucide:check" class="text-brand-500 mt-1"></iconify-icon><span class="text-sm text-gray-600">Full feature access &amp; updates</span></div>
                <div class="flex items-start gap-3"><iconify-icon icon="lucide:check" class="text-brand-500 mt-1"></iconify-icon><span class="text-sm text-gray-600">Guided onboarding</span></div>
                <div class="flex items-start gap-3"><iconify-icon icon="lucide:check" class="text-brand-500 mt-1"></iconify-icon><span class="text-sm text-gray-600">Locked-in founding price</span></div>
            </div>
            <a href="/book-demo" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:-translate-y-1">Request early access</a>
            <p class="text-sm text-gray-400 mt-4">GPL v3 licensed · Moodle 4.5+</p>
        </div>
    </div>
</section>

<!-- ============ FAQ ============ -->
<section class="py-20 md:py-28">
    <div class="max-w-3xl mx-auto px-6 lg:px-12">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 text-center mb-12">Frequently asked questions</h2>
        <div class="space-y-4">
            @php
            $faqs = [
                ['Which Moodle versions are supported?', 'Moodle 4.5 and later.'],
                ['What does “early access” mean?', 'The plugin is in active development. Founding customers get the full feature set, guided onboarding, a direct line to the team, and locked-in pricing — and their feedback shapes the roadmap.'],
                ['How is this different from a reminder plugin?', 'Reminders send a single message. Engagement Hub orchestrates multi-step journeys, applies condition-based interventions, escalates when there&apos;s no response, and reports on outcomes — across whole campaigns.'],
                ['How is learner data handled (GDPR)?', 'A bundled privacy provider declares everything stored and supports consent controls plus user export and deletion at the system context.'],
                ['Will it slow my site down?', 'No. Messages are queued and delivered by Moodle cron, so engagement activity stays off the page-load path.'],
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
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">Turn messages into <br><span class="font-serif italic text-brand-500">momentum.</span></h2>
                <p class="text-lg text-gray-400 mb-10">Join the early-access program and start orchestrating engagement that actually moves learners.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="/book-demo" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1">Request early access</a>
                    <a href="/book-demo" class="inline-flex items-center px-10 py-4 border border-white/20 text-white font-bold rounded-xl hover:bg-white/10 transition-all">Book a demo</a>
                </div>
                <p class="text-sm text-gray-500 mt-5">GPL v3 · Moodle 4.5+</p>
            </div>
        </div>
    </div>
</section>
@endsection
