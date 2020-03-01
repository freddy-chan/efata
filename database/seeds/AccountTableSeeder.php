<?php

use App\Account;
use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create(['name' => 'BCA 8006', 'orgId' => 1]);
        Account::create(['name' => 'BCA 8600', 'orgId' => 1]);
        Account::create(['name' => 'Kas Kecil Rocky', 'orgId' => 1]);
        Account::create(['name' => 'Kas Kecil Rocket', 'orgId' => 1]);
        Account::create(['name' => 'Kas Kecil MWM', 'orgId' => 1]);
        Account::create(['name' => 'Kas Kecil KGC', 'orgId' => 1]);
        Account::create(['name' => 'Kas Kecil PW/IT', 'orgId' => 1]);
        Account::create(['name' => 'Kas Kecil Konsumsi', 'orgId' => 1]);
    }
}
