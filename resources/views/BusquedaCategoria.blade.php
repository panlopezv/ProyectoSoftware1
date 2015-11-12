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
<div class="espacio">
 <div class="row">
      <div class ="col-md-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
      <div class="panel panel-default">
        <!--<div class="panel-heading">Nuevo tema.</div>-->




        <div class="table-responsive">   
          <table class="table">
            <tr>
              <th >Titulo</th>
              <th>Fecha</th>
            </tr>
            @foreach ($temas as $tema)
            <tr>
              <td><a href={{'/temas/'.$tema->id}}>{{ $tema->titulo }} 
                <td>{{ $tema->fechapublicacion }}</td>
              </tr>
              @endforeach
            </table>
          </div>


        </div>
        {!! $temas->render() !!}
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
             {{$categoria->categoria }}
        </h1>
      </div>
      <div class="col-lg-8 col-sm-8">
        <ol class="breadcrumb pull-right">
          <li>
            <a href='/'>
              Principal
            </a>
          </li>
          
          <li >
          <a href='/categorias'>
              Categorias
            </a>
            
          </li>
          <li class="active">
            {{ $categoria->categoria }}
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection

