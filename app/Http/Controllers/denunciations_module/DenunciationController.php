<?php

namespace App\Http\Controllers\denunciations_module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Denunciations_module\Denunciation;

class DenunciationController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$denunciations = Denunciation::get();
    	return $denunciations;
    }

    public function ajax_load(){
    	$denunciations = Denunciation::get();
    }
}
