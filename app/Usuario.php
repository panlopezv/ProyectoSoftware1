<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table = 'usuario';
    protected $fillable = ['usuario', 'correo', 'contrasenya']; 
    public function persona()
    {
        return $this->belongsTo('persona', 'personaid');
    }
    public function tipopersona()
    {
        return $this->belongsTo('tipopersona', 'tipopersonaid');
    }
    public function tema()
    {
        return $this->hasMany('tema');
    }
    public function comentario()
    {
        return $this->hasMany('comentario');
    }
}
