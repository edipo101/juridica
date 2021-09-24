<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Denunciation;
use DataTables;

class DenunciationController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	return view('denunciations_module.index');
    }

    public function ajax_get(){
    	$denunciations = Denunciation::get();
        return DataTables::of($denunciations)->toJson();
    }
}
