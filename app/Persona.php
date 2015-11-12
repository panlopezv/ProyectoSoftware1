<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Persona.php - Clase para manejar la entidad Persona de la base de datos.
 * @author panlopezv
 */
class Persona extends Model
{
    protected $table = 'persona';
    protected $fillable = ['nombres', 'apellidos', 'fechanacimiento', 'ubicacionavatar', 'sexo'];
    public function usuario()
    {
        return $this->hasMany('usuario');
    } 
    public $timestamps = false;
}
