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
        ];

        foreach ($divisiones as $division) {
            Reportedivision::create($division);
        }
    }
}
