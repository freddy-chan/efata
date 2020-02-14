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
        $groupData = [
            ['name' => 'Operasional', 'orgId' => 1],
            ['name' => 'Perpuluhan', 'orgId' => 1],
            ['name' => 'Pers. Umum', 'orgId' => 1],
            ['name' => 'Diakonia', 'orgId' => 1],
            ['name' => 'PP/IT', 'orgId' => 1],
            ['name' => 'Rocky', 'orgId' => 1],
            ['name' => 'Rocket', 'orgId' => 1],
            ['name' => 'KGC', 'orgId' => 1],
            ['name' => 'Royal', 'orgId' => 1],
            ['name' => 'MWM', 'orgId' => 1],
            ['name' => 'Rockmen', 'orgId' => 1],
            ['name' => 'Senior', 'orgId' => 1],
        ];

        Group::create($groupData);
    }
}
