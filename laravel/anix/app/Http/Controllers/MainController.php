<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PostModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    public function main()
    {
        $posts = PostModel::orderBy('created_at', 'desc')->get();

        return view('main', ['posts' => $posts]);


    }
}

