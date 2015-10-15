<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = 'persona';
    protected $fillable = ['nombres', 'apellidos', 'fechanacimiento', 'ubicacionavatar', 'sexo'];
    public function usuario()
    {
        return $this->hasMany('usuario');
        //return $this->belongsTo('usuario', 'usuarioid');
    } 
}
