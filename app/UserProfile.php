<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $guarded = ['id'];

    public function users(){
    	return $this->hasMany(User::class, 'profile_id');
    }
}
