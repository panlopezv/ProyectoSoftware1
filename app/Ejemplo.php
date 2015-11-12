<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Ejemplo.php - Clase para manejar la entidad Ejemplo de la base de datos.
 * @author panlopezv
 */
class Ejemplo extends Model
{
    protected $table = 'ejemplo';
    protected $fillable = ['titulo', 'descripcion', 'ubicacionarchivo', 'temaid'];
    public function tema()
    {
        return $this->belongsTo('tema', 'temaid');
    } 
    public $timestamps = false;
}
