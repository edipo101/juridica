<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocStatus extends Model
{
    protected $guarded = ['id'];

    public function documents(){
    	return $this->hasMany(Document::class, 'status_id');
    }
}
