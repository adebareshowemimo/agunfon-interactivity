<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f5f7fa; }
        .container { max-width: 600px; margin: 0 auto; padding: 40px 20px; }
        .card { background: #ffffff; border-radius: 16px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .header { background: #0F3D7A; color: white; padding: 20px; border-radius: 12px; margin-bottom: 25px; text-align: center; }
        .header h1 { margin: 0; font-size: 20px; }
        .badge { display: inline-block; background: #4B8BE8; color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .info-box { background: #F3F7FC; border-radius: 12px; padding: 25px; margin: 20px 0; }
        .info-row { margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #e5e7eb; }
        .info-row:last-child { margin-bottom: 0; padding-bottom: 0; border-bottom: none; }
        .info-label { font-weight: 600; color: #0F3D7A; display: block; margin-bottom: 5px; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; }
        .info-value { font-size: 16px; color: #333; }
        .message-box { background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 20px; margin-top: 15px; }
        .btn { display: inline-block; background: #0F3D7A; color: #ffffff; padding: 14px 28px; border-radius: 10px; text-decoration: none; font-weight: 600; margin-top: 20px; }
        .footer { text-align: center; margin-top: 25px; color: #6b7280; font-size: 13px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <span class="badge">NEW CONTACT</span>
                <h1 style="margin-top: 10px;">Contact Form Submission</h1>
            </div>
            
            <p>A new contact form has been submitted on the Agunfon website.</p>
            
            <div class="info-box">
                <div class="info-row">
                    <span class="info-label">Name</span>
                    <span class="info-value">{{ $contact->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Company</span>
                    <span class="info-value">{{ $contact->company }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></span>
                </div>
                @if($contact->phone)
                <div class="info-row">
                    <span class="info-label">Phone</span>
                    <span class="info-value"><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></span>
                </div>
                @endif
                <div class="info-row">
                    <span class="info-label">Submitted At</span>
                    <span class="info-value">{{ $contact->created_at->format('F j, Y \a\t g:i A') }}</span>
                </div>
            </div>
            
            <h3 style="color: #0F3D7A; margin-bottom: 10px;">Message</h3>
            <div class="message-box">
                {{ $contact->message }}
            </div>
            
            <center>
                <a href="{{ config('app.url') }}/admin/contacts/{{ $contact->id }}" class="btn">View in Admin Panel</a>
            </center>
            
            <div class="footer">
                <p>This is an automated notification from Agunfon LMS</p>
            </div>
        </div>
    </div>
</body>
</html>
