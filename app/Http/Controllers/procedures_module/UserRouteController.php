<?php

namespace App\Http\Controllers\procedures_module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserRoute;
use DataTables;

class UserRouteController extends Controller
{
    public function index(){
        // return UserRoute::where('to_id', auth()->user()->id)
        //     ->with('document')
        //     ->with('unit_route')
        //     ->with('from')
        //     ->get();
    	return view('procedures_module.user_routes.index');
    }

    public function data_table(){
    	$routes = UserRoute::where('to_id', auth()->user()->id)
            ->with('document')
            ->with('unit_route')
            ->with('from')
            ->orderByDesc('id')
            ->get();
    	return DataTables::of($routes)
        ->editColumn('created_at', function($route){
            $date = $route->created_at->format('d/m/Y');
            return ($route->viewed == 1) ? $date : '<strong>'.$date.'</strong>';
        })
        ->editColumn('reference', function($route){
            $style = ($route->viewed == 1) ? 'style="color: black;"' : 'style="font-weight: bold;"';
            return '<a href="#" '.$style.' data-toggle="modal" data-target="#modal-view" onclick="view_details('.$route->id.')">'.$route->reference.'</a>';
        })
        ->addColumn('from', function($route){
            return ($route->viewed == 1) ? $route->from->username : '<strong>'.$route->from->username.'</strong>';
        })
    	->addColumn('actions', function($route){
            $id = $route->id;
            $doc_id = $route->document->id;
            $unit_route_id = $route->id;
            $route_edit = 'unit_routes.edit';
            return view('procedures_module.partials._actions', compact('id', 'doc_id', 'unit_route_id', 'route_edit'));
        })
    	->rawColumns(['created_at', 'from', 'reference'])
    	->toJson();
    }

    public function ajax_store(Request $request){
        // return $request;
        $user_route = new UserRoute($request->all());
        $user_route->save();
        // return redirect()->route('unit_routes.index');
        return '200 OK';
    }

    public function ajax_get(Request $request){
        $user_route = UserRoute::with('from')->findOrFail($request->id);
        return $user_route;
    }

    public function ajax_setViewed(Request $request){
        // return $request;
        $user_route = UserRoute::with('from')->findOrFail($request->id);
        $user_route->viewed = 1;
        $user_route->save();
        return '200 OK Viewed';
    }
}
