<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../../Users/modm_/Documents/Ingenieria de Software/bootstrap-3.3.5/docs/favicon.ico">

  <title>I-Tutos</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/starter-template.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


  

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Navegacion/span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Aqui va el Nombre</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Principal</a></li>
            <li><a href="/about">Quienes somos</a></li>
            <li><a href="#" data-toggle="modal" data-target="#login-modal">Contactenos</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              <input type="text" class="form-control" placeholder="Buscar">
              </div>
              <button type="submit" class="btn btn-default">Aceptar</button>
            </form>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Inicio <b class="caret"></b>
              </a>
                <ul class="dropdown-menu">
                  <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Usuario">
                      <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                    <a href="#">Nuevo usuario</a></li>
                  </form>
                  <li><a href=""></a></li>
                  
                </ul>
              </li>
            </ul>
        </div><!--/.nav-collapse -->

      </div>
    </nav>
     
<div class="navegacion">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
              Registro
            </h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li>
                <a href="#">
                  Principal
                </a>
              </li>
              
              <li class="active">
                Registro
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

<!-- Text input-->     
<div class="starter-template">
  <div class="container">
    <div class ="row">
      <div class ="col-md-8 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Nuevo Usuario</div>
            <div class="panel-body">
              

                @if ($errors->any())
                  <div class="alert alert-info" role="alert">
                    <p>Corrige los siguientes errores</p>
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{!! $error !!}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
              

            {!! Form::open(array('route' => 'controladorPersona.store')) !!}
               

              <div class="form-group">
                {!! Form::label('nombre', 'Nombres') !!}
                {!! Form::text('nombre', null, array('class' => 'form-control' ) ) !!}
              </div>

              <div class="form-group">
                {!! Form::label('apellido', 'Apellidos') !!}
                {!! Form::text('apellido', null, array('class' => 'form-control' )) !!}
              </div>

              <div class="form-group">
                {!! Form::label('usuario', 'Usuario') !!}
                {!! Form::text('usuario', null, array('class' => 'form-control' ) ) !!}
              </div>

              <div class="form-group">
                {!! Form::label('correo', 'Correo Electronico') !!}
                {!! Form::email('correo', null, array('class' => 'form-control', 'placeholder' => 'ejemplo@correo.url.edu.gt') ) !!}
              </div>

              <div class="form-group">
                {!! Form::label('contrasenia', 'Contraseña') !!}
                {!! Form::password('contrasenia', array('class' => 'form-control' ) ) !!}
              </div>

              <div class="form-group">
                {!! Form::label('conContrasenia', 'Repita Contraseña') !!}
                {!! Form::password('conContrasenia', array('class' => 'form-control' ) ) !!}
              </div>

              <div class="form-group">
                {!! Form::label('sexo', 'Sexo') !!}
                {!! Form::select('sexo', array('' => 'Seleccione', '1' => 'Hombre', '0' => 'Mujer' ), null, array('class' => 'form-control' )) !!}
              </div>

              <div class="form-group">
                {!! Form::label('fechaNacimiento', 'Fecha de Nacimiento') !!}
                {!! Form::date('fechaNacimiento', \Carbon\Carbon::now()) !!}
              </div>

              <div class="form-group">
                {!! Form::label('avatar', 'Seleccione una imagen') !!}
                {!! Form::file('avatar'); !!}
              </div>



              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg active">Aceptar</button>
                  <button type="button" class="btn btn-default btn-lg active">Cancelar</button>
              </div>
                      
            {!! Form::close() !!}

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
    </div>
    
  <footer class="clase-general">
    <p>Copyright (c) 2015</p>
</footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

  </body>
  </html>
