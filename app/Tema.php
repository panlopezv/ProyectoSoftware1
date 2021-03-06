<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Tema.php - Clase para manejar la entidad Tema de la base de datos.
 * @author panlopezv
 */
class Tema extends Model
{
    protected $table = 'tema';
    protected $fillable = ['titulo', 'contenido', 'fechapublicacion', 'referencia', 'visitas'];
    public function usuario()
    {
        return $this->belongsTo('usuario', 'usuarioid');
    }
    public function categoria()
    {
        return $this->belongsTo('categoria', 'categoriaid');
    }
    public function ejemplo()
    {
        return $this->hasMany('ejemplo');
    }
    public function comentario()
    {
        return $this->hasMany('comentario');
    }
    public $timestamps = false;
}
