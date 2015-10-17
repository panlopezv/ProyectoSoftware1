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
            <li><a href="/about">Quienes Somos</a></li>
            <li><a href="#contact">Contactanos</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
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
                    <a href="#">Nuevo Usuario</a></li>
                  </form>
                  <li><a href=""></a></li>
                  
                </ul>
              </li>
            </ul>
        </div><!--/.nav-collapse -->

      </div>
    </nav>
    <div class="page-header">
      <h1>Carousel</h1>
    </div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img data-src="holder.js/1140x500/auto/#777:#555/text:First slide" alt="First slide">
        </div>
        <div class="item">
          <img data-src="holder.js/1140x500/auto/#666:#444/text:Second slide" alt="Second slide">
        </div>
        <div class="item">
          <img data-src="holder.js/1140x500/auto/#555:#333/text:Third slide" alt="Third slide">
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row" class="page-header">
      <h1>Thumbnails</h1>
      <div class="col-md-4">

        <img href="#" class="thumbnail" src="holder.js/200x200" alt="...">

      </div>
      <div class="col-md-4">

        <img href="#" class="thumbnail" src="holder.js/200x200" alt="...">

      </div>
      <div class="col-md-4">

        <img href="#" class="thumbnail" src="holder.js/200x200" alt="...">

      </div>
      <div class="col-md-4">

        <img href="#" class="thumbnail" src="holder.js/200x200" alt="...">

      </div>
      <div class="col-md-4">

        <img href="#" class="thumbnail" src="holder.js/200x200" alt="...">

      </div>
    </div>
    <div class="container">

      <div class="starter-template">
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

      </div>
      <!-- /.container -->

  ...
</div>

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
