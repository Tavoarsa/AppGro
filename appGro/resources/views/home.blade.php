@extends('app')

@section('content')
                 <style>
    .flexslider {
      margin-bottom: 10px;
      position: left;
    }

    .flex-control-nav {
      position: relative;
      bottom: auto;
    }

    .custom-navigation {
      display: table;
      width: 100%;
      table-layout: fixed;
    }

    .custom-navigation > * {
      display: table-cell;
    }

    .custom-navigation > a {
      width: 50px;
    }

    .custom-navigation .flex-next {
      text-align: right;
    }
    

  </style>
    
<body class="loading">
  <div id="container" class="cf">

    <section class="slider">

        <div class="flexslider">
          <ul class="slides">
            <li>
              <img src="/img/home/dia_inginiero_agronomo.jpg" />
            </li>
            <li>
              <img src="/img/home/vacas.jpg" />
            </li>
            <li>
              <img src="/img/home/vacas1.jpg" />
            </li>
            <li>
              <img src="/img/home/expo.jpg" />
            </li>
          </ul>
        </div>
        <div class="custom-navigation">
          <a href="#" class="flex-prev">Anterior</a>        												
          <div class="custom-controls-container"></div>
          <a href="#" class="flex-next">Siguiente</a>
          
        </div>
      </section>
   </div>

  

  
  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        controlsContainer: $(".custom-controls-container"),
        customDirectionNav: $(".custom-navigation a"),
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
 </body>


  



@endsection
