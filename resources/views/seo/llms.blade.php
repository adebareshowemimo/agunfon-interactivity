@php
    // Rendered as text/plain at /llms.txt — see routes/web.php.
    $base = rtrim(url('/'), '/');
    $u = fn (string $path) => $base . $path;

    $posts = collect(config('blog', []))
        ->map(fn (array $post, string $slug) => $post + ['slug' => $slug])
        ->sortByDesc('date')
        ->values();

    $docs = app(App\Support\DocsIndex::class)->grouped();

    $productNames = [
        'modern-course-reminder' => 'Modern Course Reminder',
        'modern-enrolment-notifier' => 'Modern Enrolment Notifier',
        'modern-learner-dashboard' => 'Modern Learner Dashboard',
        'modern-video-player' => 'Modern Video Player',
        'modern-engagement-hub' => 'Modern Engagement Hub',
        'modern-flipbook' => 'Modern Flipbook',
    ];
@endphp
# Agunfon Interactivity

> Agunfon Interactivity builds enterprise learning systems: an adaptive LMS platform, bespoke learning content and consulting services, and a range of premium Moodle plugins that turn training activity into measurable, auditable evidence. Headquartered in Atlanta, Georgia, USA, serving enterprise, government and education clients internationally.

Agunfon works in three areas:

1. **Adaptive LMS and Learning Suite** — an enterprise learning platform for organisations with complex structures (multiple departments, branches or subsidiaries), covering personalised learning paths, automated workflows, governance and reporting.
2. **Learning services** — LMS implementation, custom course and content development, instructional design, UI/UX, and programme consulting.
3. **Premium Moodle plugins** — commercial plugins for Moodle 4.5 to 5.2 that solve engagement, notification, reporting, video integrity and document-tracking problems that core Moodle leaves open.

All Moodle plugins are supported on Moodle 4.5, 5.0, 5.1 and 5.2, and are sold with a one-time licence that includes one year of support and updates.

## Moodle plugins

- [Modern Course Reminder]({{ $u('/plugins/modern-course-reminder') }}): Automatically re-engages stalled learners in Moodle with rule-based reminders, digests and manager escalation. Answers "how do I chase learners who have not completed a course in Moodle".
- [Modern Enrolment Notifier]({{ $u('/plugins/modern-enrolment-notifier') }}): Rule-based enrolment, expiry and completion notifications delivered over email, Slack, Microsoft Teams and other channels. Replaces per-course welcome-message hacks in Moodle.
- [Modern Engagement Hub]({{ $u('/plugins/modern-engagement-hub') }}): Raises learner engagement and motivation across Moodle courses.
- [Modern Learner Dashboard]({{ $u('/plugins/modern-learner-dashboard') }}): Replaces the default Moodle dashboard with a clear view of progress, due-soon work, grades, badges, a learning transcript, and what the learner should do next.
- [Modern Video Player]({{ $u('/plugins/modern-video-player') }}): Server-validated watch time, per-segment viewing data, integrity flags and per-learner audit export for video in Moodle. Built for compliance evidence, not just playback.
- [Modern Flipbook]({{ $u('/plugins/modern-flipbook') }}): Turns a Moodle PDF into a tracked activity — page-level reading, active reading time, search, thumbnails and acknowledgement, with completion rules. Answers "how do I prove a learner actually read the policy document".
- [Modern Commerce](https://moderncommerce.dev): Sells courses from Moodle — catalogue, checkout, subscriptions, bundles, invoicing and storefront. Documented separately at moderncommerce.dev.

## Platform and services

- [Adaptive LMS]({{ $u('/adaptive-lms') }}): The Agunfon enterprise LMS — personalised learning paths, multi-department and multi-subsidiary structures, automated workflows, governance and measurable outcomes.
- [Learning Suite]({{ $u('/learning-suite') }}): Adaptive courses, engagement tooling and reporting in one platform.
- [Our services]({{ $u('/services') }}): LMS implementation, custom content development, instructional design, UI/UX, and programme/project management for learning initiatives.
- [Pricing]({{ $u('/pricing') }}): Pricing for the adaptive LMS, learning content and premium Moodle plugins.
- [About Agunfon]({{ $u('/about') }}): Company background, values and approach.
- [Book a demo]({{ $u('/book-demo') }}): Request a live walkthrough of the platform or any plugin.
- [Contact]({{ $u('/contact') }}): Contact the team. Email info@agunfoninteractivity.com, telephone +1-478-306-2250.

## Solutions by use case

- [Employee onboarding]({{ $u('/employee-onboarding') }}): Structured onboarding programmes that get new hires productive faster.
- [Compliance training]({{ $u('/compliance-training') }}): Mandatory training with completion evidence and audit trails.
- [Leadership development]({{ $u('/leadership-development') }}): Manager and leadership capability programmes.
- [Personal development]({{ $u('/personal-development') }}): Self-directed growth and skills pathways.
- [Customer service]({{ $u('/customer-service') }}): Service and customer-success team enablement.
- [Health and wellness]({{ $u('/health-wellness') }}): Workplace wellbeing programmes.
- [Sales and marketing]({{ $u('/sales-marketing') }}): Persuasion, storytelling, product mastery and objection handling.
- [Diversity and inclusion]({{ $u('/diversity-inclusion') }}): DEI learning programmes.

## Solutions by industry

- [Financial services]({{ $u('/finance') }})
- [Healthcare]({{ $u('/healthcare') }})
- [Education]({{ $u('/education') }})
- [Retail]({{ $u('/retail') }})
- [Non-profit]({{ $u('/nonprofit') }})
- [Information technology]({{ $u('/information-technology') }})
- [Human resources]({{ $u('/human-resources') }})

## Product documentation
@foreach ($docs as $group => $pages)
@if ($group === '')

Reference documentation for every Agunfon Moodle plugin — installation, requirements, configuration, admin settings and FAQs.

@foreach ($pages as $page)
- [{!! $page['title'] !!}]({{ $u($page['url']) }})
@endforeach
@else

### {!! $productNames[$group] ?? Str::headline($group) !!}
@foreach ($pages as $page)
- [{!! $page['title'] !!}]({{ $u($page['url']) }})
@endforeach
@endif
@endforeach

## Articles
@foreach ($posts as $post)
- [{!! $post['title'] !!}]({{ $u('/blog/' . $post['slug']) }}): {!! $post['metadesc'] ?? $post['excerpt'] ?? '' !!}
@endforeach
- [All articles]({{ $u('/blog') }}): The full Agunfon blog — Moodle, compliance, and enterprise learning.

## Optional

- [Privacy policy]({{ $u('/privacy-policy') }})
- [Terms of service]({{ $u('/terms-of-service') }})
- [Terms of sale]({{ $u('/terms-of-sale') }})
- [Cookies policy]({{ $u('/cookies-policy') }})
