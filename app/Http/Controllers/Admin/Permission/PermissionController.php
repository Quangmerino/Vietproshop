<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $data['permissions'] = Permission::paginate(4);
        return view('admin.permissions.index',$data);
    }

    public function create(){
        return view('admin.permissions.create');
    }

    public function store(Request $request){
        $permission = new Permission();

        $permission->name = $request->name;
        $permission->save();

        return redirect('/admin/permissions/create')->with('success','Tạo quyền thành công');  
    }
}
