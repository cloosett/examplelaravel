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
            <img src="{{asset('storage/' . auth()->user() -> avatar_path)}}" alt="#">
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
        <img class="image" src="{{asset('storage/' . auth()->user() -> avatar_path)}}" alt="#">
    </div>
    <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">

    <div class="form">
        <div class="plate">
            @csrf
            <h2>Особистий кабінет</h2>
            <input type="text" name="name" id="name" value = {{auth() -> user() -> name}}>
            <input type="file" name="avatar" id="avatar" placeholder="File not selected">
            <button type="submit" class="buttonupdate">Update date</button>
        </div>
    </div>

    </form>
</main>
</body>
</html>
