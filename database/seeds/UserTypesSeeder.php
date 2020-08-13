<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Admin User',
        ]);

        DB::table('user_types')->insert([
            'name' => 'Bar Owner',
            'slug' => 'bar-owner',
            'description' => 'Bar Owner',
        ]);

        DB::table('user_types')->insert([
            'name' => 'Bar Manager',
            'slug' => 'bar-manager',
            'description' => 'Bar Manager',
        ]);

        DB::table('user_types')->insert([
            'name' => 'Bar Tender',
            'slug' => 'bar-tender',
            'description' => 'Bar Tender',
        ]);

        DB::table('user_types')->insert([
            'name' => 'Customer',
            'slug' => 'customer',
            'description' => 'Customer',
        ]);
    }
}
