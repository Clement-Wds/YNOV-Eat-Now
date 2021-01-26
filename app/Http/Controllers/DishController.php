<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restaurant as Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function formulaire(int $id){
        $restaurant = Restaurant::all()->where('id', $id)->first();

        if(auth()->check()){
            return view('restaurant/createDish', [
                'restaurant' => $restaurant
            ]);
        }
        flash('Vous devez être connectés pour accéder à cette page')->error();
        return back();
    }

    public function createDish(){

        $restaurant = Restaurant::where('id', request('id'))->firstOrFail();
        $restaurant_id = $restaurant->id;

        request()->validate([
            'name' => ['required'],
            'price' => ['required']
        ]);

        $photo = 'photo';

        Dish::create([
            'restaurant_id' => $restaurant_id,
            'photo' => $photo,
            'name' => request('name'),
            'price' => request('price')
        ]);
        
        flash('Votre plats a bien été enregistré !')->success();
        return redirect('/dashboard');
    }
}
