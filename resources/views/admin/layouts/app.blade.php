<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - Agunfon Admin</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#E8F2FF',
                            100: '#D1E5FF',
                            200: '#A3CBFF',
                            500: '#4B8BE8',
                            600: '#2563EB',
                            700: '#0F3D7A',
                            900: '#0A2647',
                            950: '#061629',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Iconify -->
    <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    
    <style>
        .sidebar-link { @apply flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-brand-700/50 hover:text-white rounded-lg transition-all; }
        .sidebar-link.active { @apply bg-brand-600 text-white; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-brand-900 min-h-screen fixed left-0 top-0 z-50">
            <div class="p-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-brand-500 rounded-lg flex items-center justify-center text-white font-bold text-xl">A</div>
                    <div>
                        <span class="text-white font-bold text-xl">Agunfon</span>
                        <span class="block text-xs text-brand-200">Admin Panel</span>
                    </div>
                </a>
            </div>
            
            <nav class="px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <iconify-icon icon="lucide:layout-dashboard" class="text-xl"></iconify-icon>
                    Dashboard
                </a>
                
                <div class="pt-6 pb-2">
                    <span class="px-4 text-xs font-semibold text-brand-200 uppercase tracking-wider">Submissions</span>
                </div>
                
                <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <iconify-icon icon="lucide:mail" class="text-xl"></iconify-icon>
                    Contact Requests
                    @if(App\Models\Contact::new()->count() > 0)
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">{{ App\Models\Contact::new()->count() }}</span>
                    @endif
                </a>
                
                <a href="{{ route('admin.demos.index') }}" class="sidebar-link {{ request()->routeIs('admin.demos.*') ? 'active' : '' }}">
                    <iconify-icon icon="lucide:calendar" class="text-xl"></iconify-icon>
                    Demo Requests
                    @if(App\Models\DemoRequest::pending()->count() > 0)
                    <span class="ml-auto bg-orange-500 text-white text-xs px-2 py-0.5 rounded-full">{{ App\Models\DemoRequest::pending()->count() }}</span>
                    @endif
                </a>
                
                <div class="pt-6 pb-2">
                    <span class="px-4 text-xs font-semibold text-brand-200 uppercase tracking-wider">Settings</span>
                </div>
                
                <a href="{{ route('admin.emails.index') }}" class="sidebar-link {{ request()->routeIs('admin.emails.*') ? 'active' : '' }}">
                    <iconify-icon icon="lucide:settings" class="text-xl"></iconify-icon>
                    Admin Emails
                </a>
            </nav>
            
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-brand-700">
                <div class="flex items-center gap-3 px-4 py-2">
                    <div class="w-8 h-8 bg-brand-600 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="flex-grow">
                        <span class="text-white text-sm font-medium block">{{ Auth::user()->name ?? 'Admin' }}</span>
                        <span class="text-brand-300 text-xs">Administrator</span>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="text-brand-300 hover:text-white transition-colors">
                            <iconify-icon icon="lucide:log-out" class="text-xl"></iconify-icon>
                        </button>
                    </form>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-grow ml-64 min-h-screen">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 px-8 py-4 sticky top-0 z-40">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-brand-900">@yield('page-title', 'Dashboard')</h1>
                    <div class="flex items-center gap-4">
                        <a href="{{ url('/') }}" target="_blank" class="text-sm text-gray-500 hover:text-brand-600 flex items-center gap-1">
                            <iconify-icon icon="lucide:external-link" class="text-lg"></iconify-icon>
                            View Site
                        </a>
                    </div>
                </div>
            </header>
            
            <!-- Flash Messages -->
            @if(session('success'))
            <div class="mx-8 mt-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center gap-2">
                <iconify-icon icon="lucide:check-circle" class="text-xl"></iconify-icon>
                {{ session('success') }}
            </div>
            @endif
            
            @if(session('error'))
            <div class="mx-8 mt-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center gap-2">
                <iconify-icon icon="lucide:alert-circle" class="text-xl"></iconify-icon>
                {{ session('error') }}
            </div>
            @endif
            
            <!-- Page Content -->
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
