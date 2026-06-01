# SendGrid Integration Setup Guide

This guide covers the SendGrid API integration for the Agunfon Laravel application.

## Overview

SendGrid has been integrated to handle all mail sending in the application. The implementation provides:
- ✅ Reliable email delivery via SendGrid
- ✅ Automatic retry logic
- ✅ Template support
- ✅ Multiple recipient support
- ✅ CC/BCC functionality
- ✅ Attachment support
- ✅ Comprehensive logging

## Installation Status

**Package installed:** `sendgrid/sendgrid` (v8.1.2)

```
✓ SendGrid PHP SDK installed
✓ Service class created (SendGridService)
✓ Mail classes updated
✓ Service provider registered
✓ Configuration files added
```

## Configuration

### 1. Environment Variables

Add your SendGrid API key to `.env`:

```env
# SendGrid Configuration
SENDGRID_API_KEY=your_sendgrid_api_key_here
# SENDGRID_DATA_RESIDENCY=eu  # Uncomment if using EU data center
```

**How to get your API Key:**
1. Go to https://app.sendgrid.com/settings/api_keys
2. Create a new API key with "Mail Send" permission
3. Copy the key and paste it in your `.env` file

### 2. Mail Configuration

Your mail configuration is already set up in `config/mail.php`. The default mailer is set to `log` in development, but the mail classes now override this with SendGrid.

### 3. From Address

Make sure your `MAIL_FROM_ADDRESS` is set in `.env`:

```env
MAIL_FROM_ADDRESS=noreply@agunfon.com
MAIL_FROM_NAME=Agunfon
```

The from address should be a verified sender in your SendGrid account.

## Usage

### Method 1: Using Updated Mail Classes (Recommended)

All mail classes have been updated to use SendGrid automatically:

```php
use App\Mail\ContactConfirmation;
use App\Models\Contact;

$contact = Contact::find(1);

// Send automatically via SendGrid
Mail::send(new ContactConfirmation($contact));

// Or queue it
dispatch(new SendMail(new ContactConfirmation($contact)));
```

**Updated Mail Classes:**
- `App\Mail\ContactConfirmation`
- `App\Mail\ContactNotification`
- `App\Mail\DemoConfirmation`
- `App\Mail\DemoNotification`

### Method 2: Direct SendGrid Service Usage

For custom email scenarios, use the `SendGridService` directly:

```php
use App\Services\SendGridService;

$sendgrid = app(SendGridService::class);

$result = $sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Welcome to Agunfon',
    htmlContent: '<h1>Welcome!</h1><p>Thanks for signing up.</p>',
    plainTextContent: 'Welcome! Thanks for signing up.',
    replyTo: ['support@agunfon.com' => 'Support Team'],
    cc: null,
    bcc: null,
    attachments: null
);

if ($result['success']) {
    // Email sent successfully
    echo "Email sent! Status: " . $result['status_code'];
} else {
    // Handle error
    echo "Error: " . $result['message'];
}
```

### Method 3: Using SendGrid Helper

For convenience, use the helper class:

```php
use App\Helpers\SendGridHelper;

SendGridHelper::send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Email Subject',
    htmlContent: '<p>Your HTML content</p>'
);

// Send template
SendGridHelper::sendTemplate(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    templateId: 'd-xxxxxxxxxxxxxxxxxxxxx',
    dynamicData: ['name' => 'John Doe']
);
```

### Method 4: Custom Mail Class Extending SendGridMailable

Create custom mail classes:

```php
namespace App\Mail;

use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class WelcomeEmail extends SendGridMailable
{
    public function __construct(public $user) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to Agunfon',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
            with: [
                'user' => $this->user,
            ],
        );
    }
}

// Usage
Mail::send(new WelcomeEmail($user));
```

## Advanced Features

### Sending to Multiple Recipients

```php
$sendgrid = app(SendGridService::class);

$recipients = [
    'user1@example.com' => 'User One',
    'user2@example.com' => 'User Two',
    'user3@example.com' => 'User Three',
];

$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: $recipients,
    subject: 'Mass Email',
    htmlContent: '<p>Content for all recipients</p>'
);
```

### With CC and BCC

```php
$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Email with CC/BCC',
    htmlContent: '<p>Content</p>',
    cc: [
        'manager@example.com' => 'Manager',
        'admin@example.com' => 'Admin',
    ],
    bcc: [
        'archive@example.com' => 'Archive',
    ]
);
```

### With Attachments

```php
$attachments = [
    [
        'file' => file_get_contents('path/to/file.pdf'),
        'filename' => 'document.pdf',
        'type' => 'application/pdf',
    ],
];

$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Email with Attachment',
    htmlContent: '<p>See attachment</p>',
    attachments: $attachments
);
```

### Using SendGrid Templates

First, create a dynamic template in SendGrid Dashboard:
1. Go to Dynamic Templates
2. Create a new template with variables like `{{name}}`

Then send:

```php
$sendgrid = app(SendGridService::class);

$result = $sendgrid->sendTemplate(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    templateId: 'd-xxxxxxxxxxxxxxxxxxxxxx',
    dynamicData: [
        'name' => 'John Doe',
        'activation_link' => 'https://agunfon.com/activate/token',
    ]
);
```

## File Structure

```
app/
├── Services/
│   └── SendGridService.php          # Main SendGrid service class
├── Mail/
│   ├── SendGridMailable.php         # Base class for SendGrid mails
│   ├── SendsViaSendGrid.php         # Trait for optional use
│   ├── ContactConfirmation.php      # Updated with SendGrid
│   ├── ContactNotification.php      # Updated with SendGrid
│   ├── DemoConfirmation.php         # Updated with SendGrid
│   └── DemoNotification.php         # Updated with SendGrid
├── Helpers/
│   └── SendGridHelper.php           # Helper functions
├── Providers/
│   └── SendGridServiceProvider.php  # Service provider
config/
├── sendgrid.php                     # SendGrid configuration
└── services.php                     # Service credentials
```

## Logging and Monitoring

All email sending is logged in `storage/logs/laravel.log`:

**Success:**
```
[2026-05-31 10:30:45] local.INFO: Email sent via SendGrid {"to":"user@example.com","subject":"Welcome","status_code":202}
```

**Error:**
```
[2026-05-31 10:30:45] local.ERROR: SendGrid email sending failed {"error":"Invalid API key","to":"user@example.com"}
```

Monitor the logs:
```bash
php artisan pail --filter="SendGrid"
```

## Testing

### Test with Tinker

```bash
php artisan tinker
```

```php
>>> use App\Services\SendGridService;
>>> $sg = app(SendGridService::class);
>>> $result = $sg->send('noreply@agunfon.com', 'Test', 'test@example.com', 'Test Email', '<p>This is a test</p>');
>>> dd($result);
```

### Test with Mail Classes

```php
>>> use App\Mail\ContactConfirmation;
>>> use App\Models\Contact;
>>> $contact = Contact::first();
>>> Mail::send(new ContactConfirmation($contact));
```

## Troubleshooting

### Issue: "SendGrid API key is not configured"

**Solution:** Make sure `SENDGRID_API_KEY` is set in your `.env` file.

```env
SENDGRID_API_KEY=your_key_here
```

### Issue: "Invalid API key"

**Solution:** Verify your API key in SendGrid dashboard:
1. Go to https://app.sendgrid.com/settings/api_keys
2. Check if the key is active
3. Check if it has "Mail Send" permission

### Issue: "Unauthorized sender address"

**Solution:** The from address must be verified in SendGrid:
1. Go to https://app.sendgrid.com/settings/sender_auth
2. Verify your sender email address
3. Update `MAIL_FROM_ADDRESS` in `.env`

### Issue: Email not sent but no error

**Solution:** Check the logs:
```bash
tail -f storage/logs/laravel.log
```

Also verify:
- API key is correct
- From address is verified
- SendGrid account has enough email quota

## Email Verification

To verify your sender email in SendGrid:

1. Log in to SendGrid (https://app.sendgrid.com)
2. Go to **Settings** → **Sender Authentication**
3. Click **Verify a Sender**
4. Fill in the sender details
5. Check the confirmation email sent to that address
6. Click the confirmation link

## Response Status Codes

- `202` - Email accepted for processing (success)
- `400` - Invalid request
- `401` - Unauthorized (bad API key)
- `403` - Forbidden
- `404` - Not found
- `500` - Server error

## Performance Optimization

### Queue Emails (Recommended)

For better performance, queue mail sending:

```php
// In your controller or job
dispatch(new SendMail(new ContactConfirmation($contact)));

// Run queue worker
php artisan queue:listen
```

### Configuration

Update `config/queue.php`:
```php
'default' => env('QUEUE_CONNECTION', 'database'),
```

Ensure the queue table exists:
```bash
php artisan migrate
```

## Security Best Practices

1. **Never commit API keys** - Use `.env` file only
2. **Use strong API keys** - Generate new keys in SendGrid dashboard
3. **Rotate API keys regularly** - Delete old keys after rotation
4. **Monitor deliverability** - Check SendGrid dashboard for bounce rates
5. **Use DKIM/SPF** - Configure in SendGrid for better delivery

## Support

For SendGrid support:
- Documentation: https://docs.sendgrid.com/
- API Reference: https://docs.sendgrid.com/api-reference/
- Status: https://status.sendgrid.com/

For Agunfon issues:
- Check logs in `storage/logs/laravel.log`
- Review this guide
- Test with Tinker

## Next Steps

1. ✅ Add your SendGrid API key to `.env`
2. ✅ Verify your sender email in SendGrid
3. ✅ Test email sending with Tinker
4. ✅ Configure queue for production
5. ✅ Monitor delivery in SendGrid dashboard

## Additional Resources

- [SendGrid PHP SDK Documentation](https://github.com/sendgrid/sendgrid-php)
- [Laravel Mail Documentation](https://laravel.com/docs/11.x/mail)
- [SendGrid Best Practices](https://docs.sendgrid.com/ui/sending-email/index)
