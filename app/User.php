<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRoles(array $roles){
        foreach($roles as $role){
            foreach($this->roles as $userRole){
                if($userRole->name === $role)
                    return true;
            }
        }
        return false;
    }
    public function roles(){
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }
}
