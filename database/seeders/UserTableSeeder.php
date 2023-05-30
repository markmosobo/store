<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'first_name' => 'Global',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'phone' => '0700000000',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'id' => 2,
            'first_name' => 'Organization',
            'last_name' => 'User',
            'email' => 'user@user.com',
            'role' => 'user',
            'phone' => '0710000000',
            'password' => Hash::make('123456')
        ]);

    }
}
