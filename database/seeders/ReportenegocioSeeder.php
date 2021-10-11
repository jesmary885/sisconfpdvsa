<?php

namespace Database\Seeders;

use App\Models\Reportenegocio;
use Illuminate\Database\Seeder;

class ReportenegocioSeeder extends Seeder
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
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '1',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '2',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '3',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '4',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '5',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '6',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '7',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '8',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '9',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '10',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '11',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '12',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '13',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '14',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'negocio_id' => '15',
            ],
        ];

        foreach ($negocios as $negocio){
            Reportenegocio::create($negocio);
        }
    }
}
