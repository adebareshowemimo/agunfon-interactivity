@extends('admin.layouts.app')

@section('title', 'Newsletter')
@section('page-title', 'Newsletter Subscribers')

@section('content')
<div class="space-y-6">
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">{{ session('success') }}</div>
    @endif

    <!-- Filters + Export -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <form method="GET" class="flex flex-wrap items-center gap-4">
            <div class="flex-grow max-w-md">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by email..."
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 outline-none">
            </div>
            <select name="status" class="px-4 py-2.5 rounded-xl border border-gray-200 focus:border-brand-500 outline-none">
                <option value="">All Status</option>
                <option value="subscribed" {{ request('status') == 'subscribed' ? 'selected' : '' }}>Subscribed</option>
                <option value="unsubscribed" {{ request('status') == 'unsubscribed' ? 'selected' : '' }}>Unsubscribed</option>
            </select>
            <button type="submit" class="px-6 py-2.5 bg-brand-700 text-white rounded-xl hover:bg-brand-900 transition-colors font-semibold">
                Filter
            </button>
            @if(request()->hasAny(['search', 'status']))
            <a href="{{ route('admin.newsletter.index') }}" class="text-sm text-gray-500 hover:text-brand-600">Clear filters</a>
            @endif
            <a href="{{ route('admin.newsletter.export') }}" class="ml-auto px-6 py-2.5 bg-brand-600 text-white rounded-xl hover:bg-brand-700 transition-colors font-semibold inline-flex items-center gap-2">
                <iconify-icon icon="lucide:download"></iconify-icon> Export CSV
            </a>
        </form>
    </div>

    <!-- Subscribers Table -->
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Subscribed</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($subscribers as $subscriber)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-brand-100 rounded-full flex items-center justify-center text-brand-700 font-semibold">
                                {{ strtoupper(substr($subscriber->email, 0, 1)) }}
                            </div>
                            <span class="font-medium text-gray-900">{{ $subscriber->email }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $subscriber->status === 'subscribed' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($subscriber->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $subscriber->created_at->format('M j, Y') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="mailto:{{ $subscriber->email }}" class="p-2 text-gray-400 hover:text-brand-600" title="Email">
                                <iconify-icon icon="lucide:mail"></iconify-icon>
                            </a>
                            <form action="{{ route('admin.newsletter.destroy', $subscriber) }}" method="POST" onsubmit="return confirm('Remove this subscriber?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-gray-400 hover:text-red-600" title="Delete">
                                    <iconify-icon icon="lucide:trash-2"></iconify-icon>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-400">No subscribers yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($subscribers->hasPages())
    <div>{{ $subscribers->links() }}</div>
    @endif
</div>
@endsection
