<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class RolController extends Controller
{
    //
    function _construct(){
        $this->middleware('permission:show-rol | create-rol | edit-rol | delete-rol',['only'=>['index']]);
        $this->middleware('permission:create-rol ',['only'=>['create','store']]);
        $this->middleware('permission:edit-rol ',['only'=>['edit','update']]);
        $this->middleware('permission:delete-rol ',['only'=>['destroy']]);
    }

    public function index(){
        $roles = Role::paginate(5);
        return view('roles.index',compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index');   
    }

    public function edit($id){
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index'); 
    }

    public function destroy($id){
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index');  
    }


}




