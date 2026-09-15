<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin Yanto
        User::updateOrCreate(
            ['email' => 'admin@admin'],
            [
                'name' => 'Admin Yanto',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ]
        );

        // 2. Store Staff
        User::updateOrCreate(
            ['email' => 'store@admin'],
            [
                'name' => 'Store Staff',
                'password' => Hash::make('store'),
                'role' => 'store',
            ]
        );

        // 3. Joshua Admin
        User::updateOrCreate(
            ['email' => 'joshua@admin'],
            [
                'name' => 'Joshua',
                'password' => Hash::make('joshuaNUG24'),
                'role' => 'admin',
            ]
        );

        // 4. Yanto Admin
        User::updateOrCreate(
            ['email' => 'yanto@admin'],
            [
                'name' => 'Yanto',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ]
        );

        // 5. Staff (Catalog Only)
        User::updateOrCreate(
            ['email' => 'admin@staff'],
            [
                'name' => 'Staff',
                'password' => Hash::make('admin'),
                'role' => 'staff',
            ]
        );
    }
}
