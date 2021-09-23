<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Unit;
use Illuminate\Support\Str;

class UnitController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function ajax_store(Request $request){
    	// return $request;
    	$validator = Validator::make($request->all(), [
            'name'  => 'required|unique:units|min:4|max:30'
        ]);
        
        if ($validator->fails()){
            return response()->json(array('success' => false, 'data' => $validator->messages()));
        }

        $name = $request->name;
        $unit = Unit::create([
        	'name' => $name,
        	'slug' => Str::slug($name)
        ]);
        return response()->json(array('success' => true, 'data' => $unit));
    }
}
