@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{$user -> avatar}}" style="width: 150px; height: 150px; float: left; border-radius: 40%; margin-right: 25px"></img>
            <br>
            <h2>{{$user->name}}'s profile </h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Actualizar imagen de perfil</label><br>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" class="btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
