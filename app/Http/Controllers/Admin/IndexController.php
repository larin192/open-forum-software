<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $usermodel = User::find($user->id);

        dd($user->roles()->get());
    }
}