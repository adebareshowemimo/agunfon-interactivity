@extends('layouts.app')

@section('title', 'Cookies Policy - Agunfon')

@push('styles')
<style>
    .legal-content h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0F3D7A;
        margin-top: 2.5rem;
        margin-bottom: 1rem;
    }
    .legal-content h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #0F3D7A;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }
    .legal-content p {
        color: #4B5563;
        line-height: 1.8;
        margin-bottom: 1rem;
    }
    .legal-content ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }
    .legal-content li {
        color: #4B5563;
        line-height: 1.8;
        margin-bottom: 0.5rem;
    }
    .legal-content a {
        color: #4B8BE8;
        text-decoration: underline;
    }
    .legal-content a:hover {
        color: #0F3D7A;
    }
    .cookie-table {
        width: 100%;
        border-collapse: collapse;
        margin: 1rem 0 1.5rem 0;
    }
    .cookie-table th, .cookie-table td {
        border: 1px solid #E5E7EB;
        padding: 0.75rem 1rem;
        text-align: left;
    }
    .cookie-table th {
        background-color: #F3F7FC;
        color: #0F3D7A;
        font-weight: 600;
    }
    .cookie-table td {
        color: #4B5563;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="pt-12 pb-16 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <div class="inline-block px-4 py-1.5 rounded-full border border-gray-200 text-brand-700 text-xs font-bold tracking-widest bg-white mb-6 uppercase">
            Legal
        </div>
        <h1 class="text-4xl lg:text-5xl font-bold text-brand-700 leading-tight mb-6">
            Cookies Policy
        </h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">
            This policy explains how Agunfon uses cookies and similar technologies to enhance your experience on our platform.
        </p>
        <p class="text-sm text-gray-400 mt-6">Last updated: February 2026</p>
    </div>
</section>

<!-- Content Section -->
<section class="pb-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-[32px] p-8 md:p-12 border border-gray-100 shadow-soft">
            <div class="legal-content">
                
                <h2>1. What Are Cookies?</h2>
                <p>
                    Cookies are small text files that are stored on your device (computer, tablet, or mobile phone) when you visit a website. They are widely used to make websites work more efficiently and to provide information to website owners.
                </p>
                <p>
                    Cookies allow websites to recognize your device and remember certain information about your visit, such as your preferences, login status, and actions you have taken.
                </p>

                <h2>2. How We Use Cookies</h2>
                <p>
                    Agunfon uses cookies and similar technologies for the following purposes:
                </p>
                <ul>
                    <li><strong>Essential Operations:</strong> To enable core functionality of our LMS platform, such as user authentication, session management, and security features.</li>
                    <li><strong>Performance and Analytics:</strong> To understand how visitors interact with our platform, identify errors, and improve our services.</li>
                    <li><strong>Personalization:</strong> To remember your preferences, such as language settings and display options, to provide a customized experience.</li>
                    <li><strong>Learning Experience:</strong> To track your progress through courses, remember where you left off, and save your learning preferences.</li>
                    <li><strong>Marketing:</strong> To deliver relevant advertisements and measure the effectiveness of our marketing campaigns (with your consent where required).</li>
                </ul>

                <h2>3. Types of Cookies We Use</h2>
                
                <h3>3.1 Strictly Necessary Cookies</h3>
                <p>
                    These cookies are essential for the operation of our platform. They enable basic functions like page navigation, secure access to your account, and security features. The platform cannot function properly without these cookies.
                </p>
                <table class="cookie-table">
                    <thead>
                        <tr>
                            <th>Cookie Name</th>
                            <th>Purpose</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>agunfon_session</td>
                            <td>Manages your login session and keeps you authenticated</td>
                            <td>Session</td>
                        </tr>
                        <tr>
                            <td>XSRF-TOKEN</td>
                            <td>Provides security protection against cross-site request forgery</td>
                            <td>Session</td>
                        </tr>
                        <tr>
                            <td>cookie_consent</td>
                            <td>Remembers your cookie preferences</td>
                            <td>1 year</td>
                        </tr>
                    </tbody>
                </table>

                <h3>3.2 Performance and Analytics Cookies</h3>
                <p>
                    These cookies collect information about how visitors use our platform, such as which pages are visited most often and whether users encounter error messages. This information helps us improve the performance of our platform.
                </p>
                <table class="cookie-table">
                    <thead>
                        <tr>
                            <th>Cookie Name</th>
                            <th>Purpose</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>_ga</td>
                            <td>Google Analytics - distinguishes unique users</td>
                            <td>2 years</td>
                        </tr>
                        <tr>
                            <td>_gid</td>
                            <td>Google Analytics - distinguishes users</td>
                            <td>24 hours</td>
                        </tr>
                        <tr>
                            <td>_gat</td>
                            <td>Google Analytics - throttles request rate</td>
                            <td>1 minute</td>
                        </tr>
                    </tbody>
                </table>

                <h3>3.3 Functionality Cookies</h3>
                <p>
                    These cookies allow our platform to remember choices you make (such as your username, language, or region) and provide enhanced, personalized features.
                </p>
                <table class="cookie-table">
                    <thead>
                        <tr>
                            <th>Cookie Name</th>
                            <th>Purpose</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>user_preferences</td>
                            <td>Stores display preferences and UI settings</td>
                            <td>1 year</td>
                        </tr>
                        <tr>
                            <td>language</td>
                            <td>Remembers your preferred language</td>
                            <td>1 year</td>
                        </tr>
                        <tr>
                            <td>course_progress</td>
                            <td>Tracks where you left off in courses</td>
                            <td>30 days</td>
                        </tr>
                    </tbody>
                </table>

                <h3>3.4 Marketing Cookies</h3>
                <p>
                    These cookies are used to track visitors across websites and display ads that are relevant and engaging for individual users. We only use these with your explicit consent.
                </p>
                <table class="cookie-table">
                    <thead>
                        <tr>
                            <th>Cookie Name</th>
                            <th>Purpose</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>_fbp</td>
                            <td>Facebook Pixel - delivers advertising</td>
                            <td>3 months</td>
                        </tr>
                        <tr>
                            <td>_gcl_au</td>
                            <td>Google Ads conversion tracking</td>
                            <td>3 months</td>
                        </tr>
                    </tbody>
                </table>

                <h2>4. Third-Party Cookies</h2>
                <p>
                    Some cookies on our platform are set by third-party services that appear on our pages. We do not control these third-party cookies. The main third parties that may set cookies include:
                </p>
                <ul>
                    <li><strong>Google Analytics:</strong> For website analytics and performance monitoring</li>
                    <li><strong>Google Ads:</strong> For advertising and remarketing (with consent)</li>
                    <li><strong>Facebook:</strong> For social media integration and advertising (with consent)</li>
                    <li><strong>Intercom/Zendesk:</strong> For customer support chat functionality</li>
                    <li><strong>Video Providers:</strong> Vimeo or YouTube for embedded learning videos</li>
                </ul>
                <p>
                    Please review the privacy policies of these third parties for more information about their cookie practices.
                </p>

                <h2>5. Managing Your Cookie Preferences</h2>
                
                <h3>5.1 Cookie Consent</h3>
                <p>
                    When you first visit our platform, you will see a cookie consent banner that allows you to accept or customize your cookie preferences. You can change your preferences at any time by clicking the "Cookie Settings" link in the footer of our website.
                </p>

                <h3>5.2 Browser Settings</h3>
                <p>
                    Most web browsers allow you to control cookies through their settings. You can typically:
                </p>
                <ul>
                    <li>See what cookies are stored on your device</li>
                    <li>Delete all or specific cookies</li>
                    <li>Block third-party cookies</li>
                    <li>Block cookies from specific websites</li>
                    <li>Block all cookies</li>
                    <li>Delete all cookies when you close your browser</li>
                </ul>
                <p>
                    Please note that if you choose to block or delete cookies, some features of our platform may not function properly.
                </p>

                <h3>5.3 Browser-Specific Instructions</h3>
                <p>Here are links to manage cookies in popular browsers:</p>
                <ul>
                    <li><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener">Google Chrome</a></li>
                    <li><a href="https://support.mozilla.org/en-US/kb/cookies-information-websites-store-on-your-computer" target="_blank" rel="noopener">Mozilla Firefox</a></li>
                    <li><a href="https://support.apple.com/guide/safari/manage-cookies-sfri11471/mac" target="_blank" rel="noopener">Safari</a></li>
                    <li><a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" rel="noopener">Microsoft Edge</a></li>
                </ul>

                <h2>6. Similar Technologies</h2>
                <p>
                    In addition to cookies, we may use similar technologies such as:
                </p>
                <ul>
                    <li><strong>Web Beacons:</strong> Small graphic images (also called "pixel tags") used to track user activity and measure engagement.</li>
                    <li><strong>Local Storage:</strong> A technology that allows websites to store data locally on your device, similar to cookies but with greater capacity.</li>
                    <li><strong>Session Storage:</strong> Similar to local storage but data is cleared when you close your browser tab.</li>
                </ul>

                <h2>7. Updates to This Policy</h2>
                <p>
                    We may update this Cookies Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. We will notify you of any material changes by posting the updated policy on our website and updating the "Last updated" date.
                </p>

                <h2>8. Contact Us</h2>
                <p>
                    If you have questions about our use of cookies or this policy, please contact us:
                </p>
                <ul>
                    <li>Email: <a href="mailto:privacy@agunfon.com">privacy@agunfon.com</a></li>
                    <li>Phone: +234 9079 682 537</li>
                    <li>Address: Agunfon Learning Technologies</li>
                </ul>
                <p>
                    For more information about our overall data practices, please see our <a href="/privacy-policy">Privacy Policy</a>.
                </p>

            </div>
        </div>
    </div>
</section>
@endsection
