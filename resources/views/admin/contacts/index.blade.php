@extends('admin.layouts.app')

@section('title', 'Contacts')
@section('page-title', 'Contact Requests')

@section('content')
<div class="space-y-6">
    <!-- Filters -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <form method="GET" class="flex flex-wrap items-center gap-4">
            <div class="flex-grow max-w-md">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email, or company..." 
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 outline-none">
            </div>
            <select name="status" class="px-4 py-2.5 rounded-xl border border-gray-200 focus:border-brand-500 outline-none">
                <option value="">All Status</option>
                <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied</option>
                <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
            <button type="submit" class="px-6 py-2.5 bg-brand-700 text-white rounded-xl hover:bg-brand-900 transition-colors font-semibold">
                Filter
            </button>
            @if(request()->hasAny(['search', 'status']))
            <a href="{{ route('admin.contacts.index') }}" class="text-sm text-gray-500 hover:text-brand-600">Clear filters</a>
            @endif
        </form>
    </div>

    <!-- Contacts Table -->
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Contact</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Company</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($contacts as $contact)
                <tr class="hover:bg-gray-50 transition-colors {{ $contact->status === 'new' ? 'bg-blue-50/30' : '' }}">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-brand-100 rounded-full flex items-center justify-center text-brand-700 font-semibold">
                                {{ substr($contact->name, 0, 1) }}
                            </div>
                            <div>
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="font-semibold text-gray-900 hover:text-brand-600">
                                    {{ $contact->name }}
                                    @if($contact->status === 'new')
                                    <span class="w-2 h-2 bg-blue-500 rounded-full inline-block ml-1"></span>
                                    @endif
                                </a>
                                <p class="text-sm text-gray-500">{{ $contact->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $contact->company }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                            {{ $contact->status === 'new' ? 'bg-blue-100 text-blue-700' : '' }}
                            {{ $contact->status === 'read' ? 'bg-gray-100 text-gray-700' : '' }}
                            {{ $contact->status === 'replied' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $contact->status === 'archived' ? 'bg-orange-100 text-orange-700' : '' }}
                        ">{{ ucfirst($contact->status) }}</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $contact->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="p-2 text-gray-400 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors">
                                <iconify-icon icon="lucide:eye" class="text-lg"></iconify-icon>
                            </a>
                            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Delete this contact?')">
                                @csrf @method('DELETE')
                                <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                    <iconify-icon icon="lucide:trash-2" class="text-lg"></iconify-icon>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                        <iconify-icon icon="lucide:inbox" class="text-4xl mb-2"></iconify-icon>
                        <p>No contacts found</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($contacts->hasPages())
    <div class="flex justify-center">
        {{ $contacts->links() }}
    </div>
    @endif
</div>
@endsection
