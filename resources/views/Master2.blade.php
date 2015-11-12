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

  <title>Prograpedia</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>

  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/starter-template.css')}}"/>

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  @yield('css') 

  

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!--[endif
 <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span><a></a>
     
  ]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        </div>
        </nav>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Navegacion</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          
          <a class="navbar-brand" href="/">Prograpedia</a>
          <div class="navbar-brand">
        <a href="#menu-toggle" class="btn btn-default btn-xs" id="menu-toggle"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></a>
        </div>
          
        </div>

        <div id="navbar" class="collapse navbar-collapse">
         

          {!! Form::open(array('route' => 'busquedas.store')) !!}

          <div class="navbar-form navbar-left" role="search">


            <div class="input-group input-group-sm">

              {!! Form::text('var', 1, array('class' => 'form-control','style' => 'display:none') ) !!}
              {!! Form::text('busqueda', null, array('class' => 'form-control', 'placeholder' => 'Busqueda') ) !!}
              <span class="input-group-btn">

              <button type="sumbit" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
              </span>
            </div>

          </div>

          {!! Form::close() !!}
          
          <ul class="nav navbar-nav navbar-right">

         <li ><a href="/acercade">Quienes Somos</a></li>
            <li><a href="/contactanos">Contactanos</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" >Inicio <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Perfil</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header"></li>
                <li><a href="#">Salir</a></li>
              </ul>
            </li>
           

            </ul>
          
     
      </div><!--/.nav-collapse -->
    </div>
  </nav>
<!-- Barra lateral  -->
  <div id="wrapper">
    <div class="espacio">

      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li class="sidebar-brand">


          </li>
          <li>
            <a href="#"></a>
          </li>
          <li >
            <a href="/perfil">Perfil</a>
          </li>
          <li>
            <a href="/perfil/escritores">Escritores</a>
          </li>
          
          <li>
            <a href="/perfil/temas">Temas</a>
          </li>
          <ul class="nav nav-sidebar">

            <li>
              <a href="/perfil/nuevacategoria">Nueva Categoria</a>
            </li>
            <li>
              <a href="/perfil/nuevotema">Tema Nuevo</a>
            </li>

          </ul>
          <li>
            <a href="/">Salir</a>
          </li>

        </ul>
      </div>
    </div>
  </div>

         
    @yield('navegacion') 
    @yield('contenido')
    
    
    <!-- /.container -->
  </div>
  </div>
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class ="col-md-6">
      <div class="modal-content">
        
          <div class="modal-header" align="center">
            <img class="img-circle" id="img_logo" src="{{asset('images/logo.jpg')}}">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
          </div>

          <!-- Begin # DIV Form -->
          <div id="div-forms">
                <div class ="row">
                  <div class ="col-md-12 ">
                    <div class="panel panel-default">
                      <div class="panel-body">

                        {!! Form::open(array('route' => 'controladorUsuario.store')) !!}
                           

                          <div class="form-group">
                            {!! Form::text('usuario', null, array('class' => 'form-control' , 'placeholder' => 'Usuario o E-mail') ) !!}
                          </div>

                          <div class="form-group">
                            {!! Form::password('pass', array('class' => 'form-control' , 'placeholder' => 'contraseña') ) !!}
                          </div>

                          <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                          <a href="registro"> Nuevo Usuario</a>    

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
 

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @yield('script') 


    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/docs.min.js')}}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
       <!-- jQuery -->
    <script src="js/jquery.js"></script>

      <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
  </body>
  </html>
