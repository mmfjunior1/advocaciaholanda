<html lang="en"><head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="../../favicon.ico" rel="icon">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Holanda</title>

    <!-- Bootstrap core CSS -->
    <link href="{{secure_url('/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{secure_url('/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <!-- <link rel="stylesheet" href="signin.css">-->
    
    <style>
    	body {
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #eee;
		}
		
		.form-signin {
		  max-width: 530px;
		  padding: 15px;
		  margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
		  margin-bottom: 10px;
		}
		.form-signin .checkbox {
		  font-weight: normal;
		}
		.form-signin .form-control {
		  position: relative;
		  height: auto;
		  -webkit-box-sizing: border-box;
		     -moz-box-sizing: border-box;
		          box-sizing: border-box;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		.form-signin input[type="email"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
    </style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{secure_url('/js/ie-emulation-modes-warning.js')}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="/admin/login" method="post">
		
			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
			<h2 class="form-signin-heading">Por favor, informe suas credenciais</h2>
			<div class="row">
				<div class="col-md-12">
					<label class="sr-only" for="inputEmail">Login</label>
					<input type="login" autofocus="" required="" placeholder="Login" name="login" class="form-control" id="inputEmail">
				</div>
			</div>
			<div class="row">
				<br>
				<div class="col-md-12">
					<label class="sr-only" for="inputPassword">Senha</label>
					<input type="password" required="" placeholder="Senha" class="form-control" name="password" id="inputPassword">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="g-recaptcha" style="display: inline-block;margin-left:15%;" data-sitekey="6LeQbbQUAAAAABGPJDlPMRoUr9STDX-ibOyWg7qY" data-callback="verifyCallback"></div>
				</div>
			</div>
			<br>
			<button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>
		
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{secure_url('/js/ie10-viewport-bug-workaround.js')}}"></script>
  

</body></html>