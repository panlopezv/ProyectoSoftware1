@extends('Master2')

@section('css')
<link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet" type="text/css">

<link href="{{asset('css/style2.css')}}" rel="stylesheet" type="text/css">


@endsection
@section('script')
<script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector : "#contenido",
    toolbar : "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
  });
</script>
@endsection

@section('contenido')


<div class="row">
  <div id="page-content-wrapper">
    <div class="container-fluid2">
      
      <br/>
      <div class="col-md-8 col-xs-12  col-md-offset-2 col-sm-offset-2 col-xl-offset-1">
        <div class="panel-body">

        @if ($errors->any())
        <div class="alert alert-info" role="alert">
          <p>Corregir los siguientes campos:</p>
          <ul>
            @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
          </ul>
        </div>
        @endif
        
        {!! Form::open(array('route' => 'controladorTema.store')) !!}
        

        <div class="form-group">
          {!! Form::text('accion', "crear", array('class' => 'form-control', 'style' => 'display:none') ) !!}
          {!! Form::label('titulo', 'Titulo') !!}
          {!! Form::text('titulo', null, array('class' => 'form-control', 'placeholder' => 'Titulo del tema') ) !!}
        </div>

        <div class="form-group">
          {!! Form::label('categoria', 'Categoria') !!}
          {!! Form::select('categoria', $categorias, null, array('class' => 'form-control' )) !!}
        </div>

        <div class="form-group">
          {!! Form::label('contenido', 'Contenido') !!}
          {!! Form::textarea('contenido', null, array('class' => 'form-control', 'placeholder' => 'Contenido del tema', 'name' => 'contenido')) !!}
        </div>

        <div class="form-group">
          {!! Form::label('referencia', 'Referencia') !!}
          {!! Form::text('referencia', null, array('class' => 'form-control', 'placeholder' => 'Referencia del tema') ) !!}
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-lg active">Aceptar</button>
          <a class="btn btn-danger btn-lg active" href="/perfil" role="button">Cancelar</a>
        </div>
        
        {!! Form::close() !!}

      </div>
      </div>
    </div>
  </div>


</div>



@endsection


