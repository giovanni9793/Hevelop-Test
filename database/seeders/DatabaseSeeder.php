<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['email' => 'admin@admin.it', 'password' => Hash::make('password'), 'name' => 'Admin']);
        DB::table('categories')->insert([
            ['Nome' => 'Primi'],
            ['Nome' => 'Secondi'],
            ['Nome' => 'Contorni'],
            ['Nome' => 'Bevande']
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
