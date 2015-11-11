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
<div class="starter-template">
  <div class="container">
    <div class ="row">
      <div class ="col-md-8 col-md-offset-1">
        <div class="panel panel-default">
          <!--<div class="panel-heading">Nuevo tema.</div>-->
          <div class="container">
            <div class="row">

              <ul class="nav navbar-nav">
                {!! Form::open(array('route' => 'busquedas.store')) !!}

                <div class="navbar-form navbar-left col-md-8 col-md-offset-1" role="search">
                  <div class="form-group">

                    {!! Form::text('var', 1, array('class' => 'form-control','style' => 'display:none') ) !!}
                    {!! Form::text('busqueda', null, array('class' => 'form-control', 'placeholder' => 'Busqueda') ) !!}

                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>

                  </div>
                </div>




                {!! Form::close() !!}
              </ul>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <table class="table">
                  <tr>
                    <th >Titulo</th>
                    <th>Fecha</th>
                  </tr>
                  @foreach ($temas as $tema)
                  <tr>
                    <td><a href={{'/ProyectoSoftware1/public/temas/'.$tema->id}}>{{ $tema->titulo }} </a>
                     <td>{{ $tema->fechapublicacion }}</td>

                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>


        {!! $temas->render() !!}
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
            Busqueda
        </h1>
      </div>
      <div class="col-lg-8 col-sm-8">
        <ol class="breadcrumb pull-right">
          <li>
            <a href='/ProyectoSoftware1/public'>
              Principal
            </a>
          </li>
          
          <li class="active">
            Busqueda
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection

