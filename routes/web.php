<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/contact', function () {
    return view('contact');
});

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
});

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
