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
}
