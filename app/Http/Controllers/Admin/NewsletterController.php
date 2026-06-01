<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class NewsletterController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsletterSubscriber::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }

        $subscribers = $query->latest()->paginate(20)->withQueryString();

        return view('admin.newsletter.index', compact('subscribers'));
    }

    public function destroy(NewsletterSubscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('admin.newsletter.index')->with('success', 'Subscriber removed.');
    }

    public function export(): StreamedResponse
    {
        $filename = 'newsletter-subscribers-' . now()->format('Y-m-d') . '.csv';

        return response()->stream(function () {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['Email', 'Status', 'Subscribed At', 'IP Address']);

            NewsletterSubscriber::latest()->chunk(500, function ($rows) use ($out) {
                foreach ($rows as $s) {
                    fputcsv($out, [
                        $s->email,
                        $s->status,
                        optional($s->created_at)->toDateTimeString(),
                        $s->ip_address,
                    ]);
                }
            });

            fclose($out);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}
