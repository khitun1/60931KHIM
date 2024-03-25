<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>609-31</title>
    <style> .is-invalid {color: red;} </style>
</head>
<body>
    @if($user)
        <h2>Здравствуйте, {{ $user->name }}</h2>
        <a href={{url('logout')}}>Выйти из системы</a>
    @else
        <h2>Вход в систему</h2>
        <form method="post" action={{url('auth')}}>
        @csrf
        <label for="mail">E-mail</label>
        <input id="mail"
        type="text" name="email" value="{{ old('email') }}"/>
        @error('email')
        <div class="is-invalid">{{ $message }}</div> @enderror
        <br>
        <label for="pswd">Пароль</label>
        <input type="password" id="pswd"
               name="password" value="{{ old('password') }}"/>
        @error ('password')
        <div class="is-invalid">{{ $message }}</div> @enderror
        <br>
        <input type="submit">
        </form>
        @error ('error')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
    @endif
</body>
</html>
