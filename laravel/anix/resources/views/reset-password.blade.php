<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Raleway', sans-serif;
            background-color: darkcyan;
        }
        main{
            width: 35vw;
            height: 45vh;
            background-color: white;
            border-radius: 10px;
        }
        .header{
            background-color: rgba(0, 139, 139, 0.3);
            height: 25%;
            width: 100%;
            margin-top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 27px;
        }
        .header p{
            margin: 0;
        }
        form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        #email, #password, #username, #password_confirmation{
            width: 75%;
            height: 30px;
            margin-top: 25px;
        }
        .org{
            width: 75%;
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .org button{
            width: 100px;
            height: 25px;
            border-radius: 10px;
            border: 1px solid grey;
            background-color: rgba(0, 139, 139, 0.1);
        }
        a {
            text-decoration: none; /* Відключити будь-яке підкреслення */
            color: inherit; /* Успадковувати колір від батька (наприклад, текстового блоку) */
        }
    </style>
</head>
<body>
<main>
    <div class="header">
        <p>Reset password</p>
    </div>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    <form action="{{route('password.resetlogic')}}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{$request -> token }}">
        <input type="email" name="email" value="{{$request->email}}" id="email" placeholder="Логін або email">
        <input type="password" name="password" id="password" placeholder="Пароль">
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Підтвердження Пароля">
        <div class="org">
            <button type="submit">Реєстрація</button>
        </div>
    </form>
</main>
</body>
</html>
