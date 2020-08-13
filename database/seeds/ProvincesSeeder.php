<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            'name' => 'Eastern Cape',
            'slug' => 'eastern-cape',
        ]);

        DB::table('provinces')->insert([
            'name' => 'Free State',
            'slug' => 'free-state',
        ]);

        DB::table('provinces')->insert([
            'name' => 'Gauteng',
            'slug' => 'gauteng',
        ]);

        DB::table('provinces')->insert([
            'name' => 'KwaZulu-Natal',
            'slug' => 'kwazulu-natal',
        ]);

        DB::table('provinces')->insert([
            'name' => 'Limpopo',
            'slug' => 'limpopo',
        ]);

        DB::table('provinces')->insert([
            'name' => 'Mpumalanga',
            'slug' => 'mpumalanga',
        ]);

        DB::table('provinces')->insert([
            'name' => 'North West',
            'slug' => 'north-west',
        ]);

        DB::table('provinces')->insert([
            'name' => 'Northern Cape',
            'slug' => 'northern-cape',
        ]);

        DB::table('provinces')->insert([
            'name' => 'Western Cape',
            'slug' => 'western-cape',
        ]);
    }
}
