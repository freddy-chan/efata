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
        $subGroupData = [
            ['name' => 'PK, KU', 'parentGroupId' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kep. Kantor', 'parentGroupId' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kep. Rumah Tangga', 'parentGroupId' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hospitality', 'parentGroupId' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain Ops', 'parentGroupId' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Psp Tunai', 'parentGroupId' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Psp BG/Cek', 'parentGroupId' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Psp Transfer', 'parentGroupId' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Umum Raya', 'parentGroupId' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Umum MS', 'parentGroupId' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Umum ES', 'parentGroupId' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Umum ES', 'parentGroupId' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain Diakonia', 'parentGroupId' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain Misi', 'parentGroupId' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain Pembangunan', 'parentGroupId' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'PK PP/IT', 'parentGroupId' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain PP/IT', 'parentGroupId' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pers. Umum Rocky', 'parentGroupId' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'PK Rocky', 'parentGroupId' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain Rocky', 'parentGroupId' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pers. Umum Rocket', 'parentGroupId' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'PK Rocket', 'parentGroupId' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain Rocket', 'parentGroupId' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pers. Umum KGC', 'parentGroupId' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'PK KGC', 'parentGroupId' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain KGC', 'parentGroupId' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pers. Umum Royal', 'parentGroupId' => 11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'PK Royal', 'parentGroupId' => 11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain Royal', 'parentGroupId' => 11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pers. Umum MWM', 'parentGroupId' => 12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'PK MWM', 'parentGroupId' => 12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain MWM', 'parentGroupId' => 12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pers. Umum Rockmen', 'parentGroupId' => 13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'PK Rockmen', 'parentGroupId' => 13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain Rockmen', 'parentGroupId' => 13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pers. Umum Senior', 'parentGroupId' => 14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'PK Senior', 'parentGroupId' => 14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain Senior', 'parentGroupId' => 14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        SubGroup::insert($subGroupData);
    }
}
