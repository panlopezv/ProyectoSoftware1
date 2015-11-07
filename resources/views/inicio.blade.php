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

  <title>PrograPedia</title>

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>

  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/starter-template.css')}}"/>

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


  

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

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
          <a class="navbar-brand" href="">PrograPedia</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="quienesSomos">Quienes Somos</a></li>
            <li><a href="contactanos">Contactanos</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav">
              {!! Form::open(array('route' => 'busquedas.store')) !!}

              <div class="navbar-form navbar-left" role="search">
                <div class="form-group">
                 
                  {!! Form::text('var', 1, array('class' => 'form-control','style' => 'display:none') ) !!}
                  {!! Form::text('busqueda', null, array('class' => 'form-control', 'placeholder' => 'Busqueda') ) !!}
                  
                  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                  
                </div>
              </div>

              {!! Form::close() !!}
            </ul>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#login-modal" >
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
    <div class="starter-template">

      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img href="#"  src="images/asd.jpg" alt="First slide">
          </div>
          <div class="item">
            <img href="#"  src="images/post-1140x500.jpg" alt="Second slide">
          </div>
          <div class="item">
            <img href="#"  src="images/url.jpg" alt="http://www.artegrafico.cl/magazine/wp-content/uploads/2015/07/post-1140x500.jpg">
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
      <div id="margen">
        <h1>Categorias</h1>
        </div>

      <div class="row" >


        @foreach ($categorias as $categoria)
        <div class="col-xs-12 col-sm-6    col-lg-2" >
          <div id="bljaIMGte">

            <img src={{'images/'.$categoria->nombreimagen}} />

            <div class="bljaIMGtex" style="color:#000000;">
             <div class="uno">
               <h3><b>{{$categoria->categoria}} </b></h3>
             </div>
             <div class="dos">
               <a href={{'categorias/'.$categoria->id}}>Temas<span class="badge">3</span></a>
             </div>
           </div>
         </div>
       </div>

        @endforeach
        
    
       


      
    </div>
    <!-- /.container -->
  </div>
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class ="col-md-6">
      <div class="modal-content">
        
          <div class="modal-header" align="center">
            <img class="img-circle" id="img_logo" src="images/logo.jpg">
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

  <footer class="footer">
    <div class="container">
      <div class="row">
      <div class="col-lg-3 col-sm-3 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
      <img class="img-circle" id="img_logo" src="{{asset('images/logo.jpg')}}">
      </div>
        <div class="col-lg-3 col-sm-3 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
          <h1>
            Informacion de contacto
          </h1>
          <address>
            <p>
              <i class="fa fa-home pr-10">
              </i>
              Guatemala
            </p>
            <p>
              <i class="fa fa-globe pr-10">
              </i>
              Xela
            </p>
            <p>
              <i class="fa fa-mobile pr-10">
              </i>
              Mobile : 55173357
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
                soporte@prograpedia.com
              </a>
            </p>
          </address>
        </div>
        
        <div class="col-lg-3 col-sm-3">
          <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
            <h1>
              Secciones
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

  </body>
  </html>
