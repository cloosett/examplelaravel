<?php
use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('css/createpost.css')}}">
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
            <p>{{ Auth::user()->name }}</p>
        </div>
    @endauth

</nav>
<main>
    <form method="post" action="{{route('createpost')}}" enctype="multipart/form-data">
    <div class="add_post">
        <h1>Добавити пост</h1>
        @csrf
        <label for="subject">Заголовок: </label>
        <input type="text" id="subject" name="subject">
        <br>
        <label for="description">Опис:</label>
        <input type="text" id="description" name="description">
        <br>
        <label for="photo">Фото:</label>
        <input type="file" id="photo" name="photo">
        <button type="submit" class="postbutton">Відправити</button>
    </div>
    </form>
</main>
</body>
</html>
