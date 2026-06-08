@extends('layouts.app')

@section('title', 'Modern Video Player Premium for Moodle - Agunfon')

@section('content')
<!-- ============ HERO ============ -->
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center">
        <div class="max-w-xl">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                MOODLE PLUGIN <span class="w-1 h-1 rounded-full bg-blue-300"></span> Premium
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Video learning you can <span class="font-serif italic text-brand-500">measure &amp; protect</span>
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed mb-10">
                Modern Video Player Premium is a controlled, Moodle-native video activity with server-validated tracking — plus engagement heatmaps, signed-URL protection, cloud sources, branded skins, and audit-ready exports. The commercial superset of the free Community edition, upgradeable in place.
            </p>
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="#pricing" class="inline-flex items-center px-9 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1 active:translate-y-0">Purchase Now</a>
                <a href="https://demo.agunfoninteractivity.com/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-9 py-4 border border-gray-200 text-brand-700 font-bold rounded-xl hover:bg-gray-50 transition-all">
                    <iconify-icon icon="lucide:play-circle" class="text-brand-500"></iconify-icon> Try it live
                </a>
                <a href="/docs/1.0/modern-video-player/overview" class="inline-flex items-center gap-2 px-9 py-4 border border-gray-200 text-brand-700 font-bold rounded-xl hover:bg-gray-50 transition-all">
                    <iconify-icon icon="lucide:book-open" class="text-brand-500"></iconify-icon> Documentation
                </a>
            </div>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-500 font-medium">
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:flame" class="text-brand-500"></iconify-icon> Engagement heatmaps</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:lock" class="text-brand-500"></iconify-icon> Signed URLs + watermark</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:cloud" class="text-brand-500"></iconify-icon> YouTube · Vimeo · S3</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:check-circle" class="text-brand-500"></iconify-icon> Moodle 4.5–5.2</span>
            </div>
        </div>

        <!-- Product mockup: video player + retention -->
        <div class="relative">
            <div class="bg-white rounded-[32px] shadow-2xl border border-gray-100 p-5 hero-dashboard">
                <div class="flex items-center gap-1.5 px-2 pb-4">
                    <span class="w-3 h-3 rounded-full bg-red-400"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                    <span class="w-3 h-3 rounded-full bg-green-400"></span>
                    <span class="ml-3 text-xs text-gray-400">moodle.yourschool.edu › video analytics</span>
                </div>
                <div class="rounded-2xl border border-gray-100 overflow-hidden mb-3">
                    <div class="bg-brand-950 aspect-video relative flex items-center justify-center">
                        <iconify-icon icon="lucide:play-circle" class="text-white/90 text-5xl"></iconify-icon>
                        <span class="absolute top-2 right-2 text-[9px] font-bold text-white/70 border border-white/30 rounded px-1.5 py-0.5">j.smith@org · 14:32</span>
                    </div>
                    <!-- retention curve -->
                    <div class="p-3">
                        <div class="text-[10px] font-bold uppercase tracking-wide text-gray-500 mb-2">Audience retention</div>
                        <div class="flex items-end gap-1 h-12">
                            @foreach ([95,90,86,82,70,74,60,55,48,52,40,33,30,42,28,22] as $h)
                            <div class="flex-1 rounded-t-sm bg-brand-500" style="height: {{ $h }}%"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="rounded-2xl border border-gray-100 bg-brand-50 p-3"><div class="text-[10px] font-bold uppercase tracking-wide text-gray-500">Avg watched</div><div class="text-xl font-extrabold text-brand-700">71%</div></div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-3"><div class="text-[10px] font-bold uppercase tracking-wide text-gray-500">Rewatched</div><div class="text-xl font-extrabold text-brand-700">2.3k</div></div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-3"><div class="text-[10px] font-bold uppercase tracking-wide text-gray-500">Flagged</div><div class="text-xl font-extrabold text-amber-500">6</div></div>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-2 absolute -top-4 -left-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700"><iconify-icon icon="lucide:flame" class="text-brand-500"></iconify-icon> Heatmap ready</div>
            <div class="hidden md:flex items-center gap-2 absolute -bottom-4 -right-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700"><iconify-icon icon="lucide:shield" class="text-brand-500"></iconify-icon> Signed &amp; watermarked</div>
        </div>
    </div>
</section>

<!-- ============ TRUST / STATS BAND ============ -->
<section class="py-12 md:py-16 bg-brand-50/60 border-y border-blue-50">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <p class="text-center text-xs font-bold tracking-widest uppercase text-gray-400 mb-10">For organisations that need evidence around video learning</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div><div class="text-4xl font-extrabold text-brand-700">7</div><div class="text-sm text-gray-500 mt-1">branded player skins</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">4</div><div class="text-sm text-gray-500 mt-1">audit export formats</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">S3 · Azure</div><div class="text-sm text-gray-500 mt-1">cloud sources, signed URLs</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">xAPI</div><div class="text-sm text-gray-500 mt-1">cmi5 statements to your LRS</div></div>
        </div>
    </div>
</section>

<!-- ============ SOLUTION OVERVIEW ============ -->
<section class="py-20 md:py-28">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-10">Embedded video tells you nothing</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                A YouTube embed or an uploaded file can't tell you who watched, how far they got, or whether the content was copied. Modern Video Player Premium is a controlled Moodle activity with server-validated watched segments, completion, and integrity tracking — and on top of that free foundation it adds engagement heatmaps and retention analytics, time-limited signed URLs with dynamic watermarking, cloud and provider sources, branded skins, audit-ready exports, and xAPI to your LRS. It shares the component name with the free Community edition, so you can upgrade in place — every activity, file, progress record, and report is preserved.
            </p>
        </div>
    </div>
</section>

