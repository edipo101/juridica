<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocRoute extends Model
{
    protected $guarded = ['id'];

    public function document(){
    	return $this->belongsTo(Document::class);
    }

    public function user_from(){
    	return $this->belongsTo(User::class, 'from_id');	
    }

    public function user_to(){
        return $this->belongsTo(User::class, 'to_id');   
    }

    public function unit_from(){
    	return $this->belongsTo(Unit::class, 'from_unit');	
    }

    public function unit_to(){
        return $this->belongsTo(Unit::class, 'to_unit');   
    }

    public function getDetailsMessageAttribute(){
		return 
		'De: <strong>'.$this->from->username."</strong></br>".
		$this->message."</br>".
		$this->created_at->format('d/m/Y');
	}
}
