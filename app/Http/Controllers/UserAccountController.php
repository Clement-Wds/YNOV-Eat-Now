<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function createRestaurant(){
        if(auth()->check()){
            return view('restaurant/inscriptionresto');
        }
        flash('Vous devez être connectés pour accéder à cette page')->error();
        return back();
    }

    public function signout(){
        auth()->logout();

        flash('Vous êtes déconnecté')->info();
        return redirect('/connexion');
    }

    //NE PAS OUBLIER DE FAIRE LA VUE POUR LA MODIFICATION DE MOT DE PASSE
    public function password_modification(){
        request()->validate([
            'password' => ['required', 'min:8', 'confirmed'],
            'password_modification' => ['required']
        ]);

        auth()->user()->update([
            'password' => bcrypt(request('password'))
        ]);

        flash('votre mot de passe a été modifié avec succès !')->success();
        return redirect('/');
    }
}
