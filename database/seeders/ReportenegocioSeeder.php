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
        ];

        foreach ($negocios as $negocio){
            Reportenegocio::create($negocio);
        }
    }
}
