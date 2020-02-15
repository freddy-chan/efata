<?php

use App\Organization;
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
        Organization::create([
            'name' => 'Organization 1',
            'address' => '212 Baker Street',
            'city' => 'London',
            'province' => 'Florida',
            'postal_code' => '12345',
            'country' => 'Indonesia',
        ]);
    }
}
