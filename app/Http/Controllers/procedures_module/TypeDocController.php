<?php

namespace App\Http\Controllers\procedures_module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeDocController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
}
