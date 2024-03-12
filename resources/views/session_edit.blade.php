<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .invalid {
            color: red;
        }
    </style>
    <title>609-31</title>
</head>
<body>
<h2>Редактирование сеанса</h2>
<form method="post" action={{url('session/update/'.$session->id)}}>
    @csrf
    <label>Название фильма: </label>
    <select name="film_id" value="{{old('film_id')}}">
        @foreach($films as $film)
            <option value="{{$film->id}}"
                    @if(old('film_id'))
                        @if(old('film_id') == $film->id)
                            selected
                        @endif
                    @else
                        @if($session->film_id == $film->id)
                            selected
                         @endif
                   @endif>
                {{$film->name}}
            </option>
        @endforeach
    </select>
    @error('film_id')
    <div class="invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Зал: </label>
    <select name="hall_id" value="{{old('hall_id')}}">
        @foreach($halls as $hall)
            <option value="{{$hall->id}}"
                    @if(old('hall_id'))
                        @if(old('hall_id') == $hall->id)
                            selected
                        @endif
                    @else
                        @if($session->hall_id == $hall->id)
                            selected
                        @endif
                    @endif>
                {{$hall->name}}
            </option>
        @endforeach
    </select>
    @error('hall_id')
    <div class="invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Дата и время: </label>
    <input type="datetime-local" name="beginning"
           value="{{date("Y-m-d H:i", strtotime($session->beginning))}}"/>
    @error('beginning')
    <div class="invalid">{{$message}}</div>
    @enderror
    <br>
    <input type="submit" value="Изменить">
</form>
</body>
</html>
