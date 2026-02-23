@extends('admin.layouts.app')

@section('title', 'Email Settings')
@section('page-title', 'Notification Emails')

@section('content')
<div class="max-w-4xl space-y-6">
    <!-- Add New Email -->
    <div class="bg-white rounded-2xl border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-brand-900 mb-4">Add Notification Email</h3>
        <form method="POST" action="{{ route('admin.emails.store') }}" class="space-y-4">
            @csrf
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" required placeholder="Admin Name"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-500 outline-none @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" required placeholder="admin@example.com"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-500 outline-none @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="receive_contacts" value="1" checked class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                    <span class="text-sm text-gray-700">Receive Contact Form Notifications</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="receive_demos" value="1" checked class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                    <span class="text-sm text-gray-700">Receive Demo Request Notifications</span>
                </label>
            </div>
            <button type="submit" class="px-6 py-3 bg-brand-700 text-white rounded-xl hover:bg-brand-900 transition-colors font-semibold inline-flex items-center gap-2">
                <iconify-icon icon="lucide:plus"></iconify-icon>
                Add Email
            </button>
        </form>
    </div>

    <!-- Emails List -->
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-lg font-bold text-brand-900">Active Notification Emails</h3>
            <p class="text-sm text-gray-500">These emails will receive notifications when forms are submitted.</p>
        </div>

        <div class="divide-y divide-gray-50">
            @forelse($emails as $email)
            <div class="p-6 flex items-center gap-4 hover:bg-gray-50/50 transition-colors">
                <div class="w-12 h-12 bg-brand-100 rounded-xl flex items-center justify-center text-brand-700 font-bold">
                    {{ substr($email->name, 0, 1) }}
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-gray-900">{{ $email->name }}</p>
                    <p class="text-sm text-gray-500">{{ $email->email }}</p>
                    <div class="flex gap-2 mt-1">
                        @if($email->receive_contacts)
                        <span class="px-2 py-0.5 text-xs rounded-full bg-blue-100 text-blue-700">Contacts</span>
                        @endif
                        @if($email->receive_demos)
                        <span class="px-2 py-0.5 text-xs rounded-full bg-green-100 text-green-700">Demos</span>
                        @endif
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <!-- Toggle Active -->
                    <form method="POST" action="{{ route('admin.emails.toggle', $email) }}">
                        @csrf @method('PATCH')
                        <button type="submit" class="p-2 rounded-lg transition-colors {{ $email->is_active ? 'text-green-600 hover:bg-green-50' : 'text-gray-400 hover:bg-gray-100' }}" title="{{ $email->is_active ? 'Active (click to disable)' : 'Inactive (click to enable)' }}">
                            <iconify-icon icon="{{ $email->is_active ? 'lucide:toggle-right' : 'lucide:toggle-left' }}" class="text-2xl"></iconify-icon>
                        </button>
                    </form>
                    
                    <!-- Edit Modal Trigger -->
                    <button onclick="openEditModal({{ $email->id }}, '{{ $email->name }}', '{{ $email->email }}', {{ $email->receive_contacts ? 'true' : 'false' }}, {{ $email->receive_demos ? 'true' : 'false' }})" class="p-2 text-brand-600 hover:bg-brand-50 rounded-lg transition-colors" title="Edit">
                        <iconify-icon icon="lucide:edit"></iconify-icon>
                    </button>
                    
                    <!-- Delete -->
                    <form method="POST" action="{{ route('admin.emails.destroy', $email) }}" onsubmit="return confirm('Remove this email from notifications?')">
                        @csrf @method('DELETE')
                        <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                            <iconify-icon icon="lucide:trash-2"></iconify-icon>
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="p-12 text-center text-gray-500">
                <iconify-icon icon="lucide:mail-x" class="text-4xl mb-2 text-gray-300"></iconify-icon>
                <p>No notification emails configured yet.</p>
                <p class="text-sm">Add an email above to start receiving form notifications.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-6 w-full max-w-md mx-4">
        <h3 class="text-lg font-bold text-brand-900 mb-4">Edit Notification Email</h3>
        <form id="editForm" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" id="editName" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="editEmail" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-500 outline-none">
            </div>
            <div class="flex gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="editContacts" name="receive_contacts" value="1" class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                    <span class="text-sm text-gray-700">Contact Notifications</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="editDemos" name="receive_demos" value="1" class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                    <span class="text-sm text-gray-700">Demo Notifications</span>
                </label>
            </div>
            <div class="flex gap-4 pt-4">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-3 border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors font-semibold">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-brand-700 text-white rounded-xl hover:bg-brand-900 transition-colors font-semibold">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(id, name, email, contacts, demos) {
    document.getElementById('editForm').action = '/admin/emails/' + id;
    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
    document.getElementById('editContacts').checked = contacts;
    document.getElementById('editDemos').checked = demos;
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
}

document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) closeEditModal();
});
</script>
@endsection
