@extends('admin.layouts.app')

@section('title', 'View Demo Request')
@section('page-title', 'Demo Request Details')

@section('content')
<div class="max-w-4xl">
    <!-- Back Link -->
    <a href="{{ route('admin.demos.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-brand-600 mb-6">
        <iconify-icon icon="lucide:arrow-left"></iconify-icon>
        Back to Demo Requests
    </a>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <!-- Header -->
        <div class="p-6 bg-gradient-to-r from-brand-50 to-white border-b border-gray-100">
            <div class="flex items-start justify-between flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-brand-100 rounded-2xl flex items-center justify-center text-brand-700 font-bold text-2xl">
                        {{ substr($demoRequest->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-brand-900">{{ $demoRequest->name }}</h2>
                        <p class="text-gray-500">{{ $demoRequest->company }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="px-4 py-1.5 text-sm font-semibold rounded-full
                        {{ $demoRequest->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $demoRequest->status === 'confirmed' ? 'bg-blue-100 text-blue-700' : '' }}
                        {{ $demoRequest->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $demoRequest->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}
                    ">{{ ucfirst($demoRequest->status) }}</span>
                </div>
            </div>
        </div>

        <!-- Scheduled Date Banner -->
        <div class="p-4 bg-brand-50 border-b border-brand-100 flex items-center gap-4">
            <iconify-icon icon="lucide:calendar" class="text-2xl text-brand-600"></iconify-icon>
            <div>
                <p class="text-sm text-brand-600 font-medium">Preferred Demo Date</p>
                <p class="text-lg font-bold text-brand-900">
                    {{ \Carbon\Carbon::parse($demoRequest->preferred_date)->format('l, F j, Y') }} 
                    at {{ $demoRequest->preferred_time }}
                </p>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="p-6 grid md:grid-cols-2 gap-6 border-b border-gray-100">
            <div>
                <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Email</label>
                <p class="mt-1">
                    <a href="mailto:{{ $demoRequest->email }}" class="text-brand-600 hover:text-brand-700 font-medium">{{ $demoRequest->email }}</a>
                </p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Phone</label>
                <p class="mt-1">
                    @if($demoRequest->phone)
                    <a href="tel:{{ $demoRequest->phone }}" class="text-brand-600 hover:text-brand-700">{{ $demoRequest->phone }}</a>
                    @else
                    <span class="text-gray-400">Not provided</span>
                    @endif
                </p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Industry</label>
                <p class="mt-1 text-gray-900">{{ ucfirst($demoRequest->industry) }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Team Size</label>
                <p class="mt-1 text-gray-900">{{ $demoRequest->team_size }} people</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Submitted</label>
                <p class="mt-1 text-gray-900">{{ $demoRequest->created_at->format('F j, Y \a\t g:i A') }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Last Updated</label>
                <p class="mt-1 text-gray-900">{{ $demoRequest->updated_at->diffForHumans() }}</p>
            </div>
        </div>

        <!-- Summary -->
        @if($demoRequest->summary)
        <div class="p-6 border-b border-gray-100">
            <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Summary / Requirements</label>
            <div class="mt-3 p-4 bg-gray-50 rounded-xl text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $demoRequest->summary }}</div>
        </div>
        @endif

        <!-- Actions -->
        <div class="p-6 flex flex-wrap items-center gap-4">
            <form method="POST" action="{{ route('admin.demos.status', $demoRequest) }}">
                @csrf @method('PATCH')
                <div class="flex items-center gap-2">
                    <label class="text-sm text-gray-500">Status:</label>
                    <select name="status" onchange="this.form.submit()" class="px-4 py-2 rounded-xl border border-gray-200 focus:border-brand-500 outline-none">
                        <option value="pending" {{ $demoRequest->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $demoRequest->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ $demoRequest->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $demoRequest->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
            </form>
            
            <a href="mailto:{{ $demoRequest->email }}?subject=Demo Request Confirmation - Agunfon" class="px-6 py-2 bg-brand-700 text-white rounded-xl hover:bg-brand-900 transition-colors font-semibold inline-flex items-center gap-2">
                <iconify-icon icon="lucide:mail"></iconify-icon>
                Send Email
            </a>
            
            <a href="tel:{{ $demoRequest->phone }}" class="px-6 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-colors font-semibold inline-flex items-center gap-2 {{ !$demoRequest->phone ? 'opacity-50 pointer-events-none' : '' }}">
                <iconify-icon icon="lucide:phone"></iconify-icon>
                Call
            </a>
            
            <form method="POST" action="{{ route('admin.demos.destroy', $demoRequest) }}" onsubmit="return confirm('Are you sure you want to delete this demo request?')" class="ml-auto">
                @csrf @method('DELETE')
                <button class="px-4 py-2 text-red-600 hover:bg-red-50 rounded-xl transition-colors font-semibold inline-flex items-center gap-2">
                    <iconify-icon icon="lucide:trash-2"></iconify-icon>
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
