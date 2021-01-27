<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class InscriptionCOntroller extends Controller
{
    public function form(){
        return view('web/inscription');
    }

    public function createUser() {
        request()->validate([
            'lastname' => ['required'],
            'firstname' => ['required'],
            'email' => ['required','email'],
            'password' => ['required', 'min:8'],
            'address' => ['required'],
            'status' => ['required']
        ]);

        $user = User::create([
            'lastname' => request('lastname'),
            'firstname' => request('firstname'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'address' => request('address'),
            'status' => request('status'),
            'balance' => 0
        ]);

        return redirect('/connexion');
    }
}
