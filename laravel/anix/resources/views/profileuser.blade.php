<?php use Illuminate\Support\Facades\Auth; ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('css/profilestyle.css')}}">
</head>
<body>
<nav>
    <div class="navigation">
        <h1 style="margin-top: 15px;"><a href="{{ route('name') }}" style="text-decoration: none; font-size: 35px;">Anix</a></h1>
        <a>Користувач</a>
        <a>Повідомлення</a>
        <a>Друзі</a>
    </div>
    @auth
        <div class="user">
            <img src="{{asset('storage/img/no-avatar.jpg')}}" alt="#">
            <?php echo "<p>" . (Auth::user() ? Auth::user() -> name : 'User') . "</p>"; ?>
            <a href="{{route('logout')}}" class="logoutbutton">Logout</a>
        </div>
    @endauth
    @guest
        <div class="registration_buttons">
            <button class="registration">Реєстрація</button>
            <button class="login">Вхід</button>
        </div>
    @endguest
</nav>
<main>
    <div class="photo">
        <img class="image" src="{{asset('storage/' . $user->avatar_path)}}" alt="#">
    </div>
        <div class="form">
            <div class="plate">
                <h1>Профіль користувача: {{$user->name}}</h1>
                <h2>Емейл користувача: {{$user->email}}</h2>

                <button type="submit" class="buttonupdate">Добавити в друзі</button>
            </div>
        </div>
</main>
</body>
</html>
