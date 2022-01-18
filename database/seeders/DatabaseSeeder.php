<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => Str::random(10),
            'username' => Str::random(5),
            'is_admin' => 1,
            'phone' => '8534653743',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        \App\Models\Service::create([
            'name' => Str::random(15),
            'duration' => 20,
            'price' => 2000,
            'status' => 1
        ]);
    }
}
