<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Agunfon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#E8F2FF', 100: '#D1E5FF', 200: '#A3CBFF',
                            500: '#4B8BE8', 600: '#2563EB', 700: '#0F3D7A',
                            900: '#0A2647', 950: '#061629',
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-brand-900 to-brand-950 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2 mb-4">
                <div class="w-12 h-12 bg-brand-500 rounded-xl flex items-center justify-center text-white font-bold text-2xl">A</div>
            </div>
            <h1 class="text-3xl font-bold text-white">Agunfon Admin</h1>
            <p class="text-brand-200 mt-2">Sign in to manage your dashboard</p>
        </div>
        
        <div class="bg-white rounded-2xl p-8 shadow-2xl">
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 text-sm">
                {{ $errors->first() }}
            </div>
            @endif
            
            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 outline-none transition-all"
                        placeholder="admin@agunfon.com">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 outline-none transition-all"
                        placeholder="••••••••">
                </div>
                
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                        <span class="text-sm text-gray-600">Remember me</span>
                    </label>
                </div>
                
                <button type="submit" class="w-full py-3 bg-brand-700 text-white font-bold rounded-xl hover:bg-brand-900 transition-colors">
                    Sign In
                </button>
            </form>
        </div>
        
        <p class="text-center text-brand-300 text-sm mt-6">
            <a href="/" class="hover:text-white transition-colors">← Back to Website</a>
        </p>
    </div>
</body>
</html>
