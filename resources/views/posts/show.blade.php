@extends('layouts.app')

@include('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->head}}</div>
                    <div class="panel-body">
                        <article>
                            @if(Storage::exists('images/'.$post->img))
                            <img style="height: 150px;" src="{{$url = Storage::url('images/'.$post->img)}}" alt="{{$post->img}}">
                            @else
                            <img style="height: 150px;" src="{{$post->img}}" alt="{{$post->img}}">
                            @endif
                            <div class="body">{!! $post->text !!}</div>
                            <div class="center-block">Добавленно: {{ $post->created_at->diffForHumans()}}</div>
                            <div class="center-block">Измененно: {{ $post->updated_at->diffForHumans()}}</div>
                            <div class="center-block">Добавил: {{ $post->getUsername($post->user_id)}}</div>
                            <form method="post" action="/posts/{{ $post->id}}">
                                {{ csrf_field()}}
                                {{ method_field('DELETE') }}
                                @if (auth()->check())
                                    @if($post->user_id == auth()->id() || $post->user_id_like == auth()->id())
                                        <a href="/posts/{{ $post->id}}/edit" class="btn btn-success" role="button">Изменить</a>
                                    @endif
                                    @if($post->user_id == auth()->id())
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    @endif
                                @endif
                            </form>
                            <hr>
                            @foreach ($post->comments as $comment)
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Автор комментария: {{ $post->getUsername($comment->user_id)}}</h3>
                                    </div>
                                    <div class="panel-body">
                                        {{ $comment->text }}
                                    </div>
                                </div>
                            @endforeach
                        </article>
                        <hr>
                        @include('comments.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection