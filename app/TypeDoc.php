<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDoc extends Model
{
    protected $guarded = ['id'];

    public function documents(){
    	return $this->hasMany(Document::class, 'type_id');
    }
}
