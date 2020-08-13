<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'user_type_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Bar Owner',
            'email' => 'barowner@email.com',
            'password' => Hash::make('password'),
            'user_type_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Customer',
            'email' => 'customer@email.com',
            'password' => Hash::make('password'),
            'user_type_id' => 5,
        ]);
    }
}
