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
            height: 30vh;
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
        #emeil{
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
            width: 80px;
            height: 25px;
            border-radius: 10px;
            border: 1px solid grey;
            background-color: rgba(0, 139, 139, 0.1);
        }
        a {
            text-decoration: none; /* Відключити будь-яке підкреслення */
            color: inherit; /* Успадковувати колір від батька (наприклад, текстового блоку) */
        }
        .resetbutton {
            display: inline-block;
            padding: 20px 100px;
            margin-top: 70px;
            background-color: #0afd16;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<main>
    <div class="header">
        <p>Відновлення пароля</p>
    </div>
    <form method="POST" action="{{route('forgot.logic')}}">
        @csrf
        <input type="text" name="email" id="emeil" value="{{ old('email') }}" placeholder="Email">
        @error('email')
        <p>{{$message}}</p>
        @enderror
        @if(session('status'))
            <p>{{session('status')}}</p>
        @endif
        <button type="submit" class="resetbutton">Вхід</button>
        </div>
    </form>
</main>
</body>
</html>
