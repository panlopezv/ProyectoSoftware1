<?php

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
    }
}
