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
    @auth
    <div class="newPost">
        <a href="{{route('createpost')}}" class="buttoncreate">Create new post</a>
    </div>
    @endauth
        @foreach($posts as $post)
    <div class="userPost">
        <header>
            <div class="nickname">
                <img src="{{asset('storage/img/no-avatar.jpg')}}" alt="#">
                    <p>Автор: {{ $post->user_id }}</p>

            </div>
            <div class="date">
                <p>Date: {{$post -> created_at}}</p>
            </div>
        </header>
        <main class="post">
            <div class="postTitle">
                <h3>{{$post->subject}}</h3>
                <p>{{$post->text}}</p>
            </div>
            <div class="postImage">
                <img src="{{asset('storage/' . $post->img)}}" alt="#">
            </div>

            <div class="buttonLike">
                <button>Забрати лайк</button>
                <img src="{{asset('storage/img/no-avatar.jpg')}}" alt="#">
            </div>
        </main>
    </div>
        @endforeach
</main>
</body>
</html>
