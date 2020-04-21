<?php

use Illuminate\Database\Seeder;
use App\Apoderado;
use App\Prospecto;
use App\Postulacion;

class cargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $faker = \Faker\Factory::create();
           
        for($i=0; $i< 20 ;$i++){
                $user =   factory(App\User::class)->create();
                $apoderado = Apoderado::firstOrCreate([
                    'rut_apoderado' => $faker->randomNumber(8), 
                    'nombre'=>$faker->name, 
                    'apellidop' =>$faker->name, 
                    'apellidom' => $faker->name,
                    'direccion'=> $faker->address,
                    'nacionalidad_id' => 1, 
                    'telefono' =>$faker->randomNumber(6),
                    'apoderado_user' => $user->id
                ]);
                $prspecto = Prospecto::firstOrCreate([
                    'nombre'=>$faker->name, 
                    'apellidop' =>$faker->name, 
                    'apellidom' => $faker->name, 
                    'rut_alumno' => $faker->randomNumber(8),
                    'direccion'=> $faker->address,
                    'sexo' => 'M',
                    'fechanac' =>$faker->date,
                    'nacionalidad_id' => 1,
                    'apoderado_id' =>$apoderado->id
                ]);
                $cursos= [
                    '1B',
                    '2B',
                    '3B',
                    '4B',
                    '5B',
                    '6B',
                    '7B',
                    '8B'
                ];
                $postulacion = Postulacion::firstOrCreate([
                    'postulacion_id'=> $apoderado->id,
                    'rut_alumno'=> $prspecto->rut_alumno, 
                    'notapresentacion' => $faker->numberBetween(10,70),
                    'notaexamen'=> $faker->numberBetween(10,70),
                    'notaporcsocial'=> $faker->numberBetween(10,100),
                    'archnota' => '_',
                    'archnota_ruta' => '_',
                    'archsocial' => '_',
                    'archsocial_ruta' => '_',
                    'archinfoperso'=>'_',
                    'archinfoperso_ruta' => '_',
                    'totalizado' => $faker->numberBetween(10,70),
                    'curso' =>$cursos[$faker->numberBetween(0,7)],
                ]);

        }

    }
}
