@extends('master')

@section('css')
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"></link>
<link rel="stylesheet" type="text/css" href="lib/css/prettify.css"></link>
<link rel="stylesheet" type="text/css" href="src/bootstrap-wysihtml5.css"></link>
<style type="text/css" media="screen">
  .btn.jumbo {
    font-size: 20px;
    font-weight: normal;
    padding: 14px 24px;
    margin-right: 10px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
  }
</style>

@endsection
@section('script')
<!--<script src="{{asset('js/wysihtml5-0.3.0.js')}}"></script>
<script src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
<script src="{{asset('js/bootstrap-wysihtml5.js')}}"></script>-->
<script src="lib/js/wysihtml5-0.3.0.js"></script>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script src="lib/js/prettify.js"></script>
<script src="src/bootstrap-wysihtml5.js"></script>


<script>
  $('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
  $(prettyPrint);
</script>


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
          <div class="panel-heading">Completar informacion</div>
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
              

              {!! Form::open(array('route' => 'controladorPersona.store')) !!}
                 

                <div class="form-group">
                  {!! Form::label('nombre', 'Nombres') !!}
                  {!! Form::text('nombre', null, array('class' => 'form-control' ) ) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('apellido', 'Apellidos') !!}
                  {!! Form::text('apellido', null, array('class' => 'form-control' )) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('sexo', 'Sexo') !!}
                  {!! Form::select('sexo', array('' => 'Seleccione', '1' => 'Hombre', '0' => 'Mujer' ), null, array('class' => 'form-control' )) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('fechaNacimiento', 'Fecha de Nacimiento') !!}
                  {!! Form::date('fechaNacimiento', \Carbon\Carbon::now()) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('avatar', 'Seleccione una imagen') !!}
                  {!! Form::file('avatar'); !!}
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg active">Aceptar</button>
                    <button type="button" class="btn btn-default btn-lg active">Omitir</button>
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