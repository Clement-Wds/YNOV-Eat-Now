<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use App\Models\Restaurant as Restaurant;
use App\Models\Dish as Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function formulaire(){
        if(auth()->check()){
            return view('restaurant/createDish');
        }
        flash('Vous devez être connectés pour accéder à cette page')->error();
        return back();
    }

    public function createDish(){
        request()->validate([
            'name' => ['required'],
            'price' => ['required']
        ]);

        $user_id = auth()->user()->id;
        $photo = 'photo';

        Dish::create([
            'restaurant_id' => $restaurant_id,
            'name' => request('name'),
            'price' => request('price'),
            'photo' => $photo
        ]);

        flash('Votre plat a bien été enregistré avec succès')->success();
        return back('/dashboard');
    }
}
