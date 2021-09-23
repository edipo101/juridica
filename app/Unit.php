<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = ['id'];

    public function documents(){
    	return $this->hasMany(Document::class);
    }

    public function users(){
    	return $this->hasMany(User::class);
    }

    public function created_docs(){
    	return $this->hasMany(Document::class, 'created_unit');
    }

   	public function from_routes(){
   		return $this->hasMany(DocRoute::class, 'from_unit');
   	}

   	public function to_routes(){
   		return $this->hasMany(DocRoute::class, 'to_unit');
   	}
}
