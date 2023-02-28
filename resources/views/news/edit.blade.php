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
        <h1>Добавить новость</h1>
        <form method="post" action="{{ route('news.update', $news -> id) }}" enctype="multipart/form-data">
        @csrf
        @method ('patch')
            <div class="form-group">
                <label for="name">Название новости</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $news -> name }}">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="body">Содержание</label>
                <textarea class="form-control" id="body" rows="3" name="body">{{ $news -> body }}</textarea>
                @if ($errors->has('body'))
                <span class="text-danger">{{ $errors->first('body') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Картинка для новости:</label>
                {{ $news -> image }}
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
    <a href="{{ route('news.index') }}">To the news</a>
</div>
</body>
</html>