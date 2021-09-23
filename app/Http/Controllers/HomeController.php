<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\DocRoute;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
     //    $user = auth()->user();
     //    $docs = Document::where('created_unit', $user->unit_id);
     //    $tot_edocs = Document::where('created_unit', $user->unit_id)->where('unit_id', '<>', $user->unit->id)->get()->count();
     //    $tot_idocs = Document::where('created_unit', $user->unit_id)->where('unit_id', $user->unit->id)->get()->count();
     //    $tot_mydocs = Document::where('created_unit', $user->unit_id)->where('unit_id', $user->unit_id)->where('created_by', $user->id)->get()->count();
    	// $tot_received = DocRoute::where('to_id', $user->id)->get()->count();
    	// $tot_sent = DocRoute::where('from_id', $user->id)->get()->count();
        return view('home');
    }
}
