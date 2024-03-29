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
        .form {
            margin-left: 30%;
        }
        h2 {
            margin-left: 45%;
        }
    </style>
    <title>609-31</title>
</head>
<body>
@extends('layout')
@section('content')
<h2>Редактирование сеанса</h2>
<form method="post" class="w-50 form" action={{url('session/update/'.$session->id)}}>
    @csrf
    <div class="mb-3">
        <label class="form-label">Название фильма: </label>
        <select class="form-select"
            name="film_id" value="{{old('film_id')}}">
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
    </div>

    @error('film_id')
    <div class="invalid">{{$message}}</div>
    @enderror
    <br>
    <div class="mb-3">
        <label class="form-label">Зал: </label>
        <select class="form-select"
            name="hall_id" value="{{old('hall_id')}}">
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
    </div>
    @error('hall_id')
    <div class="invalid">{{$message}}</div>
    @enderror
    <br>
    <div class="mb-3">
        <label class="form-label">Дата и время: </label>
        <input type="datetime-local" name="beginning" class="form-control"
               value="{{date("Y-m-d H:i", strtotime($session->beginning))}}"/>
    </div>
    @error('beginning')
    <div class="invalid">{{$message}}</div>
    @enderror
    <br>
    <button type="submit" class="btn btn-outline-success">Изменить</button>
</form>
@endsection
</body>
</html>
