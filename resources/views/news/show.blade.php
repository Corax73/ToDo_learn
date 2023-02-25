<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Список новостей</title>
</head>
<body>
<p align="center"><a href="{{ url('/home') }}">Home</a></p>
<div class="container">
        <div class="col-8">
        <form action="{{ route('destroy', $news -> id) }}" accept-charset="UTF-8">
        {{ csrf_field()  }}
        @method ('delete')
            <h2>{{ $news->name }}</h2>
            <h3>{{ $news->body }}</h3>
            <p><img src="{{ Storage::url($news->image) }}" alt=""></p>
            <button type="submit" name="action" value="delete" class="btn btn-danger">Удалить</button>
            <button type="submit" name="action" value="download">Скачать</button>
        </form>
        </div>
        <a href="{{ route('news') }}">To the news</a>
</div>
</body>
</html>