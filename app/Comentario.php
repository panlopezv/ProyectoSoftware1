<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected $table = 'comentario';
    protected $fillable = ['contenido', 'fecha'];
    public function tema()
    {
        return $this->belongsTo('tema', 'temaid');
    } 
    public function usuario()
    {
        return $this->belongsTo('usuario', 'usuarioid');
    } 
    public $timestamps = false;
}
