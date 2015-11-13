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
<div class="panel panel-default">
 <div class ="col-md-3 col-md-offset-4">
  <div class="panel-heading">
    <div class="panel-title">
      <div class ="col-md-offset-1">
      <br>
      <br>
      <br>
      <br>
        <img class="img-circle" id="img_logo" src="{{asset('images/logo.jpg')}}">
      </div>
    </div>
  </div>
  <div class="panel-body">
    @if ($errors->any())
      <div class="alert alert-info" role="alert">
        <p>Corregir los siguientes campos:></p>
        <ul>
          @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
          @endforeach
        </ul>
      </div>
    @endif

     {!! Form::open(array('route' => 'sesion.store')) !!}
               
      <div class="form-group">
        {!! Form::text('usuario', null, array('class' => 'form-control' , 'placeholder' => 'Usuario') ) !!}
      </div>

      <div class="form-group">
        {!!Form::password('pass', array('class' => 'form-control' , 'placeholder' => 'contraseña') ) !!}
      </div>

      <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
      <a href="/registro"> Nuevo Usuario</a>  

     {!! Form::close() !!}
  </div>
 </div>
</div>

@endsection
