<?php

use App\SubGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubGroup::create(['name' => 'PK, KU', 'parentGroupId' => 1, 'orgId' => 1]);
        SubGroup::create(['name' => 'Kep. Kantor', 'parentGroupId' => 1, 'orgId' => 1]);
        SubGroup::create(['name' => 'Kep. Rumah Tangga', 'parentGroupId' => 1, 'orgId' => 1]);
        SubGroup::create(['name' => 'Hospitality', 'parentGroupId' => 1, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain Ops', 'parentGroupId' => 1, 'orgId' => 1]);
        SubGroup::create(['name' => 'Psp Tunai', 'parentGroupId' => 2, 'orgId' => 1]);
        SubGroup::create(['name' => 'Psp BG/Cek', 'parentGroupId' => 2, 'orgId' => 1]);
        SubGroup::create(['name' => 'Psp Transfer', 'parentGroupId' => 2, 'orgId' => 1]);
        SubGroup::create(['name' => 'Umum Raya', 'parentGroupId' => 3, 'orgId' => 1]);
        SubGroup::create(['name' => 'Umum MS', 'parentGroupId' => 3, 'orgId' => 1]);
        SubGroup::create(['name' => 'Umum ES', 'parentGroupId' => 3, 'orgId' => 1]);
        SubGroup::create(['name' => 'Umum ES', 'parentGroupId' => 3, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain Diakonia', 'parentGroupId' => 4, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain Misi', 'parentGroupId' => 5, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain Pembangunan', 'parentGroupId' => 6, 'orgId' => 1]);
        SubGroup::create(['name' => 'PK PP/IT', 'parentGroupId' => 7, 'orgId' => 1, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain PP/IT', 'parentGroupId' => 7, 'orgId' => 1]);
        SubGroup::create(['name' => 'Pers. Umum Rocky', 'parentGroupId' => 8, 'orgId' => 1]);
        SubGroup::create(['name' => 'PK Rocky', 'parentGroupId' => 8, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain Rocky', 'parentGroupId' => 8, 'orgId' => 1]);
        SubGroup::create(['name' => 'Pers. Umum Rocket', 'parentGroupId' => 9, 'orgId' => 1]);
        SubGroup::create(['name' => 'PK Rocket', 'parentGroupId' => 9, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain Rocket', 'parentGroupId' => 9, 'orgId' => 1]);
        SubGroup::create(['name' => 'Pers. Umum KGC', 'parentGroupId' => 10, 'orgId' => 1]);
        SubGroup::create(['name' => 'PK KGC', 'parentGroupId' => 10, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain KGC', 'parentGroupId' => 10, 'orgId' => 1]);
        SubGroup::create(['name' => 'Pers. Umum Royal', 'parentGroupId' => 11, 'orgId' => 1]);
        SubGroup::create(['name' => 'PK Royal', 'parentGroupId' => 11, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain Royal', 'parentGroupId' => 11, 'orgId' => 1]);
        SubGroup::create(['name' => 'Pers. Umum MWM', 'parentGroupId' => 12, 'orgId' => 1]);
        SubGroup::create(['name' => 'PK MWM', 'parentGroupId' => 12, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain MWM', 'parentGroupId' => 12, 'orgId' => 1]);
        SubGroup::create(['name' => 'Pers. Umum Rockmen', 'parentGroupId' => 13, 'orgId' => 1]);
        SubGroup::create(['name' => 'PK Rockmen', 'parentGroupId' => 13, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain Rockmen', 'parentGroupId' => 13, 'orgId' => 1]);
        SubGroup::create(['name' => 'Pers. Umum Senior', 'parentGroupId' => 14, 'orgId' => 1]);
        SubGroup::create(['name' => 'PK Senior', 'parentGroupId' => 14, 'orgId' => 1]);
        SubGroup::create(['name' => 'Lain-lain Senior', 'parentGroupId' => 14, 'orgId' => 1]);
    }
}
