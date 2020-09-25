<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

	public function setPermissionsAttribute($value)
	{
	    $this->attributes['permissions'] = json_encode($value);
	}

	public function getPermissionsAttribute($value)
	{
	    return json_decode($value ? $value : '{}');
	}

	public function permalink()
	{
		return route('admin.roles.show', $this->id);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
