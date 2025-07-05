<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

     public function login( Request $request)
    {
        // /** @var \App\Models\User $user */

        // dd(Auth::user());
        $email = $request->email ;
        $password = $request->password;
        $credentials = ['email' => $email ,  "password" => $password];


       if( Auth::attempt($credentials)){

            if(is_null(Auth::user()->email_verified_at)){
                Auth::logout();
                return back()->with('error', 'Votre compte n\'a pas encore été vérifié. Veuillez vérifier votre adresse e-mail.');
            }
            $request->session()->regenerate();
            // dd(Auth::user());
            /** @var \App\Models\User $user */
            $user = Auth::user();

            if ($user->isAdmin()) {
                return to_route('admin.index');
            }

            return to_route('accueil.index');
       }
       else{

            return back()
             ->withInput()
            ->with('error', 'Email ou password incorrect.');

       }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return to_route('accueil.index');

    }
}
