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
            'name'=>'Jesmary',
            'apellido' => 'Carneiro',
            'indicador' => 'carneirojd',
            'email'=>'jesmary885@gmail.com',
            'cedula' => '18678549',
            'telefono' => '04141929280',
            'region_id' => '1',
            'division_id' => '2',
            'negocio_id' => '1',
            'password'=>bcrypt('123456789'),

        ])->assignRole('Admin');

        User::create([
            'name'=>'Luis',
            'apellido' => 'Contreras',
            'indicador' => 'contrerasl',
            'email'=>'contrerasl@pdvsa.com',
            'cedula' => '17777777',
            'telefono' => '04141929280',
            'region_id' => '1',
            'division_id' => '2',
            'negocio_id' => '1',
            'password'=>bcrypt('123456789'),

        ])->assignRole('Admin');

        User::create([
            'name'=>'Jillmery',
            'apellido'=>'Carneiro',
            'indicador' => 'carneiroji',
            'email'=>'jillmery885@gmail.com',
            'cedula' => '18111333',
            'telefono' => '04145589632',
            'region_id' => '2',
            'division_id' => '1',
            'negocio_id' => '2',
            'password'=>bcrypt('123456789')

        ])->assignRole('Analista');
    }
}
