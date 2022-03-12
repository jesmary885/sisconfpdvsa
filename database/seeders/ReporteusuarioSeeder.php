<?php

namespace Database\Seeders;

use App\Models\Reporteusuario;
use Illuminate\Database\Seeder;

class ReporteusuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            [
                'real' => '0',
                'plan' => '0',
                'user_id' => '1',
            ],
           
        ];

        foreach ($usuarios as $usuario) {
            Reporteusuario::create($usuario);
        }
    }
}
