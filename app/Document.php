<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = ['id'];

	public function unit(){
		return $this->belongsTo(Unit::class);
	}

	public function status(){
		return $this->belongsTo(DocStatus::class);
	}

	public function type(){
		return $this->belongsTo(TypeDoc::class);
	}

	public function routes(){
		return $this->hasMany(DocRoute::class);
	}

	public function type_add(){
		return $this->belongsTo(TypeAdd::class, 'add_type_id');
	}

	public function user_created(){
		return $this->belongsTo(User::class, 'created_by');
	}

	public function unit_created(){
		return $this->belongsTo(Unit::class, 'created_unit');
	}	

	public function getDetailsAttribute(){
		$applicant = is_null($this->unit) ? $this->applicant : Str::limit($this->unit->name, 35);
		$date = Carbon::parse($this->date)->format('d/m/Y H:i');
		$reference = Str::limit($this->reference, 80);
		$quote = is_null($this->unit) ? 'C.I.: '.$this->identity_card : 'Cite: '.$this->quote;
		return view('procedures_module.partials._document_details', compact('reference', 'applicant', 'date', 'quote'));
	}

	public function getLocationAttribute(){
		$last_route = $this->routes->last();
		$user = (!is_null($last_route)) ? $last_route->user_to : $this->user_created;
		if (!is_null($user)) {
			return $user->full_name;
		}
		else return null;
	}    

	public function user_archived(){
		return $this->belongsTo(User::class, 'archived_user');
	}

}
