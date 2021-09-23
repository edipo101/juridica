<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use App\Unit;
use App\UserProfile;
use DataTables;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $units = Unit::orderBy('name')->get();
    	return view('users.index', compact('units'));
    }

    public function dataTable(){
    	$users = User::with('profile')->with('unit')->get();
    	return DataTables::of($users)
        ->addColumn('image', function($user){
            return view('partials._user_block', compact('user'));
        })
        ->editColumn('status', function($user){
            if ($user->status == 1)
                return '<span class="label label-success">ON</span>';
            else
                return '<span class="label label-danger">OFF</span>';
        })
        ->addColumn('actions', function($user){
            return view('users._actions_users', compact('user'));
        })
        ->rawColumns(['image', 'image', 'name', 'status'])
        ->toJson();
    }

    public function profile(){
        return view('users.profile');
    }

    public function create(){
        $item = new User();
        $units = Unit::get();
        $profiles = UserProfile::get();
        return view('users.create', compact('item', 'units', 'profiles'));
    }

    public function store(UserStoreRequest $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator->errors());
        }

        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->status = ($request->status == 'on') ? 1 : 0;
        $user->save();
        return redirect()->route('users.index');
    }

    public function edit($id){
        $item = User::findOrFail($id);
        $units = Unit::get();
        $profiles = UserProfile::get();
        return view('users.edit', compact('item', 'units', 'profiles'));
    }

    public function update(UserUpdateRequest $request){
        $user = User::findOrFail($request->id);
        $data = [
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'first_surname' => $request->first_surname,
            'second_surname' => $request->second_surname,
            'job_title' => $request->job_title,
            'unit_id' => $request->unit_id,
            'email' => $request->email,
            'username' => $request->username,
            'profile_id' => $request->profile_id,
            'status' => ($request->status == 'on') ? 1 : 0
        ];
        $user->fill($data);
        if (!is_null($request->password)) 
            $user->password = Hash::make($request->password);
        // return $user;
        $user->save();
        return redirect()->route('users.index');
    }

    public function changepass(Request $request){
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'old_pass'  => 'required',
            'new_pass'  => 'required|min:4',
            're_pass'   => 'required|same:new_pass'
        ]);
        if ($validator->fails()){
            return $validator->messages()->toJson();
        }

        // if ($request->old_pass )
        $user->password = Hash::make($request->new_pass);
        $user->save();
        return '200 OK';
    }

    public function chg_pass(Request $request){
        $validator = Validator::make($request->all(), [
            'new_pass'  => 'required|min:4'
        ]);
        
        if ($validator->fails()){
            return $validator->messages()->toJson();
        }
        
        $user = User::findOrFail($request->user_id);
        $user->password = Hash::make($request->new_pass);
        $user->save();
        return '200';
    }
}
