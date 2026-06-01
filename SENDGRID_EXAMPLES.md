# SendGrid Integration - Quick Reference & Examples

## Quick Start

### 1. Configure API Key

```env
# .env
SENDGRID_API_KEY=SG.xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
MAIL_FROM_ADDRESS=noreply@agunfon.com
MAIL_FROM_NAME=Agunfon
```

### 2. Send Email

Choose one of the methods below:

## Method 1: Using Mail Classes (Simplest)

```php
use App\Mail\ContactConfirmation;
use App\Models\Contact;

$contact = Contact::find(1);

// Send immediately
Mail::send(new ContactConfirmation($contact));

// Or queue it (recommended for production)
Mail::queue(new ContactConfirmation($contact));
```

## Method 2: Direct Service (Full Control)

```php
use App\Services\SendGridService;

$sendgrid = app(SendGridService::class);

$result = $sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Welcome!',
    htmlContent: '<h1>Welcome to Agunfon</h1>',
);

if ($result['success']) {
    echo "Sent with status: " . $result['status_code'];
}
```

## Method 3: Helper Function

```php
use App\Helpers\SendGridHelper;

SendGridHelper::send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Hello',
    htmlContent: '<p>Your message here</p>'
);
```

## Common Examples

### Send Single Email

```php
$sendgrid = app(SendGridService::class);

$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'john@example.com',
    subject: 'Hello John',
    htmlContent: '<p>This is your message</p>'
);
```

### Send to Multiple Recipients

```php
$sendgrid = app(SendGridService::class);

$recipients = [
    'john@example.com' => 'John Doe',
    'jane@example.com' => 'Jane Smith',
    'bob@example.com' => 'Bob Johnson',
];

$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: $recipients,
    subject: 'Update for Everyone',
    htmlContent: '<p>This message goes to all of you</p>'
);
```

### Send with CC

```php
$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'FYI',
    htmlContent: '<p>Content</p>',
    cc: ['manager@example.com' => 'Manager']
);
```

### Send with BCC

```php
$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Secret Copy',
    htmlContent: '<p>Content</p>',
    bcc: ['archive@example.com' => 'Archive']
);
```

### Send with Reply-To

```php
$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Reply to Support',
    htmlContent: '<p>Content</p>',
    replyTo: ['support@agunfon.com' => 'Support Team']
);
```

### Send with Attachment

```php
$attachment = [
    [
        'file' => file_get_contents('path/to/document.pdf'),
        'filename' => 'document.pdf',
        'type' => 'application/pdf',
    ]
];

$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Your Document',
    htmlContent: '<p>Please find the attached document</p>',
    attachments: $attachment
);
```

### Send with Multiple Attachments

```php
$attachments = [
    [
        'file' => file_get_contents('path/to/file1.pdf'),
        'filename' => 'file1.pdf',
        'type' => 'application/pdf',
    ],
    [
        'file' => file_get_contents('path/to/file2.xlsx'),
        'filename' => 'data.xlsx',
        'type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    ]
];

$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Multiple Files',
    htmlContent: '<p>Files attached</p>',
    attachments: $attachments
);
```

### Send HTML with Plain Text Alternative

```php
$sendgrid->send(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    subject: 'Newsletter',
    htmlContent: '<h1>Newsletter</h1><p>Read our latest news</p>',
    plainTextContent: 'Newsletter\nRead our latest news'
);
```

### Send Dynamic Template

```php
$sendgrid = app(SendGridService::class);

$sendgrid->sendTemplate(
    from: 'noreply@agunfon.com',
    fromName: 'Agunfon',
    to: 'user@example.com',
    templateId: 'd-xxxxxxxxxxxxxxxxxxxxxx',
    dynamicData: [
        'name' => 'John Doe',
        'confirmation_link' => 'https://agunfon.com/confirm/abc123',
        'company' => 'Acme Corp',
    ]
);
```

## Real-World Use Cases

### Contact Form Confirmation

```php
// In ContactController
use App\Mail\ContactConfirmation;
use App\Models\Contact;

public function store(Request $request)
{
    $contact = Contact::create($request->validated());
    
    // Send confirmation email
    Mail::queue(new ContactConfirmation($contact));
    
    return redirect()->route('contact.success');
}
```

