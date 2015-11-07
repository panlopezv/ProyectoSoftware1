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

@section('contenido')
<div class="container">
  <div class="col-xs-6 col-lg-3 sidebar-offcanvas" id="sidebar">
    <div class="list-group"> 
      <h3>
        <a>Ejemplos</a>
      </h3>
      @foreach ($ejemplos as $ejemplo)
      <a href={{ '../ejemplos/'.$ejemplo->id }} class="list-group-item">{{ $ejemplo->titulo }}</a>
      @endforeach
    </div>
  </div><!--/.sidebar-offcanvas-->
  <div class="col-lg-8 col-sm-12">
    <h1>
      <a>{{ $tema->titulo }}</a>
    </h1>
    {{ printf($tema->contenido) }}
    <blockquote>
      <p>{{ $tema->referencia }}</p>
      <small>
        <cite title="Referencia">
          Referencia
        </cite>
      </small>
    </blockquote>
    <form action={{ '../nuevoejemplo/'.$tema->id }} >
      <input type="submit" class="btn btn-success btn-lg active" value="¡Aporta con un ejemplo!">
    </form>
    <div class="media">
      <h3>
        Comentarios
      </h3>
      <hr>
      @foreach ($comentarios as $comentario)         
      <div class "media">
        <a class="pull-left" href="javascript:;">
          <img class="media-object" src="http://vignette3.wikia.nocookie.net/vsbattles/images/5/58/Rias_Gremory.png/revision/latest?cb=20150402181653"."/65x65" alt="">
        </a>
        <div class="media-body">
          <h4 class="media-heading">

            {{ $comentario->usuario }}
            <span>|</span>
            <span>{{ $comentario->fecha }}</span>
          </h4>
          <p>{{ $comentario->contenido }}</p>
        </div>
      </div>
      <hr>       
      @endforeach
      <hr>
      <div class="post-comment">
        <h3 class="skills">Haz un comentario</h3>

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
        {!! Form::open(array('route' => 'controladorComentario.store')) !!}
        <div class="form-group">
          {!! Form::text('temaid', "$tema->id", array('class' => 'form-control', 'style' => 'display:none') ) !!}
          {!! Form::textarea('comentario', null, array('class' => 'form-control', 'placeholder' => 'Escribir un comentario...') ) !!}
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-lg active">Comentar</button>
        </div>
        {!! Form::close() !!}
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
          Ver tema
        </h1>
      </div>
      <div class="col-lg-8 col-sm-8">
        <ol class="breadcrumb pull-right">
          <li>
            <a href='..'>
              Principal
            </a>
          </li>
          <li>
            <a href={{ '../busqueda/categoria/'.$tema->categoriaid }}>
              {{ $tema->categoria }}
            </a>
          </li>
          <li class="active">
            Visualizando tema
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection