<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Contacto</title>
    </head>

    <body>
        <h1>Contacto</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/recibir-form-contacto">
            @csrf
            <label for="name">
                Nombre: <input type="text" id="name" name="nombre" value="{{ old('nombre')?? $nombre_default }}">
            </label>
            @error('nombre')
                <i>{{  $message }}</i>
            @enderror
            <br>
            <label for="mail">
                Correo: <input type="email" id="mail" name="correo" value="{{ old('correo')?? $correo_default }}">
            </label>
            @error('correo')
                <i>{{  $message }}</i>
            @enderror
            <br>
            <label for="comment">
                Comentario: <br><textarea id="comment" name="comentario" cols="40" rows="5">{{ old('comentario')?? null}}</textarea>
            </label>
            @error('comentario')
                <i>{{  $message }}</i>
            @enderror
            <br>
            <button type="submit">Enviar</button>
            <br>
            <a href="landingpage">Inicio</a>
        </form>
    </body>

</html>