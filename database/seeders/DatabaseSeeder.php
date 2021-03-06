<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'toko.amel@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('categories')->insert([
            'name' => 'category-1'
        ]);

        $this->call(ItemSeeder::class);
    }
}
