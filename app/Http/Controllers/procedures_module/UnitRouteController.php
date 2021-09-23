<?php

namespace App\Http\Controllers\procedures_module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentStoreRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\UnitRoute;
use App\UserRoute;
use App\Document;
use App\Unit;
use App\TypeDoc;
use App\User;
use DataTables;
use Carbon\Carbon;

class UnitRouteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $type_docs = TypeDoc::get();
        $users = User::get();
    	return view('procedures_module.unit_routes.index', compact('users', 'type_docs'));
    }

    public function data_table(){
    	$routes = UnitRoute::where('unit_id', auth()->user()->unit->id)->with('document')->orderByDesc('id')->get();
        return DataTables::of($routes)
        ->editColumn('document.type', function($route){
            return '<span class="label label-'.$route->document->type->label.'">'.$route->document->type->name.'</span>';
        })
        ->editColumn('document.request_by', function($route){
          return $route->document->details;
        })
        ->addColumn('registration_date', function($route){
            $user_route = $route->first_route;
            return ($user_route) ? 
            $user_route->status.'</br>'
            .'por: <strong title="Usuario">'.$user_route->from->username.'</strong></br>'
            .$user_route->created_at->format('d/m/Y')
            : null; 
        })
        ->addColumn('last_destiny', function($route){
            $user_route = $route->last_route;
            return (($user_route) && ($user_route->to)) ? 
            $user_route->to->username.'</br>'.$user_route->created_at->format('d/m/Y') : 
            '<span class="unassigned">Sin enviar</span>';
        })
        ->addColumn('time_elapsed', function($route){
            $document = $route->document;
            return $document->created_at->diffForHumans();
        })
        ->addColumn('file', function($route){
            return (!is_null($route->document->attached_file)) ? '<i class="fa fa-paperclip text-blue"></i>' : '';
        })
        ->addColumn('priority', function($route){
            return '<i class="fa fa-exclamation-triangle text-red"></i>';
        })
        ->addColumn('actions', function($route){
            $id = $route->id;
            $doc_id = $route->document->id;
            $unit_route_id = $route->id;
            $route_edit = 'unit_routes.edit';
            $document = $route->document;
            return view('procedures_module.partials._actions', compact('id', 'doc_id', 'unit_route_id', 'route_edit', 'document'));
        })
        ->rawColumns(['priority', 'document.type', 'document.request_by', 'files', 'last_destiny', 'registration_date', 'file'])
        ->toJson();
    }

    /*My documents*/
    public function my_index(){
        $users = User::get();
        return view('procedures_module.my_documents.index', compact('users'));
    }

    public function my_datatable(){
        $documents = Document::where('unit_id', auth()->user()->unit->id)
        // ->where('created_by', auth()->user()->id)
        // ->with('document')
        ->orderByDesc('id')->get();
        return DataTables::of($documents)
        ->editColumn('type', function($document){
            return '<span class="label label-'.$document->type->label.'">'.$document->type->name.'</span>';
        })
        ->editColumn('document.request_by', function($document){
          return $document->details;
        })
        ->addColumn('registration_date', function($document){
            $user_route = $document->first_route;
            return ($user_route) ? 
            $user_route->status.'</br>'
            .'por: <strong title="Usuario">'.$user_route->from->username.'</strong></br>'
            .$user_route->created_at->format('d/m/Y')
            : null; 
        })
        ->addColumn('last_destiny', function($document){
            $user_route = $document->last_route;
            return (($user_route) && ($user_route->to)) ? 
            $user_route->to->username.'</br>'.$user_route->created_at->format('d/m/Y') : 
            '<span class="unassigned">Sin enviar</span>';
        })
        ->addColumn('time_elapsed', function($document){
            $document = $route->document;
            return $document->created_at->diffForHumans();
        })
        ->addColumn('file', function($route){
            return (!is_null($route->document->attached_file)) ? '<i class="fa fa-paperclip text-blue"></i>' : '';
        })
        ->addColumn('priority', function($route){
            return '<i class="fa fa-exclamation-triangle text-red"></i>';
        })
        ->addColumn('actions', function($route){
            $id = $route->id;
            $doc_id = $route->document->id;
            $unit_route_id = $route->id;
            $route_edit = 'unit_routes.edit';
            $document = $route->document;
            return view('procedures_module.partials._actions', compact('id', 'doc_id', 'unit_route_id', 'route_edit', 'document'));
        })
        ->rawColumns(['priority', 'document.type', 'document.request_by', 'files', 'last_destiny', 'registration_date', 'file'])
        ->toJson();
    }

    public function create(){
        $item = new Document();
        $type_docs = TypeDoc::get();
        $units = Unit::get();
        return view('procedures_module.unit_routes.create', compact('item', 'type_docs', 'units'));
    }

    public function edit($id){
        $item =  Document::findOrFail($id);
        $item->date = Carbon::parse($item->date)->format('d/m/Y');
        $type_docs = TypeDoc::get();
        $units = Unit::get();
        return view('procedures_module.unit_routes.edit', compact('item', 'type_docs', 'units'));
    }

    public function update(DocumentStoreRequest $request){        
        $document = Document::findOrFail($request->id);
        $document->fill($request->all());
        $date = str_replace('/', '-', $request->date);
        $document->date = date("Y-m-d", strtotime($date));            
        $document->save();
        
        return redirect()->route('unit_routes.index');
    }

    public function store(DocumentStoreRequest $request){        
        $document = new Document($request->all());
        $date = str_replace('/', '-', $request->date);
        $document->date = date("Y-m-d", strtotime($date));
        if ($request->hasFile('attached_file')){
            $slug_name = Str::slug($request->file('attached_file')->getClientOriginalName());
            $name = substr($slug_name, 0, -3).'.'.$request->file('attached_file')->getClientOriginalExtension();
            $document->attached_file = $request->file('attached_file')->storeAs('public/documents', $name);
        }
        
        $document->save();

        $unit_route = UnitRoute::create([
            'document_id' => $document->id,
            'unit_id' => auth()->user()->unit->id,
        ]);

        $user_route = new UserRoute();
        $data = [
            'document_id' => $document->id,
            'unit_route_id' => $unit_route->id,
            'status' => 'CREADO',
            'from_id' => auth()->user()->id,
            'reference' => 'REGISTRO CREADO',
        ];
        $user_route->fill($data);
        $user_route->save();

        return redirect()->route('unit_routes.index');
    }
}