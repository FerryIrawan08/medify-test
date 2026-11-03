<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'ferryfx08@gmail.com'],
            [
                'name' => 'Ferry Irawan',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
    }
}

