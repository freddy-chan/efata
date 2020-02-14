<?php

use Illuminate\Database\Seeder;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'name' => 'Organization 1',
            'address' => '212 Baker Street',
            'city' => 'London',
            'province' => 'Florida',
            'postalCode' => '12345',
            'country' => 'Indonesia',
        ]);
    }
}
