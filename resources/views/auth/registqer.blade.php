<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/registro.css') }}">
    <script src="Usuarios.js"></script>
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
            <form method="POST" action="{{ route('register') }}">Registrate en Nail&Hair
            @csrf
                <br class="responsive">
                <br>
                <label for="name">{{ __('Nombre') }}</label><br>
                <input type="text" id="name" name="name" placeholder="Ingrese su nombre" class="textbox @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <br>
                <label for="username">Nombre de usuario:</label><br>
                <input type="text" id="username" name="username" placeholder="Ingrese su usuario" class="textbox {{ $errors->has('username') ? ' has-error' : '' }}" value="{{ old('username') }}" required>
                <br>
                <label for="email">{{ __('Correo electronico') }}</label><br>
                <input type="email" id="email" name="email" placeholder="Ingrese su Email" class="textbox  @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                <br>
                <label for="passsword">{{ __('Contraseña') }}</label><br>
                <input type="password" id="password" name="password" placeholder="Ingrese su Contraseña" class="textbox @error('password') is-invalid @enderror" required autocomplete="new-password">
                <br>
                <label for="password-confirm">Confirme la Contraseña:</label><br>
                <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirme su Contraseña" class="textbox" required autocomplete="new-password">
                <br>
                <label>Tipo de Usuario:</label>
                <br>
                <select id="tipo" class="textbox {{ $errors->has('tipo') ? ' has-error' : '' }}" id="inputGroupSelect01" name="tipo" value="{{ old('tipo') }}" required>
                    <option value="trabajador">trabajador</option>
                    <option value="cliente">cliente</option>
                </select>
                <br>
                <br>
                <button type="submit" class="boton">{{ __('Registrarse') }}</button>
            </form>
            @error('name')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if ($errors->has('username'))
                <span>
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
            @error('email')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('password')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if ($errors->has('tipo'))
                <span>
                    <strong>{{ $errors->first('tipo') }}</strong>
                </span>
            @endif
        </div>
   </div>
</body>
</html>