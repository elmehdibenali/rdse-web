<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\profileMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function create()
    {
        return view('createAccount');
    }

    public function store(UserRequest $request)
    {
         $formFields = $request->validated();
         $formFields['password'] = Hash::make($request->password);
        //  dd($formFields);
         // Generate verification token
        $formFields['verification_token'] = Str::random(64);
        $user = User::create($formFields);

        Mail::to($user->email)->send(new ProfileMail($user));

        return to_route('login.show')->with('success','Votre compte a été créé avec succès !');

    }

    public function update(UserRequest $request, User $user)
    {

    $formFields = $request->validated();

    // If password is empty or null, remove it from the data to avoid overwriting
    if (empty($formFields['password'])) {
        unset($formFields['password']);
    } else {
        // Hash the new password before saving
        $formFields['password'] = bcrypt($formFields['password']);
    }
    if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('users','public');
        }

    $user->fill($formFields)->save();

    return to_route('user.profile')->with('success', 'Votre profil est mis à jour avec succès.');

    }

    public function viewProfile(){
        $user = Auth::user();
        return view('profile' , compact('user'));

    }


}
