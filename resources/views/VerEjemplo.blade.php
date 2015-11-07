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
<script type="text/javascript" charset="utf-8">
  $(prettyPrint);
</script>

<script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector : "#contenido",
    toolbar : "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
});
</script>


@endsection

@section('nuevotema')
      <div class="container">
        <div class="col-lg-8 col-sm-12">
          <h1>
            <a> {{ $ejemplo->titulo }}</a>
          </h1><hr> 
          {{ printf($ejemplo->descripcion) }}
          <hr>
          <form action={{ '../ejemplostema/'.$ejemplo->ubicacionarchivo }} >
            <input type="submit" class="btn btn-success btn-lg active" value="Descargar ejemplo">
          </form>
        </div>
      </div>
@endsection

@section('navegacion')
<div class="navegacion">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-sm-4">
        <h1>
          Ver ejemplo
        </h1>
      </div>
      <div class="col-lg-8 col-sm-8">
        <ol class="breadcrumb pull-right">
          <li>
            <a href='..'>
              Principal
            </a>
          </li>
          
          <li class="active">
            Visualizando ejemplo
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection