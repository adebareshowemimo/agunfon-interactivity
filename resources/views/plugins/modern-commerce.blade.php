@extends('layouts.app')

@section('title', 'Modern Commerce for Moodle - Sell Courses, Bundles & Subscriptions - Agunfon')

@section('content')
<!-- ============ HERO ============ -->
<section class="py-16 md:py-24 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center">
        <div class="max-w-xl">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-6">
                MOODLE PLUGIN <span class="w-1 h-1 rounded-full bg-blue-300"></span> Premium
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-brand-700 leading-[1.1] mb-8">
                Sell your courses from the <span class="font-serif italic text-brand-500">Moodle you already own</span>
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed mb-10">
                Modern Commerce turns Moodle into a complete storefront — branded catalogue, cart and checkout, coupons, enrolment keys, invoices, refunds and recurring subscriptions — paid through your own Stripe, Paystack, PayPal or Flutterwave account. No bridge plugin. No second website. No monthly SaaS.
            </p>
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="#pricing" class="inline-flex items-center px-9 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1 active:translate-y-0">Purchase Now</a>
                <a href="https://demo.agunfoninteractivity.com/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-9 py-4 border border-gray-200 text-brand-700 font-bold rounded-xl hover:bg-gray-50 transition-all">
                    <iconify-icon icon="lucide:store" class="text-brand-500"></iconify-icon> Try it live
                </a>
                <a href="/docs/1.0/modern-commerce/overview" class="inline-flex items-center gap-2 px-9 py-4 border border-gray-200 text-brand-700 font-bold rounded-xl hover:bg-gray-50 transition-all">
                    <iconify-icon icon="lucide:book-open" class="text-brand-500"></iconify-icon> Documentation
                </a>
            </div>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-500 font-medium">
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:credit-card" class="text-brand-500"></iconify-icon> Stripe · Paystack · PayPal · Flutterwave</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:percent" class="text-brand-500"></iconify-icon> No revenue share, ever</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:shield-check" class="text-brand-500"></iconify-icon> Moodle Privacy API</span>
                <span class="inline-flex items-center gap-1.5"><iconify-icon icon="lucide:check-circle" class="text-brand-500"></iconify-icon> Moodle 5.2</span>
            </div>
        </div>

        <!-- Product mockup: sales dashboard -->
        <div class="relative">
            <div class="bg-white rounded-[32px] shadow-2xl border border-gray-100 p-5 hero-dashboard">
                <div class="flex items-center gap-1.5 px-2 pb-4">
                    <span class="w-3 h-3 rounded-full bg-red-400"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                    <span class="w-3 h-3 rounded-full bg-green-400"></span>
                    <span class="ml-3 text-xs text-gray-400">moodle.yourschool.edu › commerce › dashboard</span>
                </div>
                <div class="grid grid-cols-3 gap-3 mb-3">
                    <div class="rounded-2xl border border-gray-100 bg-brand-50 p-3"><div class="text-[10px] font-bold uppercase tracking-wide text-gray-500">Revenue</div><div class="text-xl font-extrabold text-brand-700">£18,420</div></div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-3"><div class="text-[10px] font-bold uppercase tracking-wide text-gray-500">Orders</div><div class="text-xl font-extrabold text-brand-700">312</div></div>
                    <div class="rounded-2xl border border-gray-100 bg-white p-3"><div class="text-[10px] font-bold uppercase tracking-wide text-gray-500">Subscribers</div><div class="text-xl font-extrabold text-green-500">96</div></div>
                </div>
                <div class="rounded-2xl border border-gray-100 p-3 mb-3">
                    <div class="text-[10px] font-bold uppercase tracking-wide text-gray-500 mb-2">Daily sales</div>
                    <div class="flex items-end gap-1 h-16">
                        @foreach ([32,45,38,60,52,71,64,58,80,74,88,69,95,82,100] as $h)
                        <div class="flex-1 rounded-t-sm bg-brand-500" style="height: {{ $h }}%"></div>
                        @endforeach
                    </div>
                </div>
                <div class="space-y-2">
                    @foreach ([['Advanced Safeguarding', 'Paid', 'text-green-600 bg-green-50'], ['Leadership Bundle (3 courses)', 'Paid', 'text-green-600 bg-green-50'], ['Pro Membership · monthly', 'Renewed', 'text-brand-600 bg-brand-50']] as [$item, $status, $cls])
                    <div class="flex items-center justify-between rounded-xl border border-gray-100 px-3 py-2">
                        <span class="text-xs font-semibold text-brand-700 truncate">{{ $item }}</span>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $cls }}">{{ $status }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden md:flex items-center gap-2 absolute -top-4 -left-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700"><iconify-icon icon="lucide:shopping-bag" class="text-brand-500"></iconify-icon> Storefront ready</div>
            <div class="hidden md:flex items-center gap-2 absolute -bottom-4 -right-4 bg-white rounded-2xl shadow-float border border-gray-100 px-4 py-2.5 text-sm font-bold text-brand-700"><iconify-icon icon="lucide:repeat" class="text-brand-500"></iconify-icon> Recurring billing</div>
        </div>
    </div>
</section>

<!-- ============ TRUST / STATS BAND ============ -->
<section class="py-12 md:py-16 bg-brand-50/60 border-y border-blue-50">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <p class="text-center text-xs font-bold tracking-widest uppercase text-gray-400 mb-10">A full commerce platform, built natively into Moodle</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div><div class="text-4xl font-extrabold text-brand-700">4</div><div class="text-sm text-gray-500 mt-1">payment gateways, your accounts</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">22</div><div class="text-sm text-gray-500 mt-1">storefront widgets to arrange</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">17</div><div class="text-sm text-gray-500 mt-1">automations on Moodle cron</div></div>
            <div><div class="text-4xl font-extrabold text-brand-700">36</div><div class="text-sm text-gray-500 mt-1">capabilities for role control</div></div>
        </div>
    </div>
</section>

<!-- ============ SOLUTION OVERVIEW ============ -->
<section class="py-20 md:py-28">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-10">You built your courses in Moodle.<br>So why leave Moodle to sell them?</h2>
        <div class="max-w-4xl mx-auto">
            <p class="text-lg text-gray-600 leading-relaxed">
                Every other route drags you off your LMS — a WordPress site with WooCommerce and a bridge plugin to keep in sync, or a monthly SaaS platform that takes a slice of every sale. Both mean two systems, two sets of user records, and a sync layer that breaks quietly. Modern Commerce puts the whole transaction inside Moodle instead: the catalogue, the cart, the checkout, the coupon, the invoice, the refund and the enrolment all happen against the same courses and the same user accounts you already administer. One install, one login, one place to look when a customer asks where their course went.
            </p>
        </div>
    </div>
</section>

