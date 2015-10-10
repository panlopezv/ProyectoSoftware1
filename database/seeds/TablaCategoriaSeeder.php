<?php

use Illuminate\Database\Seeder;

class TablaCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('categoria')->insert([
	            'categoria' => 'Listas',
	        ]);
    	DB::table('categoria')->insert([
	            'categoria' => 'Arreglos',
	        ]);
    }
}
