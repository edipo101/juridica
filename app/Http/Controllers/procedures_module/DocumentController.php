<?php

namespace App\Http\Controllers\procedures_module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Http\Requests\DocumentStoreRequest;
use App\Http\Requests\DocumentExtStoreRequest;
use App\Http\Requests\DocumentUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use App\Document;
use App\TypeDoc;
use App\TypeAdd;
use App\Unit;
use App\User;
use DataTables;
use Carbon\Carbon;

class DocumentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $users = User::where('id', '<>', 1)
        ->where('id', '<>', auth()->user()->id)
        ->where('unit_id', auth()->user()->unit_id)->get();
        return view('procedures_module.my_documents.index', compact('users'));
    }

    public function ext_docs(){
        $users = User::where('id', '<>', 1)
        ->where('id', '<>', auth()->user()->id)
        ->where('unit_id', auth()->user()->unit_id)->get();
        return view('procedures_module.documents.ext_docs', compact('users'));
    }

    public function int_docs(){
        return view('procedures_module.documents.int_docs');
    }

    public function json_mydocs(){
    	$documents = Document::
        where('created_by', auth()->user()->id)
        ->where('created_unit', auth()->user()->unit_id)
        ->where('unit_id', auth()->user()->unit_id)
        ->orderByDesc('id')
        ->get();
    	// return $documents;
        return DataTables::of($documents)
        ->addColumn('type', function($document){
            return '<span class="label label-'.$document->type->label.'">'.$document->type->name.'</span>';
        })
        ->addColumn('details', function($document){
            return '<small><strong>'.$document->unit_created->name.'</strong></small>';
        })
        ->editColumn('date', function($document){
            return Carbon::parse($document->date)->format('d/m/Y');            
        })
        ->editColumn('reference', function($document){
            return Str::limit($document->reference, 50);
        })
        ->addColumn('status', function($document){
            return $document->status->name;            
        })
        
        ->addColumn('file', function($document){
            return (!is_null($document->attached_file)) ? '<i class="fa fa-paperclip text-blue"></i>' : '';
        })
        ->editColumn('created_by', function($document){
            $user = $document->user_created;
            // return '<b>'.$user->username.'</b> ('.$user->full_name.')';
            return '<span class="hint--top" data-hint="'.$user->full_name.'"><b>'.$user->username.'</b></span>';
        })
        ->addColumn('sent', function($document){
            return ($document->status_id == 2) ? '<i class="fa fa-mail-forward"></i>' : '';
        })
        ->addColumn('actions', 'procedures_module.partials._actions')
        ->rawColumns(['type', 'details', 'actions', 'add_data', 'file', 'created_by', 'sent', 'details'])
    	->toJson();
    }

    public function json_extdocs(){
        $documents = Document::
        where('created_unit', auth()->user()->unit->id)
        ->where(function (Builder $query){
            return $query->where('unit_id', '<>', auth()->user()->unit->id)
                         ->orWhereNull('unit_id');
        })
        ->orderByDesc('id')
        ->get();
        // return $documents;
        return DataTables::of($documents)
        ->addColumn('type', function($document){
            return '<span class="label label-'.$document->type->label.'">'.$document->type->name.'</span>';
        })
        ->addColumn('details', function($document){
            return $document->details;
        })
        ->editColumn('entry_date', function($document){
            return Carbon::parse($document->entry_date)->format('d/m/Y');            
        })
        ->editColumn('add_data', function($document){
            return (!is_null($document->add_type_id)) ? '<b>'.$document->type_add->name.':</b> '.$document->add_data : null;            
        })
        ->addColumn('status', function($document){
            return $document->status->name;            
        })
        ->addColumn('image', function($document){
            $last_route = $document->routes->last();
            $user = (!is_null($last_route)) ? $last_route->user_to : $document->user_created;
            return view('partials._user_block', compact('user'));
        })
        ->addColumn('file', function($document){
            return (!is_null($document->attached_file)) ? '<i class="fa fa-paperclip text-blue"></i>' : '';
        })
        ->addColumn('sent', function($document){
            return ($document->status_id == 2) ? '<i class="fa fa-mail-forward"></i>' : '';
        })
        ->addColumn('actions', 'procedures_module.partials._actions')
        ->rawColumns(['type', 'details', 'actions', 'add_data', 'location', 'image', 'file', 'sent'])
        ->toJson();
    }    

    public function json_intdocs(){
        $documents = Document::
        where('unit_id', auth()->user()->unit->id) //Documentos internos
        ->where('created_unit', auth()->user()->unit->id)
        ->orderByDesc('id')
        ->get();
        // return $documents;
        return DataTables::of($documents)
        ->addColumn('type', function($document){
            return '<span class="label label-'.$document->type->label.'">'.$document->type->name.'</span>';
        })
        ->addColumn('details', function($document){
            return $document->details;
        })
        ->editColumn('entry_date', function($document){
            return Carbon::parse($document->entry_date)->format('d/m/Y');            
        })
        ->editColumn('add_data', function($document){
            return (!is_null($document->add_type_id)) ? '<b>'.$document->type_add->name.':</b> '.$document->add_data : null;            
        })
        ->addColumn('status', function($document){
            return $document->status->name;            
        })
        ->addColumn('image', function($document){
            $last_route = $document->routes->last();
            $user = (!is_null($last_route)) ? $last_route->user_to : $document->user_created;
            return view('partials._user_block', compact('user'));
        })
        ->addColumn('file', function($document){
            return (!is_null($document->attached_file)) ? '<i class="fa fa-paperclip text-blue"></i>' : '';
        })
        ->addColumn('send', function($document){
            return '<i class="fa fa-mail-forward"></i>';
        })
        ->addColumn('actions', 'procedures_module.partials._actions')
        ->rawColumns(['type', 'details', 'actions', 'add_data', 'location', 'image', 'file', 'send'])
        ->toJson();
    }

    public function get_document(Request $request){
        $document = Document::with('type')->with('unit')->with('user_created')->with('type_add')->findOrFail($request->id);
        $document->date = Carbon::parse($document->date)->format('d/m/Y');
        $document->entry_date = (!is_null($document->entry_date)) ? Carbon::parse($document->entry_date)->format('d/m/Y') : null;
        $document->file = (!is_null($document->attached_file)) ? $document->attached_file : '<span style="font-style: italic;">Ninguno</span>';
        $document->desc = (!is_null($document->description)) ? $document->description : '<span style="font-style: italic;">Ninguno</span>';
        $document->created_format = $document->created_at->format('d/m/Y H:i:s');
        $document->updated_format = $document->updated_at->format('d/m/Y H:i:s');
        if (!is_null($document->attached_file)) $document->attached_file = asset(Storage::url($document->attached_file));
        return $document;
    }

    public function create(){
        $document = new Document();
        $type_docs = TypeDoc::get();
        $type_adds = TypeAdd::get();
        $units = Unit::where('id', '<>', auth()->user()->unit->id)->get(); //Unidades externas
        return view('procedures_module.documents.create', compact('document', 'type_docs', 'units', 'type_adds'));
    }

    public function store(DocumentStoreRequest $request){ 
        // return $request;
        $document = new Document($request->all());
        $document->date = date("Y-m-d", strtotime(str_replace('/', '-', $request->date)));
        if (session('type_doc') == 'mydocs'){
            $document->entry_date = null; 
            $document->unit_id = auth()->user()->unit->id; 
        }
        else{
            $document->entry_date = date("Y-m-d", strtotime(str_replace('/', '-', $request->entry_date)));
        }
        $document->created_by = auth()->user()->id;
        $document->created_unit = auth()->user()->unit->id;
        if ($request->hasFile('attached_file')){
            $slug_name = Str::slug($request->file('attached_file')->getClientOriginalName());
            $name = substr($slug_name, 0, -3).'.'.$request->file('attached_file')->getClientOriginalExtension();
            $document->attached_file = $request->file('attached_file')->storeAs('public/documents', $name);
        }   
        // return $document;   
        $document->save();
        
        return redirect($request->previous_route);
    }

    public function ext_store(DocumentExtStoreRequest $request){ 
        // return $request;
        $document = new Document($request->all());
        $document->date = date("Y-m-d", strtotime(str_replace('/', '-', $request->date)));
        if (session('type_doc') == 'mydocs'){
            $document->entry_date = null; 
            $document->unit_id = auth()->user()->unit->id; 
        }
        else{
            $document->entry_date = date("Y-m-d", strtotime(str_replace('/', '-', $request->entry_date)));
        }
        $document->created_by = auth()->user()->id;
        $document->created_unit = auth()->user()->unit->id;
        if ($request->hasFile('attached_file')){
            $slug_name = Str::slug($request->file('attached_file')->getClientOriginalName());
            $name = substr($slug_name, 0, -3).'.'.$request->file('attached_file')->getClientOriginalExtension();
            $document->attached_file = $request->file('attached_file')->storeAs('public/documents', $name);
        }   
        // return $document;   
        $document->save();
        
        return redirect($request->previous_route);
    }

    public function edit($id){
        $document = Document::findOrFail($id);
        $type_docs = TypeDoc::get();
        $type_adds = TypeAdd::get();
        $units = Unit::where('id', '<>', auth()->user()->unit->id)->get(); //Unidades externas
        return view('procedures_module.documents.edit', compact('document', 'type_docs', 'units', 'type_adds'));
    }

    public function update(DocumentUpdateRequest $request){ 
        // return $request;       
        $document = Document::findOrFail($request->id);
        $document->fill($request->all());
        $document->date = date("Y-m-d", strtotime(str_replace('/', '-', $request->date)));
        $document->entry_date = date("Y-m-d", strtotime(str_replace('/', '-', $request->entry_date)));
        $document->created_by = auth()->user()->id;
        $document->created_unit = auth()->user()->unit->id;
        if ($request->hasFile('attached_file')){
            $slug_name = Str::slug($request->file('attached_file')->getClientOriginalName());
            $name = substr($slug_name, 0, -3).'.'.$request->file('attached_file')->getClientOriginalExtension();
            $document->attached_file = $request->file('attached_file')->storeAs('public/documents', $name);
        }   
        // return $document;   
        $document->save();
        
        return redirect($request->previous_route);
    }

    public function destroy(Request $request){
        $document = Document::findOrFail($request->id);
        $document->delete();
        return '200';
    }
}