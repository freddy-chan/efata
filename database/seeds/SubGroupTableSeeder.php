<?php

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
        $subGroupData = [
            'name' => 'PK, KU', 'parentGroupId' => 1,
            'name' => 'Kep. Kantor', 'parentGroupId' => 1,
            'name' => 'Kep. Rumah Tangga', 'parentGroupId' => 1,
            'name' => 'Hospitality', 'parentGroupId' => 1,
            'name' => 'Lain-lain Ops', 'parentGroupId' => 1,
            'name' => 'Psp Tunai', 'parentGroupId' => 2,
            'name' => 'Psp BG/Cek', 'parentGroupId' => 2,
            'name' => 'Psp Transfer', 'parentGroupId' => 2,
            'name' => 'Umum Raya', 'parentGroupId' => 3,
            'name' => 'Umum MS', 'parentGroupId' => 3,
            'name' => 'Umum ES', 'parentGroupId' => 3,
            'name' => 'Umum ES', 'parentGroupId' => 3,
            'name' => 'Lain-lain Diakonia', 'parentGroupId' => 4,
            'name' => 'Lain-lain Misi', 'parentGroupId' => 5,
            'name' => 'Lain-lain Pembangunan', 'parentGroupId' => 6,
            'name' => 'PK PP/IT', 'parentGroupId' => 7,
            'name' => 'Lain-lain PP/IT', 'parentGroupId' => 7,
            'name' => 'Pers. Umum Rocky', 'parentGroupId' => 8,
            'name' => 'PK Rocky', 'parentGroupId' => 8,
            'name' => 'Lain-lain Rocky', 'parentGroupId' => 8,
            'name' => 'Pers. Umum Rocket', 'parentGroupId' => 9,
            'name' => 'PK Rocket', 'parentGroupId' => 9,
            'name' => 'Lain-lain Rocket', 'parentGroupId' => 9,
            'name' => 'Pers. Umum KGC', 'parentGroupId' => 10,
            'name' => 'PK KGC', 'parentGroupId' => 10,
            'name' => 'Lain-lain KGC', 'parentGroupId' => 10,
            'name' => 'Pers. Umum Royal', 'parentGroupId' => 11,
            'name' => 'PK Royal', 'parentGroupId' => 11,
            'name' => 'Lain-lain Royal', 'parentGroupId' => 11,
            'name' => 'Pers. Umum MWM', 'parentGroupId' => 12,
            'name' => 'PK MWM', 'parentGroupId' => 12,
            'name' => 'Lain-lain MWM', 'parentGroupId' => 12,
            'name' => 'Pers. Umum Rockmen', 'parentGroupId' => 13,
            'name' => 'PK Rockmen', 'parentGroupId' => 13,
            'name' => 'Lain-lain Rockmen', 'parentGroupId' => 13,
            'name' => 'Pers. Umum Senior', 'parentGroupId' => 14,
            'name' => 'PK Senior', 'parentGroupId' => 14,
            'name' => 'Lain-lain Senior', 'parentGroupId' => 14,
        ];
    }
}
