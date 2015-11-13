@extends('Master2')

@section('css')
 <link href="css/simple-sidebar.css" rel="stylesheet">
<link href="css/style2.css" rel="stylesheet">
@endsection

@section('script')

@endsection

@section('contenido')
<div class="row">
  <div id="page-content-wrapper">
    <div class="container-fluid2">
      <div class="col-md-3 col-xs-12  col-md-offset-5 col-sm-offset-2 col-xl-offset-1">
        
        <div class="thumbnail">
          <?php
            if($persona->ubicacionavatar <> Null){
               echo '<img class="img-circle" id="img_logo" src="/imagenpersona/';
               echo $persona->ubicacionavatar;
               echo '">';
            } 
            else{
               echo '<img class="img-circle" id="img_logo" src="/images/logo.jpg">';
            }
          ?>
          <h3 class="text-center">{{ $persona->nombres.' '.$persona->apellidos }}</h3>
          <h5 class="text-center">{{ $persona->fechanacimiento }}</h5>
          <?php
            if($persona->sexo == true){
              echo '<h6 class="text-center">Hombre</h6>';
            } 
            else{
              echo '<h6 class="text-center">Mujer</h6>';
            }
          ?>
          <h5 class="text-center"><a href="/modificarperfil">Modificar</a></h5>
        </div>

      </div>
      <br/>
      <div class="col-md-8 col-xs-12  col-md-offset-2 col-sm-offset-2 col-xl-offset-1">
        <h1>Mis Temas</h1>
        <section class="panel panel-default">
          <header class="panel-heading">
            Temas
          </header>
          <div class="panel-body table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <!-- <th>Client</th> -->
                  <th>Fecha</th>
                  <!-- <th>Price</th> -->
                  <th>Visitas</th>
                  <th>Comentarios</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($temas as $tema){

                  echo '<tr>
                      <td>';
                  echo $tema->id;
                  echo '</td>
                      <td>';
                  echo $tema->titulo;
                  echo '</td>
                      <td>';
                  echo $tema->fechapublicacion;
                  if($tema->visitas <> Null){
                    echo '</td>
                      <td><span class="label label-info">';
                    echo $tema->visitas;
                  }
                  else{
                    echo '</td>
                      <td><span class="label label-warning">';
                    echo 0;
                  }
                  if($tema->cantidadcomentarios > Null){
                    echo '</span></td>
                        <td><span class="badge badge-info">';
                    echo $tema->cantidadcomentarios;
                  }
                  else{
                    echo '</span></td>
                        <td><span class="badge badge-warning">';
                    echo $tema->cantidadcomentarios;
                  }                  
                  echo '</span></td>
                    </tr>';
                  }
                ?>
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
@endsection


