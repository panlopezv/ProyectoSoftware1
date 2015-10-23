<?php
use Illuminate\Database\Seeder;

class TablaUsuarioSeeder extends Seeder {
    public function run()
    {
		DB::table('usuario')->insert([
	            'usuario' => 'panlopezv',
	            'correo' => 'panlopezv@gmail.com',
	            'contrasenya' => Hash::make('contrasenya'),
	            'personaid' => '1',
	            'tipousuarioid' => '1',
	        ]);
	}
}
