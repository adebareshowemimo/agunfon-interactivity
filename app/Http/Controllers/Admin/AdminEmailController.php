<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminEmail;
use Illuminate\Http\Request;

class AdminEmailController extends Controller
{
    public function index()
    {
        $adminEmails = AdminEmail::latest()->paginate(15);

        return view('admin.settings.emails', compact('adminEmails'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_emails,email',
            'receive_contacts' => 'boolean',
            'receive_demos' => 'boolean',
        ]);

        AdminEmail::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'receive_contacts' => $request->boolean('receive_contacts', true),
            'receive_demos' => $request->boolean('receive_demos', true),
        ]);

        return redirect()->back()->with('success', 'Admin email added successfully.');
    }

    public function update(Request $request, AdminEmail $adminEmail)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_emails,email,' . $adminEmail->id,
            'receive_contacts' => 'boolean',
            'receive_demos' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $adminEmail->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'receive_contacts' => $request->boolean('receive_contacts'),
            'receive_demos' => $request->boolean('receive_demos'),
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->back()->with('success', 'Admin email updated successfully.');
    }

    public function destroy(AdminEmail $adminEmail)
    {
        $adminEmail->delete();

        return redirect()->back()->with('success', 'Admin email deleted successfully.');
    }

    public function toggleActive(AdminEmail $adminEmail)
    {
        $adminEmail->update(['is_active' => !$adminEmail->is_active]);

        $status = $adminEmail->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Admin email {$status} successfully.");
    }
}
