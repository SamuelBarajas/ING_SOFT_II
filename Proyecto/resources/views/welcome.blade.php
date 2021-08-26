<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cuceiblog</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&amp;display=swap"/>
    </noscript>
    <link href="{{asset("main/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("main/css/font-awesome/css/all.min.css")}}" rel="stylesheet">
    <link href="{{asset("main/css/main.css")}}" rel="stylesheet">
  </head>
  @include('layouts.nav-header')
  <body id="top"><div class="site-wrapper">
  <div class="site-wrapper-inner">
      <div class="inner cover">
        <p class="lead"></p>
        <h1 class="cover-heading">WELCOME TO BLOG-CUCEI</h1>
        <p class="lead cover-copy">Un buen sitio para pasar el rato</p>
        <!--<p class="lead"><button type="submit" href="http://cuceiblog.test/" class="btn btn-lg btn-default btn-notify">CUCEI</button></p>-->
      </div>
      <div class="mastfoot">
        <div class="inner">
          <p>&copy; CUCEIBLOG. Design: TemplateFlip.</p>
        </div>
      </div>
  </div>
</div>
    <!--<script src="{{asset("main/scripts/jquery.slim.min.js")}}"></script>
    <script src="{{asset("main/scripts/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("main/scripts/main.js")}}"></script>-->
    <script src="{{ asset("js/app.js")}}"></script>
  </body>
</html>