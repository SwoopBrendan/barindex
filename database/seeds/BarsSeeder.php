<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bars')->insert([
            'name' => 'Example Bar',
            'description' => 'Example bar Description',
            'email_address' => 'examplebar@email.com',
            'contact_number' => '0215310099',
            'address_line_1' => 'example address line 1',
            'address_line_2' => 'example address line 2',
            'province_id' => 9,
            'city_id' => 1,
            'bar_owner_id' => 2,
        ]);
    }
}
