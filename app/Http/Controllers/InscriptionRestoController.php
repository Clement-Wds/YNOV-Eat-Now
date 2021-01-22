<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class InscriptionRestoController extends Controller
{
    public function createRestaurant(){
        request()->validate([
            'name' => ['required'],
            'postal_address' => ['required'],
            'mail_address' => ['required', 'email']
        ]);

        $user_id = auth()->user()->id;
        $logo = 'logo';

        // auth()->user()->restaurant()->create([
        //     'name' => request('name'),
        //     'postal_address' => request('postal_address'),
        //     'mail_address' => request('mail_address'),
        //     'restaurant_logo' => $restaurant_logo
        // ]);

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
