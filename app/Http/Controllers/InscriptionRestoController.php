<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionRestoController extends Controller
{
    public function createRestaurant(){
        request()->validate([
            'name' => ['required'],
            'postal_address' => ['required'],
            'mail_address' => ['required', 'email']
        ]);

        //$restaurant_logo = cloudinary()->upload(request()->file('file')->getRealPath())->getSecurePath();

        auth()->user()->restaurant()->create([
            'name' => request('name'),
            'postal_address' => request('postal_address'),
            'mail_address' => request('mail_address')
            //'restaurant_logo' => $restaurant_logo
        ]);

        flash('Votre restaurant a bien été enregistré avec succès')->success();
        return redirect('/');
    } 
}
