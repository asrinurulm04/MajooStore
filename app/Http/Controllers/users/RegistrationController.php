<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\users\Departement;
use App\Role;
use App\User;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        $roles = Role::all();
        return view('auth.register')->with([
            'roles' => $roles
        ]);
    }

    public function registrationPost(Request $request)
    {
        $this->validate(request(), [
            'username' => 'unique:users',
            'password' => 'confirmed'
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->status = 'sending';
        $user->role_id = $request->role;
        $user->save();
        
        return redirect()->to('/signin');
    }
}
