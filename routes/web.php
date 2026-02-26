<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DemoRequestController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DemoRequestController as AdminDemoRequestController;
use App\Http\Controllers\Admin\AdminEmailController;

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
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
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

Route::get('/book-demo', function () {
    return view('book-demo');
})->name('book-demo');

// Demo Request Form Submission
Route::post('/book-demo', [DemoRequestController::class, 'store'])->name('demo.store');
Route::get('/book-demo/success', function () {
    return view('demo-success');
})->name('demo.success');

// Newsletter Subscription
Route::post('/newsletter/subscribe', function (\Illuminate\Http\Request $request) {
    $request->validate(['email' => 'required|email']);
    // TODO: Store subscriber email or integrate with mailing service
    return back()->with('newsletter_success', 'Thank you for subscribing!');
})->name('newsletter.subscribe');

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
// ADMIN ROUTES
// ============================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes (Guest)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
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

        // Admin Emails Management
        Route::get('/emails', [AdminEmailController::class, 'index'])->name('emails.index');
        Route::post('/emails', [AdminEmailController::class, 'store'])->name('emails.store');
        Route::put('/emails/{adminEmail}', [AdminEmailController::class, 'update'])->name('emails.update');
        Route::patch('/emails/{adminEmail}/toggle', [AdminEmailController::class, 'toggleActive'])->name('emails.toggle');
        Route::delete('/emails/{adminEmail}', [AdminEmailController::class, 'destroy'])->name('emails.destroy');
    });
});
