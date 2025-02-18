<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'name' => 'Admin',
                'email' => 'BookForYou@gmail.com',
                'phone' => '9800000000', 
                'address' => 'Admin Address',
                'college' => 'Admin College',
                'faculty' => 'Admin Faculty',
                'password' => Hash::make('AdminPassword'), // Encrypting the password
                'role' => 'admin', 
            ]
        );
    }
}
