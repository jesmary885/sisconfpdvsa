<?php

namespace Database\Seeders;

use App\Models\Negocio;
use Illuminate\Database\Seeder;

class NegocioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $negocios = [
            [
                'name' => 'SAN TOME',
                'division_id' => '3',
            ],
            [
                'name' => 'PETROPIAR',
                'division_id' => '3',
            ],
            [
                'name' => 'EEMM',
                'division_id' => '3',
            ],
            [
                'name' => 'MORICHAL',
                'division_id' => '4',
            ],
            [
                'name' => 'PETROMONAGAS',
                'division_id' => '4',
            ],
            [
                'name' => 'PETROSINOVENSA',
                'division_id' => '4',
            ],
            [
                'name' => 'PETRODELTA',
                'division_id' => '4',
            ],
            [
                'name' => 'PETROCEDEÑO',
                'division_id' => '1',
            ],
            [
                'name' => 'PETRO SAN FELIX',
                'division_id' => '1',
            ],
            [
                'name' => 'INDOVENEZOLANA',
                'division_id' => '1',
            ],
            [
                'name' => 'BARINAS',
                'division_id' => '2',
            ],
            [
                'name' => 'APURE',
                'division_id' => '2',
            ],
            [
                'name' => 'GUARICO',
                'division_id' => '3',
            ],
            [
                'name' => 'DISEÑO Y PROYECT',
                'division_id' => '5',
            ],
            [
                'name' => 'MEJORAMIENTO',
                'division_id' => '6',
            ],
        ];

        foreach ($negocios as $negocio){
            Negocio::create($negocio);
        }
    }
}
