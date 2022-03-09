@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row ">
            <h3>Posts</h3>
            @if(count($posts) >= 1)
                @foreach($posts as $post)
                <div class="col-md-4 " >
                    <div class="card" style="width: 70%;">
                        <img src="/uploads/banners/{{$post -> banner1}}" class="card-img-top" alt="Foto post">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h5>
                            <p class="card-text">{{$post->body}}</p>
                            <small>Creado el {{$post->created_at}} por {{$post->user->name}}</small>
                        </div>
                    </div>
                    <br><br>
                </div>
                @endforeach
                {{$posts->links()}}
            @else
                <p>No se encontraron anuncios</p>
            @endif
    </div>
</div>
@endsection