<?php

namespace Database\Seeders;

use App\Models\Anoreporte;
use Illuminate\Database\Seeder;

class AnoreporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anos = [
            [
                'ano' => '2020',
            ],
            [
                'ano' => '2021',
            ],
            [
                'ano' => '2022',
            ],
            [
                'ano' => '2023',
            ],
            [
                'ano' => '2024',
            ],
            [
                'ano' => '2025',
            ],
            [
                'ano' => '2026',
            ],
            [
                'ano' => '2027',
            ],
            [
                'ano' => '2028',
            ],
            [
                'ano' => '2029',
            ],
            [
                'ano' => '2030',
            ],
           
        ];

        foreach ($anos as $ano){
            Anoreporte::create($ano);
        }
    }
}
