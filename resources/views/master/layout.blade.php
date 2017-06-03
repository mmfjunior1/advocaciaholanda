<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{asset('css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/holanda.css')}}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{asset('js/ie-emulation-modes-warning.js')}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
			.testeteste{
				background-repeat:no-repeat;
				-webkit-background-size:cover;
				-moz-background-size:cover;
				-o-background-size:cover;
				background-size:cover;
				background-position:center center;
				color:#fff;
			}
			.testeteste h2{
				font-size: 30px;
				line-height: 0px;
				padding: 10px 0;
				margin: 10px 0 30px;
				background: none !important;
			}
		</style>
		
		<style>
		.progresso
		{
			padding-right:5px;
			border-radius:5px; 
			text-align:right;
			font-weight:bold;
			box-shadow: inset -3px -3px 12px -5px #211E1E;
			-webkit-box-shadow: inset -3px -3px 12px -5px #211E1E;
			-moz-box-shadow: inset -3px -3px 12px -5px #211E1E;
			-o-box-shadow: inset -3px -3px 12px -5px #211E1E;
		}
		.statusPerfil
		{
			width:300px;
			border-radius:5px;
			background:#ccc;
		}
		.fraco
		{
			color:#fff;
			background:#A3271A;
		}
		.spanFraco
		{
			color:#A3271A;
			font-size:12px;
		}
		.medio
		{
			background:#e8f300;
			color:#000;
		}
		.spanNivel
		{
			text-shadow: 1px 1px #000;
			font-weight:bold;
		}
		.spanMedio
		{
			color:#e8f300;
			font-size:12px;
		}
		.forte
		{
			color:#fff;
			background:#119178;
		}
		.spanForte
		{
			color:#119178;
		}
		.muitoForte
		{
			color:#fff;
			background:#8CC63F;
		}
		.spanMuitoForte
		{
			color:#8CC63F;
			font-size:13px;
		}
		
		.botaoControle {
			background: none repeat scroll 0 0 #e8f300;
			border-radius: 8px;
			box-shadow: 2px 2px 2px #000;
			color: #575958;
			font-family: "Arial",Arial,serif;
			font-size:15px;
			font-weight:bold;
			height: 40px;
			position: relative;
			text-align: center;
			text-shadow: none;
			margin-top:10px;
			padding-left: 10px;
			padding-right: 10px;
			border:0px;
		}
		.atualizarPefil
		{
			font-size:12px;
			margin-top:0px;
			border:0px;
			padding-left:10px;
			padding-right:10px;
		}
		.botaoControle:hover
		{
			cursor:pointer;
			background-image: linear-gradient(to bottom, transparent, rgba(0,0,0,0.2));
		}
		.progressBar
		{
			width:60%;
			height:20px;
			margin:auto;
			border-radius: 10px;
			background:#fff;
		}
		.progressBarInner
		{
			position:relative;
			float:left;
			padding-right:2%;
			background:#e8f300;
			border-radius: 10px;
			font-weight:bold;
			text-align:right;
		}
		
		#tooltip
		{
			text-align: center;
			color: #fff;
			background: #111;
			position: absolute;
			z-index: 100;
			padding: 15px;
		}
		 
		#tooltip:after /* triangle decoration */
		{
			width: 0;
			height: 0;
			border-left: 10px solid transparent;
			border-right: 10px solid transparent;
			border-top: 10px solid #111;
			content: '';
			position: absolute;
			left: 50%;
			bottom: -10px;
			margin-left: -10px;
		}
		 
		#tooltip.top:after
		{
			border-top-color: transparent;
			border-bottom: 10px solid #111;
			top: -20px;
			bottom: auto;
		}
 
		#tooltip.left:after
		{
			left: 10px;
			margin: 0;
		}
 
		#tooltip.right:after
		{
			right: 10px;
			left: auto;
			margin: 0;
		}
		.star{color:#F00;}
		.error{color:#F00; font-size:12px;}
	</style>

    <!-- ==========================
    	Meta Tags 
    =========================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--  <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    
    <!-- ==========================
    	Favicons 
    =========================== -->
    <link rel="shortcut icon" href="//images/icone.png">
	
    
    <!-- ==========================
    	Fonts 
    =========================== -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
    <!-- ==========================
    	CSS 
    =========================== -->
    <link type="text/css" rel="stylesheet" href="/css/select-box.css">
	<link type="text/css" rel="stylesheet" href="/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="/css/animate.css">
	<link type="text/css" rel="stylesheet" href="/css/color.css">
	<link type="text/css" rel="stylesheet" href="/css/custom.css">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
  </head>

  <body>
	<div class="container" style="width:100%;-webkit-box-shadow: inset 0 90px 200px rgba(0,0,0,.4);" >
	<div class="row" >
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <div style="width:100%;position:relative;">
        	<div style="margin-right: auto;margin-left:auto;width:400px;">
        			<img src="{{asset('images/holanda_advogados.png')}}">
        	</div>
        </div>
        <nav>
          <ul class="nav nav-justified">
            <li class="{{Request::is('/') ? 'active' :''}}"><a href="/">O escritório</a></li>
            <li class="{{Request::is('areas-de-atuacao') ? 'active' :''}}"><a href="/areas-de-atuacao">Áreas de atuação</a></li>
            <li class="{{Request::is('blog*') ? 'active' :''}}"><a href="/blog">Notícias</a></li>
            <li class="{{Request::is('contato') ? 'active' :''}}"><a href="/contato">Entre em contato</a></li>
            
          </ul>
        </nav>
      </div>
	  </div>
	  @yield('content')
      
       <!-- Site footer -->
       <br style="clear: both">
      <footer class="footer">
        <p>&copy; {{date('Y')}} Holanda Advogados.</p>
      </footer>

    </div> <!-- /container -->

	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
  </body>
</html>
