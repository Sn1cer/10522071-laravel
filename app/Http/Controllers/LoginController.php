<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite; 

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback(Request $request)
    {
    $user = Socialite::driver('google')->user();
    dd($user);
    }
}