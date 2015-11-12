<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Categoria.php - Clase para manejar la entidad Categoria de la base de datos.
 * @author panlopezv
 */
class Categoria extends Model
{
    protected $table = 'categoria';
    protected $fillable = ['categoria', 'ubicacionimagen']; 
    public function tema()
    {
        return $this->hasMany('tema');
    }
    public $timestamps = false;
}
