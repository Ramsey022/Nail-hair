@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <a href="/posts/" class="btn btn-primary">Regresar</a>
            <br><br>
            <h3>{{$post  -> title}}</h3>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="width: 90%">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="/uploads/banners/{{$post -> banner1}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/uploads/banners/{{$post -> banner2}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/uploads/banners/{{$post -> banner3}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div><br>
            <h4> Escrito el {{$post  -> created_at}} por {{$post->user->name}}</h4>
            <h5> {{ $post->body }}</h5>
            @if(!Auth::guest())
                @if(Auth::user()->id == $post -> user_id)
                <a href="/posts/{{$post -> id}}/edit" class="btn btn-primary">Editar Anuncio</a>
                {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-end'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::button('Eliminar', ['class' => 'btn btn-danger','data-bs-toggle'=>'modal','data-bs-target'=>'#exampleModal'])}}

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Confirme que desea eliminar este anuncio
                            </div>
                            <div class="modal-footer">
                                {{Form::button('Cancelar', ['class' => 'btn btn-primary','data-bs-dismiss'=>'modal'])}}
                                {{Form::submit('Eliminar', ['class' => 'btn btn-danger'])}}
                            </div>
                            </div>
                        </div>
                    </div>  
                {!!Form::close()!!}
                @endif
            @endif
        </div>
    </div>
</div>
@endsection('content')