@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Изменить</div>
                <div class="panel-body">
                    <form method="post" action="/posts/{{$post->id}}" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        {{ method_field('PUT') }}
                        <input type="hidden" class="form-control" id="author" name="author" value="{{$post->author}}">
                        <div class="form-group">
                            <label for="head">Заголовок</label>
                            <input type="text" class="form-control" id="head" name="head" value="{{$post->head}}">
                        </div>
                        <div class="form-group">
                            <label for="text">Текст</label>
                            <textarea class="form-control" id="text" name="text">{!! $post->text !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="img_new">Картинка</label>
                            <input type="file" id="img_new" name="img_new">
                            <input type="hidden" name="img" value="{{$post->img}}">
                        </div>
                        <button type="submit" class="btn btn-default">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection