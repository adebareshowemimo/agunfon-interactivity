@extends('layouts.app')

@section('title', 'Modern Flipbook for Moodle - Agunfon')
@section('description', 'Modern Flipbook turns Moodle PDFs into tracked activities — page-level reading, active time, and acknowledgement with completion rules. Moodle 4.5–5.2.')

@push('meta')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "Modern Flipbook",
    "applicationCategory": "BusinessApplication",
    "operatingSystem": "Moodle 4.5–5.2",
    "description": "Modern Flipbook turns Moodle PDFs into tracked activities — page-level reading, active time, and acknowledgement with completion rules. Moodle 4.5–5.2.",
    "offers": {
        "@type": "Offer",
        "category": "Premium"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Agunfon"
    }
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "Which Moodle versions are supported?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Moodle 4.5 through 5.2."
            }
        },
        {
            "@type": "Question",
            "name": "Does it need an external service to convert PDFs?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "No. Rendering uses bundled PDF.js and StPageFlip with no CDN dependency — you upload a PDF and it just works."
            }
        },
        {
            "@type": "Question",
            "name": "How can a course be completed?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "By percentage of pages viewed, time spent reading, a set of required pages, reaching the final page, or an explicit acknowledgement — whichever you configure."
            }
        },
        {
            "@type": "Question",
            "name": "Can I stop documents being copied?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "You can apply optional learner watermarking and control print and download with Moodle capabilities. This is accountability and deterrence, not DRM."
            }
        },
        {
            "@type": "Question",
            "name": "How is learner data handled (GDPR)?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "A bundled privacy provider declares everything stored and supports user export and deletion at the system context."
            }
        },
        {
            "@type": "Question",
            "name": "Is it really GPL? Can we modify it?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes — GNU GPL v3 or later. You're free to modify it for your own installation."
            }
        }
    ]
}
</script>
@endpush

@section('content')
<!-- ============ HERO ============ -->
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center">
        <div class="max-w-xl">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                MOODLE PLUGIN <span class="w-1 h-1 rounded-full bg-blue-300"></span> Premium
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Turn PDFs into <span class="font-serif italic text-brand-500">trackable</span> learning
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed mb-10">
                Modern Flipbook turns any PDF into a beautiful, mobile-friendly Moodle reading activity — with page progress, active reading time, completion rules, acknowledgements, and reports that prove learners actually opened and read the material.
            </p>
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="#pricing" class="inline-flex items-center px-9 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1 active:translate-y-0">Buy now</a>
                <a href="/book-demo" class="inline-flex items-center px-9 py-4 border border-gray-200 text-brand-700 font-bold rounded-xl hover:bg-gray-50 transition-all">Book a demo</a>
            </div>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-500 font-medium">
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:timer" class="text-brand-500"></iconify-icon> Reading-time tracking</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:check-square" class="text-brand-500"></iconify-icon> Acknowledgements</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:smartphone" class="text-brand-500"></iconify-icon> Mobile-friendly</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:check-circle" class="text-brand-500"></iconify-icon> Moodle 4.5–5.2</span>
            </div>
        </div>

        <!-- Product mockup: flipbook reader -->
        <div class="relative">
            <div class="bg-white rounded-[32px] shadow-2xl border border-gray-100 p-5 hero-dashboard">
                <div class="flex items-center gap-1.5 px-2 pb-4">
                    <span class="w-3 h-3 rounded-full bg-red-400"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                    <span class="w-3 h-3 rounded-full bg-green-400"></span>
                    <span class="ml-3 text-xs text-gray-400">moodle.yourschool.edu › employee handbook</span>
                </div>
                <!-- flipbook spread -->
                <div class="rounded-2xl border border-gray-100 bg-brand-50 p-4 mb-3">
                    <div class="flex gap-2 justify-center">
                        <div class="w-1/2 bg-white rounded-l-lg shadow-sm border border-gray-100 p-3 space-y-1.5">
                            <div class="h-2 rounded bg-gray-200 w-2/3"></div>
                            <div class="h-1.5 rounded bg-gray-100"></div>
                            <div class="h-1.5 rounded bg-gray-100"></div>
                            <div class="h-1.5 rounded bg-gray-100 w-5/6"></div>
                            <div class="h-1.5 rounded bg-gray-100 w-1/2"></div>
                        </div>
                        <div class="w-1/2 bg-white rounded-r-lg shadow-sm border border-gray-100 p-3 space-y-1.5">
                            <div class="h-1.5 rounded bg-gray-100"></div>
                            <div class="h-1.5 rounded bg-gray-100 w-5/6"></div>
                            <div class="h-1.5 rounded bg-gray-100"></div>
                            <div class="h-12 rounded bg-brand-100/70 mt-2"></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-3 mt-3 text-gray-400">
                        <iconify-icon icon="lucide:chevron-left"></iconify-icon>
                        <span class="text-[11px] font-semibold text-brand-700">Page 6 / 24</span>
                        <iconify-icon icon="lucide:chevron-right"></iconify-icon>
                        <span class="mx-1 text-gray-200">|</span>
                        <iconify-icon icon="lucide:zoom-in"></iconify-icon>
                        <iconify-icon icon="lucide:search"></iconify-icon>
                        <iconify-icon icon="lucide:maximize"></iconify-icon>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="rounded-2xl border border-gray-100 bg-white p-3"><div class="text-[10px] font-bold uppercase tracking-wide text-gray-500">Read</div><div class="text-xl font-extrabold text-brand-700">71%</div></div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-3"><div class="text-[10px] font-bold uppercase tracking-wide text-gray-500">Time</div><div class="text-xl font-extrabold text-brand-700">8m</div></div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-3"><div class="text-[10px] font-bold uppercase tracking-wide text-gray-500">Acknowledged</div><div class="text-xl font-extrabold text-green-600">Yes</div></div>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-2 absolute -top-4 -left-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700"><iconify-icon icon="lucide:timer" class="text-brand-500"></iconify-icon> Active reading tracked</div>
            <div class="hidden md:flex items-center gap-2 absolute -bottom-4 -right-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700"><iconify-icon icon="lucide:check-square" class="text-brand-500"></iconify-icon> Read &amp; acknowledged</div>
        </div>
    </div>
