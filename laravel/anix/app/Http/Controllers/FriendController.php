<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function views(){
        return view('friends');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('name', $query) -> first();
        return view('friends', ['user' => $users]);
    }
}
