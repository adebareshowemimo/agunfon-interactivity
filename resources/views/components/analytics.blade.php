{{--
    Search-engine verification + GA4.

    Every block below is opt-in via .env and renders nothing when unconfigured, so
    local and staging environments stay clean and dev traffic never reaches the
    production property. See config/services.php for the keys.
--}}
@if (config('services.search_console.verification'))
    <meta name="google-site-verification" content="{{ config('services.search_console.verification') }}">
@endif

@if (config('services.search_console.bing_verification'))
    <meta name="msvalidate.01" content="{{ config('services.search_console.bing_verification') }}">
@endif

@if (config('services.analytics.enabled') && config('services.analytics.ga4_id'))
    @php($ga4 = config('services.analytics.ga4_id'))
    {{-- Warm the connection before gtag.js is requested. --}}
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $ga4 }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', @json($ga4), {
            // The site sets no advertising cookies, so keep GA4 to first-party
            // analytics only. Matches what /cookies-policy tells visitors.
            anonymize_ip: true,
            allow_google_signals: false,
            allow_ad_personalization_signals: false
        });
    </script>
@endif
