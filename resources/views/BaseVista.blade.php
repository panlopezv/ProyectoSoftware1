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

@section('areatext')
<div class="starter-template">
  <div class="row">
    <form class="form-horizontal">
      <fieldset>

        <!-- Form Name -->


        <!-- Titulo-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Titulo">Titulo</label>
          <div class="col-md-4">
            <input id="tTitulo" name="tTitulo" placeholder="Creando un Bucle" class="form-control input-md" required="" type="text">
            <span class="help-block">Ingrese un titulo para el tema</span>
          </div>
        </div>
        <!-- Referencia-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Titulo">Referencia</label>
          <div class="col-md-4">
            <input id="tReferencia" name="tReferencia" placeholder="Java Basico" class="form-control input-md" required="" type="text">
            <span class="help-block">Referencia del documento que esta creando</span>
          </div>
        </div>
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="selectbasic">Seleccione la Categoria</label>
          <div class="col-md-2">
            <select id="selectbasic" name="selectbasic" class="form-control">
              <option value="1">Bucles</option>
            </select>
          </div>
        </div>

        

        
        <div class="form-group">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
            <div class="hero-unit" style="margin-top:40px )">
              <textarea class="textarea" placeholder="Ingres y edite el codigo" style="width: 810px; height: 200px;"></textarea>
            </div>
          </div>
          <!-- Button (Double) -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Aceptar"></label>
            <div class="col-md-8">
              <button id="Aceptar" name="Aceptar" class="btn btn-success">Aceptar</button>
              <button id="Cancelar" name="Cancelar" class="btn btn-danger">Cancelar</button>
            </div>
          </div>

        </fieldset>
      </form>

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
          Creando Tema
        </h1>
      </div>
      <div class="col-lg-8 col-sm-8">
        <ol class="breadcrumb pull-right">
          <li>
            <a href='/'>
              Principal
            </a>
          </li>
          
          <li class="active">
            Creando Tema
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection


