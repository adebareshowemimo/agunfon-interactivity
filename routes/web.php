<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DemoRequestController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DemoRequestController as AdminDemoRequestController;
use App\Http\Controllers\Admin\AdminEmailController;
use App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Contact Form Submission
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:8,1')->name('contact.store');
Route::get('/contact/success', function () {
    return view('contact-success');
})->name('contact.success');

Route::get('/learning-suite', function () {
    return view('learning-suite');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/adaptive-lms', function () {
    return view('adaptive-lms');
});

// ============================================
// PLUGIN LANDING PAGES (Moodle plugins)
// ============================================
Route::get('/plugins/modern-course-reminder', function () {
    return view('plugins.modern-course-reminder');
})->name('plugins.moderncoursereminder');

Route::get('/plugins/modern-enrolment-notifier', function () {
    return view('plugins.modern-enrolment-notifier');
})->name('plugins.modernenrolnotifier');

Route::get('/plugins/modern-engagement-hub', function () {
    return view('plugins.modern-engagement-hub');
})->name('plugins.modernengagementhub');

Route::get('/plugins/modern-learner-dashboard', function () {
    return view('plugins.modern-learner-dashboard');
})->name('plugins.modernlearnerdashboard');

Route::get('/plugins/modern-video-player', function () {
    return view('plugins.modern-video-player');
})->name('plugins.modernvideoplayer');

Route::get('/plugins/modern-flipbook', function () {
    return view('plugins.modern-flipbook');
})->name('plugins.modernflipbook');

Route::redirect('/plugins/modern-commerce', 'https://moderncommerce.dev', 301)
    ->name('plugins.moderncommerce');

// The plugin's own pricing.php / add-ons pages link to /moderncommerce — keep them working.
Route::redirect('/moderncommerce', 'https://moderncommerce.dev', 301);
Route::redirect('/moderncommerce/addons', 'https://moderncommerce.dev/product#extensions', 301);

// ============================================
// BLOG (file-based — posts registry in config/blog.php)
// ============================================
Route::get('/blog', function () {
    $allPosts = collect(config('blog', []))
        ->map(fn (array $post, string $slug) => array_merge($post, ['slug' => $slug]))
        ->sortByDesc('date')
        ->values();

    $featured = $allPosts->first();
    $categories = $allPosts->pluck('category')->filter()->unique()->sort()->values();
    $query = trim((string) request('q', ''));
    $category = trim((string) request('category', ''));

    $filtered = $allPosts
        ->when($query !== '', function ($posts) use ($query) {
            return $posts->filter(function ($post) use ($query) {
                $haystack = implode(' ', [
                    $post['title'] ?? '',
                    $post['excerpt'] ?? '',
                    $post['category'] ?? '',
                    $post['author'] ?? '',
                ]);

                return str_contains(mb_strtolower($haystack), mb_strtolower($query));
            });
        })
        ->when($category !== '', fn ($posts) => $posts->where('category', $category))
        ->when($query === '' && $category === '', fn ($posts) => $posts->skip(1))
        ->values();

    $perPage = 12;
    $page = max(1, (int) request('page', 1));
    $posts = new \Illuminate\Pagination\LengthAwarePaginator(
        $filtered->forPage($page, $perPage)->values(),
        $filtered->count(),
        $perPage,
        $page,
        [
            'path' => route('blog.index'),
            'query' => request()->except('page'),
        ]
    );

    return view('blog.index', [
        'posts' => $posts,
        'featured' => $featured,
        'categories' => $categories,
        'totalCount' => $allPosts->count(),
        'query' => $query,
        'activeCategory' => $category,
    ]);
})->name('blog.index');

Route::get('/blog/{slug}', function (string $slug) {
    $post = config('blog.' . $slug);
    abort_unless($post, 404);

    return view('blog.show', ['slug' => $slug, 'post' => $post]);
})->name('blog.show');

Route::get('/book-demo', function () {
    return view('book-demo');
})->name('book-demo');

// Demo Request Form Submission
Route::post('/book-demo', [DemoRequestController::class, 'store'])->middleware('throttle:8,1')->name('demo.store');
Route::get('/book-demo/success', function () {
    return view('demo-success');
})->name('demo.success');

// Newsletter Subscription
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->middleware('throttle:6,1')->name('newsletter.subscribe');

Route::get('/employee-onboarding', function () {
    return view('employee-onboarding');
});

Route::get('/compliance-training', function () {
    return view('compliance-training');
});

Route::get('/leadership-development', function () {
    return view('leadership-development');
});

Route::get('/personal-development', function () {
    return view('personal-development');
});

Route::get('/information-technology', function () {
    return view('information-technology');
});