</section>

<!-- ============ TRUST / STATS BAND ============ -->
<section class="py-12 md:py-16 bg-brand-50/60 border-y border-blue-50">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <p class="text-center text-xs font-bold tracking-widest uppercase text-gray-400 mb-10">For teams that need proof the document was read</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div><div class="text-4xl font-extrabold text-brand-700">5</div><div class="text-sm text-gray-500 mt-1">completion rule types</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">0</div><div class="text-sm text-gray-500 mt-1">CDN dependencies (bundled)</div></div>
            <div><div class="text-2xl font-extrabold text-brand-700">Tracked</div><div class="text-sm text-gray-500 mt-1">page-level reading evidence</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">100%</div><div class="text-sm text-gray-500 mt-1">mobile-friendly reading</div></div>
        </div>
    </div>
</section>

<!-- ============ SOLUTION OVERVIEW ============ -->
<section class="py-20 md:py-28">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-10">A PDF link isn't evidence</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                Policies, handbooks, onboarding guides, SOPs, compliance manuals, study packs — they're all still PDFs. Moodle can distribute them, but a plain file resource tells you nothing about whether anyone actually read them. Modern Flipbook closes that gap: it turns each PDF into a Moodle-native activity with a polished flipbook reader, page-by-page progress, active reading time, completion rules, an end-of-document acknowledgement, optional watermarking, and reports — so teachers and compliance teams get real evidence, not just a download count.
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
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">10 reasons to choose <span class="font-serif italic text-brand-500">Modern Flipbook</span></h2>
            <p class="text-gray-500 mt-4">Swipe through the highlights — click any slide to view it full size.</p>
        </div>
        @php
        $reasonSlides = [
            ['02-reading-you-can-prove', 'Reading you can prove'],
            ['03-completion-that-means-something', 'Completion that means something'],
            ['04-built-in-compliance-acknowledgement', 'Built-in compliance acknowledgement'],
            ['05-sign-off-signature-capture', 'Sign-off signature capture'],
            ['06-a-reader-learners-enjoy', 'A reader learners enjoy'],
            ['07-reports-that-drive-action', 'Reports that drive action'],
            ['08-acknowledgement-audit-trail', 'Acknowledgement audit trail'],
            ['09-content-accountability', 'Content accountability'],
            ['10-gradebook-and-certification', 'Gradebook & certification'],
            ['11-trusted-and-self-contained', 'Trusted & self-contained'],
        ];
        $slidesBase = '/images/plugins/modern-flipbook/ten-reasons/slides';
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
                    ['book-open', 'A modern flipbook reader', 'Bundled PDF.js + StPageFlip rendering (no CDN) with single, double, and responsive layouts, zoom, search, thumbnails, and fullscreen.'],
                    ['timer', 'Progress &amp; reading-time tracking', 'Records page views, active reading time, searches, prints, and downloads — not just whether the file was opened.'],
                    ['list-checks', 'Flexible completion rules', 'Complete by percentage viewed, time spent, required pages, reaching the final page, or acknowledgement.'],
                    ['check-square', 'Acknowledgement experience', 'An end-of-document acknowledgement captures that learners confirmed they read important material.'],
                    ['shield', 'Watermarking &amp; protection', 'Optional learner watermarking, plus capability-controlled print and download — for documents that shouldn&apos;t be casually copied.'],
                    ['file-spreadsheet', 'Reports &amp; CSV export', 'Per-activity engagement reports showing who read, how far, and for how long — exportable to CSV-compatible formats.'],
                ];
                @endphp
                @foreach ($features as [$icon, $title, $desc])
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md"><iconify-icon icon="lucide:{{ $icon }}" class="text-xl"></iconify-icon></div>
                    <div><h3 class="text-white text-lg font-bold mb-1">{!! $title !!}</h3><p class="text-blue-100/80 text-sm leading-relaxed">{!! $desc !!}</p></div>
                </div>
                @endforeach
            </div>
            <p class="text-blue-100/70 text-sm mt-10">PDFs are delivered securely through Moodle&apos;s <code class="text-blue-50">pluginfile.php</code>, integrate with Moodle completion and reporting, and respect the Privacy API.</p>
        </div>
    </div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-brand-700 mb-4">Upload a PDF. Get a learning activity.</h2>
        <p class="text-gray-500 mb-12 max-w-2xl mx-auto">No conversion, no external service — upload, set the rules, and learners read in a tracked, mobile-friendly reader.</p>
        <div class="flex flex-wrap justify-center items-center gap-3">
            @foreach (['Upload a PDF','Set completion rules','Learners read &amp; acknowledge','Track engagement','Export reports'] as $i => $step)
                @if ($i > 0)<iconify-icon icon="lucide:arrow-right" class="text-brand-200 text-xl hidden sm:block"></iconify-icon>@endif
                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-white border border-gray-100 shadow-soft text-sm font-bold text-brand-700"><span class="w-6 h-6 rounded-full bg-brand-50 text-brand-500 flex items-center justify-center text-xs">{{ $i + 1 }}</span>{!! $step !!}</span>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ COMPARISON ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 text-center mb-12">Why not just a File resource?</h2>
        <div class="max-w-4xl mx-auto bg-white rounded-[32px] border border-gray-100 shadow-soft overflow-hidden">
            <table class="w-full text-sm md:text-base">
                <thead><tr class="border-b border-gray-100 text-gray-500">
                    <th class="text-left font-semibold p-4 md:p-5">Capability</th>
                    <th class="font-semibold p-4 md:p-5">Core File / URL</th>
                    <th class="font-semibold p-4 md:p-5">Basic PDF viewers</th>
                    <th class="font-bold p-4 md:p-5 bg-brand-50 text-brand-700">Modern Flipbook</th>
                </tr></thead>
                <tbody class="text-gray-700">
                    @php
                    $rows = [
                        ['Display a PDF in Moodle', '✅', '✅', '✅'],
                        ['Mobile-friendly flipbook reader', '—', 'Partial', '✅'],
                        ['Page progress &amp; active reading time', '—', '—', '✅'],
                        ['Completion by %, time, pages, or final page', '—', '—', '✅'],
                        ['End-of-document acknowledgement', '—', '—', '✅'],
                        ['Watermarking &amp; print/download control', '—', '—', '✅'],
                        ['Engagement reports &amp; CSV export', '—', '—', '✅'],
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
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">When the document has to be read</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            @php
            $cases = [
                ['shield-check', 'Compliance', 'Policies &amp; handbooks, acknowledged', 'Turn policies, SOPs, and compliance manuals into activities with reading evidence and a signed acknowledgement — defensible at audit.'],
                ['rocket', 'Onboarding', 'Onboarding packs that get read', 'Replace a folder of PDF links with tracked reading activities, so you know new hires actually worked through the material.'],
                ['graduation-cap', 'Academic', 'Reading packs &amp; workbooks', 'Give students a focused, mobile-friendly reader for study packs and workbooks, with progress and time on each.'],
            ];
            @endphp
            @foreach ($cases as [$icon, $tag, $title, $desc])
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8 hover:shadow-float transition-all">
                <div class="w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center text-brand-500 mb-5"><iconify-icon icon="lucide:{{ $icon }}" class="text-2xl"></iconify-icon></div>
                <span class="text-[11px] font-bold tracking-widest uppercase text-brand-500">{{ $tag }}</span>
                <h3 class="text-xl font-bold text-brand-700 mt-2 mb-3">{!! $title !!}</h3>
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
                <div class="text-3xl font-extrabold text-brand-700 my-4">Contact us</div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 site</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 year updates</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Email support</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl border border-gray-200 font-bold text-brand-700 hover:bg-gray-50 transition-colors">Request Starter pricing</a>
            </div>
            <div class="bg-white rounded-[28px] border-2 border-brand-500 shadow-float p-8 relative md:scale-105">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-brand-500 text-white text-xs font-bold px-4 py-1 rounded-full">Most Popular</span>
                <h3 class="text-lg font-bold text-brand-700">Pro</h3>
                <div class="text-3xl font-extrabold text-brand-500 my-4">Contact us</div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Up to 5 sites</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> All features</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> 1 year updates</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500"></iconify-icon> Priority support</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl bg-brand-500 text-white font-bold hover:bg-brand-600 transition-all hover:-translate-y-0.5">Request Pro pricing</a>
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
                ['Which Moodle versions are supported?', 'Moodle 4.5 through 5.2.'],
                ['Does it need an external service to convert PDFs?', 'No. Rendering uses bundled PDF.js and StPageFlip with no CDN dependency — you upload a PDF and it just works.'],
                ['How can a course be completed?', 'By percentage of pages viewed, time spent reading, a set of required pages, reaching the final page, or an explicit acknowledgement — whichever you configure.'],
                ['Can I stop documents being copied?', 'You can apply optional learner watermarking and control print and download with Moodle capabilities. This is accountability and deterrence, not DRM.'],
                ['How is learner data handled (GDPR)?', 'A bundled privacy provider declares everything stored and supports user export and deletion at the system context.'],
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
                <img src="/images/brand-2026/agunfon-lagos-consultants-hero.webp" alt="" aria-hidden="true" class="w-full h-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/80 to-transparent"></div>
            </div>
            <div class="max-w-2xl relative z-10">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">Know it was <br><span class="font-serif italic text-brand-500">actually read.</span></h2>
                <p class="text-lg text-gray-400 mb-10">Turn your most important PDFs into tracked, acknowledged Moodle reading activities.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#pricing" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1">Buy now</a>
                    <a href="/book-demo" class="inline-flex items-center px-10 py-4 border border-white/20 text-white font-bold rounded-xl hover:bg-white/10 transition-all">Book a demo</a>
                </div>
                <p class="text-sm text-gray-500 mt-5">Moodle 4.5–5.2 · GPL v3 · No CDN dependency</p>
            </div>
        </div>
    </div>
</section>
@endsection
