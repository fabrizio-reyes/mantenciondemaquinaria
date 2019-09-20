<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *

         public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make('secret');
    }
     * @var array
     */
    protected $fillable = [
        'name' , 'email', 'password', 'avatar', 'apellidos', 'fech_de_nac', 'centrodesalud_codigo', 'telefono','rut'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //creamos la relación del usuario con el perfil
    public function perfiles(){

        return $this->belongsToMany(Perfil::Class, 'user_perfil');
    }

    public function hasPerfiles(array $perfiles){

        foreach ($perfiles as $perfil)
        {
            foreach ($this->perfiles  as $userPerfil) {
                if($userPerfil->nombre === $perfil){

                 return true;
            }      
        }    
        }
        return false;
    }

    public function isAdmin(){
        return $this->hasPerfiles(['admin']);  
    }

    public function isJss(){
        return $this->hasPerfiles(['jss']);  
    }

    public function isJsg(){
        return $this->hasPerfiles(['jsg']);  
    }



    public function centrodesalud(){
        return $this->belongsTo(CentroDeSalud::class);
    }
}
