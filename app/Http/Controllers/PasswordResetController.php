<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\NewPasswordMail;

class PasswordResetController extends Controller
{
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    public function sendNewPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Aucun utilisateur trouvé avec cet email.');

        }

        $newPassword = Str::random(10);

        $user->password = Hash::make($newPassword);
        $user->save();

        Mail::to($user->email)->send(new NewPasswordMail($newPassword));

        return to_route('login.show')->with('success', 'Un nouveau mot de passe a été envoyé à votre email.');
    }

}
