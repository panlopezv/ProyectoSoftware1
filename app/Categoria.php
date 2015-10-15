<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = 'categoria';
    protected $fillable = ['categoria']; 
    public function tema()
    {
        return $this->hasMany('tema');
    }
}
