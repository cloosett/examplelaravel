<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ResetpasswordController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\ProfileController;


Route::get('/', [MainController::class , 'main']) -> name('name');

Route::get('/login', [LoginController::class, 'views']) -> middleware('guest') -> name('login');
Route::post('/login', [LoginController::class, 'stores']) -> name('stores');

Route::get('/register' , [RegisterController::class, 'views']) -> middleware('guest') -> name('register');
Route::post('/register' , [RegisterController::class, 'registration']);

Route::get('/createpost' , [PostController::class, 'views']) -> name('viewpost');
Route::post('/createpost' , [PostController::class, 'createpost']) -> name('createpost');

Route::get('/forgotpassword' , [ResetpasswordController::class, 'forgotview']) -> middleware('guest')-> name('forgot.view');
Route::post('/forgotpassword' , [ResetpasswordController::class, 'forgotlogic'])-> middleware('guest') -> name('forgot.logic');
Route::get('/reset-password' , [ResetpasswordController::class, 'resetview'])-> middleware('guest') -> name('password.reset');
Route::post('/reset-password' , [ResetpasswordController::class, 'resetlogic']) -> middleware('guest') -> name('password.resetlogic');

Route::get('/logout', [LogoutController::class, 'logouter']) -> name('logout');

Route::get('/profile' , [ProfileController::class, 'views']) -> name('profile');
Route::post('/profile', [ProfileController::class, 'update']) ->name('profile.update');;

Route::get('/friends' , [FriendController::class, 'views']) -> name('friends');
Route::post('/friends' , [FriendController::class, 'search']) -> name('search');
Route::get('/{user}' , [UserProfileController::class, 'showprofile']) -> name('showprofile');


