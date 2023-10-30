<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function views(){
        return view('register');
    }

    public function registration(Request $req){
        $req->validate([
            'name' => 'required|string|min:4|max:16',
            'email' => 'required|email|unique:users,email', // Виправлений синтаксис
            'password' => 'required|string|min:4|max:16|confirmed'
        ]);

        $users = User::create([
                'name' => $req -> name,
                'email' => $req -> email,
                'password' => $req -> password
            ]);
        // php artisan migrate
        Auth::login($users);
        return redirect('/');
        }
}
