<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use App\Models\Restaurant as Restaurant;
use App\Models\Dish as Dish;

use Illuminate\Http\Request;

class DishController extends Controller
{
    public function createDishForm(int $id){
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

        request()->validate([
            'name' => ['required'],
            'price' => ['required']
        ]);

        $photo = 'https://cdn.pixabay.com/photo/2015/02/18/12/17/coffee-640647_1280.jpg';

        Dish::create([
            'restaurant_id' => $restaurant->id,
            'photo' => $photo,
            'name' => request('name'),
            'price' => request('price')
        ]);
        $url = '/restaurant/manage/'.$restaurant->id;
        flash('Votre plats a bien été enregistré !')->success();
        return redirect($url);
    }

    public function editDishForm(int $id){

        $dish = Dish::all()->where('id', $id)->first();

        //Faire les vérifications si le plats correspond au restaurant
        //Si le restaurant du plat appartient à l'utilisateur
        if(auth()->check()){
            return view('restaurant/editDish', [
                'dish' => $dish,
            ]); 
        }
        flash('Vous devez être connecté pour effectuer cette action !')->error();
        return redirect('/');
    }

    public function editDish(){
        $dish = Dish::where('id', request('id'))->firstOrFail();
        $restaurant = Restaurant::where('id', $dish->restaurant_id)->first();
        $user = auth()->user();

        if($user->id == $restaurant->user_id){
            if($restaurant->id == $dish->restaurant_id){
                request()->validate([
                    'name' => ['required'],
                    'price' => ['required']
                ]);
        
                $photo = 'https://cdn.pixabay.com/photo/2015/02/18/12/17/coffee-640647_1280.jpg';
                
                $dish->name = request('name');
                $dish->price = request('price');
                $dish->photo = $photo;
                $dish->save();
        
                $url = '/restaurant/manage/'.$restaurant->id;
                flash('Votre plat a bien été enregistré !')->success();
                return redirect($url);
            }
        }

    }

    public function deleteDish(int $id){
        $dish = Dish::all()->where('id', $id)->first();
        $dish->delete();
        flash('Votre plat a bien été supprimé !')->info();
        return back();
    }
}
