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
    <h2>{{$film ? "Список сеансов для фильма '".$film->name."'" : 'Неверный Id'}}</h2>
    @if($film)
        <table border="1">
            <thead>
                <td>id</td>
                <td>Начало</td>
            </thead>
            @foreach($film->sessions as $session)
                <tr>
                    <td>{{$session->id}}</td>
                    <td>{{$session->beginning}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>
