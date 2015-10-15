<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejemplo extends Model
{
    //
    protected $table = 'ejemplo';
    protected $fillable = ['titulo', 'descripcion', 'ubicacionarchivo', 'descargas'];
    public function tema()
    {
        return $this->belongsTo('tema', 'temaid');
    } 
}