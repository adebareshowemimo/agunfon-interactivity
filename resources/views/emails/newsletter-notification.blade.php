<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Newsletter Subscriber</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f5f7fa; }
        .container { max-width: 600px; margin: 0 auto; padding: 40px 20px; }
        .card { background: #ffffff; border-radius: 16px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .header { background: #0F3D7A; color: white; padding: 20px; border-radius: 12px; margin-bottom: 25px; text-align: center; }
        .header h1 { margin: 0; font-size: 20px; }
        .badge { display: inline-block; background: #4B8BE8; color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .info-box { background: #F3F7FC; border-radius: 12px; padding: 25px; margin: 20px 0; }
        .info-label { font-weight: 600; color: #0F3D7A; display: block; margin-bottom: 5px; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; }
        .info-value { font-size: 16px; color: #333; }
        .footer { text-align: center; margin-top: 25px; color: #6b7280; font-size: 13px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <span class="badge">NEW SUBSCRIBER</span>
                <h1 style="margin-top: 10px;">Newsletter Subscription</h1>
            </div>

            <p>A new subscriber has joined the Agunfon newsletter.</p>

            <div class="info-box">
                <span class="info-label">Email</span>
                <span class="info-value"><a href="mailto:{{ $subscriber->email }}">{{ $subscriber->email }}</a></span>
                <div style="margin-top: 18px;">
                    <span class="info-label">Subscribed At</span>
                    <span class="info-value">{{ $subscriber->created_at->format('F j, Y \a\t g:i A') }}</span>
                </div>
            </div>

            <div class="footer">
                <p>This is an automated notification from Agunfon LMS</p>
            </div>
        </div>
    </div>
</body>
</html>
