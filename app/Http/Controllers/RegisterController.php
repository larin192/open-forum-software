<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Widok strony rejestracji
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
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
        ],[
            'email.required' => 'Adres e-mail jest wymagany',
            'email.unique' => 'Ten adres e-mail jest powiązany z innym kontem',
            'email.email' => 'Niepoprawny format adresu e-mail',
            'login.required' => 'Login jest wymagany',
            'login.unique' => 'Ten login jest powiązany z innym kontem',
            'login.min' => 'Login musi mieć minimum 4 znaki',
            'login.max' => 'Login może mieć maksymalnie 50 znaków',
            'password.required' => 'Hasło jest wymagane',
            'password.min' => 'Hasło musi mieć minumum 6 znaków',
        ]);

        try {

            $user = new User();

            $user->email = $credentials['email'];
            $user->login = $credentials['login'];
            $user->password = Hash::make($credentials['password']);

            $user->save();

        } catch (\Exception $e) {

            echo $e->getMessage();

            return back()->with([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        return back()->with(['status' => 'ok']);
    }
}
