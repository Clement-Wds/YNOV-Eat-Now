<?php

namespace App\Http\Controllers;


use App\Models\User as User;
use App\Models\Restaurant as Restaurant;
use App\Models\Dish as Dish;
use App\Models\Order as Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function newOrder(int $id){
        if(auth()->check()){
            $user = auth()->user();
            $dish = Dish::all()->where('id', $id)->first();
            $restaurant = Restaurant::all()->where('id', $dish->restaurant_id)->first();
            $orders = Order::all()->where('user_id', $user->id);
            $check_value = 0;

            // foreach($orders->status == 1 as $order){
            //     if($order->restaurant_id != $restaurant->id){
            //         $check_value = 1;
            //     }
            // }

            if($check_value == 0){
                Order::create([
                    'user_id' => $user->id,
                    'address_client' => $user->address,
                    'status' => 1,
                    'price' => $dish->price + 2.50,
                    'restaurant_id' => $restaurant->id,
                    'dish_id' => $dish->id,
                    'dish_name' => $dish->name,
                    'dish_price' => $dish->price,
                    'restaurant_name' => $restaurant->name
                ]);
                flash('Votre commande a bien été prise en compte');
                return back();
            }
            //flash('Vous ne pouvez pas commander des plats de plusieurs restaurants différents !');
        }
        else{
            flash('Vous devez être connecté pour commander un plat !')->error();
            return redirect('/connexion');
        }
    }

    public function shoppingCart(){
        if(auth()->check()){
            $user = auth()->user();
            $orders = Order::all();

            if($user->status == 'Client'){
                return view('order/shopping_cart', [
                    'user' => $user,
                    'orders' => $orders
                ]);
            }

            if($user->status == 'Restaurateur'){
                return view('order/shopping_cartResto', [
                    "user" => $user,
                    'orders' => $oders
                ]);
            }
        }
    }
}
