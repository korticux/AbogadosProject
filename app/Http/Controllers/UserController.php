<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->paginate(50);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input["password"] = Hash::make($input["password"]);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        $notification = [
            'message' => 'User Created Successfully',
            'alert-type' => "sucess"
        ];

        return redirect()->route('users.index')->with($notification);
    }

    public function show($id)
    {

        $user = User::find($id);

        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {

        $user = User::find($id);

        $roles = Role::pluck('name', 'name')->all();

        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ], [
            'email.unique' => "Ya hay un usuario con ese email"
        ]);

        $input = $request->all();

        if (!empty($input['password'])) {

            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $notification = [
            "message" => "User updated successfully",
            "alert-type" => "success"
        ];

        $user->assignRole($request->input('roles'));
        return redirect()->route('admin.users.index')->with($notification);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        $notification = [
            'message' => "User Deleted Successfully",
            'alert-type' => "error"
        ];

        return redirect()->back()->with($notification);
    }


}
