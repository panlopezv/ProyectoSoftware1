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
	            'tipo' => 'administrador',
	        ]);
    	DB::table('tipousuario')->insert([
	            'tipo' => 'escritor',
	        ]);
    	DB::table('tipousuario')->insert([
	            'tipo' => 'lector',
	        ]);
    }
}
