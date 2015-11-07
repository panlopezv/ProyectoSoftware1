<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuario extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
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
    public $timestamps = false;
}
