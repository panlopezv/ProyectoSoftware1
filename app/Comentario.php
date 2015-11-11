<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Comentario.php - Clase para manejar la entidad Comentario de la base de datos.
 * @author panlopezv
 */
class Comentario extends Model
{
    protected $table = 'comentario';
    protected $fillable = ['contenido', 'temaid', 'usuarioid'];
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