<!-- ============ WITHOUT / WITH ============ -->
<section class="py-12 md:py-20 bg-brand-50/40 border-y border-blue-50">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="grid lg:grid-cols-2 gap-6 lg:gap-10 max-w-6xl mx-auto">
            <div class="bg-white rounded-[32px] border border-gray-100 shadow-soft p-8 lg:p-10">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-50 text-red-500 text-[11px] font-bold tracking-widest uppercase mb-7">
                    <iconify-icon icon="lucide:x"></iconify-icon> Without Modern Commerce
                </span>
                @php
                $pains = [
                    ['Manual enrolment chaos', 'Someone pays on another platform, then a human copy-pastes them into the right Moodle course — every week, for every sale, with every typo that follows.'],
                    ['Integration fragility', 'A WooCommerce or membership stack held together by a bridge plugin, quietly breaking on the next update to either side.'],
                    ['No native commerce', 'Bundles, subscriptions and team licences only exist if you duct-tape three products together — and none of them know about your Moodle roles.'],
                ];
                @endphp
                <div class="space-y-7">
                    @foreach ($pains as [$t, $d])
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 rounded-full bg-red-50 text-red-400 flex items-center justify-center shrink-0 mt-0.5"><iconify-icon icon="lucide:x" class="text-lg"></iconify-icon></div>
                        <div><h3 class="font-bold text-brand-700 mb-1">{{ $t }}</h3><p class="text-gray-500 text-sm leading-relaxed">{!! $d !!}</p></div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-brand-700 rounded-[32px] shadow-2xl p-8 lg:p-10">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white text-brand-700 text-[11px] font-bold tracking-widest uppercase mb-7">
                    <iconify-icon icon="lucide:check"></iconify-icon> With Modern Commerce
                </span>
                @php
                $gains = [
                    ['Enrolment happens on payment', 'The gateway confirms, the order completes, the learner is enrolled and the invoice is issued — in seconds, with nobody watching.'],
                    ['One system, always in sync', 'Everything runs inside your Moodle against the courses and user accounts you already administer. There is no bridge to break.'],
                    ['Commerce built for a LMS', 'Single courses, bundles and programs, subscriptions with trials and renewals, and seat-based licences for organisations — natively.'],
                ];
                @endphp
                <div class="space-y-7">
                    @foreach ($gains as [$t, $d])
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 rounded-full bg-brand-500 text-white flex items-center justify-center shrink-0 mt-0.5 shadow-md"><iconify-icon icon="lucide:check" class="text-lg"></iconify-icon></div>
                        <div><h3 class="font-bold text-white mb-1">{{ $t }}</h3><p class="text-blue-100/80 text-sm leading-relaxed">{!! $d !!}</p></div>
                    </div>
                    @endforeach
                </div>
            </div>
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
                    ['layout-dashboard', 'Widget-driven storefront', 'Build the shop in edit mode from 22 widget types — hero slider, catalogue, categories, featured products, testimonials, countdown bar, FAQ, newsletter and more — across seven public pages including About, Support, Terms and Refund Policy.'],
                    ['shopping-cart', 'Cart, checkout &amp; gateways', 'A real cart and one-page checkout, paid through your own Stripe, Paystack, PayPal or Flutterwave account with signed webhooks. The money lands in your merchant account — we never take a cut.'],
                    ['package', 'Products, bundles &amp; keys', 'Sell single courses, multi-course bundles and programs, or issue enrolment keys and bundle keys for cohorts, resellers and corporate buyers. Successful payment enrols the learner automatically.'],
                    ['repeat', 'Subscriptions &amp; recurring revenue', 'Subscription plans with free trials, recurring charges, plan changes, grace periods, expiry handling and automatic course-access sync — all driven by scheduled tasks, not manual chasing.'],
                    ['receipt', 'Orders, invoices, refunds &amp; audit', 'Order management with downloadable invoices, tax handling, coupons, manual invoicing, refund processing and an audit log — so finance can reconcile and you can answer "what happened to order 4102?".'],
                    ['bell-ring', 'Recovery &amp; alerts that run themselves', 'Abandoned-cart recovery, payment reminders and daily sales reports on cron, plus a queued notification subsystem that emails customers and posts operational alerts to Slack or Microsoft Teams.'],
                    ['users', 'Seat-based licences for organisations', 'Sell to companies, not just individuals: subscription plans carry a seat limit, enrolment-key pools track seats used and remaining, and low-pool alerts email the buyer before their team runs out of access.'],
                    ['star', 'Reviews, wishlists &amp; learner accounts', 'Verified course reviews and wishlists on the storefront, and a learner account area for purchases, invoices, enrolment keys and subscription self-service — so customers answer their own questions.'],
                ];
                @endphp
                @foreach ($features as [$icon, $title, $desc])
                <div class="flex items-start gap-5">
                    <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white shrink-0 shadow-md"><iconify-icon icon="lucide:{{ $icon }}" class="text-xl"></iconify-icon></div>
                    <div><h3 class="text-white text-lg font-bold mb-1">{!! $title !!}</h3><p class="text-blue-100/80 text-sm leading-relaxed">{!! $desc !!}</p></div>
                </div>
                @endforeach
            </div>
            <p class="text-blue-100/70 text-sm mt-10">Also included: customer records, contact forms and newsletter capture, branding and email-template editors, inclusive or exclusive tax modes, 21 selectable store currencies, sales reports and analytics, an audit log, and a full Moodle privacy provider for GDPR subject requests.</p>
        </div>
    </div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-brand-700 mb-4">Price it. Publish it. Get paid.</h2>
        <p class="text-gray-500 mb-12 max-w-2xl mx-auto">From an unpriced Moodle course to an enrolled, invoiced customer — without leaving the LMS.</p>
        <div class="flex flex-wrap justify-center items-center gap-3">
            @foreach (['Connect your gateway','Price courses &amp; bundles','Arrange the storefront','Customer checks out','Auto-enrol + invoice'] as $i => $step)
                @if ($i > 0)<iconify-icon icon="lucide:arrow-right" class="text-brand-200 text-xl hidden sm:block"></iconify-icon>@endif
                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-white border border-gray-100 shadow-soft text-sm font-bold text-brand-700"><span class="w-6 h-6 rounded-full bg-brand-50 text-brand-500 flex items-center justify-center text-xs">{{ $i + 1 }}</span>{!! $step !!}</span>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ COMPARISON ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <h2 class="text-4xl md:text-5xl font-bold text-brand-700 text-center mb-4">Four ways to sell a Moodle course</h2>
        <p class="text-gray-500 text-center mb-12 max-w-2xl mx-auto">How the common routes compare on the things that cost you money and time.</p>
        <div class="max-w-5xl mx-auto bg-white rounded-[32px] border border-gray-100 shadow-soft overflow-x-auto">
            <table class="w-full text-sm md:text-base min-w-[720px]">
                <thead><tr class="border-b border-gray-100 text-gray-500">
                    <th class="text-left font-semibold p-4 md:p-5">&nbsp;</th>
                    <th class="font-semibold p-4 md:p-5">Core Moodle<br><span class="font-normal text-xs">enrol_fee</span></th>
                    <th class="font-semibold p-4 md:p-5">WordPress bridge<br><span class="font-normal text-xs">WooCommerce + connector</span></th>
                    <th class="font-semibold p-4 md:p-5">Hosted SaaS LMS<br><span class="font-normal text-xs">monthly platform</span></th>
                    <th class="font-bold p-4 md:p-5 bg-brand-50 text-brand-700">Modern Commerce</th>
                </tr></thead>
                <tbody class="text-gray-700">
                    @php
                    $rows = [
                        ['Runs entirely inside your Moodle', 'Yes', 'No', 'No', 'Yes'],
                        ['Second website to build &amp; maintain', 'No', 'Yes', 'Yes', 'No'],
                        ['Sync layer between systems', 'None', 'Required', 'Required', 'None'],
                        ['Branded storefront &amp; catalogue pages', '—', 'Yes', 'Yes', 'Yes'],
                        ['Cart, coupons &amp; multi-item checkout', '—', 'Yes', 'Varies', 'Yes'],
                        ['Bundles, programs &amp; enrolment keys', '—', 'Add-ons', 'Varies', 'Yes'],
                        ['Subscriptions &amp; recurring billing', '—', 'Add-ons', 'Yes', 'Yes'],
                        ['Invoices, refunds &amp; audit log', 'Limited', 'Yes', 'Yes', 'Yes'],
                        ['Abandoned-cart recovery', '—', 'Add-ons', 'Varies', 'Yes'],
                        ['Ongoing cost', 'Free', 'Hosting + licences', 'Monthly fee', 'One-time licence'],
                        ['Revenue share on your sales', 'None', 'None', 'Common', 'None'],
                    ];
                    @endphp
                    @foreach ($rows as $i => [$cap, $a, $b, $c, $d])
                    <tr class="@if ($i < count($rows) - 1) border-b border-gray-50 @endif">
                        <td class="text-left p-4 md:p-5">{!! $cap !!}</td>
                        <td class="text-center p-4 md:p-5 text-gray-400">{!! $a !!}</td>
                        <td class="text-center p-4 md:p-5 text-gray-400">{!! $b !!}</td>
                        <td class="text-center p-4 md:p-5 text-gray-400">{!! $c !!}</td>
                        <td class="text-center p-4 md:p-5 bg-brand-50 font-bold text-brand-700">{!! $d !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="text-center text-xs text-gray-400 mt-5 max-w-3xl mx-auto">Bridge and SaaS columns describe how those categories are typically packaged; individual products vary. Compare against your own shortlist before deciding.</p>
    </div>
</section>

<!-- ============ USE CASES ============ -->
<section class="py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full border border-blue-100 text-[11px] font-bold text-blue-600 bg-blue-50 tracking-widest uppercase mb-5">Use cases</span>
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700">Built for stores that live in Moodle</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            @php
            $cases = [
                ['graduation-cap', 'Course business', 'Sell direct to the public', 'Publish a branded catalogue with hero, categories, testimonials and reviews, take card payments in your own currency, and let successful checkout enrol the learner instantly.'],
                ['building-2', 'Corporate &amp; B2B', 'Sell seats to organisations', 'Sell a block of seats to a company, issue an enrolment-key pool for them to distribute, raise a manual invoice for their finance team, and watch seats used and remaining — with a low-pool alert that prompts the reorder before anyone loses access.'],
                ['repeat', 'Membership', 'Recurring access to a library', 'Put your whole catalogue behind a subscription plan with a free trial, let plans renew and lapse automatically, and keep course access in sync with billing status.'],
            ];
            @endphp
            @foreach ($cases as [$icon, $tag, $title, $desc])
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8 hover:shadow-float transition-all">
                <div class="w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center text-brand-500 mb-5"><iconify-icon icon="lucide:{{ $icon }}" class="text-2xl"></iconify-icon></div>
                <span class="text-[11px] font-bold tracking-widest uppercase text-brand-500">{!! $tag !!}</span>
                <h3 class="text-xl font-bold text-brand-700 mt-2 mb-3">{{ $title }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{!! $desc !!}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ PRICING ============ -->
{{-- TODO before launch: (1) confirm the 5-site and 10-site prices — only the $300 single-site figure
     is sourced (approved promo script); the others are a placeholder ladder. (2) swap [ID] for the
     real Moodle Marketplace listing ID. --}}
<section id="pricing" class="py-20 md:py-28 bg-brand-50/50">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="text-center mb-14">
            <h2 class="text-4xl md:text-5xl font-bold text-brand-700 mb-4">One-time, per site. No subscription.</h2>
            <p class="text-lg text-gray-500">Every tier includes the complete commerce core and a full year of support — free.</p>
        </div>
        @php
        $tiers = [
            ['Single Site', '$300', '1 production site', 'Email support', false],
            ['5 Sites', '$900', 'Up to 5 production sites', 'Priority support', true],
            ['10 Sites', '$1,500', 'Up to 10 production sites', 'Priority support', false],
        ];
        @endphp
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto items-center">
            @foreach ($tiers as [$name, $price, $sites, $support, $featured])
            <div class="bg-white rounded-[28px] p-8 relative @if ($featured) border-2 border-brand-500 shadow-float lg:scale-105 @else border border-gray-100 shadow-soft @endif">
                @if ($featured)<span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-brand-500 text-white text-xs font-bold px-4 py-1 rounded-full whitespace-nowrap">Best Value</span>@endif
                <h3 class="text-lg font-bold text-brand-700">{{ $name }}</h3>
                <div class="text-4xl font-extrabold my-4 @if ($featured) text-brand-500 @else text-brand-700 @endif">{{ $price }}<span class="text-sm font-normal text-gray-400"> one-time</span></div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500 shrink-0"></iconify-icon> {{ $sites }}</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500 shrink-0"></iconify-icon> Complete commerce core</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500 shrink-0"></iconify-icon> 1 year of support included</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500 shrink-0"></iconify-icon> {{ $support }}</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500 shrink-0"></iconify-icon> No revenue share</li>
                </ul>
                <a href="https://marketplace.moodle.com/plugins/[ID]" target="_blank" rel="noopener" class="block text-center px-6 py-3 rounded-xl font-bold transition-all @if ($featured) bg-brand-500 text-white hover:bg-brand-600 hover:-translate-y-0.5 @else border border-gray-200 text-brand-700 hover:bg-gray-50 @endif">Buy {{ $name }}</a>
            </div>
            @endforeach
            <div class="bg-white rounded-[28px] border border-gray-100 shadow-soft p-8">
                <h3 class="text-lg font-bold text-brand-700">Enterprise</h3>
                <div class="text-4xl font-extrabold text-brand-700 my-4">Custom</div>
                <ul class="space-y-3 text-gray-500 text-sm mb-8">
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500 shrink-0"></iconify-icon> Unlimited or tenant-based sites</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500 shrink-0"></iconify-icon> Gateway &amp; migration assistance</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500 shrink-0"></iconify-icon> Personalised implementation plan</li>
                    <li class="flex items-center gap-2"><iconify-icon icon="lucide:check" class="text-brand-500 shrink-0"></iconify-icon> Admin onboarding &amp; training</li>
                </ul>
                <a href="/contact" class="block text-center px-6 py-3 rounded-xl border border-gray-200 font-bold text-brand-700 hover:bg-gray-50 transition-colors">Talk to sales</a>
            </div>
        </div>
        <p class="text-center text-sm text-gray-400 mt-8">✓ 30-day money-back guarantee &nbsp;·&nbsp; ✓ You keep 100% of every sale &nbsp;·&nbsp; ✓ No monthly platform fee</p>
    </div>
</section>

<!-- ============ GUARANTEE BANNER ============ -->
<section class="py-8 md:py-12">
    <div class="max-w-[1100px] mx-auto px-6 lg:px-12">
        <div class="relative overflow-hidden bg-brand-700 rounded-[32px] px-8 md:px-14 py-10 shadow-2xl flex flex-col md:flex-row items-center gap-8 text-center md:text-left">
            <div class="absolute -top-16 -right-10 w-72 h-72 rounded-full bg-brand-500/15"></div>
            <div class="absolute -bottom-24 right-44 w-44 h-44 rounded-full bg-brand-500/10"></div>
            <div class="absolute top-0 left-0 w-48 h-full opacity-20" style="background:repeating-linear-gradient(-45deg,transparent 0 14px,#4B8BE8 14px 16px);-webkit-mask-image:linear-gradient(135deg,#000,transparent 70%);mask-image:linear-gradient(135deg,#000,transparent 70%);"></div>
            <div class="relative z-10 shrink-0 w-32 h-32 md:w-36 md:h-36 bg-white rounded-[28px] shadow-float flex items-center justify-center">
                <svg viewBox="0 0 100 110" class="w-16 h-[72px]" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50 4 L90 19 V54 C90 80 72 99 50 106 C28 99 10 80 10 54 V19 Z" fill="none" stroke="#4B8BE8" stroke-width="5" stroke-linejoin="round"/>
                    <text x="50" y="53" text-anchor="middle" font-family="Inter,sans-serif" font-size="33" font-weight="900" fill="#0F3D7A">30</text>
                    <text x="50" y="75" text-anchor="middle" font-family="Inter,sans-serif" font-size="15" font-weight="700" letter-spacing="2.5" fill="#4B8BE8">DAYS</text>
                </svg>
            </div>
            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold text-white">30-day money-back guarantee</h2>
                <p class="text-blue-100/80 text-base md:text-lg mt-3 max-w-2xl">Run Modern Commerce on your Moodle for 30 days. If it doesn't work as described and our support can't resolve it, we'll refund 100% of your purchase.</p>
            </div>
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
                ['Do I need WordPress?', 'No. Modern Commerce is a Moodle plugin that runs entirely inside your Moodle installation. There is no WordPress, no WooCommerce, no membership plugin and no bridge or connector to keep in sync.'],
                ['Will it work with the courses I already have?', 'Yes. Modern Commerce prices and sells your existing Moodle courses as they are — no migration, no rebuilding and no duplicate course records. You set a price, publish it to the storefront, and successful payment enrols the buyer into that same course.'],
                ['Can I sell seats to a company?', 'Yes. Subscription plans can carry a seat limit, and enrolment-key pools track how many seats have been used and how many remain. When a pool runs low the buyer is emailed automatically so they can reorder before their team loses access.'],
                ['Which Moodle and PHP versions are supported?', 'Modern Commerce 2.1.6 supports Moodle 5.2 and requires PHP 8.3 or later.'],
                ['Do you take a percentage of my sales?', 'No. Payments go straight to your own Stripe, Paystack, PayPal or Flutterwave merchant account. The licence is a one-time purchase and there is no revenue share, ever.'],
                ['Do I need a payment gateway account?', 'Yes. Modern Commerce connects to gateways you own — you supply your own API keys and secrets, and card capture happens on the gateway, not inside Moodle. HTTPS is required for live gateways and webhooks.'],
                ['Is there anything to install beyond the plugin?', 'The plugin bundles PHP libraries via Composer, so run <code>composer install --no-dev --optimize-autoloader</code> in the plugin directory after copying it in, and make sure Moodle cron is running — the recovery, reminder, reporting and subscription automations all run on cron.'],
                ['Can I sell subscriptions and memberships?', 'Yes. Subscription plans, free trials, recurring charges, plan changes, grace periods, expiry and automatic course-access sync are all part of the commerce core.'],
                ['How does it handle personal data and GDPR?', 'It stores buyer names and emails, orders, invoices, optional billing details, contact messages, newsletter subscribers and subscription records — and implements a full Moodle privacy provider, so metadata, export, deletion and user-list subject requests work through the standard Moodle privacy tools.'],
                ['Is this GPL like most Moodle plugins?', 'No. Modern Commerce is proprietary commercial software licensed per site under the Modern Commerce Commercial License. Bundled third-party libraries keep their own licences.'],
                ['What happens after the first year of support?', 'Your licence and your installed version keep working. Contact us about extending support when your first year is up.'],
            ];
            @endphp
            @foreach ($faqs as [$q, $a])
            <details class="group bg-white rounded-2xl border border-gray-100 shadow-soft p-5 open:shadow-float transition-all">
                <summary class="flex items-center justify-between cursor-pointer list-none font-bold text-brand-700">{!! $q !!}<iconify-icon icon="lucide:chevron-down" class="text-brand-500 transition-transform group-open:rotate-180 shrink-0 ml-4"></iconify-icon></summary>
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
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">No bridge. No second site.<br><span class="font-serif italic text-brand-500">Just sell.</span></h2>
                <p class="text-lg text-gray-400 mb-10">One plugin, one-time, with a full year of support — and every sale stays yours.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#pricing" class="inline-flex items-center px-10 py-4 bg-brand-500 text-white font-bold rounded-xl hover:bg-brand-600 transition-all hover:shadow-lg hover:-translate-y-1">Buy now</a>
                    <a href="/book-demo" class="inline-flex items-center px-10 py-4 border border-white/20 text-white font-bold rounded-xl hover:bg-white/10 transition-all">Book a demo</a>
                </div>
                <p class="text-sm text-gray-500 mt-5">Moodle 5.2 · PHP 8.3+ · One-time per-site licence</p>
            </div>
        </div>
    </div>
</section>
@endsection
