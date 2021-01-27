<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function form(){
        if(auth()->check()){
            $user = auth()->user();
            return view('web/balance', [
                'user' => $user
            ]);
        }
        flash('Vous devez être connecté pour accéder à cette page')->error();
        return redirect('/connexion');
    }

    public function formRestorer(){
        if(auth()->check()){
            $user = auth()->user();
            return view('restaurateur/balanceRestorer', [
                'user' => $user
            ]);
        }
        flash('Vous devez être connecté pour accéder à cette page')->error();
        return redirect('/connexion');
    }

    public function pay(){
        $user = auth()->user();

        request()->validate([
            'email' => ['required'],
            'balance' => ['required']
        ]);

        if($user->email == request('email')){
            $user->balance = request('balance');
            $user->save();

            flash('Votre solde a été réapprovisionné avec succès !')->success();
            return redirect('/balance');
        }
        flash('Email incorrect, nous ne pouvons pas réapprovisionner votre solde !')->error();
        return redirect('/balance');
    }

    public function payRestorer(){
        $user = auth()->user();

        request()->validate([
            'email' => ['required'],
            'balance' => ['required']
        ]);

        if($user->email == request('email')){
            $user->balance = request('balance');
            $user->save();

            flash('Votre solde a été réapprovisionné avec succès !')->success();
            return redirect('/balanceRestorer');
        }
        flash('Email incorrect, nous ne pouvons pas réapprovisionner votre solde !')->error();
        return redirect('/balanceRestorer');
    }
}
