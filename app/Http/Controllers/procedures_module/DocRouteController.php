<?php

namespace App\Http\Controllers\procedures_module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\DocRoute;
use App\User;
use App\Document;
use DataTables;
use Carbon\Carbon;

class DocRouteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = User::where('id', '<>', 1)
        ->where('id', '<>', auth()->user()->id)
        ->where('unit_id', auth()->user()->unit_id)->get();
        return view('procedures_module.doc_routes.index', compact('users'));
    }

    public function ajax_get_users(Request $request){
        // return $request;
        $users = User::where('id', '<>', 1)
        ->where('id', '<>', auth()->user()->id)
        ->where('unit_id', auth()->user()->unit_id)->get();
        return $users;
    }

    public function datatable(){
        $routes = DocRoute::where('to_id', auth()->user()->id)
            ->with('document')
            ->with('unit_from')
            ->with('user_from')
            ->orderByDesc('id')
            ->get();
        return DataTables::of($routes)
        ->addColumn('details', function($route){
            $document = $route->document;
            return view('procedures_module.partials._doc_details', compact('document'));
            // return $document->details;
        })
        ->addColumn('image', function($route){
            $user = $route->user_from;
            // return view('partials._user_block', compact('user'));
            return view('procedures_module.partials._user_message', compact('user', 'route'));
        })
        ->editColumn('created_at', function($route){
            $date = $route->created_at->format('d/m/Y');
            return ($route->viewed == 1) ? $date : '<strong>'.$date.'</strong>';
        })
        ->editColumn('message', function($route){
            $route->message = Str::limit($route->message, 100);
            // $style = ($route->viewed == 1) ? 'style="color: black;"' : 'style="font-weight: bold;"';
            $class = ($route->viewed == 0) ? 'class="text-blue" style="font-weight: bold; font-style: italic;"' : 'style="font-style: italic;"';
            // return '<a href="#" '.$style.' data-toggle="modal" data-target="#modal-view" onclick="view_details('.$route->id.')">'.$route->message.'</a>';
            return '<span '.$class.'>'.$route->message.'</span>';
        })
        ->editColumn('priority', function($route){
            switch ($route->priority) {
                case 'Alta':
                    $label = 'danger';
                    break;
                case 'Baja':
                    $label = 'success';
                    break;
                default:
                    $label = 'warning';
                    break;
            }
            return '<small class="label label-'.$label.'">'.$route->priority.'</small>';
        })
        ->addColumn('from_user', function($route){
            return 
            ($route->viewed == 1) ? 
                $route->user_from->fullname 
            : '<strong>'.$route->user_from->fullname.'</strong>';
        })
        ->addColumn('sent', function($route){
            return ($route->sent == 1) ? '<i class="fa fa-mail-forward"></i>' : '';
        })
        ->addColumn('actions', function($route){
            $document = $route->document;
            $id = $document->id;
            $created_by =$document->created_by;
            $attached_file = $document->attached_file;
            $status_id = $document->status_id;
            $route_id = $route->id;
            $route_sent = $route->sent;
            return view('procedures_module.partials._actions_route_received', compact(['id', 'created_by', 'attached_file', 'status_id', 'route_id', 'route_sent']));
        })
        ->rawColumns(['details', 'image', 'created_at', 'message', 'priority', 'from_user', 'sent', 'actions'])
        ->toJson();
    }

    public function sent_docs(){
        return view('procedures_module.doc_routes.sent_docs');   
    }

    public function json_sentdocs(){
        $routes = DocRoute::where('from_id', auth()->user()->id)
            ->with('document')
            ->with('unit_from')
            ->with('user_to')
            ->orderByDesc('id')
            ->get();
        return DataTables::of($routes)
        ->addColumn('details', function($route){
            $document = $route->document;
            return $document->details;
        })
        ->editColumn('created_at', function($route){
            $date = $route->created_at->format('d/m/Y');
            return $date;
        })
        ->editColumn('message', function($route){
            $route->message = Str::limit($route->message, 50);
            return '<span style="font-style: italic;">'.$route->message.'</span>';
        })
        ->editColumn('priority', function($route){
            switch ($route->priority) {
                case 'Alta':
                    $label = 'danger';
                    break;
                case 'Baja':
                    $label = 'success';
                    break;
                default:
                    $label = 'warning';
                    break;
            }
            return '<small class="label label-'.$label.'">'.$route->priority.'</small>';
        })
        ->addColumn('image', function($route){
            $user = $route->user_to;
            return view('partials._user_block', compact('user'));
        })
        ->addColumn('to_user', function($route){
            return $route->user_to->fullname;
        })
        ->addColumn('sent', function($route){
            return '<i class="fa fa-mail-forward"></i>';
        })
        ->addColumn('actions', function($route){
            $document = $route->document;
            $id = $document->id;
            $created_by =$document->created_by;
            $attached_file = $document->attached_file;
            $status_id = $document->status_id;
            $route_id = $route->id;
            $route_sent = $route->sent;
            return view('procedures_module.partials._actions_route_sent', compact(['id', 'created_by', 'attached_file', 'status_id', 'route_id', 'route_sent']));
        })
        ->rawColumns(['details', 'image', 'created_at', 'message', 'priority', 'from_user', 'sent', 'actions'])
        ->toJson();
    }

    public function json_store(Request $request){
    	// return $request;
        $document = Document::findOrFail($request->doc_id);
        $document->status_id = 2;
        $document->save();    

        if (!is_null($request->route_id)){
            $route = DocRoute::findOrFail($request->route_id);
            $route->sent = 1;
            $route->save();            
        }
        
    	$docroute = new DocRoute($request->all());
    	$docroute->message = $request->msg_reference;
    	$docroute->document_id = $request->doc_id;
    	$docroute->from_unit = auth()->user()->unit_id;
    	$user = User::findOrFail($request->to_id);
    	$docroute->to_id = $user->id;
    	$docroute->to_unit = $user->unit_id;
        $docroute->save();
    	
        return '200';
    }

    public function set_viewed(Request $request){
        $route = DocRoute::findOrFail($request->id);
        // return $route;
        if ($route->viewed == 0){
            $route->viewed = 1;
            $route->save();
            return '200';
        }
        else return false;
    }
}
