<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ShoutBox;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(DefaultUserSeeder::class);
        User::factory(15)->create();
        Article::factory(500)->create();
        ShoutBox::factory(100)->create();
    }
}
