@extends('layouts.app')

@section('title', 'Blog - Insights on Moodle, Compliance & Learning | Agunfon')
@section('description', 'Practical insights, proven strategies, and emerging trends on Moodle, compliance training, learner engagement, and the plugins that power auditable learning.')

@section('content')
@php
    $query = $query ?? '';
    $activeCategory = $activeCategory ?? '';
    $totalCount = $totalCount ?? count($posts ?? []);
    $isFiltered = $query !== '' || $activeCategory !== '';
@endphp

<main class="journal">
    <header class="journal-masthead">
        <div class="journal-shell">
            <div class="journal-masthead__top">
                <p>Agunfon Field Notes</p>
                <p>Ideas for learning teams who need outcomes they can prove.</p>
            </div>
            <div class="journal-masthead__title">
                <h1>Learning systems,<br><span>examined.</span></h1>
                <p>Practical thinking on Moodle, compliance evidence, learner engagement, and the technology behind better learning operations.</p>
            </div>
            <div class="journal-topics" aria-label="Topics covered">
                <span>Compliance</span>
                <span>Moodle operations</span>
                <span>Learner experience</span>
                <span>Evidence &amp; reporting</span>
            </div>
        </div>
    </header>

    <section class="journal-feed" aria-labelledby="latest-thinking">
        <div class="journal-shell">
            <div class="journal-section-head">
                <h2 id="latest-thinking">Latest thinking</h2>
                <p>{{ number_format($totalCount) }} {{ \Illuminate\Support\Str::plural('article', $totalCount) }} in the field notes</p>
            </div>

            @if (!$featured && !$isFiltered)
                <div class="journal-empty">
                    <h2>We are working on the first edition.</h2>
                    <p>New field notes on learning technology and measurable outcomes are on the way.</p>
                </div>
            @else
                @if (!$isFiltered && request()->integer('page', 1) === 1 && $featured)
                    <article class="featured-story">
                        <a href="/blog/{{ $featured['slug'] }}" class="featured-story__media" aria-label="Read: {{ $featured['title'] }}">
                            <img src="{{ $featured['image'] }}"
                                 alt=""
                                 width="1536" height="1024">
                            <span>Featured report</span>
                        </a>
                        <div class="featured-story__copy">
                            <div class="featured-story__meta">
                                <span>{{ $featured['category'] }}</span>
                                <time datetime="{{ $featured['date'] }}">{{ \Illuminate\Support\Carbon::parse($featured['date'])->format('M j, Y') }}</time>
                            </div>
                            <h3><a href="/blog/{{ $featured['slug'] }}">{{ $featured['title'] }}</a></h3>
                            <p>{{ $featured['excerpt'] }}</p>
                            <div class="featured-story__footer">
                                <span>{{ $featured['readtime'] }}</span>
                                <a href="/blog/{{ $featured['slug'] }}">Read the report <span aria-hidden="true">↗</span></a>
                            </div>
                        </div>
                    </article>
                @endif

                <div class="journal-archive">
                    <div class="journal-archive__heading">
                        <div>
                            <h2>{{ $isFiltered ? 'Search results' : 'Explore the archive' }}</h2>
                            <p>{{ number_format($posts->total()) }} {{ \Illuminate\Support\Str::plural('article', $posts->total()) }}</p>
                        </div>
                        <form class="journal-search" action="{{ route('blog.index') }}" method="GET" role="search">
                            <label class="sr-only" for="blog-search">Search articles</label>
                            <span aria-hidden="true">⌕</span>
                            <input id="blog-search" type="search" name="q" value="{{ $query }}" placeholder="Search field notes">
                            @if ($activeCategory !== '')
                                <input type="hidden" name="category" value="{{ $activeCategory }}">
                            @endif
                            <button type="submit">Search</button>
                        </form>
                    </div>

                    <nav class="journal-filters" aria-label="Filter articles by topic">
                        <a href="{{ route('blog.index', array_filter(['q' => $query])) }}" @class(['is-active' => $activeCategory === ''])>All topics</a>
                        @foreach ($categories as $category)
                            <a href="{{ route('blog.index', array_filter(['q' => $query, 'category' => $category])) }}"
                               @class(['is-active' => $activeCategory === $category])>{{ $category }}</a>
                        @endforeach
                    </nav>

                    @if ($posts->isEmpty())
                        <div class="journal-empty">
                            <h3>{{ $isFiltered ? 'No field notes matched that search.' : 'The next edition is in progress.' }}</h3>
                            <p>{{ $isFiltered ? 'Try a broader search or choose another topic.' : 'More practical research will appear here soon.' }}</p>
                            @if ($isFiltered)
                                <a href="{{ route('blog.index') }}">Clear search</a>
                            @endif
                        </div>
                    @else
                        <div class="journal-grid">
                            @foreach ($posts as $post)
                                <article class="archive-card">
                                    <a class="archive-card__image" href="/blog/{{ $post['slug'] }}" tabindex="-1" aria-hidden="true">
                                        <img src="{{ $post['image'] }}" alt="" width="1200" height="630" loading="lazy">
                                    </a>
                                    <div class="archive-card__meta">
                                        <span>{{ $post['category'] }}</span>
                                        <span>{{ $post['readtime'] }}</span>
                                    </div>
                                    <h3><a href="/blog/{{ $post['slug'] }}">{{ $post['title'] }}</a></h3>
                                    <p>{{ $post['excerpt'] }}</p>
                                    <time datetime="{{ $post['date'] }}">{{ \Illuminate\Support\Carbon::parse($post['date'])->format('M j, Y') }}</time>
                                </article>
                            @endforeach
                        </div>

                        @if ($posts->hasPages())
                            <nav class="journal-pagination" aria-label="Blog pagination">
                                @if ($posts->onFirstPage())
                                    <span aria-disabled="true">← Previous</span>
                                @else
                                    <a href="{{ $posts->previousPageUrl() }}">← Previous</a>
                                @endif
                                <span>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</span>
                                @if ($posts->hasMorePages())
                                    <a href="{{ $posts->nextPageUrl() }}">Next →</a>
                                @else
                                    <span aria-disabled="true">Next →</span>
                                @endif
                            </nav>
                        @endif
                    @endif
                </div>
            @endif
        </div>
    </section>

    <section class="journal-newsletter" aria-labelledby="newsletter-title">
        <div class="journal-shell journal-newsletter__grid">
            <div>
                <p class="journal-newsletter__edition">Next edition</p>
                <h2 id="newsletter-title">One useful idea for your learning operation.</h2>
            </div>
            <div>
                <p class="journal-newsletter__intro">Get new field notes, practical guides, and product research in your inbox. No filler.</p>
                @if (session('newsletter_success'))
                    <p class="journal-newsletter__notice is-success" role="status">{{ session('newsletter_success') }}</p>
                @elseif (session('newsletter_error'))
                    <p class="journal-newsletter__notice is-error" role="alert">{{ session('newsletter_error') }}</p>
                @endif
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="journal-newsletter__form">
                    @csrf
                    <x-spam-guard form="newsletter" />
                    <label class="sr-only" for="journal-email">Work email address</label>
                    <input id="journal-email" type="email" name="email" placeholder="you@company.com" autocomplete="email" required>
                    <button type="submit">Join the list <span aria-hidden="true">→</span></button>
                </form>
                <small>Unsubscribe whenever you like.</small>
            </div>
        </div>
    </section>
