<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function views()
    {
        return view('createpost');
    }

    public function createpost(Request $request)
    {
//        // Валідація введених даних
//        $request->validate([
//            'subject' => 'required|max:255', // Приклад: обов'язкове поле та максимальна довжина 255 символів
//            'text' => 'required',
//            'photo' => 'image|mimes:jpeg,png,gif|max:2048', // Переконайтесь, що це валідація для файлу
//        ]);
        $finduserid = Auth::id();
        $user_id = User::find($finduserid);
        $user_name = $user_id->name;
        $form = new PostModel;
        $form->text = $request->input('description');
        $form->user_id = $user_name;
        $form->subject = $request->input('subject');
        $imagePath = $request->file('photo')->store('img', 'public');
        $form->img = $imagePath;


        $form->save();

        return redirect('/');
    }
}
