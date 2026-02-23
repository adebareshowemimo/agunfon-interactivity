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

        $demoRequests = $query->latest()->paginate(15);

        // Get unique industries for filter dropdown
        $industries = DemoRequest::distinct()->pluck('industry');

        return view('admin.demos.index', compact('demoRequests', 'industries'));
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
