<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Laravel\Socialite\Facades\Socialite as Socialite;
use Exception;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth/login');
    }
    /**
     * Redirecciona al usuario a la página de Facebook para autenticarse
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtiene la información de Facebook
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderFacebookCallback()
    {
        try {
            //code...
            $auth_user = Socialite::driver('facebook')->user(); // Fetch authenticated user
            dd($auth_user);
        } catch (Exception $e) {
            dd($e -> getMessage());
        }
    }

    public function showViewTest(){
        return view('auth/welcome');
    }
}
