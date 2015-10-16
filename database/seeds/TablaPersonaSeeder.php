<?php

use App\Persona;
use Illuminate\Database\Seeder;

class TablaPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('persona')->insert([
	            'nombres' => 'Pablo Andres',
	            'apellidos' => 'Lopez Velasquez',
                'fechanacimiento' => '1993-10-02',
	            'sexo' => 'true',
	        ]);
        $nueva = new Persona;
        $nueva->nombres = 'M';
        $nueva->apellidos = 'A';
        $nueva->fechanacimiento = '1999-11-11';
        $nueva->sexo = 'true';
        $nueva->save();
    }
}
