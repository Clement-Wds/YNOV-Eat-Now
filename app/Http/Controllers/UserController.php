<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class UserController extends Controller
{
    public function index(){
        $user = User::all();

        return view('index', [
            'user' => $user
        ]);
    }

    public function form(){
        

        if(auth()->check()){
            $user = auth()->user();
            return view('web/profile', [
                'user' => $user
            ]);
        }
        flash('Vous devez être connecté pour accéder à cette page')->error();
        return redirect('/connexion');
    }
}
