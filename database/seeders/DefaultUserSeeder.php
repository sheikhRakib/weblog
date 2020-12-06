<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    public function run()
    {
        $rakib = User::create([
            'name'      => 'rakibul islam',
            'username'  => 'rakib',
            'email'     => 'rakib@mail.io',
            'password'  => Hash::make('12345'),
            'sex'       => 'Male',
            'location'  => 'Dhaka, BD', 
            'education' => 'AIUB',
        ]);
        $rakib->assignRole("user");

        $system = User::create([
            'name'      => 'weblog system',
            'username'  => 'system',
            'email'     => 'system@mail.io',
            'password'  => Hash::make('12345'),
        ]);
        $system->assignRole("watcher");

        $admin = User::create([
            'name'      => 'weblog admin',
            'username'  => 'admin',
            'email'     => 'admin@mail.io',
            'password'  => Hash::make('12345'),
        ]);
        $admin->assignRole("admin");

        $moderator = User::create([
            'name'      => 'weblog moderator',
            'username'  => 'moderator',
            'email'     => 'moderator@mail.io',
            'password'  => Hash::make('12345'),
        ]);
        $moderator->assignRole("moderator");

        $user = User::create([
            'name'      => 'general user',
            'username'  => 'user',
            'email'     => 'user@mail.io',
            'password'  => Hash::make('12345'),
        ]);
        $user->assignRole("user");
    }
}
