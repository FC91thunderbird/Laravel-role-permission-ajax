<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleAddRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $roles = Role::orderBy('id', 'desc')->paginate(10);
        $permissions = Permission::all();
        return view('admin.pages.roles.roles', compact('roles', 'permissions'));
    }

    function store(RoleAddRequest $request){
        try{
            $roleData = $request->only(['name']);
            $roleData['perms'] = $request->input('perms', []);
            Role::create($roleData);
            return response()->json(['success'=> true, 'message'=>'Role Created..']);
        }catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>'Role Not Created..']);
        }
    }

    function update(RoleUpdateRequest $request, string $id){
        try{
            $role = Role::find($id);
            if(!$id){
                return response()->json(['success'=>false, 'message'=> 'Role Not Found..']);
            }

            $roleData = $request->only(['name']);
            $roleData['perms'] = $request->input('perms', []);
            $role->update($roleData);

            return response()->json(['success'=>true, 'message'=>'Role Updated..']);
        }catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=> 'Role Not Updated..']);
        }
    }

    function destroy($id){
        $role = Role::find($id);
        $role->delete();

        return redirect()->back()->with('success', "Role Successful Deleted.");
    }
}
