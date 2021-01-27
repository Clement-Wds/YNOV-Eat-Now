<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurateurController extends Controller
{
    public function profile(){
        if(auth()->check()){
            $user = auth()->user();
            return view('restaurateur/profileRestorer', [
                'user' => $user
            ]);
        }
        flash('Vous devez être connecté pour accéder à cette page')->error();
        return redirect('/connexion');
    }

    public function formEditProfile(){
        if(auth()->check()){
            $user = auth()->user();
            return view('restaurateur/editProfileRestorer', [
                'user' => $user
            ]);
        }
        flash('Vous devez être connecté pour accéder à cette page')->error();
        return redirect('/connexion');
    }

    public function editProfile(){
        $user = auth()->user();

        request()->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'status' => ['required']
        ]);

        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->address = request('address');
        $user->status = request('status');
        $user->save();

        flash('Les modifications ont bien été enregistrées !')->success();
        return redirect('/profileRestorer');
    }

    public function formChangePassword(){
        if(auth()->check()){
            $user = auth()->user();
            return view('restaurateur/changePasswordRestorer', [
                'user' => $user
            ]);
        }
        flash('Vous devez être connecté pour accéder à cette page')->error();
        return redirect('/connexion');
    }

    public function changePassword(){
        $user = auth()->user();

        request()->validate([
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $user->password = bcrypt(request('password'));
        $user->save();

        flash('Votre mot de passe a été modifié avec succès !')->success();
        return redirect('/profileRestorer');
    }
}
