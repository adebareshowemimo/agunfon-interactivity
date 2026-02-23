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
            ['email' => 'admin@agunfon.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123'),
            ]
        );

        // Create default admin email for notifications
        AdminEmail::updateOrCreate(
            ['email' => 'admin@agunfon.com'],
            [
                'name' => 'Admin',
                'receive_contacts' => true,
                'receive_demos' => true,
                'is_active' => true,
            ]
        );
    }
}
