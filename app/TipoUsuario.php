<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    //
    protected $table = 'tipousuario';
    protected $fillable = ['tipo']; 
    public function usuario()
    {
        return $this->hasMany('usuario');
    }
    public $timestamps = false;
}
