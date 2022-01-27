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
        \App\Models\User::create([
            'name' => 'admin',
            'username' => 'admin',
            'is_admin' => 1,
            'phone' => '8534653743',
            'email' => 'admin@yayuksalon.com',
            'password' => bcrypt('admin')
        ]);
    }
}



// \App\Models\User::factory(10)->create();
// \App\Models\Service::create([
//     'name' => Str::random(15),
//     'duration' => 20,
//     'price' => 2000,
//     'status' => 1
// ]);
