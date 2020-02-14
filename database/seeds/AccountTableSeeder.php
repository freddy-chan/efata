<?php

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
        for($i=0;$i<3;$i++) {
            DB::table('accounts')->insert([
                'name' => 'account ' . $i,
                'orgId' => 1,
            ]);
        }
    }
}
