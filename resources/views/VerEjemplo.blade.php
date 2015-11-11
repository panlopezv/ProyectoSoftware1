@extends('master')

@section('css')
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
        <div class="col-lg-8 col-sm-12">
          <h1>
            <a> {{ $ejemplo->titulo }}</a>
          </h1>
          <hr> 
          {{ printf($ejemplo->descripcion) }}
          <hr>
          <form action={{ '/ejemplotema/'.$ejemplo->ubicacionarchivo }} >
            <input type="submit" class="btn btn-success btn-lg active" value="Descargar ejemplo">
          </form>
        </div>
      </div>
@endsection

@section('navegacion')
<div class="navegacion">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-sm-4">
        <h1>
          Ver ejemplo
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
            <a href={{ '/categorias/'.$ejemplo->categoriaid }}>
              {{ $ejemplo->categoria }}
            </a>
          </li>
          <li>
            <a href={{ '/temas/'.$ejemplo->temaid }}>
              {{ $ejemplo->titulo }}
            </a>
          </li>
          <li class="active">
            Visualizando ejemplo
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection