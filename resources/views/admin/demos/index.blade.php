@extends('admin.layouts.app')

@section('title', 'Demo Requests')
@section('page-title', 'Demo Requests')

@section('content')
<div class="space-y-6">
    <!-- Stats Row -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 border border-gray-100">
            <p class="text-sm text-gray-500">Total Demos</p>
            <p class="text-2xl font-bold text-brand-900">{{ $demos->total() }}</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100">
            <p class="text-sm text-gray-500">Pending</p>
            <p class="text-2xl font-bold text-yellow-600">{{ $demos->where('status', 'pending')->count() }}</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100">
            <p class="text-sm text-gray-500">Confirmed</p>
            <p class="text-2xl font-bold text-green-600">{{ $demos->where('status', 'confirmed')->count() }}</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100">
            <p class="text-sm text-gray-500">This Week</p>
            <p class="text-2xl font-bold text-brand-600">{{ $demos->where('preferred_date', '>=', now())->where('preferred_date', '<=', now()->addWeek())->count() }}</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="flex flex-wrap gap-4 items-center">
        <form method="GET" class="flex-1 min-w-[200px] max-w-md">
            <div class="relative">
                <iconify-icon icon="lucide:search" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></iconify-icon>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email, company..." 
                    class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 focus:border-brand-500 outline-none">
            </div>
        </form>
        
        <div class="flex gap-2">
            <a href="{{ route('admin.demos.index') }}" class="px-4 py-2.5 rounded-xl text-sm font-semibold {{ !request('status') ? 'bg-brand-700 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">All</a>
            <a href="{{ route('admin.demos.index', ['status' => 'pending']) }}" class="px-4 py-2.5 rounded-xl text-sm font-semibold {{ request('status') === 'pending' ? 'bg-yellow-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">Pending</a>
            <a href="{{ route('admin.demos.index', ['status' => 'confirmed']) }}" class="px-4 py-2.5 rounded-xl text-sm font-semibold {{ request('status') === 'confirmed' ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">Confirmed</a>
            <a href="{{ route('admin.demos.index', ['status' => 'completed']) }}" class="px-4 py-2.5 rounded-xl text-sm font-semibold {{ request('status') === 'completed' ? 'bg-green-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">Completed</a>
        </div>
        
        <select name="industry" onchange="window.location.href='{{ route('admin.demos.index') }}?industry='+this.value" class="px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            <option value="">All Industries</option>
            <option value="education" {{ request('industry') === 'education' ? 'selected' : '' }}>Education</option>
            <option value="corporate" {{ request('industry') === 'corporate' ? 'selected' : '' }}>Corporate</option>
            <option value="healthcare" {{ request('industry') === 'healthcare' ? 'selected' : '' }}>Healthcare</option>
            <option value="government" {{ request('industry') === 'government' ? 'selected' : '' }}>Government</option>
            <option value="nonprofit" {{ request('industry') === 'nonprofit' ? 'selected' : '' }}>Non-Profit</option>
            <option value="other" {{ request('industry') === 'other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Contact</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Company</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Industry</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Team Size</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Preferred Date</th>
                        <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="text-right px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($demos as $demo)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-brand-100 rounded-xl flex items-center justify-center text-brand-700 font-semibold">
                                    {{ substr($demo->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $demo->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $demo->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $demo->company }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-semibold rounded-lg bg-gray-100 text-gray-700">{{ ucfirst($demo->industry) }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $demo->team_size }}</td>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($demo->preferred_date)->format('M j, Y') }}</p>
                            <p class="text-sm text-gray-500">{{ $demo->preferred_time }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full
                                {{ $demo->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                {{ $demo->status === 'confirmed' ? 'bg-blue-100 text-blue-700' : '' }}
                                {{ $demo->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $demo->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}
                            ">{{ ucfirst($demo->status) }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.demos.show', $demo) }}" class="p-2 text-brand-600 hover:bg-brand-50 rounded-lg transition-colors" title="View">
                                    <iconify-icon icon="lucide:eye"></iconify-icon>
                                </a>
                                <form method="POST" action="{{ route('admin.demos.destroy', $demo) }}" onsubmit="return confirm('Delete this demo request?')">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                        <iconify-icon icon="lucide:trash-2"></iconify-icon>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <iconify-icon icon="lucide:calendar-x" class="text-4xl mb-2 text-gray-300"></iconify-icon>
                            <p>No demo requests found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($demos->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $demos->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