</main>

@push('styles')
<style>
    .journal { color: #122033; background: #f7f9fc; }
    .journal-shell { width: min(1240px, calc(100% - 3rem)); margin-inline: auto; }
    .journal-masthead { overflow: hidden; padding: 2.1rem 0 3.5rem; background: #fff; border-bottom: 1px solid #dce4ee; }
    .journal-masthead__top { display: flex; justify-content: space-between; padding-bottom: 1.2rem; color: #607086; border-bottom: 1px solid #dce4ee; font-size: .75rem; font-weight: 700; }
    .journal-masthead__top p:last-child { font-weight: 500; }
    .journal-masthead__title { display: grid; grid-template-columns: 1.45fr .55fr; align-items: end; gap: 4rem; padding: clamp(4rem, 9vw, 8rem) 0 3.5rem; }
    .journal-masthead h1 { color: #0b2e5c; font-size: clamp(4rem, 9vw, 8.5rem); font-weight: 800; letter-spacing: -.04em; line-height: .8; text-wrap: balance; }
    .journal-masthead h1 span { color: #4b8be8; font-family: Georgia, serif; font-weight: 400; font-style: italic; letter-spacing: -.03em; }
    .journal-masthead__title > p { max-width: 31rem; padding-bottom: .35rem; color: #526176; font-size: 1.05rem; line-height: 1.7; text-wrap: pretty; }
    .journal-topics { display: flex; flex-wrap: wrap; gap: .55rem; padding-top: 1.35rem; border-top: 1px solid #dce4ee; }
    .journal-topics span { padding: .5rem .8rem; color: #355474; background: #eef4fb; border-radius: 999px; font-size: .72rem; font-weight: 800; }
    .journal-feed { padding: clamp(4.5rem, 8vw, 7rem) 0 8rem; }
    .journal-section-head { display: flex; align-items: baseline; justify-content: space-between; margin-bottom: 2rem; }
    .journal-section-head h2 { color: #0b2e5c; font-size: 1.1rem; font-weight: 800; }
    .journal-section-head p { color: #758397; font-size: .76rem; }
    .featured-story { display: grid; grid-template-columns: minmax(0, 1.12fr) minmax(340px, .88fr); min-height: 590px; background: #071b36; border-radius: 14px; overflow: hidden; }
    .featured-story__media { position: relative; min-height: 100%; overflow: hidden; }
    .featured-story__media::after { content: ""; position: absolute; inset: 0; background: linear-gradient(120deg, transparent 60%, rgba(7, 27, 54, .28)); }
    .featured-story__media img { width: 100%; height: 100%; object-fit: cover; transition: transform .7s cubic-bezier(.16,1,.3,1); }
    .featured-story__media:hover img { transform: scale(1.025); }
    .featured-story__media > span { position: absolute; z-index: 1; left: 1.5rem; top: 1.5rem; padding: .5rem .7rem; color: #0b2e5c; background: #fff; border-radius: 5px; font-size: .67rem; font-weight: 900; letter-spacing: .06em; text-transform: uppercase; }
    .featured-story__copy { display: flex; flex-direction: column; justify-content: center; padding: clamp(2rem, 5vw, 4.75rem); color: #fff; }
    .featured-story__meta { display: flex; justify-content: space-between; margin-bottom: 2.25rem; color: #93acd0; font-size: .72rem; font-weight: 800; text-transform: uppercase; letter-spacing: .06em; }
    .featured-story__copy h3 { font-size: clamp(2rem, 3.4vw, 3.5rem); font-weight: 800; letter-spacing: -.035em; line-height: 1.03; text-wrap: balance; }
    .featured-story__copy h3 a { transition: color .2s ease; }
    .featured-story__copy h3 a:hover { color: #80aeea; }
    .featured-story__copy > p { margin-top: 1.75rem; color: #b9c9dc; font-size: .96rem; line-height: 1.72; }
    .featured-story__footer { display: flex; justify-content: space-between; align-items: center; margin-top: 3rem; padding-top: 1.25rem; border-top: 1px solid rgba(255,255,255,.14); color: #93acd0; font-size: .75rem; font-weight: 700; }
    .featured-story__footer a { color: #fff; }
    .journal-archive { margin-top: 5.5rem; }
    .journal-archive__heading { display: flex; align-items: flex-end; justify-content: space-between; gap: 2rem; padding-bottom: 1.5rem; border-bottom: 1px solid #dce4ee; }
    .journal-archive__heading h2 { color: #0b2e5c; font-size: 2rem; font-weight: 800; letter-spacing: -.03em; }
    .journal-archive__heading p { margin-top: .25rem; color: #758397; font-size: .75rem; }
    .journal-search { display: flex; align-items: center; width: min(100%, 390px); padding: .3rem .3rem .3rem .9rem; background: #fff; border: 1px solid #cbd7e6; border-radius: 8px; }
    .journal-search > span { color: #607086; font-size: 1.15rem; }
    .journal-search input { flex: 1; min-width: 0; padding: .65rem; color: #122033; background: transparent; outline: none; font-size: .85rem; }
    .journal-search input::placeholder { color: #607086; opacity: 1; }
    .journal-search button { min-height: 40px; padding: 0 1rem; color: #fff; background: #0b2e5c; border-radius: 6px; font-size: .75rem; font-weight: 800; }
    .journal-filters { display: flex; gap: .5rem; margin: 1.25rem 0 2.25rem; overflow-x: auto; scrollbar-width: none; }
    .journal-filters a { flex: 0 0 auto; padding: .5rem .8rem; color: #526176; border: 1px solid #d4deea; border-radius: 999px; font-size: .72rem; font-weight: 800; }
    .journal-filters a.is-active { color: #fff; background: #2f73d2; border-color: #2f73d2; }
    .journal-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); column-gap: 2rem; row-gap: 4rem; }
    .archive-card__image { display: block; overflow: hidden; margin-bottom: 1.35rem; background: #dfe9f6; border-radius: 9px; }
    .archive-card__image img { width: 100%; aspect-ratio: 16 / 10; object-fit: cover; transition: transform .5s cubic-bezier(.16,1,.3,1); }
    .archive-card__image:hover img { transform: scale(1.025); }
    .archive-card__meta { display: flex; justify-content: space-between; color: #758397; font-size: .68rem; font-weight: 700; }
    .archive-card__meta span:first-child { color: #2f73d2; text-transform: uppercase; letter-spacing: .05em; }
    .archive-card h3 { margin-top: .85rem; color: #0b2e5c; font-size: 1.35rem; font-weight: 800; line-height: 1.2; text-wrap: balance; }
    .archive-card h3 a:hover { color: #2f73d2; }
    .archive-card > p { display: -webkit-box; margin-top: .8rem; overflow: hidden; color: #526176; font-size: .85rem; line-height: 1.65; -webkit-box-orient: vertical; -webkit-line-clamp: 3; }
    .archive-card time { display: block; margin-top: 1rem; color: #758397; font-size: .7rem; }
    .journal-pagination { display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; margin-top: 5rem; padding-top: 1.5rem; border-top: 1px solid #dce4ee; color: #607086; font-size: .78rem; font-weight: 800; }
    .journal-pagination > :last-child { justify-self: end; }
    .journal-pagination a { color: #0b2e5c; }
    .journal-pagination [aria-disabled="true"] { opacity: .45; }
    .journal-newsletter { padding: 6.5rem 0; color: #fff; background: #2f73d2; }
    .journal-newsletter__grid { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(3rem, 10vw, 10rem); align-items: end; }
    .journal-newsletter__edition { margin-bottom: 1.5rem; color: #c8dbf5; font-size: .75rem; font-weight: 900; letter-spacing: .08em; text-transform: uppercase; }
    .journal-newsletter h2 { max-width: 13ch; font-size: clamp(2.6rem, 5vw, 4.7rem); font-weight: 800; letter-spacing: -.04em; line-height: .98; text-wrap: balance; }
    .journal-newsletter__intro { max-width: 31rem; color: #e4effd; line-height: 1.65; }
    .journal-newsletter__form { position: relative; display: flex; margin-top: 2rem; padding-bottom: .75rem; border-bottom: 2px solid rgba(255,255,255,.72); }
    .journal-newsletter__form input { flex: 1; min-width: 0; padding: .7rem .25rem; color: #fff; background: transparent; outline: none; font-size: 1.05rem; }
    .journal-newsletter__form input::placeholder { color: #d5e5fa; opacity: 1; }
    .journal-newsletter__form button { min-height: 44px; padding: 0 1rem; color: #0b2e5c; background: #fff; border-radius: 7px; font-size: .78rem; font-weight: 900; }
    .journal-newsletter small { display: block; margin-top: .8rem; color: #c8dbf5; }
    .journal-newsletter__notice { margin-top: 1rem; font-size: .85rem; font-weight: 700; }
    .journal-newsletter__notice.is-error { color: #fff1bd; }
    .journal-empty { padding: 5rem; text-align: center; background: #fff; }
    .journal-empty h3 { color: #0b2e5c; font-size: 1.5rem; font-weight: 800; }
    .journal-empty p { margin-top: .65rem; color: #607086; }
    .journal-empty a { display: inline-block; margin-top: 1.25rem; color: #2f73d2; font-weight: 800; }
    @media (max-width: 900px) {
        .journal-masthead__title { grid-template-columns: 1fr; gap: 2.5rem; }
        .featured-story { grid-template-columns: 1fr; }
        .featured-story__media { min-height: 420px; }
        .journal-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .journal-newsletter__grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 640px) {
        .journal-shell { width: min(100% - 2rem, 1240px); }
        .journal-masthead { padding-top: 1.25rem; }
        .journal-masthead__top p:last-child { display: none; }
        .journal-masthead__title { padding: 4.5rem 0 2.5rem; }
        .journal-masthead h1 { font-size: clamp(3.65rem, 18vw, 5.5rem); }
        .journal-topics { flex-wrap: nowrap; margin-right: -1rem; padding-right: 1rem; overflow-x: auto; scrollbar-width: none; }
        .journal-topics span { flex: 0 0 auto; }
        .journal-feed { padding: 4rem 0 5rem; }
        .journal-section-head p { display: none; }
        .featured-story { min-height: 0; }
        .featured-story__media { min-height: 310px; }
        .featured-story__copy { padding: 2rem 1.5rem 2.25rem; }
        .featured-story__meta { margin-bottom: 1.5rem; }
        .journal-archive { margin-top: 4rem; }
        .journal-archive__heading { align-items: stretch; flex-direction: column; }
        .journal-search { width: 100%; }
        .journal-grid { grid-template-columns: 1fr; gap: 3rem; }
        .journal-pagination { grid-template-columns: 1fr 1fr; }
        .journal-pagination > span:nth-child(2) { grid-column: 1 / -1; grid-row: 1; margin-bottom: 1.25rem; text-align: center; }
        .journal-newsletter { padding: 5rem 0; }
        .journal-newsletter__form { align-items: flex-end; }
        .journal-newsletter__form button { padding-inline: .75rem; }
    }
    @media (prefers-reduced-motion: reduce) {
        .featured-story__media img, .featured-story__copy h3 a { transition: none; }
    }
</style>
@endpush
@endsection
