<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index() {
        return view('register/index');
    }

    /**
     * Rejestracja nowego użytkownika
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'unique:users', 'email'],
            'login' => ['required', 'unique:users', 'min:4', 'max:50'],
            'password' => ['required', 'min:6']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = new User();

            $user->email = $credentials['email'];
            $user->login = $credentials['login'];
            $user->password = $credentials['password'];

            $user->save();

            return redirect('index/index');
        }

        return back();
    }
}
