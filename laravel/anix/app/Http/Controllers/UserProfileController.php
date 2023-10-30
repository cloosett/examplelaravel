<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function showProfile($name)
    {
        $user = User::where('name', $name)->first();
        if (!$user) {
            abort(404);
        }
        return view('profileuser', ['user' => $user]);
    }

}