Route::get('/human-resources', function () {
    return view('human-resources');
});

Route::get('/customer-service', function () {
    return view('customer-service');
});

Route::get('/health-wellness', function () {
    return view('health-wellness');
});

Route::get('/sales-marketing', function () {
    return view('sales-marketing');
});

Route::get('/diversity-inclusion', function () {
    return view('diversity-inclusion');
});

Route::get('/education', function () {
    return view('education');
});

Route::get('/finance', function () {
    return view('finance');
});

Route::get('/retail', function () {
    return view('retail');
});

Route::get('/nonprofit', function () {
    return view('nonprofit');
});

Route::get('/healthcare', function () {
    return view('healthcare');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/terms-of-service', function () {
    return view('terms-of-service');
});

Route::get('/terms-of-sale', function () {
    return view('terms-of-sale');
})->name('terms-of-sale');

Route::get('/cookies-policy', function () {
    return view('cookies-policy');
});

// Named routes for features and resources (referenced in success pages)
Route::get('/features', function () {
    return view('learning-suite');
})->name('features');

Route::get('/resources', function () {
    return view('services');
})->name('resources');

// ============================================
// SITEMAP (XML) — enumerates public URLs for crawlers
// ============================================
Route::get('/sitemap.xml', function () {
    $paths = [
        '/', '/about', '/services', '/pricing', '/contact', '/book-demo',
        '/learning-suite', '/adaptive-lms',
        // Moodle plugin landing pages
        '/plugins/modern-course-reminder', '/plugins/modern-enrolment-notifier',
        '/plugins/modern-engagement-hub', '/plugins/modern-learner-dashboard',
        '/plugins/modern-video-player', '/plugins/modern-flipbook',
        // Solutions — by use case
        '/employee-onboarding', '/compliance-training', '/leadership-development',
        '/personal-development', '/customer-service', '/health-wellness',
        '/sales-marketing', '/diversity-inclusion',
        // Solutions — by industry
        '/finance', '/education', '/retail', '/nonprofit', '/healthcare',
        '/information-technology', '/human-resources',
        // Blog
        '/blog',
        // Legal
        '/privacy-policy', '/terms-of-service', '/terms-of-sale', '/cookies-policy',
    ];

    // Append every published blog post.
    foreach (array_keys(config('blog', [])) as $slug) {
        $paths[] = '/blog/' . $slug;
    }

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($paths as $path) {
        $xml .= '  <url><loc>' . e(url($path)) . '</loc></url>' . "\n";
    }
    $xml .= '</urlset>' . "\n";

    return response($xml, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

// Default "login" route: Laravel's auth middleware redirects unauthenticated
// users to route('login'). Admin auth lives under admin.login, so alias it here.
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');

// ============================================
// ADMIN ROUTES
// ============================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes (Guest)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        // Coarse per-IP backstop. The real lockout lives in AuthController, which only
        // counts failures, so a legitimate admin retyping a password is never blocked.
        Route::post('/login', [AuthController::class, 'login'])
            ->middleware('throttle:10,1')
            ->name('login.submit');
    });

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Contacts Management
        Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
        Route::patch('/contacts/{contact}/status', [AdminContactController::class, 'updateStatus'])->name('contacts.status');
        Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

        // Demo Requests Management
        Route::get('/demos', [AdminDemoRequestController::class, 'index'])->name('demos.index');
        Route::get('/demos/{demoRequest}', [AdminDemoRequestController::class, 'show'])->name('demos.show');
        Route::patch('/demos/{demoRequest}/status', [AdminDemoRequestController::class, 'updateStatus'])->name('demos.status');
        Route::delete('/demos/{demoRequest}', [AdminDemoRequestController::class, 'destroy'])->name('demos.destroy');

        // Newsletter Subscribers
        Route::get('/newsletter', [AdminNewsletterController::class, 'index'])->name('newsletter.index');
        Route::get('/newsletter/export', [AdminNewsletterController::class, 'export'])->name('newsletter.export');
        Route::delete('/newsletter/{subscriber}', [AdminNewsletterController::class, 'destroy'])->name('newsletter.destroy');

        // Admin Emails Management
        Route::get('/emails', [AdminEmailController::class, 'index'])->name('emails.index');
        Route::post('/emails', [AdminEmailController::class, 'store'])->name('emails.store');
        Route::put('/emails/{adminEmail}', [AdminEmailController::class, 'update'])->name('emails.update');
        Route::patch('/emails/{adminEmail}/toggle', [AdminEmailController::class, 'toggleActive'])->name('emails.toggle');
        Route::delete('/emails/{adminEmail}', [AdminEmailController::class, 'destroy'])->name('emails.destroy');
    });
});
