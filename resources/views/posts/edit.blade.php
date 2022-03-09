@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <h3>Editar post</h3>
            {!! Form::open(['action'=>['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', $post -> title, ['class' => 'form-control','placeholder'=>'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('body', 'Body')}}
                    {{Form::text('body', $post -> body , ['class' => 'form-control','placeholder'=>'Body text'])}}
                </div>
                <div class="form-group">
                    {{Form::label('address', 'Direccion')}}
                    {{Form::text('address', $post -> address , ['class' => 'form-control','placeholder'=>'Direccion'])}}
                </div>
                <div class="card">
                    <h5 class="card-title">Si desea cambiar las imagenes suba nuevos archivos</h5>
                    <div class="card-body">
                        {{Form::file('banner1')}}   
                    </div>
                    <div class="card-body">
                        {{Form::file('banner2')}}   
                    </div>
                    <div class="card-body">
                        {{Form::file('banner3')}}   
                    </div>
                </div><br>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Editar', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection