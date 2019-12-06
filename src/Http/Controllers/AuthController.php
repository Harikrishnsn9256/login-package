<?php

namespace hari\login\Http\Controllers;
use App\Http\Controllers\Controller;
use hari\login\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function postlogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
//        $credentials['role_id'] = Roles::ROLE_ADMIN;
        $user = User::where('email', $credentials['email'])
//            ->where('role_id', $credentials['role_id'])
            ->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect('dashboard');

        }
        else
        {
            $messages="invalid credentials";
            return view('login::auth/login')->withErrors($messages);
        }
    }
    public function adminlogout()
    {

        Auth::logout();
        return redirect()->route('admin');

    }
//
}