### User Registration Welcome Email

```php
// In RegisterController
use App\Services\SendGridService;
use App\Models\User;

public function create(array $data)
{
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    
    // Send welcome email
    $sendgrid = app(SendGridService::class);
    $sendgrid->send(
        from: 'noreply@agunfon.com',
        fromName: 'Agunfon',
        to: $user->email,
        subject: 'Welcome to Agunfon!',
        htmlContent: view('emails.welcome', ['user' => $user])->render()
    );
    
    return $user;
}
```

### Demo Request Notification

```php
// In DemoController
use App\Mail\DemoConfirmation;
use App\Mail\DemoNotification;
use App\Models\DemoRequest;

public function store(Request $request)
{
    $demo = DemoRequest::create($request->validated());
    
    // Send confirmation to requester
    Mail::queue(new DemoConfirmation($demo));
    
    // Notify admin
    Mail::queue(new DemoNotification($demo));
    
    return response()->json(['message' => 'Demo request submitted']);
}
```

### Batch Email to All Users

```php
// In a Command or Job
use App\Services\SendGridService;
use App\Models\User;

$sendgrid = app(SendGridService::class);

User::chunk(100, function ($users) use ($sendgrid) {
    foreach ($users as $user) {
        $sendgrid->send(
            from: 'noreply@agunfon.com',
            fromName: 'Agunfon',
            to: $user->email,
            subject: 'Important Update',
            htmlContent: view('emails.announcement', ['user' => $user])->render()
        );
    }
});
```

### Scheduled Newsletter

```php
// In app/Console/Kernel.php
protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $users = User::where('newsletter_subscribed', true)->get();
        
        foreach ($users as $user) {
            Mail::queue(new NewsletterEmail($user));
        }
    })->weekly();
}
```

## Testing

### Test with Artisan Tinker

```bash
php artisan tinker
```

```php
>>> use App\Services\SendGridService;
>>> $sg = app(SendGridService::class);
>>> $result = $sg->send('noreply@agunfon.com', 'Agunfon', 'your-email@example.com', 'Test', '<p>This is a test email</p>');
>>> dd($result);
```

### Check Logs

```bash
tail -f storage/logs/laravel.log | grep SendGrid
```

### Test Mail Class

```php
>>> use App\Mail\ContactConfirmation;
>>> use App\Models\Contact;
>>> $contact = Contact::first();
>>> Mail::send(new ContactConfirmation($contact));
```

## Error Handling

```php
use App\Services\SendGridService;

try {
    $sendgrid = app(SendGridService::class);
    
    $result = $sendgrid->send(
        from: 'noreply@agunfon.com',
        fromName: 'Agunfon',
        to: 'user@example.com',
        subject: 'Test',
        htmlContent: '<p>Test</p>'
    );
    
    if (!$result['success']) {
        \Log::error('Email failed: ' . $result['message']);
        // Handle failure
    }
    
} catch (\Exception $e) {
    \Log::error('SendGrid error: ' . $e->getMessage());
    // Handle exception
}
```

## Common MIME Types for Attachments

```php
'pdf' => 'application/pdf',
'doc' => 'application/msword',
'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
'xls' => 'application/vnd.ms-excel',
'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
'zip' => 'application/zip',
'png' => 'image/png',
'jpg' => 'image/jpeg',
'gif' => 'image/gif',
'txt' => 'text/plain',
'csv' => 'text/csv',
```

## Debugging Tips

1. **Check API Key** - Make sure it's in `.env` and correct
2. **Verify Sender** - Sender email must be verified in SendGrid
3. **Check Logs** - Look at `storage/logs/laravel.log`
4. **Use Tinker** - Test directly with `php artisan tinker`
5. **Monitor Dashboard** - Check SendGrid dashboard for delivery status

## Performance Considerations

For production, always queue emails:

```php
// Bad - blocks request
Mail::send(new ContactConfirmation($contact));

// Good - returns immediately
Mail::queue(new ContactConfirmation($contact));

// Run queue worker
php artisan queue:listen
```

## Need Help?

- Documentation: See `SENDGRID_SETUP.md`
- SendGrid Docs: https://docs.sendgrid.com/
- Check logs: `storage/logs/laravel.log`
- Run tests: `php artisan test`
