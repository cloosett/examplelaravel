<?php use Illuminate\Support\Facades\Auth; ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
<nav>
    <div class="navigation">
        <h1 style="margin-top: 15px;"><a href="{{ route('name') }}" style="text-decoration: none; font-size: 35px;">Anix</a></h1>
        <a>Користувач</a>
        <a>Повідомлення</a>
        <h1 style="margin-top: 15px;"><a href="{{ route('friends') }}" style="text-decoration: none; font-size: 20px;">Друзі</a></h1>
    </div>
    @auth
        <div class="user">
            <img src="{{asset('storage/img/no-avatar.jpg')}}" alt="#">
            <?php echo "<p>" . (Auth::user() ? Auth::user() -> name : 'User') . "</p>"; ?>
            <a href="{{route('profile')}}" class="profilebutton">Profile</a>
        </div>
    @endauth

    @guest
        <div class="user">
            <a href="{{route('register')}}" class="button">Реєстрація</a>
            <br>
            <a href="{{route('login')}}" class="buttonlogin">Логін</a>
        </div>
    @endguest
</nav>
<main>
    @if(isset($user))
        <div class="userPost">
            <header>
                <h1 style="margin-bottom: 50px;margin-left: 315px; font-size: 35px">User Search</h1>
                <img class="image" src="{{ asset('storage/' . $user->avatar_path) }}" alt="#" style="width: 85px; height: 115px; margin-top: 150px; margin-right: 100px;">
                <h2 style="margin-top: 150px; margin-right: 300px">{{$user->name}}</h2>
                <button type="submit">Search</button>
            </header>
        </div>
    @endif
    @if(!isset($user))
    <div class="userPost">
            <header>
                <h1>User Search</h1>
                <form action="{{route('search')}}" method="post">
                    @csrf
                    <input class="search-input" type="text" name="query" placeholder="Search for users">
                    <button type="submit">Search</button>
                </form>
            </header>
    </div>
        @endif
</main>
</body>
</html>
