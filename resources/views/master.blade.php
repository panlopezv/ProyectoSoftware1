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
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>

  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/starter-template.css')}}"/>

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  @yield('css') 

  

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!--[endif]-->
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
            <li><a href="#" data-toggle="modal" data-target="#login-modal">Contactanos</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar">
              </div>
              <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>

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
                  <a href="registro">Nuevo Usuario</a></li>
                </form>
                <li><a href=""></a></li>

              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->

      </div>
    </nav>
    @yield('navegacion') 
    @yield('nuevotema')
    @yield('lista')
    
    
    <!-- /.container -->
  </div>
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" align="center">
          <img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
        </div>

        <!-- Begin # DIV Form -->
        <div id="div-forms">

          <!-- Begin # Login Form -->
          <form id="login-form">
            <div class="modal-body">
              <div id="div-login-msg">
                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-login-msg">Escriba su Usuario y Contraseña.</span>
              </div>
              <input id="login_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
              <input id="login_password" class="form-control" type="password" placeholder="Password" required>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Recordar
                </label>
              </div>
            </div>
            <div class="modal-footer">
              <div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Inicio</button>
              </div>
              <div>
                <button id="login_lost_btn" type="button" class="btn btn-link">Recuperar Contraseña</button>
                <button id="login_register_btn" type="button" class="btn btn-link">Registrase</button>
              </div>
            </div>
          </form>
          <!-- End # Login Form -->

          <!-- Begin | Lost Password Form -->
          <form id="lost-form" style="display:none;">
            <div class="modal-body">
              <div id="div-lost-msg">
                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-lost-msg">Usuario</span>
              </div>
              <input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
            </div>
            <div class="modal-footer">
              <div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
              </div>
              <div>
                <button id="lost_login_btn" type="button" class="btn btn-link">Iniciar Sesio</button>
                <button id="lost_register_btn" type="button" class="btn btn-link">Registro</button>
              </div>
            </div>
          </form>
          <!-- End | Lost Password Form -->

          <!-- Begin | Register Form -->
          <form id="register-form" style="display:none;">
            <div class="modal-body">
              <div id="div-register-msg">
                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-register-msg">Register an account.</span>
              </div>
              <input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
              <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
              <input id="register_password" class="form-control" type="password" placeholder="Password" required>
            </div>
            <div class="modal-footer">
              <div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
              </div>
              <div>
                <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
              </div>
            </div>
          </form>
          <!-- End | Register Form -->

        </div>
        <!-- End # DIV Form -->

      </div>
    </div>
  </div>
  <!--footer start-->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-3 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
          <h1>
            contact info
          </h1>
          <address>
            <p>
              <i class="fa fa-home pr-10">
              </i>
              Address: No.XXXXXX street
            </p>
            <p>
              <i class="fa fa-globe pr-10">
              </i>
              Mars city, Country
            </p>
            <p>
              <i class="fa fa-mobile pr-10">
              </i>
              Mobile : (123) 456-7890
            </p>
            <p>
              <i class="fa fa-phone pr-10">
              </i>
              Phone : (123) 456-7890
            </p>
            <p>
              <i class="fa fa-envelope pr-10">
              </i>
              Email :
              <a href="javascript:;">
                support@example.com
              </a>
            </p>
          </address>
        </div>
        <div class="col-lg-3 col-sm-3 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
          <h1>
            Ultimos Post
          </h1>
          <div id="owl-slide">
            <div class="tweet-box">
              <i class="fa fa-twitter">
              </i>
              <em>
                Please follow
                <a href="javascript:;">
                  @example
                </a>
                for all future updates of us!
                <a href="javascript:;">
                  twitter.com/acme
                </a>
              </em>
            </div>
            <div class="tweet-box">
              <i class="fa fa-twitter">
              </i>
              <em>
                Please follow
                <a href="javascript:;">
                  @example
                </a>
                for all future updates of us!
                <a href="javascript:;">
                  twitter.com/acme
                </a>
              </em>
            </div>
            <div class="tweet-box">
              <i class="fa fa-twitter">
              </i>
              <em>
                Please follow
                <a href="javascript:;">
                  @example
                </a>
                for all future updates of us!
                <a href="javascript:;">
                  twitter.com/acme
                </a>
              </em>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-3">
          <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
            <h1>
              Our Company
            </h1>
            <ul class="page-footer-list">

              <li>
                <i class="fa fa-angle-right">
                </i>
                <a href="about.html">
                  Quienes Somos
                </a>
              </li>
              <li>
                <i class="fa fa-angle-right">
                </i>
                <a href="service.html">
                  Categorias
                </a>
              </li>
              <li>
                <i class="fa fa-angle-right">
                </i>
                <a href="privacy-policy.html">
                  Perfil
                </a>
                

              </ul>
            </div>
          </div>
          
        </div>

      </div>
    </footer>
    <!-- footer end -->
    <!--small footer start -->
    <footer class="footer-small">
      <div class="container">
        <div class="row">
          
          <div class="col-md-4">
            <div class="copyright">
              <p>&copy; Copyright - Soluciones integrales para Sistemas.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--small footer end-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @yield('script') 
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/docs.min.js')}}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
  </body>
  </html>
