@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Contact Stats -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center">
                    <iconify-icon icon="lucide:mail" class="text-2xl text-blue-600"></iconify-icon>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+{{ $contactStats['this_week'] }} this week</span>
            </div>
            <h3 class="text-3xl font-bold text-gray-900">{{ $contactStats['total'] }}</h3>
            <p class="text-sm text-gray-500">Total Contacts</p>
            @if($contactStats['new'] > 0)
            <div class="mt-3 text-sm text-blue-600 font-medium">{{ $contactStats['new'] }} new unread</div>
            @endif
        </div>
        
        <!-- Demo Stats -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center">
                    <iconify-icon icon="lucide:calendar" class="text-2xl text-purple-600"></iconify-icon>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+{{ $demoStats['this_week'] }} this week</span>
            </div>
            <h3 class="text-3xl font-bold text-gray-900">{{ $demoStats['total'] }}</h3>
            <p class="text-sm text-gray-500">Total Demo Requests</p>
            @if($demoStats['pending'] > 0)
            <div class="mt-3 text-sm text-orange-600 font-medium">{{ $demoStats['pending'] }} pending</div>
            @endif
        </div>
        
        <!-- Upcoming Demos -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center">
                    <iconify-icon icon="lucide:clock" class="text-2xl text-green-600"></iconify-icon>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900">{{ $demoStats['upcoming'] }}</h3>
            <p class="text-sm text-gray-500">Upcoming Demos</p>
        </div>
        
        <!-- This Month -->
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center">
                    <iconify-icon icon="lucide:trending-up" class="text-2xl text-orange-600"></iconify-icon>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900">{{ $contactStats['this_month'] + $demoStats['this_month'] }}</h3>
            <p class="text-sm text-gray-500">Total This Month</p>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Recent Contacts -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-900">Recent Contacts</h2>
                <a href="{{ route('admin.contacts.index') }}" class="text-sm text-brand-600 hover:text-brand-700 font-medium">View All</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($recentContacts as $contact)
                <a href="{{ route('admin.contacts.show', $contact) }}" class="block p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-brand-100 rounded-full flex items-center justify-center text-brand-700 font-semibold">
                            {{ substr($contact->name, 0, 1) }}
                        </div>
                        <div class="flex-grow min-w-0">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-900">{{ $contact->name }}</span>
                                @if($contact->status === 'new')
                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-500">{{ $contact->company }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $contact->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </a>
                @empty
                <div class="p-8 text-center text-gray-400">
                    <iconify-icon icon="lucide:inbox" class="text-4xl mb-2"></iconify-icon>
                    <p>No contacts yet</p>
                </div>
                @endforelse
            </div>
        </div>
        
        <!-- Upcoming Demos -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-900">Upcoming Demos</h2>
                <a href="{{ route('admin.demos.index') }}" class="text-sm text-brand-600 hover:text-brand-700 font-medium">View All</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($upcomingDemos as $demo)
                <a href="{{ route('admin.demos.show', $demo) }}" class="block p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start gap-4">
                        <div class="text-center bg-brand-50 rounded-xl px-3 py-2 min-w-[60px]">
                            <span class="block text-xs text-brand-600 font-semibold">{{ $demo->preferred_date->format('M') }}</span>
                            <span class="block text-xl font-bold text-brand-900">{{ $demo->preferred_date->format('d') }}</span>
                        </div>
                        <div class="flex-grow min-w-0">
                            <span class="font-semibold text-gray-900">{{ $demo->company }}</span>
                            <p class="text-sm text-gray-500">{{ $demo->name }}</p>
                            <div class="flex items-center gap-2 mt-1">
                                <iconify-icon icon="lucide:clock" class="text-gray-400"></iconify-icon>
                                <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($demo->preferred_time)->format('g:i A') }}</span>
                                <span class="px-2 py-0.5 text-xs rounded-full {{ $demo->status === 'confirmed' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                    {{ ucfirst($demo->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="p-8 text-center text-gray-400">
                    <iconify-icon icon="lucide:calendar-x" class="text-4xl mb-2"></iconify-icon>
                    <p>No upcoming demos</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
