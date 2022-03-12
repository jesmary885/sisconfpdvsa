<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Luis',
            'apellido' => 'Contreras',
            'indicador' => 'contrerasl',
            'email'=>'contrerasl@pdvsa.com',
            'cedula' => '19141589',
            'telefono' => '04141929280',
            'region_id' => '1',
            'division_id' => '1',
            'negocio_id' => '9',
            'password'=>bcrypt('19141589'),

        ])->assignRole('Admin');
    }
}
