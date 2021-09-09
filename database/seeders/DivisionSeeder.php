<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisiones = [
            [
                'name' => 'JUNIN',
                'region_id' => '3',
            ],
            [
                'name' => 'BOYACA',
                'region_id' => '1',
            ],
            [
                'name' => 'AYACUCHO',
                'region_id' => '1',
            ],
            [
                'name' => 'CARABOBO',
                'region_id' => '1',
            ],
            [
                'name' => 'DISEÑO Y PROYECTOS',
                'region_id' => '1',
            ],
            [
                'name' => 'MEJORAMIENTO',
                'region_id' => '1',
            ],
            [
                'name' => 'SUR DEL LAGO',
                'region_id' => '2',
            ],
        ];

        foreach ($divisiones as $division) {
            Division::create($division);
        }
    }
}
