<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>609-31</title>
</head>
<body>
<h2>Список сеансов</h2>
<table border="1">
    <thead>
    <td>id</td>
    <td>Название фильма</td>
    <td>Начало</td>
    <td>Зал</td>
    <td>Действия</td>
    </thead>
    @foreach($sessions as $session)
        <tr>
            <td>{{$session->id}}</td>
            <td>{{$session->film->name}}</td>
            <td>{{$session->beginning}}</td>
            <td>{{$session->hall->name}}</td>
            <td>
                <a href="{{url('session/destroy/'.$session->id)}}">Удалить</a>
                <a href="{{url('session/edit/'.$session->id)}}">Редактировать</a>
            </td>
        </tr>
    @endforeach
</table>
<button>
    <a href="{{url('session/create')}}">Создать</a>
</button>
</body>
</html>
