<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\DemoRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Contact statistics
        $contactStats = [
            'total' => Contact::count(),
            'new' => Contact::new()->count(),
            'this_week' => Contact::where('created_at', '>=', now()->startOfWeek())->count(),
            'this_month' => Contact::where('created_at', '>=', now()->startOfMonth())->count(),
        ];

        // Demo request statistics
        $demoStats = [
            'total' => DemoRequest::count(),
            'pending' => DemoRequest::pending()->count(),
            'upcoming' => DemoRequest::upcoming()->count(),
            'this_week' => DemoRequest::where('created_at', '>=', now()->startOfWeek())->count(),
            'this_month' => DemoRequest::where('created_at', '>=', now()->startOfMonth())->count(),
        ];

        // Recent contacts
        $recentContacts = Contact::latest()->take(5)->get();

        // Recent demo requests
        $recentDemos = DemoRequest::latest()->take(5)->get();

        // Upcoming demos
        $upcomingDemos = DemoRequest::upcoming()
            ->orderBy('preferred_date')
            ->orderBy('preferred_time')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'contactStats',
            'demoStats',
            'recentContacts',
            'recentDemos',
            'upcomingDemos'
        ));
    }
}
