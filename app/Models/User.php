<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'image',
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

    public function setPasswordAttribute($value)
    {
        Hash::needsRehash($value) && $this->attributes['password'] = Hash::make($value);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Check User has any role
     * 
     * @param  str  $roles
     * @return boolean
     */
    public function hasRole($role)
    {
        if ($this->role) {
            return $this->role->slug === $role;
        }
        return false;
    }

    /**
     * Check user has the given permission
     * 
     * @param  string $ability
     * @return boolean
     */
    public function hasPermission($ability)
    {
        if ($this->role && $this->role->permissions) {
        	return (bool) in_array($ability, $this->role->permissions);
        }
        return false;
    }

    /**
     * Check User can access backend
     * 
     * @return boolean
     */
    public function canAccessAdmin()
    {
        if ($this->role) {
            return (bool) $this->role->slug !== 'user';
        }
        return false;
    }
}
