<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'atmin@scituinsk.com';
        $avatarHash = md5(strtolower(trim($email)));
        $avatarUrl = "https://www.gravatar.com/avatar/{$avatarHash}?d=retro&s=300";

        $initialUsers = [
            [
                'name' => 'Atmin SCIT',
                'email' => $email,
                'password' => Hash::make('12345678'),
                'avatar' => $avatarUrl,
                'role' => 'SUPER_ADMIN',
            ],
        ];
        foreach ($initialUsers as $userData) {
            User::create($userData);
        }
    }
}
