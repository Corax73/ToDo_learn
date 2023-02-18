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
    @foreach($news as $item)
        <div class="col-8">
        <form method="get" action="{{ route('destroy', $item->id) }}" accept-charset="UTF-8">
        {{ csrf_field()  }}
            <h2>{{ $item->name }}</h2>
            <h3>{{ $item->body }}</h3>
            <p><img src="{{ Storage::url('/mini/' . 'mini'. $item->image) }}" alt=""></p>
            <button type="submit" name="action" value="delete">Удалить</button>
            <button type="submit" name="action" value="download">Скачать</button>
        </form>
        </div>
    @endforeach
</div>
<div class="container">
    <div class="col-8">
        <h1>Добавить новость</h1>
        <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
        {{ csrf_field()  }}
            <div class="form-group">
                <label for="name">Название новости</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="body">Содержание</label>
                <textarea class="form-control" id="body" rows="3" name="body" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Картинка для новости</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>
</body>
</html>