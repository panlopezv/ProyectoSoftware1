@extends('Master2')

@section('css')
<link rel="stylesheet" type="text/css" href="css/dashboard.css"></link>



@endsection
@section('script')





@endsection

@section('contenido')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 nav-sidebar">
      <ul class="nav nav-sidebar">
        <li ><a href="#">Perfil</a></li>
        <li class="active"><a href="#">Personas</a></li>
        <li><a href="#">Mis Temas</a></li>
        <li><a href="#">Nuevos Ejemplos</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="">Nuevo Tema</a></li>
        <li><a href="">Nueva Categoria</a></li>
        
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="">Salir</a></li>
      </ul>
    </div>
  </div>
</div>

@endsection
@section('contenido2')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Dashboard</h1>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Header</th>
          <th>Header</th>
          <th>Header</th>
          <th>Header</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1,001</td>
          <td>Lorem</td>
          <td>ipsum</td>
          <td>dolor</td>
          <td>sit</td>
        </tr>
        <tr>
          <td>1,002</td>
          <td>amet</td>
          <td>consectetur</td>
          <td>adipiscing</td>
          <td>elit</td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
@endsection

