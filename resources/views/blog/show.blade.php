@extends('layouts.app')

@section('title', $post['title'] . ' - Agunfon Blog')
@section('description', $post['metadesc'])
@section('og_type', 'article')
@section('og_image', $post['image'])

@push('meta')
<meta property="article:published_time" content="{{ $post['date'] }}">
<meta property="article:author" content="{{ $post['author'] }}">
<meta property="article:section" content="{{ $post['category'] }}">
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "Article",
    "headline": {!! json_encode($post['title']) !!},
    "description": {!! json_encode($post['metadesc']) !!},
    "image": "{{ url($post['image']) }}",
    "datePublished": "{{ $post['date'] }}",
    "dateModified": "{{ $post['date'] }}",
    "articleSection": {!! json_encode($post['category']) !!},
    "author": { "@type": "Organization", "name": {!! json_encode($post['author']) !!} },
    "publisher": {
        "@type": "Organization",
        "name": "Agunfon",
        "logo": { "@type": "ImageObject", "url": "{{ url('/images/Agunfon_Icon.png') }}" }
    },
    "mainEntityOfPage": { "@type": "WebPage", "@id": "{{ url()->current() }}" }
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
        { "@type": "ListItem", "position": 2, "name": "Blog", "item": "{{ url('/blog') }}" },
        { "@type": "ListItem", "position": 3, "name": {!! json_encode($post['title']) !!}, "item": "{{ url()->current() }}" }
    ]
}
</script>
@endpush

@section('content')
<article class="blog-article">
    <header class="blog-hero">
        <div class="blog-hero__glow" aria-hidden="true"></div>
        <div class="blog-shell">
            <!-- Breadcrumb -->
            <nav aria-label="Breadcrumb" class="blog-breadcrumb">
            <ol class="flex flex-wrap items-center gap-2">
                <li><a href="/">Home</a></li>
                <li aria-hidden="true">→</li>
                <li><a href="/blog">Field notes</a></li>
                <li aria-hidden="true">→</li>
                <li class="text-white">{{ $post['category'] }}</li>
            </ol>
            </nav>

            <div class="blog-hero__grid">
                <div class="blog-hero__copy">
                    <p class="blog-hero__label">{{ $post['category'] }} <span>Insight 01</span></p>
                    <h1>{{ $post['title'] }}</h1>
                    <p class="blog-hero__dek">{{ $post['metadesc'] }}</p>
                    <div class="blog-byline">
                        <span class="blog-byline__mark" aria-hidden="true">A</span>
                        <span><strong>{{ $post['author'] }}</strong><small>Learning systems &amp; evidence design</small></span>
                        <span class="blog-byline__meta">
                            <time datetime="{{ $post['date'] }}">{{ \Illuminate\Support\Carbon::parse($post['date'])->format('M j, Y') }}</time>
                            <span aria-hidden="true">/</span> {{ $post['readtime'] }}
                        </span>
                    </div>
                </div>
                <figure class="blog-hero__media">
                    <img src="/images/blog/compliance-completion-crisis/audit-evidence-editorial.png"
                         alt="A compliance lead reviewing training evidence and audit records"
                         width="1536" height="1024" fetchpriority="high">
                    <figcaption>Evidence is strongest when the record can tell the whole story.</figcaption>
                </figure>
            </div>
        </div>
    </header>

    <div class="blog-shell blog-layout">
        <aside class="blog-toc" aria-label="Article contents">
            <p>In this article</p>
            <ol>
                <li><a href="#auditor-expectations">What auditors ask</a></li>
                <li><a href="#completion-ladder">The evidence ladder</a></li>
                <li><a href="#plugin-workflow">Five-plugin workflow</a></li>
                <li><a href="#evidence-chain">One evidence chain</a></li>
                <li><a href="#audit-package">The audit package</a></li>
                <li><a href="#strategic-shift">The strategic shift</a></li>
            </ol>
            <a class="blog-toc__cta" href="/book-demo">Map your evidence chain <span aria-hidden="true">↗</span></a>
        </aside>

        <div class="blog-prose">
            @include($post['view'])
        </div>
    </div>
</article>

