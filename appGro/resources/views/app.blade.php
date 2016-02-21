<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">



	<title>App Gro</title>
   

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/table.css') }}" rel="stylesheet"><!--Style table-->
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/email.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/calendar.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/shCore.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/shThemeDefault.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/flexslider.css') }}" rel="stylesheet">

<!--Js table-->
   <script type="text/javascript" src="../js/table.js"></script>

  
 

<!--Resposive Nav-->
    <link href="{{ asset('/css/responsive-nav.css') }}" rel="stylesheet">
    <script type="text/javascript" src="../js/responsive-nav.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>-->
 <!--slider home--> 
    <script type="text/javascript" src="../js/modernizr.js"></script>
                <!-- FlexSlider -->
    <script defer src="../js/jquery.flexslider.js"></script>
 <!-- Syntax Highlighter -->
  <script type="text/javascript" src="..js/shCore.js"></script>
  <script type="text/javascript" src="..js/shBrushXml.js"></script>
  <script type="text/javascript" src="..js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="..js/jquery.easing.js"></script>
  <script src="..js/jquery.mousewheel.js"></script>
  <script defer src="..js/demo.js"></script> 

    <script type="text/javascript" src="../js/es-ES.js"></script>
    <script type="text/javascript" src="../js/moment.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.es.js"></script>
    
    <script type="text/javascript" src="../js/underscore-min.js"></script>
    <script type="text/javascript" src="../js/calendar.js"></script>
    <!--Js Graficos 
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <script  type="text/javascript" src="../js/ajax-crud.js"></script>
   
    



    


    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

   

     <!--<link href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  

   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jspdf.min.js"></script>
   <!--PDF-->  

    <!--Transition Header 



    
    <script type="text/javascript" src="../js/jssor.js"></script>
    <script type="text/javascript" src="../js/jssor.slider.js"></script>
    <script type="text/javascript" src="../js/trasition.js"></script> 

    <script type="text/javascript" src="/js/jspdf.min.js"></script>
    -->

    <!--Email-->
    <!--Calendar-->
    <!--<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">-->    
    <!--<script type="text/javascript" src="../js/jquery.min.js"></script>-->	 
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">             

                <ul class="nav navbar-nav navbar-left">
                    @if (Auth::guest())
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
     </div>
<div role="navigation" id="foo" class="nav-collapse">
      <ul>
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="#">Normas</a></li>
        <li><a href="{{ asset('files/ley-8495.pdf') }}">Ley SENASA</a></li>
        <li><a href="#">Manejo Agropecuario</a></li>
        <li><a href="{{ url('/farm') }}">Mi Finca</a></li>
        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
      </ul>

</div>

    <div role="main" class="main">
    <a href="#nav" class="nav-toggle">Menu</a>
    
    @yield('content')
    </div>      

    <!--<script>
      var navigation = responsiveNav("foo", {customToggle: ".nav-toggle"});
    </script> -->     
</body>
</html>
