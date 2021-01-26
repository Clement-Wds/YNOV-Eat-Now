<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class InscriptionRestoController extends Controller
{
    public function formulaire(){
        if(auth()->check()){
            return view('restaurant/inscriptionresto');
        }
        flash('Vous devez être connectés pour accéder à cette page')->error();
        return back();
    }

    public function createRestaurant(){
        request()->validate([
            'name' => ['required'],
            'postal_address' => ['required'],
            'mail_address' => ['required', 'email']
        ]);

        $user_id = auth()->user()->id;
        $logo = 'logo';

        Restaurant::create([
            'name' => request('name'),
            'user_id' => $user_id,
            'postal_address' => request('postal_address'),
            'mail_address' => request('mail_address'),
            'logo' => $logo
        ]);

        flash('Votre restaurant a bien été enregistré avec succès')->success();
        return redirect('/');
    }
}
