<!DOCTYPE html>
<html>
    <head>
        <title>Lista de personas</title>
    </head>
    <body>      
        <table class="persona">
            <tr>
                <th>nombres</th>
                <th>apellidos</th>
                <th>fechanacimiento</th>
                <th>ubicacionavatar</th>
                <th>sexo</th>
            </tr>
            @foreach ($personas as $persona)
            <tr>
                <td>{{ $persona->nombres }}</td>
                <td>{{ $persona->apellidos }}</td>
                <td>{{ $persona->fechanacimiento }}</td>
                <td>{{ $persona->ubicacionavatar }}</td>
                <td>{{ $persona->sexo }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
