<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Widok strony logowania
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        return view('login/index');
    }

    /**
     * Autentykacja użytkownika
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ],[
            'email.required' => 'Adres e-mail jest wymagany',
            'password.required' => 'Hasło jest wymagane',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->home();
        }

        return back()->withErrors([
            'email' => 'Podane dane nie pasują do żadnego użytkownika'
        ]);
    }

    /**
     * Wylogowanie użytkownika
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request) {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
