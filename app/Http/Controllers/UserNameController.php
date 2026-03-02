<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserName;
use Inertia\Inertia;

class UserNameController extends Controller{
    public function index(){
        $users = UserName::all();

        return Inertia::render('Users', [
            'users' => $users
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|string|max:255',
            'role' => 'required|string|max:255'
        ]);

        UserName::create([
            'username' => $request->username,
            'role' => $request->role
        ]);

        return redirect()->back();
    }

    public function destroy($id){
        $user = UserName::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }

    public function edit(UserName $username){
        return Inertia::render('Edit', ['user' => $username]);
    }

    public function update(Request $request, Username $username){
        $request->validate([
            'username' => 'required|string|max:255',
            'role' => 'required|string|max:255'
        ]);

        $user->update([
            'username' => $request->username,
            'role' => $request->role
        ]);

        return redirect()->back();

    }
}