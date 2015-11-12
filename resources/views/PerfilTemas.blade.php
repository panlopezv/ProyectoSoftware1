@extends('Master2')

@section('css')
<link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/style2.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('script')

@endsection

@section('contenido')
<div class="row">
  <div id="page-content-wrapper">
    <div class="container-fluid2">
      
      <br/>
      <div class="col-md-8 col-xs-12  col-md-offset-2 col-sm-offset-2 col-xl-offset-1">
        <h1>Temas</h1>
        <section class="panel panel-default">
         
          <div class="panel-body table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Autor</th>
                  <th>Fecha</th>
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
						echo $tema->usuario;
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


