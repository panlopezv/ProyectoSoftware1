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
<script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector : "#descripcion",
    toolbar : "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
  });
</script>


@endsection

@section('contenido')

<!-- Text input-->     
<div class="espacio">
 <div class="row">
      <div class ="col-md-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">
        <div class="panel panel-default">
          <!--<div class="panel-heading">Nuevo tema.</div>-->
          <div class="panel-body">
            @if ($errors->any())
            <div class="alert alert-info" role="alert">
              <p>Corregir los siguientes campos:</p>
              <ul>
                @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
                @endforeach
              </ul>
            </div>
            @endif

            {!! Form::open(array('route' => 'controladorEjemplo.store', 'files' => true)) !!}

            <div class="form-group">
              {!! Form::text('temaid', "$tema->temaid", array('class' => 'form-control', 'style' => 'display:none') ) !!}
              {!! Form::label('titulo', 'Titulo') !!}
              {!! Form::text('titulo', null, array('class' => 'form-control', 'placeholder' => 'Titulo del ejemplo') ) !!}
            </div>

            <div class="form-group">
              {!! Form::label('descripcion', 'Descripcion') !!}
              {!! Form::textarea('descripcion', null, array('class' => 'form-control', 'placeholder' => 'Descripcion del ejemplo', 'name' => 'descripcion')) !!}
            </div>

            <div class="form-group">
              {!! Form::label('archivo', 'Seleccione un archivo txt') !!}
              {!! Form::file('archivo'); !!}
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success btn-lg active">Aceptar</button>
              <?php
              echo '<a class="btn btn-danger btn-lg active" href="/temas/';
              echo $tema->temaid;
              echo '" role="button">Cancelar</a>';
              ?>
            </div>
            
            {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('navegacion')
  <div class="navegacion">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-4">
          <h1>
            Nuevo ejemplo
          </h1>
        </div>
        <div class="col-lg-8 col-sm-8">
          <ol class="breadcrumb pull-right">
            <li>
              <a href='/'>
                Principal
              </a>
            </li>
            <li>
              <a href='/categorias'>
                Categorias
              </a>
            </li>
            <li>
              <a href={{ '/categorias/'.$tema->categoriaid }}>
                {{ $tema->categoria }}
              </a>
            </li>
            <li>
              <a href={{ '/temas/'.$tema->temaid }}>
                {{ $tema->titulo }}
              </a>
            </li>
            <li class="active">
              Creando ejemplo
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  @endsection