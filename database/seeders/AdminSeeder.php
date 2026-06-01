<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\AdminEmail;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'support@iwelabi.com.ng')],
            [
                'name' => env('ADMIN_NAME', 'Admin User'),
                'password' => Hash::make(env('ADMIN_PASSWORD', 'changeme')),
            ]
        );

        // Create default admin email for notifications
        AdminEmail::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'support@iwelabi.com.ng')],
            [
                'name' => 'Admin',
                'receive_contacts' => true,
                'receive_demos' => true,
                'is_active' => true,
            ]
        );
    }
}
