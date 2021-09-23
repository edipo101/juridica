<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAdd extends Model
{
    protected $guarded = ['id'];

    public function documents(){
    	return $this->hasMany(Document::class, 'add_type_id');
    }
}
