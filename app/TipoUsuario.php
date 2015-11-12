<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * TipoUsuario.php - Clase para manejar la entidad TipoUsuario de la base de datos.
 * @author panlopezv
 */
class TipoUsuario extends Model
{
    protected $table = 'tipousuario';
    protected $fillable = ['tipo']; 
    public function usuario()
    {
        return $this->hasMany('usuario');
    }
    public $timestamps = false;
}
