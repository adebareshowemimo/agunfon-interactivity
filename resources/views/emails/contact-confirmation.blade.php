<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You for Contacting Us</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f5f7fa; }
        .container { max-width: 600px; margin: 0 auto; padding: 40px 20px; }
        .card { background: #ffffff; border-radius: 16px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .logo { text-align: center; margin-bottom: 30px; }
        .logo span { font-size: 28px; font-weight: bold; color: #0F3D7A; }
        h1 { color: #0F3D7A; font-size: 24px; margin-bottom: 20px; }
        .highlight { color: #4B8BE8; }
        .info-box { background: #F3F7FC; border-radius: 12px; padding: 20px; margin: 25px 0; }
        .info-row { display: flex; margin-bottom: 10px; }
        .info-label { font-weight: 600; color: #0F3D7A; min-width: 100px; }
        .footer { text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; color: #6b7280; font-size: 14px; }
        .btn { display: inline-block; background: #0F3D7A; color: #ffffff; padding: 14px 28px; border-radius: 10px; text-decoration: none; font-weight: 600; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">
                <span>Agunfon</span>
            </div>
            
            <h1>Thank You for <span class="highlight">Reaching Out!</span></h1>
            
            <p>Dear {{ $contact->name }},</p>
            
            <p>Thank you for contacting Agunfon. We have received your inquiry and our team will get back to you within 24-48 business hours.</p>
            
            <div class="info-box">
                <h3 style="margin-top: 0; color: #0F3D7A;">Your Submission Details</h3>
                <p><strong>Name:</strong> {{ $contact->name }}</p>
                <p><strong>Company:</strong> {{ $contact->company }}</p>
                <p><strong>Email:</strong> {{ $contact->email }}</p>
                @if($contact->phone)
                <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                @endif
                <p><strong>Message:</strong></p>
                <p style="background: #fff; padding: 15px; border-radius: 8px; margin: 0;">{{ $contact->message }}</p>
            </div>
            
            <p>In the meantime, feel free to explore our website to learn more about how Agunfon can transform your organization's learning experience.</p>
            
            <center>
                <a href="{{ config('app.url') }}" class="btn">Visit Our Website</a>
            </center>
            
            <div class="footer">
                <p>© {{ date('Y') }} Agunfon. All rights reserved.</p>
                <p>This email was sent to {{ $contact->email }}</p>
            </div>
        </div>
    </div>
</body>
</html>
