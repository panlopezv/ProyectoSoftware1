@extends('Master2')

@section('css')
 <link href="css/simple-sidebar.css" rel="stylesheet">
<link href="css/style2.css" rel="stylesheet">
@endsection

@section('script')

@endsection

@section('contenido')

<!-- Text input-->
<div class="espacio"/> 
<div class="espacio"/>   
<div class="starter-template">
  <div class="container">
    <div class ="row">
      <div class ="col-md-8 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Modificar Usuario</div>
            <div class="panel-body">
              

                @if ($errors->any())
                  <div class="alert alert-info" role="alert">
                    <p>Corrige los siguientes errores</p>
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{!! $error !!}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
              

              {!! Form::open(array('route' => 'actualizar.store', 'files' => true)) !!}
                 

                <div class="form-group">
                  {!! Form::label('nombre', 'Nombres') !!}
                  {!! Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => $persona->nombres ) ) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('apellido', 'Apellidos') !!}
                  {!! Form::text('apellido', null, array('class' => 'form-control' , 'placeholder' => $persona->apellidos)) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('usuario', 'Usuario') !!}
                  {!! Form::text('usuario', null, array('class' => 'form-control', 'placeholder' => $usuario->usuario ) ) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('correo', 'Correo Electronico') !!}
                  {!! Form::email('correo', null, array('class' => 'form-control', 'placeholder' => $usuario->correo) ) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('contrasenia', 'Contraseña') !!}
                  {!! Form::password('contrasenia', array('class' => 'form-control', 'placeholder' => 'Escriba una contraseña para cambiarla' ) ) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('conContrasenia', 'Repita Contraseña') !!}
                  {!! Form::password('conContrasenia', array('class' => 'form-control', 'placeholder' => 'Escriba la contraseña de nuevo' ) ) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('sexo', 'Sexo') !!}
                  {!! Form::select('sexo', array('' => 'Seleccione', '1' => 'Hombre', '0' => 'Mujer' ), $persona->sexo , array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                  {!! Form::checkbox('palomita', 'value') !!}
                  {!! Form::label('avatar', 'Cambiar imagen') !!}
                  {!! Form::file('avatar') !!}
                </div>



                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-lg active">Aceptar</button>
                  <a class="btn btn-danger btn-lg active" href="/perfil" role="button">Cancelar</a>
                </div>
                        
              {!! Form::close() !!}

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection