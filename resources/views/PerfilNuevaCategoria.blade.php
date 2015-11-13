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
        <div class="panel panel-default">
          <!--<div class="panel-heading">Nuevo tema.</div>-->

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

            {!! Form::open(array('route' => 'controladorCategoria.store', 'files' => true)) !!}

            <div class="form-group">
              {!! Form::label('categoria', 'Categoria') !!}
              {!! Form::text('categoria', null, array('class' => 'form-control', 'placeholder' => 'Nombre de la categoria') ) !!}
            </div>

            <div class="form-group">
              {!! Form::label('imagen', 'Seleccione una imagen') !!}
              {!! Form::file('imagen'); !!}
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


</div>



@endsection


