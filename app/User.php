<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function documents_created(){
        return $this->hasMany(Document::class, 'created_by');
    }

    public function to_routes(){
        return $this->hasMany(DocRoute::class, 'to_id');
    }

    public function from_routes(){
        return $this->hasMany(DocRoute::class, 'from_id');
    }

    public function profile(){
        return $this->belongsTo(UserProfile::class);   
    }

    public function getNewsAttribute(){
        $routes = DocRoute::where('to_id', $this->id)
        ->where('viewed', 0)->get();
        return $routes->count();
    }

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->first_surname;
    }

    public function documents_archived(){
        return $this->hasMany(Document::class, 'archived_user');
    }
}
