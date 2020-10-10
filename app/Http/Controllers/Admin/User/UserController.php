<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:User-Create', ['only' => ['create','store']]);
         $this->middleware('permission:User-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:User-Delete', ['only' => ['delete']]);
    }

    public function index(){
        $data['users'] = User::paginate(2);
        return view('admin.users.index',$data);
    }

    public function create(){
        
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    
    }

    public function store(UserRequest $request){

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->roles);

        return redirect('/admin/users')->with('success','User created successfully');
    }

    public function edit($id){

        $data['user'] = User::find($id);
        $data['roles'] = Role::all();
        
        return view('admin.users.edit',$data);
    }

    public function update(EditUserRequest $request,$id){

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect('/admin/users')->with('success','User updated successfully');
    }

    public function delete($id){

        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users')->with('success','User deleted successfully');
    }
}
