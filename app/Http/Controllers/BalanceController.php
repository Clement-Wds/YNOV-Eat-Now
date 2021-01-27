<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function balanceForm(){
        if(auth()->check()){
            $user = auth()->user();
            return view('web/balance', [
                'user' => $user
            ]);
        }
        flash('Vous devez être connecté pour accéder à cette page')->error();
        return redirect('/connexion');
    }
}
