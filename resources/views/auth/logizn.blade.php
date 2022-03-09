<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>
<body>
    <div class="grid">
        @include('navbar')
        <div class="loginform">
            <form method="POST" action="{{ route('login') }}">Inicie Sesión en tu cuenta de Nail&Hair
            @csrf
            <br class="responsive">
            <br>
            <label for="email">{{ __('Correo electronico') }}</label><br>
            <input type="email" id="email" name="email" placeholder="Ingrese su correo " class="textbox @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <br>
            <label for="passsword">{{ __('Contraseña') }}</label><br>
            <input type="password" id="password" name="password" placeholder="Ingrese su Contraseña" class="textbox  @error('password') is-invalid @enderror" required autocomplete="current-password">
            <br>
            <br>
            @error('email')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
            <button type="submit" class="boton">{{ __('Iniciar Sesion') }}</button>
            </form>
        </div>


   </div>
</body>
</html>