<!-- ============ 12 REASONS (slide gallery) ============ -->
<section class="py-12 md:py-20 bg-brand-50/40 border-y border-blue-50">
    <div class="max-w-[1100px] mx-auto px-6 lg:px-12">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-5">Why choose it</span>
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">12 reasons to choose <span class="font-serif italic text-brand-500">Modern Video Player</span></h2>
            <p class="text-gray-500 mt-4">Click any image to view it full size.</p>
        </div>
        @php
        $reasonSlides = [
            ['02-server-validated-playback', 'Server-validated playback'],
            ['03-built-for-learners', 'Built for learners'],
            ['04-tamper-proof-completion-and-grading', 'Tamper-proof completion & grading'],
            ['05-engagement-heatmap', 'Engagement heatmap'],
            ['06-compliance-audit-and-scheduled-reports', 'Compliance audit & scheduled reports'],
            ['07-built-in-content-protection', 'Built-in content protection'],
            ['08-seven-player-styles', 'Seven player styles'],
            ['09-flexible-video-sources', 'Flexible video sources'],
            ['10-distraction-free-focus-mode', 'Distraction-free focus mode'],
            ['11-standards-and-integration', 'Standards & integration'],
            ['12-cohort-analytics-dashboard', 'Cohort analytics dashboard'],
            ['13-trusted-and-compliant', 'Trusted & compliant'],
        ];
        $slidesBase = '/images/plugins/modern-video-player/ten-reasons/slides';
        @endphp
        <div class="space-y-6 md:space-y-8">
            @foreach ($reasonSlides as [$file, $alt])
            <a href="{{ $slidesBase }}/{{ $file }}.png" target="_blank" rel="noopener" class="block group">
                <img src="{{ $slidesBase }}/{{ $file }}.png" alt="{{ $alt }}" loading="lazy" class="w-full h-auto rounded-[24px] shadow-soft border border-gray-100 group-hover:shadow-float transition-shadow" />
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ KEY FEATURES (navy panel) ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="bg-brand-700 rounded-[48px] overflow-hidden p-8 lg:p-16 shadow-2xl">
            <div class="inline-block px-5 py-2.5 rounded-full bg-white mb-10 shadow-sm">
                <span class="text-brand-700 font-bold text-sm tracking-wide">Premium Features &amp; Capabilities</span>
            </div>
            <div class="grid md:grid-cols-2 gap-x-16 gap-y-7">
                @php
                $features = [
                    ['flame', 'Engagement analytics', 'Engagement heatmaps, audience-retention curves, and rewatch-intensity reports — built from server-validated watched segments, not guesses.'],
                    ['lock', 'Protected delivery', 'User-bound, time-limited signed URLs for uploaded videos, source capability guardrails, and dynamic learner watermarking for supported sources.'],
                    ['cloud', 'External &amp; cloud sources', 'Direct MP4/WebM URLs plus YouTube and Vimeo adapters, and S3-compatible or Azure Blob storage served through short-lived signed URLs.'],
                    ['palette', 'Branded player skins', 'Per-activity skins — classic, YouTube, Vimeo, Netflix, Plyr, Apple, and minimal — with an admin-set site default.'],
                    ['file-spreadsheet', 'Cohort dashboard &amp; audit exports', 'A site-level, cohort-filtered engagement dashboard, plus full audit exports in CSV, JSON, Excel, and ODS including integrity records.'],
                    ['shield-check', 'Standards &amp; integrity', 'xAPI / cmi5 statements to an external LRS, plus best-effort screen-capture deterrence recorded in a tamper-evident, hash-chained audit log.'],
                ];
                @endphp
                @foreach ($features as [$icon, $title, $desc])
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md"><iconify-icon icon="lucide:{{ $icon }}" class="text-xl"></iconify-icon></div>
                    <div><h3 class="text-white text-lg font-bold mb-1">{!! $title !!}</h3><p class="text-blue-100/80 text-sm leading-relaxed">{!! $desc !!}</p></div>
                </div>
                @endforeach
            </div>
            <p class="text-blue-100/70 text-sm mt-10">Premium includes every free Community feature — tracked HTML5 playback, captions &amp; transcript, resume, completion, gradebook, backup/restore, and the Privacy API — and never paywalls accessibility or integrity.</p>
        </div>
    </div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-brand-700 mb-4">Add it. Track it. Prove it.</h2>
        <p class="text-gray-500 mb-12 max-w-2xl mx-auto">A Moodle-native activity with server-side tracking from the first play to the audit export.</p>
        <div class="flex flex-wrap justify-center items-center gap-3">
            @foreach (['Add the activity','Choose source &amp; skin','Learners watch (tracked)','Analyze heatmaps','Export &amp; integrate'] as $i => $step)
                @if ($i > 0)<iconify-icon icon="lucide:arrow-right" class="text-brand-200 text-xl hidden sm:block"></iconify-icon>@endif
                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-white border border-gray-100 shadow-soft text-sm font-bold text-brand-700"><span class="w-6 h-6 rounded-full bg-brand-50 text-brand-500 flex items-center justify-center text-xs">{{ $i + 1 }}</span>{!! $step !!}</span>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ COMPARISON ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 text-center mb-12">Community vs Premium</h2>
        <div class="max-w-4xl mx-auto bg-white rounded-[32px] border border-gray-100 shadow-soft overflow-hidden">
            <table class="w-full text-sm md:text-base">
                <thead><tr class="border-b border-gray-100 text-gray-500">
                    <th class="text-left font-semibold p-4 md:p-5">Capability</th>
                    <th class="font-semibold p-4 md:p-5">Core Moodle embed</th>
                    <th class="font-semibold p-4 md:p-5">Community edition</th>
                    <th class="font-bold p-4 md:p-5 bg-brand-50 text-brand-700">Premium</th>
                </tr></thead>
                <tbody class="text-gray-700">
                    @php
                    $rows = [
                        ['Tracked playback, completion &amp; gradebook', '—', '✅', '✅'],
                        ['Captions, transcript, chapters, resume', 'Partial', '✅', '✅'],
                        ['Integrity: seek enforcement, watched segments', '—', '✅', '✅'],
                        ['YouTube / Vimeo / direct URL sources', 'Partial', '—', '✅'],
                        ['S3 / Azure cloud storage (signed URLs)', '—', '—', '✅'],
                        ['Signed URLs + dynamic watermarking', '—', '—', '✅'],
                        ['Engagement heatmap &amp; retention analytics', '—', '—', '✅'],
                        ['Cohort dashboard &amp; multi-format audit export', '—', '—', '✅'],
                        ['xAPI / cmi5 to external LRS', '—', '—', '✅'],
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
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">When video has to count</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            @php
            $cases = [
                ['shield-check', 'Compliance', 'Audit-ready mandatory video', 'Prove who watched what, enforce real viewing with server-side tracking, and export tamper-evident integrity records for auditors.'],
                ['flame', 'Content', 'Improve videos with data', 'See exactly where attention drops with heatmaps and retention curves, then cut, re-edit, or re-order to hold learners.'],
                ['cloud', 'Scale', 'Serve a large video library', 'Stream from S3 or Azure through short-lived signed URLs so credentials are never exposed and big libraries stay fast.'],
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
            <p class="text-lg text-gray-500">Every tier unlocks all Premium features. Upgrade the free edition in place.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto items-center">
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8">
                <h3 class="text-lg font-bold text-brand-700">Starter</h3>
                <div class="text-4xl font-extrabold text-brand-700 my-4">$XX<span class="text-base font-normal text-gray-400">/yr</span></div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 site</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All Premium features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 year updates</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Email support</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl border border-gray-200 font-bold text-brand-700 hover:bg-gray-50 transition-colors">Buy Starter</a>
            </div>
            <div class="bg-white rounded-[28px] border-2 border-brand-500 shadow-float p-8 relative md:scale-105">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-brand-500 text-white text-xs font-bold px-4 py-1 rounded-full">Most Popular</span>
                <h3 class="text-lg font-bold text-brand-700">Pro</h3>
                <div class="text-4xl font-extrabold text-brand-500 my-4">$XXX<span class="text-base font-normal text-gray-400">/yr</span></div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Up to 5 sites</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All Premium features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 year updates</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Priority support</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl bg-brand-500 text-white font-bold hover:bg-brand-600 transition-all hover:-translate-y-0.5">Buy Pro</a>
            </div>
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8">
                <h3 class="text-lg font-bold text-brand-700">Enterprise</h3>
                <div class="text-4xl font-extrabold text-brand-700 my-4">Custom</div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All Premium features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Tailored pricing for your Moodle setup</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Personalized implementation plan</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Custom admin onboarding &amp; training</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl border border-gray-200 font-bold text-brand-700 hover:bg-gray-50 transition-colors">Talk to sales</a>
            </div>
        </div>
        <p class="text-center text-sm text-gray-400 mt-8">✓ 30-day money-back guarantee &nbsp;·&nbsp; ✓ GPL v3 — modify freely &nbsp;·&nbsp; ✓ Upgrade the free edition in place</p>
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
                ['Can I upgrade from the free Community edition?', 'Yes. Premium shares the same component (mod_modernvideoplayer) and carries a higher version, so you upgrade in place — existing activities, files, progress, completion, gradebook entries, captions, bookmarks, reports, and backup/restore data are all preserved.'],
                ['How does protected delivery work?', 'Uploaded and cloud videos are served through user-bound, time-limited signed URLs, with dynamic learner watermarking for supported sources — so credentials are never exposed and copies are traceable.'],
                ['Is the screen-capture deterrence DRM?', 'No. It is best-effort browser heuristics (PrintScreen, hidden tab, focus loss, context menu) recorded in a tamper-evident, hash-chained audit log. It is deterrence and evidence, not DRM.'],
                ['Does it send data to our LRS?', 'Yes. Premium emits xAPI / cmi5-style statements to an external LRS for initialized, completed, and flagged activity events.'],
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
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">See every second <br><span class="font-serif italic text-brand-500">that counts.</span></h2>
                <p class="text-lg text-gray-400 mb-10">Turn Moodle video into measured, protected, audit-ready learning — and upgrade the free edition in place.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#pricing" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1">Buy now</a>
                    <a href="/book-demo" class="inline-flex items-center px-10 py-4 border border-white/20 text-white font-bold rounded-xl hover:bg-white/10 transition-all">Book a demo</a>
                </div>
                <p class="text-sm text-gray-500 mt-5">Moodle 4.5–5.2 · GPL v3 · Upgrade in place</p>
            </div>
        </div>
    </div>
</section>
@endsection
