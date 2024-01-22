<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function adminDashboard()
    {
        return view('admin.pages.dashboard');
    }

    function managerDashboard()
    {
        return view('admin.pages.dashboard');
    }

    function setting(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_password'=> 'required|same:new_password'
        ]);

        $currentPasswordStatus = Hash::check($request->old_password, auth()->user()->password);
        if ($currentPasswordStatus) {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->new_password),
            ]);

            return response()->json(['success' => true, 'message' => 'Password Update successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Current Password Wrong']);
        }
    }

    public function index()
    {
        $users = User::with('role')->orderBy('id', 'desc')->paginate(10);
        // $userData = UserResource::collection($users);
        $roles = Role::all();
        return view('admin.pages.users.users', compact('users', 'roles'));
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $input = $request->all();

            if ($image = $request->file('image')) {
                $destinationPath = 'users/';
                $postImage =  date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }

            // $userData = $request->only(['name', 'email', 'roleId', 'password', 'status']);
            User::create($input);

            return response()->json(['success' => true, 'message' => 'User added successfully']);

            // return redirect()->route('users.index'); 
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error adding user']);
            // Session::flash('error', 'Error adding user');

            // return redirect()->back(); 
        }
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        try {
            $input = $request->all();
            $user = User::find($id);

            // dd($request->file('image'));

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not Found']);
            }


            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $imagePath = $image->store('user_images', 'public');
            //     $userData['image'] = $imagePath;
            // }

            if ($image = $request->file('image')) {
                $destinationPath = 'users/';
                $postImage =  date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }

            // $userData = $request->only(['name', 'email', 'roleId','status']);
            $user->update($input);

            return response()->json(['success' => true, 'message' => 'User Update successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error Update User..']);
        }
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', "User Successful Deleted.");
    }
}
