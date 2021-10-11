<?php

namespace Database\Seeders;

use App\Models\Reportedivision;
use Illuminate\Database\Seeder;

class ReportedivisionSeeder extends Seeder
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
                'real' => '0',
                'plan' => '0',
                'division_id' => '1',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'division_id' => '2',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'division_id' => '3',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'division_id' => '4',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'division_id' => '5',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'division_id' => '6',
            ],
            [
                'real' => '0',
                'plan' => '0',
                'division_id' => '7',
            ],
        ];

        foreach ($divisiones as $division) {
            Reportedivision::create($division);
        }
    }
}
