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
          <img class="img-circle" id="img_logo" src="{{asset('images/logo.jpg')}}">
          <h3 class="text-center">Miguel Diaz</h3>
          <h5 class="text-center">12/01/1993</h5>
          <h6 class="text-center">Hombre</h6>
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
                <tr>
                  <td>1</td>
                  <td>Facebook</td>
                  <!-- <td>Steve</td> -->
                  <td>10/10/2014</td>
                  <!-- <td>$1500</td> -->
                  <td><span class="label label-danger">in progress</span></td>
                  <td><span class="badge badge-info">50%</span></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Twitter</td>
                  <!-- <td>Darren</td> -->
                  <td>10/8/2014</td>
                  <!-- <td>$1500</td> -->
                  <td><span class="label label-success">completed</span></td>
                  <td>50</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Google</td>
                  <!-- <td>Nick</td> -->
                  <td>10/12/2014</td>
                  <!-- <td>$2000</td> -->
                  <td><span class="label label-warning">in progress</span></td>
                  <td><span class="badge badge-warning">75%</span></td>
                </tr>

              </tbody>
            </table>
          </div>
        </section>
      </div>
    </div>
  </div>


</div>



@endsection


