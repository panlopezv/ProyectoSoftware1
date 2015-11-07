<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="">

  <title>I-Tutos</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>


  <!--external css-->
  <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link rel="{{asset('stylesheet" href="css/flexslider.css')}}"/>
  <link href="{{asset('assets/bxslider/jquery.bxslider.css')}}" rel="stylesheet" />
  <link rel="{{asset('stylesheet" href="css/animate.css')}}"/>
  <link href="{{asset('http://fonts.googleapis.com/css?family=Lato')}}" rel='stylesheet' type='text/css'/>


  <!-- Custom styles for this template -->
  <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />

<!--<link href="{{asset('css/style.css')}}" rel="stylesheet"/>

  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/starter-template.css')}}"/>



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
            <li><a href="#" data-toggle="modal" data-target="#login-modal">Contactanos</a></li>
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
                  <a href="registro">Nuevo Usuario</a></li>
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
              Java/
            </h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li>
                <a href="#">
                  Principal
                </a>
              </li>

              <li href="#">
                <a href="#">
                  Lenguajes
                </a>
              </li>

              <li href="#">
                <a href="#">
                  Java
                </a>

              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="container">


        <div class="col-xs-6 col-lg-4 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            @foreach ($ejemplos as $ejemplo)
            <a href="#" class="list-group-item">$ejemplos->titulo</a>
            @endforeach
          </div>
        </div><!--/.sidebar-offcanvas-->

        <div class="col-lg-8 col-sm-12">
          <h1>
            <a>{{ $tema->titulo }}</a>
          </h1>
          {{ printf($tema->contenido) }}
          <blockquote>
            <p>{{ $tema->referencia }}</p>
            <small>
              <cite title="Referencia">
                Referencia
              </cite>
            </small>
          </blockquote>

          <div class="media">
            <h3>
              Comentarios
            </h3>
            <hr>

            @foreach ($comentarios as $comentario)
            <hr>                
            <div class "media">
              <a class="pull-left" href="javascript:;">
                <img class="media-object" src="holder.js/200x200" alt="">
              </a>
              <div class="media-body">
                <h4 class="media-heading">

                  {{ $comentario->usuarioid }}
                  <span>|</span>
                  <span>{{ $comentario->fecha }}</span>
                </h4>
                <p>{{ $comentario->contenido }}</p>
              </div>
            </div>
            @endforeach
            <hr> 
            <hr> 
            <div class="post-comment">
              <h3 class="skills">Hacer un comentario</h3>

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

              {!! Form::open(array('route' => 'controladorComentario.store')) !!}
              <div class="form-group">
                {!! Form::text('temaid', "$tema->id", array('class' => 'form-control', 'style' => 'display:none') ) !!}
                {!! Form::textarea('comentario', null, array('class' => 'form-control', 'placeholder' => 'Escribir un comentario...') ) !!}
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg active">Comentar</button>
              </div>

              {!! Form::close() !!}
            </div>

          </div>
        </div>
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


    <!--container end-->




<!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/docs.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="js/ie10-viewport-bug-workaround.js"></script>
  <script type="text/javascript" src="js/hover-dropdown.js">
  </script>
  <script defer src="js/jquery.flexslider.js">
  </script>
  <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js">
  </script>

  <script src="js/jquery.easing.min.js">
  </script>
  <script src="js/link-hover.js">
  </script>

</body>
</html>
