@extends('admin.layouts.app')

@section('title', 'View Contact')
@section('page-title', 'Contact Details')

@section('content')
<div class="max-w-4xl">
    <!-- Back Link -->
    <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-brand-600 mb-6">
        <iconify-icon icon="lucide:arrow-left"></iconify-icon>
        Back to Contacts
    </a>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <!-- Header -->
        <div class="p-6 bg-gradient-to-r from-brand-50 to-white border-b border-gray-100">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-brand-100 rounded-2xl flex items-center justify-center text-brand-700 font-bold text-2xl">
                        {{ substr($contact->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-brand-900">{{ $contact->name }}</h2>
                        <p class="text-gray-500">{{ $contact->company }}</p>
                    </div>
                </div>
                <span class="px-4 py-1.5 text-sm font-semibold rounded-full
                    {{ $contact->status === 'new' ? 'bg-blue-100 text-blue-700' : '' }}
                    {{ $contact->status === 'read' ? 'bg-gray-100 text-gray-700' : '' }}
                    {{ $contact->status === 'replied' ? 'bg-green-100 text-green-700' : '' }}
                    {{ $contact->status === 'archived' ? 'bg-orange-100 text-orange-700' : '' }}
                ">{{ ucfirst($contact->status) }}</span>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="p-6 grid md:grid-cols-2 gap-6 border-b border-gray-100">
            <div>
                <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Email</label>
                <p class="mt-1">
                    <a href="mailto:{{ $contact->email }}" class="text-brand-600 hover:text-brand-700 font-medium">{{ $contact->email }}</a>
                </p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Phone</label>
                <p class="mt-1 text-gray-900">
                    @if($contact->phone)
                    <a href="tel:{{ $contact->phone }}" class="text-brand-600 hover:text-brand-700">{{ $contact->phone }}</a>
                    @else
                    <span class="text-gray-400">Not provided</span>
                    @endif
                </p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Submitted</label>
                <p class="mt-1 text-gray-900">{{ $contact->created_at->format('F j, Y \a\t g:i A') }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Last Updated</label>
                <p class="mt-1 text-gray-900">{{ $contact->updated_at->diffForHumans() }}</p>
            </div>
        </div>

        <!-- Message -->
        <div class="p-6 border-b border-gray-100">
            <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Message</label>
            <div class="mt-3 p-4 bg-gray-50 rounded-xl text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</div>
        </div>

        <!-- Actions -->
        <div class="p-6 flex flex-wrap items-center gap-4">
            <form method="POST" action="{{ route('admin.contacts.status', $contact) }}">
                @csrf @method('PATCH')
                <select name="status" onchange="this.form.submit()" class="px-4 py-2 rounded-xl border border-gray-200 focus:border-brand-500 outline-none">
                    <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>Mark as New</option>
                    <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Mark as Read</option>
                    <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Mark as Replied</option>
                    <option value="archived" {{ $contact->status === 'archived' ? 'selected' : '' }}>Archive</option>
                </select>
            </form>
            
            <a href="mailto:{{ $contact->email }}" class="px-6 py-2 bg-brand-700 text-white rounded-xl hover:bg-brand-900 transition-colors font-semibold inline-flex items-center gap-2">
                <iconify-icon icon="lucide:mail"></iconify-icon>
                Reply via Email
            </a>
            
            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Are you sure you want to delete this contact?')" class="ml-auto">
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
