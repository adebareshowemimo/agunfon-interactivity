@extends('layouts.app')

@section('title', 'Terms of Service - Agunfon')

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
            Terms of Service
        </h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">
            Please read these terms carefully before using Agunfon's learning management platform and services.
        </p>
        <p class="text-sm text-gray-400 mt-6">Last updated: February 2026</p>
    </div>
</section>

<!-- Content Section -->
<section class="pb-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-[32px] p-8 md:p-12 border border-gray-100 shadow-soft">
            <div class="legal-content">
                
                <h2>1. Acceptance of Terms</h2>
                <p>
                    By accessing or using Agunfon's Learning Management System platform, website, mobile applications, and related services (collectively, the "Services"), you agree to be bound by these Terms of Service ("Terms"). If you are using the Services on behalf of an organization, you represent that you have authority to bind that organization to these Terms.
                </p>
                <p>
                    If you do not agree to these Terms, you may not access or use the Services.
                </p>

                <h2>2. Description of Services</h2>
                <p>
                    Agunfon provides a cloud-based learning management system that enables organizations to:
                </p>
                <ul>
                    <li>Create, deliver, and manage training and educational content</li>
                    <li>Track learner progress, assessments, and certifications</li>
                    <li>Generate reports and analytics on learning outcomes</li>
                    <li>Facilitate collaboration and knowledge sharing</li>
                    <li>Integrate with third-party systems and content providers</li>
                </ul>
                <p>
                    We reserve the right to modify, suspend, or discontinue any aspect of the Services at any time with reasonable notice.
                </p>

                <h2>3. Account Registration and Security</h2>
                
                <h3>3.1 Account Creation</h3>
                <p>
                    To use certain features of the Services, you must create an account. You agree to provide accurate, current, and complete information during registration and to update such information as necessary.
                </p>

                <h3>3.2 Account Security</h3>
                <p>
                    You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account. You agree to:
                </p>
                <ul>
                    <li>Use a strong, unique password</li>
                    <li>Not share your login credentials with others</li>
                    <li>Notify us immediately of any unauthorized access or security breach</li>
                    <li>Log out of your account at the end of each session on shared devices</li>
                </ul>

                <h2>4. Subscription and Payment</h2>
                
                <h3>4.1 Subscription Plans</h3>
                <p>
                    Access to the Services may require a paid subscription. Subscription details, pricing, and features are specified in your service agreement or on our pricing page. All fees are quoted in the applicable currency and are exclusive of taxes unless stated otherwise.
                </p>

                <h3>4.2 Payment Terms</h3>
                <p>
                    You agree to pay all fees associated with your subscription plan. Payments are due according to the billing cycle specified in your agreement. We reserve the right to suspend or terminate access for non-payment.
                </p>

                <h3>4.3 Refunds</h3>
                <p>
                    Refund policies are specified in your service agreement. Generally, fees paid are non-refundable except as required by law or as otherwise stated in your agreement.
                </p>

                <h2>5. Acceptable Use</h2>
                <p>You agree not to use the Services to:</p>
                <ul>
                    <li>Violate any applicable laws or regulations</li>
                    <li>Infringe upon intellectual property rights of others</li>
                    <li>Upload or transmit viruses, malware, or other harmful code</li>
                    <li>Attempt to gain unauthorized access to our systems or other users' accounts</li>
                    <li>Engage in harassment, abuse, or discrimination</li>
                    <li>Distribute spam, chain letters, or unsolicited communications</li>
                    <li>Interfere with the proper functioning of the Services</li>
                    <li>Upload content that is illegal, defamatory, or inappropriate</li>
                    <li>Reverse engineer, decompile, or disassemble the Services</li>
                    <li>Resell or redistribute access to the Services without authorization</li>
                </ul>

                <h2>6. Intellectual Property</h2>
                
                <h3>6.1 Our Intellectual Property</h3>
                <p>
                    The Services, including all software, designs, text, graphics, and other content provided by Agunfon, are owned by us or our licensors and are protected by intellectual property laws. You may not copy, modify, distribute, or create derivative works without our express written permission.
                </p>

                <h3>6.2 Your Content</h3>
                <p>
                    You retain ownership of content you upload to the Services ("Your Content"). By uploading content, you grant Agunfon a non-exclusive, worldwide license to use, store, display, and distribute Your Content solely for the purpose of providing the Services.
                </p>

                <h3>6.3 Feedback</h3>
                <p>
                    If you provide suggestions, ideas, or feedback about the Services, you grant us the right to use such feedback without any obligation to compensate you.
                </p>

                <h2>7. Data Protection and Privacy</h2>
                <p>
                    Our collection and use of personal information is governed by our <a href="/privacy-policy">Privacy Policy</a>. By using the Services, you consent to our data practices as described in the Privacy Policy.
                </p>
                <p>
                    For enterprise customers, data processing terms may be specified in your service agreement or a separate Data Processing Agreement (DPA).
                </p>

                <h2>8. Third-Party Services and Content</h2>
                <p>
                    The Services may integrate with or contain links to third-party services and content. We do not control and are not responsible for third-party services. Your use of third-party services is subject to their respective terms and policies.
                </p>

                <h2>9. Disclaimers</h2>
                <p>
                    THE SERVICES ARE PROVIDED "AS IS" AND "AS AVAILABLE" WITHOUT WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT.
                </p>
                <p>
                    We do not warrant that the Services will be uninterrupted, error-free, or free of harmful components. We are not responsible for the accuracy or completeness of learning content provided by third parties or your organization.
                </p>

                <h2>10. Limitation of Liability</h2>
                <p>
                    TO THE MAXIMUM EXTENT PERMITTED BY LAW, AGUNFON SHALL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES, INCLUDING LOSS OF PROFITS, DATA, OR GOODWILL, ARISING OUT OF OR RELATED TO YOUR USE OF THE SERVICES.
                </p>
                <p>
                    Our total liability for any claims arising under these Terms shall not exceed the amount you paid to us in the twelve (12) months preceding the claim.
                </p>

                <h2>11. Indemnification</h2>
                <p>
                    You agree to indemnify, defend, and hold harmless Agunfon and its officers, directors, employees, and agents from any claims, damages, losses, or expenses (including legal fees) arising from your use of the Services, your violation of these Terms, or your violation of any rights of a third party.
                </p>

                <h2>12. Termination</h2>
                <p>
                    Either party may terminate the Services in accordance with the terms of your service agreement. We may suspend or terminate your access immediately if you violate these Terms or engage in conduct that we determine is harmful to other users or the Services.
                </p>
                <p>
                    Upon termination, your right to use the Services ceases immediately. We may retain certain data as required by law or for legitimate business purposes.
                </p>

                <h2>13. Governing Law and Dispute Resolution</h2>
                <p>
                    These Terms shall be governed by and construed in accordance with the laws of the Federal Republic of Nigeria, without regard to conflict of law principles. Any disputes arising from these Terms shall be resolved through good faith negotiation, and if necessary, binding arbitration or the courts of competent jurisdiction in Nigeria.
                </p>

                <h2>14. Changes to Terms</h2>
                <p>
                    We may update these Terms from time to time. We will notify you of material changes by posting the updated Terms on our website and, for significant changes, by email or in-app notification. Your continued use of the Services after changes take effect constitutes acceptance of the revised Terms.
                </p>

                <h2>15. General Provisions</h2>
                <ul>
                    <li><strong>Entire Agreement:</strong> These Terms, together with our Privacy Policy and any service agreement, constitute the entire agreement between you and Agunfon.</li>
                    <li><strong>Severability:</strong> If any provision is found unenforceable, the remaining provisions will continue in effect.</li>
                    <li><strong>Waiver:</strong> Failure to enforce any right or provision does not constitute a waiver of that right.</li>
                    <li><strong>Assignment:</strong> You may not assign your rights under these Terms without our written consent.</li>
                </ul>

                <h2>16. Contact Information</h2>
                <p>
                    For questions about these Terms of Service, please contact us:
                </p>
                <ul>
                    <li>Email: <a href="mailto:legal@agunfon.com">legal@agunfon.com</a></li>
                    <li>Phone: +234 9079 682 537</li>
                    <li>Address: Agunfon Learning Technologies</li>
                </ul>

            </div>
        </div>
    </div>
</section>
@endsection
