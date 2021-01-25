<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class HomeController extends Controller
{
    public function home(){
        $user = auth()->user();

        if (auth()->check()){
            if ($user->status == 'Restaurateur'){
                return redirect('/dashboard');
            }
            return redirect('/home');
        }
        return redirect('/home');
        
    }
}
