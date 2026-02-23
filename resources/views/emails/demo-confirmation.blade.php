<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo Booking Confirmed</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f5f7fa; }
        .container { max-width: 600px; margin: 0 auto; padding: 40px 20px; }
        .card { background: #ffffff; border-radius: 16px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .logo { text-align: center; margin-bottom: 30px; }
        .logo span { font-size: 28px; font-weight: bold; color: #0F3D7A; }
        h1 { color: #0F3D7A; font-size: 24px; margin-bottom: 20px; }
        .highlight { color: #4B8BE8; }
        .date-card { background: linear-gradient(135deg, #0F3D7A 0%, #4B8BE8 100%); border-radius: 16px; padding: 30px; margin: 25px 0; text-align: center; color: white; }
        .date-card .date { font-size: 32px; font-weight: bold; margin-bottom: 5px; }
        .date-card .time { font-size: 18px; opacity: 0.9; }
        .info-box { background: #F3F7FC; border-radius: 12px; padding: 20px; margin: 25px 0; }
        .info-row { margin-bottom: 12px; }
        .info-label { font-weight: 600; color: #0F3D7A; }
        .footer { text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; color: #6b7280; font-size: 14px; }
        .btn { display: inline-block; background: #0F3D7A; color: #ffffff; padding: 14px 28px; border-radius: 10px; text-decoration: none; font-weight: 600; margin-top: 20px; }
        .checklist { list-style: none; padding: 0; margin: 20px 0; }
        .checklist li { padding: 10px 0; padding-left: 30px; position: relative; }
        .checklist li:before { content: "✓"; position: absolute; left: 0; color: #4B8BE8; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">
                <span>Agunfon</span>
            </div>
            
            <h1>Your Demo is <span class="highlight">Scheduled!</span></h1>
            
            <p>Dear {{ $demoRequest->name }},</p>
            
            <p>Thank you for booking a demo with Agunfon! We're excited to show you how our enterprise learning platform can transform {{ $demoRequest->company }}'s training and development.</p>
            
            <div class="date-card">
                <div class="date">{{ $demoRequest->preferred_date->format('F j, Y') }}</div>
                <div class="time">{{ \Carbon\Carbon::parse($demoRequest->preferred_time)->format('g:i A') }}</div>
            </div>
            
            <div class="info-box">
                <h3 style="margin-top: 0; color: #0F3D7A;">Booking Details</h3>
                <div class="info-row"><span class="info-label">Company:</span> {{ $demoRequest->company }}</div>
                <div class="info-row"><span class="info-label">Industry:</span> {{ $demoRequest->industry }}</div>
                <div class="info-row"><span class="info-label">Team Size:</span> {{ $demoRequest->team_size }}</div>
                @if($demoRequest->summary)
                <div class="info-row"><span class="info-label">Project Summary:</span> {{ $demoRequest->summary }}</div>
                @endif
            </div>
            
            <h3 style="color: #0F3D7A;">What to Expect</h3>
            <ul class="checklist">
                <li>A personalized walkthrough of Agunfon's features</li>
                <li>Live demonstration tailored to your industry needs</li>
                <li>Q&A session with our product experts</li>
                <li>Next steps and implementation guidance</li>
            </ul>
            
            <p>A member of our team will reach out shortly to confirm the meeting details and send you a calendar invite.</p>
            
            <center>
                <a href="{{ config('app.url') }}" class="btn">Learn More About Agunfon</a>
            </center>
            
            <div class="footer">
                <p>© {{ date('Y') }} Agunfon. All rights reserved.</p>
                <p>Need to reschedule? Reply to this email or contact us at <a href="mailto:contact@agunfon.com">contact@agunfon.com</a></p>
            </div>
        </div>
    </div>
</body>
</html>
