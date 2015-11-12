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
      <div class="col-md-8 col-xs-12  col-md-offset-4 col-sm-offset-2 col-xl-offset-1">
       <div class="row">
        <div class="col-md-6">
          <div class="panel">
            <header class="panel-heading">
              Personas
            </header>

            <ul class="list-group teammates">              
              <?php
                foreach ($usuarios as $usuario){

                echo '<li class="list-group-item">
                  <a><img src="/imagenpersona/';
                  echo $usuario->ubicacionavatar;
                  if($usuario->tipo == 'Administrador'){
                  echo '" width="50" height="50"></a>
                  <span class="pull-right label label-danger inline m-t-15"> ';
                  }
                  else if($usuario->tipo == 'Escritor'){
                  echo ' width="50" height="50"></a>
                  <span class="pull-right label label-warning inline m-t-15"> ';
                  }
                  else if($usuario->tipo == 'Lector'){
                  echo ' width="50" height="50"></a>
                  <span class="pull-right label label-success inline m-t-15"> ';
                  }
                  echo $usuario->tipo ;
                  echo '</span>
                  <a>';
                  echo $usuario->nombres.' '.$usuario->apellidos;
                  echo '</a>
                  </li>';
                }
              ?>
            </ul>
            <div class="panel-footer bg-white">
              <!-- <span class="pull-right badge badge-info">32</span> -->
              <button class="btn btn-primary btn-addon btn-sm">
                <i class="fa fa-plus"></i>
                Add Teammate
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>



@endsection


