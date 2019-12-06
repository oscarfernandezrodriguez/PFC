<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends  Authenticatable {
    use Notifiable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    protected $primaryKey = "id_usuario";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido1','apellido2', 'email', 'password','tipo_usuario_id'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id_usuario','password', 'remember_token'];
    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
}
