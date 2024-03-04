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
<h2>{{$hall ? "Список фильмов в зале '".$hall->name."'" : 'Неверный Id'}}</h2>
@if($hall)
    <table border="1">
        <thead>
        <td>id</td>
        <td>Название</td>
        </thead>
        @foreach($hall->films as $film)
            <tr>
                <td>{{$film->id}}</td>
                <td>{{$film->name}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
