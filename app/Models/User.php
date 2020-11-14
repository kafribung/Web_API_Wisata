<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use function PHPUnit\Framework\returnSelf;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // 
    public function getRouteKeyName()
    {
        return 'email';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'img',
        'role',
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
  
    
    // Mutaror
    public function getTakeImgAttribute()
    {
        return url('storage',  $this->img);
    }

    // King
    public function king()
    {
        return auth()->user()->email == 'kafri@kafri.com' ? true : false;
    }

    // IsAdmin
    public function isAdmin() 
    {
        return $this->email == "kafri@kafri.com";
    }

    // Relation one to many
    public function travels()
    {
        return $this->hasMany('App\Models\Travel');
    }
}