<!-- Final CTA -->
<section class="pb-20 md:pb-28">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="relative overflow-hidden bg-brand-950 rounded-2xl px-8 py-16 md:p-20">
            <div class="absolute inset-0 opacity-25 bg-cover bg-center" style="background-image:url('/images/blog/compliance-completion-crisis/audit-evidence-editorial.png');"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/95 to-brand-950/75"></div>
            <div class="relative max-w-2xl">
                <h2 class="text-3xl md:text-5xl font-bold text-white leading-tight mb-6">
                    Turn checkbox completion into <span class="font-serif italic text-brand-500">auditable evidence</span>
                </h2>
                <p class="text-gray-300 text-lg leading-relaxed mb-10">
                    Book an Agunfon demo. Bring one real compliance course and one real reporting problem — we will map the evidence chain from enrolment to audit export inside your Moodle.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="/book-demo" class="inline-flex items-center px-9 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1">Book a demo</a>
                    <a href="/blog" class="inline-flex items-center px-9 py-4 border border-white/20 text-white font-bold rounded-xl hover:bg-white/10 transition-all">Back to blog</a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .blog-article { background: #fbfcfe; }
    .blog-shell { width: min(1240px, calc(100% - 3rem)); margin-inline: auto; }
    .blog-hero { position: relative; overflow: hidden; padding: 2rem 0 5.5rem; color: #fff; background: #071b36; }
    .blog-hero::before { content: ""; position: absolute; inset: 0; background-image: linear-gradient(rgba(89, 145, 226, .08) 1px, transparent 1px), linear-gradient(90deg, rgba(89, 145, 226, .08) 1px, transparent 1px); background-size: 72px 72px; mask-image: linear-gradient(to bottom, black, transparent 82%); }
    .blog-hero__glow { position: absolute; width: 36rem; height: 36rem; right: -12rem; top: -18rem; border-radius: 50%; background: rgba(75, 139, 232, .22); filter: blur(80px); }
    .blog-breadcrumb { position: relative; margin-bottom: 4.5rem; color: #9cb0ca; font-size: .78rem; font-weight: 700; letter-spacing: .04em; }
    .blog-breadcrumb a { transition: color .2s ease; }
    .blog-breadcrumb a:hover { color: #fff; }
    .blog-hero__grid { position: relative; display: grid; grid-template-columns: minmax(0, 1.08fr) minmax(340px, .92fr); align-items: end; gap: clamp(2.5rem, 6vw, 6.5rem); }
    .blog-hero__label { display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; color: #72a7ef; font-size: .78rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
    .blog-hero__label span { padding-left: 1rem; border-left: 1px solid rgba(255,255,255,.18); color: #9cb0ca; }
    .blog-hero h1 { max-width: 14ch; font-size: clamp(2.8rem, 5.2vw, 5.4rem); line-height: .98; letter-spacing: -.04em; text-wrap: balance; font-weight: 800; }
    .blog-hero__dek { max-width: 61ch; margin-top: 2rem; color: #c3d1e4; font-size: clamp(1.05rem, 1.5vw, 1.28rem); line-height: 1.65; text-wrap: pretty; }
    .blog-byline { display: flex; align-items: center; gap: .75rem; margin-top: 2.3rem; color: #fff; font-size: .84rem; }
    .blog-byline__mark { display: grid; place-items: center; width: 2.5rem; height: 2.5rem; border-radius: 50%; background: #4b8be8; font-weight: 900; }
    .blog-byline small { display: block; margin-top: .1rem; color: #8fa4bf; }
    .blog-byline__meta { display: flex; gap: .65rem; margin-left: auto; color: #a9bbd1; }
    .blog-hero__media { margin: 0 0 -8.5rem; }
    .blog-hero__media img { width: 100%; aspect-ratio: 4 / 5; object-fit: cover; object-position: 60% center; border-radius: 14px; box-shadow: 0 8px 0 rgba(75, 139, 232, .45); }
    .blog-hero__media figcaption { max-width: 32rem; margin: 1rem 0 0 auto; color: #9cb0ca; font-size: .78rem; line-height: 1.5; text-align: right; }
    .blog-layout { display: grid; grid-template-columns: 210px minmax(0, 720px); justify-content: center; gap: clamp(3rem, 7vw, 7.5rem); padding-top: 8rem; padding-bottom: 7rem; }
    .blog-toc { position: sticky; top: 7rem; align-self: start; padding-top: .45rem; font-size: .82rem; }
    .blog-toc > p { color: #0f3d7a; font-weight: 800; }
    .blog-toc ol { margin-top: 1rem; border-top: 1px solid #dbe4ef; }
    .blog-toc li { border-bottom: 1px solid #dbe4ef; }
    .blog-toc li a { display: block; padding: .8rem 0; color: #5d6c7f; line-height: 1.35; transition: color .2s ease, padding-left .2s ease; }
    .blog-toc li a:hover { padding-left: .25rem; color: #2563a9; }
    .blog-toc__cta { display: flex; justify-content: space-between; margin-top: 1.5rem; color: #2563a9; font-weight: 800; }
    .blog-prose { color: #364152; font-size: 1.075rem; line-height: 1.86; }
    .blog-prose > * + * { margin-top: 1.35rem; }
    .blog-prose h2 { scroll-margin-top: 7rem; color: #0F3D7A; font-weight: 800; font-size: clamp(2rem, 4vw, 2.65rem); line-height: 1.12; margin-top: 5rem; margin-bottom: 1.25rem; letter-spacing: -0.03em; text-wrap: balance; }
    .blog-prose h3 { color: #0F3D7A; font-weight: 700; font-size: 1.3rem; margin-top: 2rem; margin-bottom: 0.5rem; }
    .blog-prose p { color: #374151; }
    .blog-prose strong { color: #1F2A37; font-weight: 700; }
    .blog-prose a { color: #3B7BD8; font-weight: 600; text-decoration: underline; text-underline-offset: 2px; }
    .blog-prose a:hover { color: #0F3D7A; }
    .blog-prose ul { list-style: none; padding-left: 0; }
    .blog-prose ul li { position: relative; padding-left: 1.9rem; margin-top: 0.7rem; }
    .blog-prose ul li::before { content: ''; position: absolute; left: 0; top: 0.55rem; width: 0.7rem; height: 0.7rem; border-radius: 9999px; background: #4B8BE8; }
    .blog-prose .lead { font-family: Georgia, serif; font-size: 1.55rem; line-height: 1.55; color: #1F2A37; font-weight: 400; }
    .blog-prose .lead::first-letter { float: left; margin: .12em .12em 0 0; color: #2f73d2; font: 700 4.2rem/0.78 Georgia, serif; }
    .blog-prose .pullquote { position: relative; margin-block: 3rem; padding: 2.25rem 2.25rem 2.25rem 4.25rem; color: #fff; background: #0f3d7a; border-radius: 12px; font-family: Georgia, serif; font-size: 1.35rem; line-height: 1.55; }
    .blog-prose .pullquote::before { content: "“"; position: absolute; left: 1.35rem; top: .9rem; color: #72a7ef; font-size: 4rem; line-height: 1; }
    .blog-prose .ladder { list-style: none; padding-left: 0; counter-reset: rung; }
    .blog-prose .ladder li { position: relative; padding: 1rem 1.25rem 1rem 4.2rem; background: #eef4fb; border-radius: 10px; margin-top: .55rem; }
    .blog-prose .ladder li:nth-child(n+4) { background: #dbeafd; }
    .blog-prose .ladder li::before { counter-increment: rung; content: counter(rung); position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); width: 2.15rem; height: 2.15rem; border-radius: 50%; background: #4B8BE8; color: #fff; font-weight: 800; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; }
    .blog-prose .plugin-card { position: relative; padding: 2rem 0 2rem 5rem; border-top: 1px solid #d9e3ef; }
    .blog-prose .plugin-card::before { content: attr(data-step); position: absolute; left: 0; top: 1.8rem; color: #80aeea; font-size: 2.5rem; font-weight: 900; line-height: 1; }
    .blog-prose .plugin-card h3 { margin-top: 0; }
    .blog-prose .evidence-chain { margin-block: 3.5rem; padding: 2.5rem; color: #fff; background: #071b36; border-radius: 12px; }
    .blog-prose .evidence-chain__title { margin: 0 0 1.75rem; color: #fff; font-size: 1.15rem; }
    .blog-prose .evidence-chain__track { display: flex; flex-wrap: wrap; gap: .65rem; }
    .blog-prose .evidence-chain__track span { display: inline-flex; align-items: center; gap: .65rem; padding: .6rem .85rem; color: #dce8f7; background: rgba(255,255,255,.07); border-radius: 6px; font-size: .78rem; font-weight: 800; letter-spacing: .03em; }
    .blog-prose .evidence-chain__track span:not(:last-child)::after { content: "→"; color: #72a7ef; }
    @media (max-width: 900px) {
        .blog-hero { padding-bottom: 3rem; }
        .blog-hero__grid { grid-template-columns: 1fr; }
        .blog-hero__media { margin: 0; }
        .blog-hero__media img { aspect-ratio: 16 / 10; }
        .blog-layout { grid-template-columns: minmax(0, 720px); padding-top: 4.5rem; }
        .blog-toc { display: none; }
    }
    @media (max-width: 640px) {
        .blog-shell { width: min(100% - 2rem, 1240px); }
        .blog-hero { padding-top: 1.25rem; }
        .blog-breadcrumb { margin-bottom: 3rem; }
        .blog-hero h1 { font-size: clamp(2.55rem, 13vw, 4rem); }
        .blog-byline { align-items: flex-start; flex-wrap: wrap; }
        .blog-byline__meta { width: 100%; margin: .5rem 0 0 3.25rem; }
        .blog-prose { font-size: 1rem; }
        .blog-prose .pullquote { padding: 3.5rem 1.5rem 1.6rem; }
        .blog-prose .plugin-card { padding-left: 0; padding-top: 4.5rem; }
        .blog-prose .plugin-card::before { top: 1.4rem; }
        .blog-prose .evidence-chain { padding: 1.5rem; }
    }
    @media (prefers-reduced-motion: reduce) {
        .blog-toc a { transition: none; }
    }
</style>
@endpush
@endsection
