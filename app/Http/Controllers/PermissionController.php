<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionAddRequest;
use App\Http\Requests\PermissionEditRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $permissions = Permission::orderBy('id','desc')->paginate(10);
        return view('admin.pages.permission.permissions', compact('permissions'));
    }

    function store(PermissionAddRequest $request){
        try{
            $permissionData = $request->only(['name']);
            Permission::create($permissionData);

            return response()->json(['success'=>true, 'message'=> 'Permission Addedd..']);
        }catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=> 'Permission not added..']);
        }
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return response()->json($permission);
    }

    function update(PermissionEditRequest $request, string $id){
        try{
            $permission = Permission::find($id);
            if(!$permission){
                return response()->json(['success'=>false, 'message'=>'Permission not found..' ]);
            }

            $permissionData = $request->only(['name']);
            $permission->update($permissionData);

            return response()->json(['success'=>true, 'message'=>'Permission Updated..']);

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>'Permission not Updated..']);
        }
    }

    function destroy(string $id){
        $permission = Permission::find($id);
        $permission->delete();
        return response()->json(['success'=>true, 'message'=>'Permission Deleted..']);
    }
}
