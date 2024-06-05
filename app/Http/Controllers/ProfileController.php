<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Devices;
use App\Models\User;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = User::findOrFail(Auth::id());

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        $user->save();

        return redirect()->back();
    }
}
