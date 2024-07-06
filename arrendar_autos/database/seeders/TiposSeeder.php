<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos')->insert([
            ['tipo_vehiculo'=>'Moto','precio_tipo'=>'30000'],
            ['tipo_vehiculo'=>'Sedan','precio_tipo'=>'50000'],
        ]);
    }
}
