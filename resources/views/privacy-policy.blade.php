@extends('layouts.app')

@section('title', 'Privacy Policy - Agunfon')

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
            Privacy Policy
        </h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">
            Your privacy matters to us. This policy explains how Agunfon collects, uses, and protects your personal information.
        </p>
        <p class="text-sm text-gray-400 mt-6">Last updated: February 2026</p>
    </div>
</section>

<!-- Content Section -->
<section class="pb-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-[32px] p-8 md:p-12 border border-gray-100 shadow-soft">
            <div class="legal-content">
                
                <h2>1. Introduction</h2>
                <p>
                    Agunfon ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our Learning Management System (LMS) platform, website, and related services (collectively, the "Services").
                </p>
                <p>
                    By accessing or using our Services, you agree to this Privacy Policy. If you do not agree with the terms of this policy, please do not access the Services.
                </p>

                <h2>2. Information We Collect</h2>
                
                <h3>2.1 Personal Information You Provide</h3>
                <p>We collect information that you voluntarily provide when you:</p>
                <ul>
                    <li>Register for an account (name, email address, organization name, job title)</li>
                    <li>Complete your learner profile (profile photo, department, location)</li>
                    <li>Contact us for support or inquiries</li>
                    <li>Subscribe to our newsletter or marketing communications</li>
                    <li>Participate in surveys, promotions, or feedback requests</li>
                </ul>

                <h3>2.2 Learning and Usage Data</h3>
                <p>When you use our LMS platform, we automatically collect:</p>
                <ul>
                    <li>Course progress, completion rates, and assessment scores</li>
                    <li>Time spent on learning modules and content interactions</li>
                    <li>Certificates earned and learning paths completed</li>
                    <li>Discussion forum posts and collaboration activities</li>
                </ul>

                <h3>2.3 Technical Information</h3>
                <p>We automatically collect certain technical information, including:</p>
                <ul>
                    <li>IP address and device identifiers</li>
                    <li>Browser type and version</li>
                    <li>Operating system</li>
                    <li>Access times and referring URLs</li>
                    <li>Pages viewed and features used</li>
                </ul>

                <h2>3. How We Use Your Information</h2>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Provide, operate, and maintain our LMS platform</li>
                    <li>Personalize your learning experience and recommend relevant content</li>
                    <li>Track learning progress and generate reports for you and your organization</li>
                    <li>Process transactions and send related information</li>
                    <li>Send administrative communications, updates, and security alerts</li>
                    <li>Respond to your comments, questions, and support requests</li>
                    <li>Analyze usage patterns to improve our Services</li>
                    <li>Detect, prevent, and address technical issues or security threats</li>
                    <li>Comply with legal obligations</li>
                </ul>

                <h2>4. Data Sharing and Disclosure</h2>
                <p>We may share your information in the following circumstances:</p>
                <ul>
                    <li><strong>With Your Organization:</strong> If you access Agunfon through an enterprise account, your employer or organization administrator may have access to your learning data and progress reports.</li>
                    <li><strong>Service Providers:</strong> We may share information with third-party vendors who perform services on our behalf (hosting, analytics, customer support).</li>
                    <li><strong>Legal Requirements:</strong> We may disclose information if required by law, regulation, or legal process.</li>
                    <li><strong>Business Transfers:</strong> In connection with a merger, acquisition, or sale of assets, your information may be transferred.</li>
                </ul>
                <p>We do not sell your personal information to third parties.</p>

                <h2>5. Data Security</h2>
                <p>
                    We implement appropriate technical and organizational measures to protect your personal information, including:
                </p>
                <ul>
                    <li>Encryption of data in transit (TLS/SSL) and at rest</li>
                    <li>Regular security assessments and penetration testing</li>
                    <li>Access controls and authentication mechanisms</li>
                    <li>Employee training on data protection practices</li>
                    <li>Secure cloud infrastructure with industry-standard certifications</li>
                </ul>

                <h2>6. Data Retention</h2>
                <p>
                    We retain your personal information for as long as necessary to provide our Services, comply with legal obligations, resolve disputes, and enforce our agreements. Learning records may be retained for longer periods to support certification verification and compliance requirements.
                </p>

                <h2>7. Your Rights and Choices</h2>
                <p>Depending on your location, you may have the following rights:</p>
                <ul>
                    <li><strong>Access:</strong> Request a copy of the personal information we hold about you</li>
                    <li><strong>Correction:</strong> Request correction of inaccurate or incomplete information</li>
                    <li><strong>Deletion:</strong> Request deletion of your personal information (subject to legal retention requirements)</li>
                    <li><strong>Data Portability:</strong> Request a copy of your data in a structured, machine-readable format</li>
                    <li><strong>Opt-Out:</strong> Unsubscribe from marketing communications at any time</li>
                </ul>
                <p>
                    To exercise these rights, please contact us at <a href="mailto:privacy@agunfon.com">privacy@agunfon.com</a>.
                </p>

                <h2>8. International Data Transfers</h2>
                <p>
                    Your information may be transferred to and processed in countries other than your country of residence. We ensure appropriate safeguards are in place to protect your information in accordance with applicable data protection laws.
                </p>

                <h2>9. Children's Privacy</h2>
                <p>
                    Our Services are not directed to individuals under the age of 16. We do not knowingly collect personal information from children. If you believe we have collected information from a child, please contact us immediately.
                </p>

                <h2>10. Changes to This Policy</h2>
                <p>
                    We may update this Privacy Policy from time to time. We will notify you of significant changes by posting the new policy on our website and updating the "Last updated" date. We encourage you to review this policy periodically.
                </p>

                <h2>11. Contact Us</h2>
                <p>
                    If you have questions or concerns about this Privacy Policy or our data practices, please contact us:
                </p>
                <ul>
                    <li>Email: <a href="mailto:privacy@agunfon.com">privacy@agunfon.com</a></li>
                    <li>Phone: +234 9079 682 537</li>
                    <li>Address: Agunfon Learning Technologies</li>
                </ul>

            </div>
        </div>
    </div>
</section>
@endsection
