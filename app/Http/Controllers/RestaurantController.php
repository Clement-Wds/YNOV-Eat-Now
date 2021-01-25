<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use App\Models\Restaurant as Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function listeRestaurant(){
        $restaurant = Restaurant::all();

        return view('web/home', [
            'restaurant' => $restaurant
        ]);
    }

    public function dashboard(){
        $restaurant = Restaurant::all();
        $user = auth()->user();

        return view ('restaurant/dashboard', [
            'restaurant' => $restaurant,
            'user' => $user
        ]);
    }

    public function manageRestaurant(int $id){
        $restaurant = Restaurant::all()->where('id', $id)->first();
        $user = auth()->user();
        $user_id = Restaurant::all()->where('id', $id)->first()->user_id;

        if (auth()->check()){
            if($user_id == $user->id){
                return view('restaurant/myRestaurant', [
                    'restaurant' => $restaurant,
                    'user' => $user
                ]);
            }
            else{
                flash('Vous n\'êtes pas le propriétaire de ce restaurant !')->error();
                return back();
            }
        }
        else{
            flash('Vous devez être connecté pour accéder à cette page')->error();
            return back();
        }
    }
}
