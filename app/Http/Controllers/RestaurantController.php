<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use App\Models\Restaurant as Restaurant;
use App\Models\Dish as Dish;
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

    public function homeResto(){
        $restaurant = Restaurant::all();
        $user = auth()->user();

        return view ('restaurant/homeResto', [
            'restaurant' => $restaurant,
            'user' => $user
        ]);
    }

    public function manageRestaurant(int $id){
        $restaurant = Restaurant::all()->where('id', $id)->first();
        $user = auth()->user();
        $user_id = Restaurant::all()->where('id', $id)->first()->user_id;
        $dish = Dish::all();

        if (auth()->check()){
            if($user_id == $user->id){
                return view('restaurant/myRestaurant', [
                    'restaurant' => $restaurant,
                    'user' => $user,
                    'dish' => $dish
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

    public function formEditRestaurant(int $id){
        $restaurant = Restaurant::all()->where('id', $id)->first();
        $user = auth()->user();

        if(auth()->check()){
            if($user->id == $restaurant->user_id){
                return view('restaurant/editRestaurant', [
                    'restaurant' => $restaurant,
                ]);
            }
            flash('Vous ne pouvez pas modifier un restaurant qui ne vous appartient pas !')->error();
            return redirect('/dahsboard');
        }
        flash('Vous devez être connecté pour effectuer cette action !')->error();
        return redirect('/');
    }

    public function editRestaurant(){
        $restaurant = Restaurant::where('id', request('id'))->firstOrFail();
        $user = auth()->user();

        if(auth()->check()){
            if($user->id == $restaurant->user_id){
                request()->validate([
                    'name' => ['required'],
                    'postal_address' => ['required'],
                    'mail_address' => ['required']
                ]);

                $logo = 'https://cdn.pixabay.com/photo/2015/08/19/02/27/restaurant-895428_1280.png';

                $restaurant->name = request('name');
                $restaurant->logo = $logo;
                $restaurant->postal_address = request('postal_address');
                $restaurant->mail_address = request('mail_address');
                $restaurant->save();

                $url = '/restaurant/manage/'.$restaurant->id;
                flash('Votre restaurant a bien été modifié !')->success();
                return redirect($url);
            }
            flash('Vous ne pouvez pas modifier un restaurant qui ne vous appartient pas !')->error();
            return redirect('/dahsboard');
        }
        flash('Vous devez être connecté pour effectuer cette action !')->error();
        return redirect('/');
    }

    public function deleteRestaurant(int $id){
        $user = auth()->user();
        $restaurant = Restaurant::all()->where('id', $id)->first();
        $dish = Dish::all()->where('restaurant_id', $restaurant->id)->first();

        if($user->id == $restaurant->user_id){
            //Suppression des plats du restaurant
            foreach ($dish as $dishs) {
                $dishs->delete();
            }
            //Suppression du restaurant
            $restaurant->delete();
            flash('Votre restaurant a bien été supprimé !')->info();
            return redirect('/dashboard');
        }
        flash('Vous ne pouvez pas supprimer un restaurant qui ne vous appartient pas !')->error();
        return back();
    }
}
