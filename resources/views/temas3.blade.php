@extends('master')

@section('lista')

<div class="container">


	<div class="row">
		<div class="col-md-8">
			<table class="table">
				<tr>
					<th >Nombres</th>
					<th>Apellidos</th>
					<th>Fecha Nacimiento</th>
					<th>Ubicacion Avatar</th>
					<th>Sexo</th>
				</tr>
				@foreach ($personas as $persona)
				<tr>
					<td><a href={{'personas/'.$persona->id}}>{{ $persona->nombres }}</a></td>
					<td>{{ $persona->apellidos }}</td>
					<td>{{ $persona->fechanacimiento }}</td>
					<td>{{ $persona->ubicacionavatar }}</td>
					<td>{{ $persona->sexo }}</td>
				</tr>
				@endforeach
			</table>
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
              Tabla
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
                Tabla
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection

