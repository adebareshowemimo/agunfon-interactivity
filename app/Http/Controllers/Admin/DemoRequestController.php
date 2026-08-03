<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemoRequest;
use Illuminate\Http\Request;

class DemoRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = DemoRequest::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by industry
        if ($request->filled('industry')) {
            $query->where('industry', $request->industry);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }

        // The view refers to this as $demos. withQueryString() keeps the active
        // status/industry/search filters attached to the pagination links.
        $demos = (clone $query)->latest()->paginate(15)->withQueryString();

        // Counted from the query, not from $demos. A paginator only holds the
        // current 15 rows, so counting off it silently under-reports the moment
        // there is more than one page of results.
        $stats = [
            'total' => (clone $query)->count(),
            'pending' => (clone $query)->where('status', 'pending')->count(),
            'confirmed' => (clone $query)->where('status', 'confirmed')->count(),
            'upcoming' => (clone $query)
                ->whereBetween('preferred_date', [now(), now()->addWeek()])
                ->count(),
        ];

        // Get unique industries for filter dropdown
        $industries = DemoRequest::distinct()->pluck('industry');

        return view('admin.demos.index', compact('demos', 'stats', 'industries'));
    }

    public function show(DemoRequest $demoRequest)
    {
        return view('admin.demos.show', compact('demoRequest'));
    }

    public function updateStatus(Request $request, DemoRequest $demoRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $demoRequest->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function destroy(DemoRequest $demoRequest)
    {
        $demoRequest->delete();

        return redirect()->route('admin.demos.index')->with('success', 'Demo request deleted successfully.');
    }

    public function calendar()
    {
        $demos = DemoRequest::whereIn('status', ['pending', 'confirmed'])
            ->where('preferred_date', '>=', now()->startOfMonth())
            ->where('preferred_date', '<=', now()->addMonths(2)->endOfMonth())
            ->get();

        return view('admin.demos.calendar', compact('demos'));
    }
}
