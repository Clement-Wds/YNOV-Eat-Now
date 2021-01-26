<?php

namespace App\Http\Controllers;

use App\Models\Dish as Dish;
use App\Models\Restaurant as Restaurant;
use Illuminate\Http\Request;

class DishRestaurantController extends Controller
{
    public function profileRestaurant(int $id){
        $restaurant = Restaurant::all()->where('id', $id)->first();
        $dish = Dish::all();

        return view('restaurant/profileresto', [
            'restaurant' => $restaurant,
            'dish' => $dish
        ]);
    }
}
