<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(TablaCategoriaSeeder::class);
        $this->call(TablaPersonaSeeder::class);
        $this->call(TablaTipoUsuarioSeeder::class);
        $this->call(TablaUsuarioSeeder::class);

        Model::reguard();
    }
}
