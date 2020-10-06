<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    // function __construct()
    // {
    //      $this->middleware('permission:Role-Create', ['only' => ['create','store']]);
    //      $this->middleware('permission:Role-Edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:Role-Delete', ['only' => ['delete']]);
    // }
    
    public function index(){

        $roles = Role::paginate(3);
        return view('admin.roles.index',compact('roles'));
    }

    public function create(){

        $data['roles'] = Role::all();
        $data['permission'] = Permission::all();
        return view('admin.roles.create',$data);
    }

    public function store(Request $request){
        $role = Role::create([
            'name' => $request->name,
        ]);
        // $permissions = [$request->permission];

        // foreach($permissions as $permission)


        $role->syncPermissions($request->permission);

        return redirect('/admin/roles/create')->with('success','Role created successfully');;
    }

    public function edit($id){
        $data['role'] = Role::find($id);
        $data['permission'] = Permission::get();
        $data['rolePermissions'] = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit',$data);
    }

    public function update(Request $request, $id){
        $role = Role::find($id);
        $role->name = $request->name;

        $role->save();
        // $permissions = [$request->permission];
        // foreach($permissions as $permission)
        $role->syncPermissions($request->permission);
                        
        return redirect('/admin/roles')->with('success','Role updated successfully');
    }

    public function delete($id){

        $role = Role::find($id);
        $role->save();

        return redirect('/admin/roles');
    }

}
