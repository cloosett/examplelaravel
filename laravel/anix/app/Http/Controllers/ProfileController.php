<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function views()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $imagePath = $request->file('avatar')->store('avatar', 'public');

        $user->update([
            'name' => $request->input('name'),
            'avatar_path' => $imagePath,
        ]);

        return redirect()->route('profile');
    }
}
