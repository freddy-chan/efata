<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create(['name' => 'Operasional', 'orgId' => 1]);
        Group::create(['name' => 'Perpuluhan', 'orgId' => 1]);
        Group::create(['name' => 'Pers. Umum', 'orgId' => 1]);
        Group::create(['name' => 'Diakonia', 'orgId' => 1]);
        Group::create(['name' => 'Misi', 'orgId' => 1]);
        Group::create(['name' => 'Pembangunan', 'orgId' => 1]);
        Group::create(['name' => 'PP/IT', 'orgId' => 1]);
        Group::create(['name' => 'Rocky', 'orgId' => 1]);
        Group::create(['name' => 'Rocket', 'orgId' => 1]);
        Group::create(['name' => 'KGC', 'orgId' => 1]);
        Group::create(['name' => 'Royal', 'orgId' => 1]);
        Group::create(['name' => 'MWM', 'orgId' => 1]);
        Group::create(['name' => 'Rockmen', 'orgId' => 1]);
        Group::create(['name' => 'Senior', 'orgId' => 1]);
    }
}
