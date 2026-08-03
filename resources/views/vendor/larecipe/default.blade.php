{{--
    Overrides binarytorch/larecipe's default layout.

    The stock layout stamps ONE meta description (config larecipe.seo.description)
    onto every documentation page — 50+ pages sharing one description, which search
    engines treat as duplicate and answer engines can't distinguish. This override
    derives a real per-page description from the page's own first paragraph, adds
    Open Graph / Twitter cards, and emits TechArticle + BreadcrumbList structured
    data so each doc page can be cited on its own.

    Keep in sync with vendor/binarytorch/larecipe/resources/views/default.blade.php
    when the package is upgraded.
--}}
@php
    $docsRoute = trim(config('larecipe.docs.route', '/docs'), '/');
    $pageTitle = trim($title ?? '') !== '' ? trim($title) : 'Documentation';

    // First real paragraph of the rendered page, trimmed to a usable meta length.
    // Entities are decoded first so "&amp;" counts as the one character a search
    // engine actually renders, keeping the tag inside the ~160 char display limit.
    $plain = html_entity_decode(strip_tags($content ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $plain = trim(preg_replace('/\s+/u', ' ', $plain));
    $plain = trim(Illuminate\Support\Str::after($plain, $pageTitle));
    $pageDescription = $plain !== ''
        ? Illuminate\Support\Str::limit($plain, 152)
        : config('larecipe.seo.description');

    $canonicalUrl = isset($canonical) && $canonical ? url($canonical) : url()->current();
    $ogImage = url('/images/agunfon-og.jpg');

    // Breadcrumb: Home → Documentation → [Product] → Page.
    $docSegments = array_values(array_filter(explode('/', trim(
        Illuminate\Support\Str::after(request()->path(), $docsRoute), '/'
    ))));
    // Drop the leading version segment (e.g. "1.0") — it is not a user-facing level.
    $versionSegment = array_shift($docSegments);

    $crumbs = [['name' => 'Documentation', 'url' => url($docsRoute)]];
    $walked = $docsRoute . '/' . $versionSegment;
    $docsPath = base_path(trim(config('larecipe.docs.path', '/resources/docs'), '/') . '/' . $versionSegment);
    foreach ($docSegments as $i => $segment) {
        $walked .= '/' . $segment;
        $isLast = $i === count($docSegments) - 1;

        // A product folder only has a hub page if <product>.md exists. Without one
        // the URL 404s, so never emit it as an intermediate breadcrumb link.
        $relative = implode('/', array_slice($docSegments, 0, $i + 1));
        if (! $isLast && ! is_file($docsPath . '/' . $relative . '.md')) {
            continue;
        }

        $crumbs[] = [
            // The final crumb uses the page's real H1 ("FAQ"), not a slug-cased
            // guess ("Faq").
            'name' => $isLast ? $pageTitle : Illuminate\Support\Str::headline(str_replace('-', ' ', $segment)),
            'url' => url($walked),
        ];
    }

    // Page titles repeat across products — every plugin has an "FAQ", an
    // "Installation & Upgrade", a "Requirements". Unqualified, that is ~24 pages
    // fighting each other for the same title. Qualify with the product name.
    $productSlug = count($docSegments) > 1 ? $docSegments[0] : null;
    $productName = $productSlug
        ? Illuminate\Support\Str::headline(str_replace('-', ' ', $productSlug))
        : null;

    // Google renders roughly 60 characters before truncating, and product names
    // here are long ("Modern Enrolment Notifier" alone is 25). So rather than one
    // fixed format, try the most informative first and fall back until it fits.
    // The product name leads: it is the term people and answer engines search on.
    $candidates = $productName && ! Illuminate\Support\Str::contains($pageTitle, $productName)
        ? [
            $productName . ' for Moodle: ' . $pageTitle . ' | Agunfon',
            $productName . ' for Moodle: ' . $pageTitle,
            $productName . ': ' . $pageTitle,
        ]
        : [
            // Avoid "Agunfon ... | Agunfon ..." on pages already carrying the brand.
            $pageTitle . (Illuminate\Support\Str::contains($pageTitle, 'Agunfon')
                ? ' | Moodle Plugin Docs'
                : ' | Agunfon Moodle Plugin Docs'),
            $pageTitle . ' | Agunfon Docs',
        ];

    $seoTitle = collect($candidates)->first(fn ($c) => mb_strlen($c) <= 60)
        ?? end($candidates);
@endphp
<!doctype html>
<html lang="en">
    <head>
        <!-- META Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        {{-- Same verification + GA4 partial as the main site, so /docs traffic
             lands in the same property instead of going unmeasured. --}}
        @include('components.analytics')

        <title>{{ $seoTitle }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- SEO -->
        <meta name="author" content="{{ config('larecipe.seo.author') }}">
        <meta name="description" content="{{ $pageDescription }}">
        <meta name="keywords" content="{{ config('larecipe.seo.keywords') }}">
        <link rel="canonical" href="{{ $canonicalUrl }}" />

        <!-- Open Graph -->
        <meta property="og:site_name" content="{{ config('app.name') }}">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $seoTitle }}">
        <meta property="og:description" content="{{ $pageDescription }}">
        <meta property="og:url" content="{{ $canonicalUrl }}">
        <meta property="og:image" content="{{ $ogImage }}">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seoTitle }}">
        <meta name="twitter:description" content="{{ $pageDescription }}">
        <meta name="twitter:image" content="{{ $ogImage }}">

        <!-- Structured data -->
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@type": "TechArticle",
            "headline": {!! json_encode($pageTitle) !!},
            "description": {!! json_encode($pageDescription) !!},
            "url": "{{ $canonicalUrl }}",
            "inLanguage": "en",
            "isPartOf": {
                "@type": "WebSite",
                "@id": "{{ url('/') }}/#website"
            },
            "publisher": {
                "@type": "Organization",
                "@id": "{{ url('/') }}/#organization",
                "name": "{{ config('larecipe.seo.author') }}",
                "url": "{{ url('/') }}"
            }
        }
        </script>
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "{{ url('/') }}"
                }@foreach ($crumbs as $i => $crumb),
                {
                    "@type": "ListItem",
                    "position": {{ $i + 2 }},
                    "name": {!! json_encode($crumb['name']) !!},
                    "item": "{{ $crumb['url'] }}"
                }@endforeach
            ]
        }
        </script>

        <!-- CSS -->
        <link rel="stylesheet" href="{{ larecipe_assets('css/app.css') }}">

        <!-- Favicon — matches the main site so docs are visibly the same brand. -->
        <link rel="icon" type="image/png" href="/images/Agunfon_Icon.png">
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="apple-touch-icon" href="/images/Agunfon_Icon.png">
        <meta name="theme-color" content="#0F3D7A">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="{{ larecipe_assets('css/font-awesome.css') }}">
        @if (config('larecipe.ui.fa_v4_shims', true))
            <link rel="stylesheet" href="{{ larecipe_assets('css/font-awesome-v4-shims.css') }}">
        @endif

        <!-- Dynamic Colors -->
        @include('larecipe::style')

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @foreach(LaRecipe::allStyles() as $name => $path)
            @if (preg_match('/^https?:\/\//', $path))
                <link rel="stylesheet" href="{{ $path }}">
            @else
                <link rel="stylesheet" href="{{ route('larecipe.styles', $name) }}">
            @endif
        @endforeach

    </head>
    <body>
        <div id="app" v-cloak>
            @include('larecipe::partials.nav')

            @include('larecipe::plugins.search')

            @yield('content')

            <larecipe-back-to-top></larecipe-back-to-top>
        </div>


        <script>
            window.config = @json([]);
        </script>

        <script type="text/javascript">
            if(localStorage.getItem('larecipeSidebar') == null) {
                localStorage.setItem('larecipeSidebar', !! {{ config('larecipe.ui.show_side_bar') ?: 0 }});
            }
        </script>

        <script src="{{ larecipe_assets('js/app.js') }}"></script>

        <script>
            window.LaRecipe = new CreateLarecipe(config)
        </script>

        {{-- LaRecipe's own gtag block (config larecipe.settings.ga_id) is
             deliberately omitted: analytics is loaded once, in the head, via
             components.analytics. Keeping both would double-count every doc
             pageview if larecipe.settings.ga_id were ever populated. --}}

        @foreach (LaRecipe::allScripts() as $name => $path)
            @if (preg_match('/^https?:\/\//', $path))
                <script src="{{ $path }}"></script>
            @else
                <script src="{{ route('larecipe.scripts', $name) }}"></script>
            @endif
        @endforeach

        <script>
            LaRecipe.run()
        </script>
    </body>
</html>
