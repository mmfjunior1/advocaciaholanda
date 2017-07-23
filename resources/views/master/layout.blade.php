<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Mario Miranda Fernandes Junior">
    <meta property="fb:app_id"             content="203679213492552" />
    <meta property="og:url"                content="{{url('/')}}" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="Escritório de Advocacia Holanda Advogados" />
	<meta property="og:description"        content="How much does culture influence creative thinking?" />
	<meta property="og:image"              content="{{asset('images/holanda_advogados.png')}}" />
	
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
    <link type="text/css" rel="stylesheet" href="{{url('css/select-box.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('css/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('css/animate.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('css/color.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('css/custom.css')}}">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
  </head>

  <body>
  	<form action="{{url('/obrigado')}}" method="post" id="formularioObrigado">
  		<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token() ?>">
  	</form>
	<div class="container" style="width:100%;-webkit-box-shadow: inset 0 90px 200px rgba(0,0,0,.4);" >
	<div class="modal fade" id="myCurriculum" tabindex="-1" role="dialog" aria-labelledby="modalCurriculum">
	  <div class="modal-dialog" role="document" style="width:90%">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <div class="titulo"><h2>Trabalhe conosco</h2></div>
	      </div>
	      <div class="modal-body">
	      	<p>Escolha seu perfil, preencha seus dados e, caso tenha, anexe seu currículo.</p>
	      	<div class="row">
			  <div class="col-md-4"><label><input type="radio" name="tipo" value="Advogado" checked>&nbsp;Advogado</label></div>
			  <div class="col-md-4"><label><input type="radio" name="tipo" value="Estagiário">&nbsp;Estagiário</label></div>
			  <div class="col-md-4"><label><input type="radio" name="tipo" value="Apoio/Administrativo">&nbsp;Apoio/Administrativo</label></div>
			</div>
	        <div class="row">
			  <div class="col-md-4"><input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"><span id="errornome">&nbsp;</span></div>
			  <div class="col-md-4"><input type="email" class="form-control" id="email" name="email" placeholder="E-mail"><span id="erroremail">&nbsp;</span></div>
			  <div class="col-md-4"><input type="phone" class="form-control" id="telefone" name="telefone" placeholder="Telefone"><span id="errortelefone">&nbsp;</span></div>
			</div>
			<br>
			<div class="row">
			  <div class="col-md-4"><input type="phon" class="form-control" id="celular" name="celular" placeholder="Celular"><span id="errorcelular">&nbsp;</span></div>
			  <div class="col-md-4"><input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço"><span id="errorendereco">&nbsp;</span></div>
			  <div class="col-md-4"><input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade/Estado"><span id="errorcidade">&nbsp;</span></div>
			</div>
			<br>
			<div class="row">
			  <div class="col-md-4"><input type="file" id="documento" name="documento" accept=".pdf,.doc,.docx,.txt"></div>
			  <div class="col-md-4"><strong>Serão aceitos DOC, PDF, PPT ou TXT</strong></div>
			</div>
			 
	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn btn-default"  data-dismiss="modal">Cancelar</button>
	      	&nbsp;
	        <button type="button" class="btn btn btn-primary"  id="enviaCurriculo">Enviar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="row" >
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <div style="width:100%;position:relative;">
        	<div style="margin: 0 auto;width:400px;">
        			<img src="{{asset('images/holanda_advogados.png')}}">
        	</div>
        </div>
        <nav>
          <ul class="nav nav-justified">
          	<li class="{{Request::is('home') ? 'active' :''}}"><a href="{{url('home')}}">Home</a></li>
          	<li class="{{Request::is('quem-somos') ? 'active' :''}}"><a href="{{url('quem-somos')}}">Quem somos</a></li>
            <!--<li class="{{Request::is('/') ? 'active' :''}}"><a href="/">O escritório</a></li>-->
            <li class="{{Request::is('areas-de-atuacao') ? 'active' :''}}"><a href="{{url('areas-de-atuacao')}}">Áreas de atuação</a></li>
            <li class="{{Request::is('noticias*') ? 'active' :''}}"><a href="{{url('noticias')}}">Publicações</a></li>
            <li><a href="{{url('#')}}" onclick="createCurriculum()">Trabalhe conosco</a></li>
            <li class="{{Request::is('contato') ? 'active' :''}}"><a href="{{url('contato')}}">Contato</a></li>
            
          </ul>
        </nav>
      </div>
	  </div>
	  @yield('content')
      
      
       <!-- Site footer -->
       <br style="clear: both">
       </div>
       <div class="container container_footer">
       <div>
       		<div class="footer-bottom">

                
                <ul class="nav navbar-nav navbar-right">

	                <li><span>Holanda Advogados | Todos os direitos reservados</span>

                    <li><a href="{{url('home')}}">Home</a></li>

                   <!-- <li><a href="services/career"></a></li>-->

                    <li><a href="{{url('quem-somos')}}">Quem somos</a></li>

                    <li><a href="{{url('areas-de-atuacao')}}">Áreas de atuação</a></li>

                    <li><a href="{{url('noticias')}}">Publicações</a></li>

                    <li><a href="{{url('#')}}" onclick="createCurriculum()">Trabalhe conosco</a></li>

                    <li><a href="{{url('contato')}}">Contato</a></li>

                    <li><a href="https://www.facebook.com/holandaadvogados"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.linkedin.com/company-beta/3640498/"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/Advholanda"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></li>
                </ul>
			</div>
       		
       </div>
      

      <!--<footer class="footer">
        <p>&copy; {{date('Y')}} Holanda Advogados.</p>
        <p>Rua José Bonifácio, 221 - Centro, Atibaia - SP, 12940-210</p>
      </footer>-->

    </div> <!-- /container -->
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/holanda.js"></script>
	<script>
    
      function toggleIcon(e) {
          $(e.target)
              .prev('.panel-heading')
              .find(".more-less")
              .toggleClass('glyphicon-plus glyphicon-minus');
      }
      $('.panel-group').on('hidden.bs.collapse', toggleIcon);
      $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
  </body>
</html>
