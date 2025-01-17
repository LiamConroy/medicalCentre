<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctor(){
        return $this->hasOne('App\Models\Doctor');
    }



    public function roles(){
        return $this->belongsToMany('App\Models\Role', 'user_role');
    }

    public function authorizeRoles($roles){
        if(is_array($roles)){
            return $this->hasRole($roles); 
        }

        return $this->hasRole($roles);
    }

    public function hasAnyRole($roles){
        return null !== $this->roles()->whereIn('name', $role)->first();
    }

    public function hasRole($role){
        return null !== $this->roles()->where('name', $role)->first();
    }

}
