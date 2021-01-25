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
        $restaurant = Restaurant::all()->where('id', $id)->first;
        $user = auth()->user();

        if (strval($restaurant->user_id) == strval($user->id)){
            return view('restaurant/myRestaurant', [
                'restaurant' => $restaurant
            ]);
        }
        flash('Vous n\'avez pas l\'autorisation d\'accéder à cette page !')->error();
    }
}
