@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}

                </div>

                <div class="card-body">
                    <a href="/posts/create" class="btn btn-primary">¡Crea un anuncio!</a><br><br>
                    <h3>Tus anuncios</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}" class="btn btn-primary">Ver anuncio</a></td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Editar</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-end'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Eliminar', ['class' => 'btn btn-danger'])}}  
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>No has creado ningun anuncio</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
