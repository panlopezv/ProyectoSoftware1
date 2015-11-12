@extends('master')

@section('css')
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"></link>
<link rel="stylesheet" type="text/css" href="lib/css/prettify.css"></link>
<link rel="stylesheet" type="text/css" href="src/bootstrap-wysihtml5.css"></link>
 <link href="css/round-about.css" rel="stylesheet">
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

  <!-- Introduction Row -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Acerca de Nosotros
        <small>PrograPedia te da la bienvenida</small>
      </h1>
      <p>PrograPedia se hizo con el fin de ayudar a personas que estén iniciando en el mundo de la programación, y nuestra tarea es subir contenido para facilitar a las nuevas generaciones de PROGRAMDORES entusiastas de crear y mejorar al Mundo.</p>
    </div>
  </div>

  <!-- Team Members Row -->

  <div class="col-lg-4 col-sm-6 text-center">
      <img class="img-circle img-responsive img-center" src="images/pablo.jpg" WIDTH=200 HEIGHT=200 alt="">
      <h3>Pablo Andres Lopez Velasquez
        <small>Director, Analista, Programador</small>
      </h3>
      <p>Estudiante Universitario .</p>
    </div>

    <div class="col-lg-4 col-sm-6 text-center">
      <img class="img-circle img-responsive img-center" src="images/mike.jpg" WIDTH=200 HEIGHT=200 alt="">
      <h3>Miguel Orlando Diaz Muñoz
        <small>Diseño Grafico, Programador</small>
      </h3>
      <p>Estudiante Universitario, su pasatiempo son la musica y los videojueos, provenientte de la ciudad de Malacatan San Marcos de Guatemala, desde muy temprana edad se dedico al diseño grafico, su mayor habilidad es aportar
      un analisis ma enfoncado a lo grafico. </p>
    </div>
    
    <div class="col-lg-4 col-sm-6 text-center">
      <img class="img-circle img-responsive img-center" src="images/cristian.jpg" WIDTH=200 HEIGHT=200  alt="">
      <h3>Cristian Daniel Flores Puac
        <small>Analista, Programador</small>
      </h3>
      <p>Estudiante Universitario</p>
    </div>

  </div>



    
  @endsection

  @section('navegacion')
  <div class="navegacion">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-4">
          <h1>
            Acerca de Nosotros
          </h1>
        </div>
        <div class="col-lg-8 col-sm-8">
          <ol class="breadcrumb pull-right">
            <li>
              <a href='/'>
                Principal
              </a>
          
          <li class="active">
            Acerca de Nosotros
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection