<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
    }
}
