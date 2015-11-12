<?php

use Illuminate\Database\Seeder;

class TablaTipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tipousuario')->insert([
	            'tipo' => 'Administrador',
	        ]);
    	DB::table('tipousuario')->insert([
	            'tipo' => 'Escritor',
	        ]);
    	DB::table('tipousuario')->insert([
	            'tipo' => 'Lector',
	        ]);
    }
}
