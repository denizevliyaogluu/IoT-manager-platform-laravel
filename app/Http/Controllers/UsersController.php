<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Devices;
use App\Models\User;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();

        return redirect()->back();
    }
    
    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back();
    }
}
