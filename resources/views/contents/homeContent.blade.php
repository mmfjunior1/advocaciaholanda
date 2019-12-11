@extends('master.layout')
@section('title', 'Holanda Advogados')
@section('content')
<!-- Jumbotron -->
      <br>
      <div class="jumbotron testeteste"  style="background-image: linear-gradient(rgba(10, 10, 10, 0.85), rgba(10, 10, 10, 0.30)),url({{secure_asset('images/holanda-advogados-4.jpg')}})  ">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="titulo"><h2>O Escritório</h2></div>
              <p>Localizado na cidade de Atibaia, nosso escritório está estruturado para atender nossos clientes de forma especializada, sempre buscando a prestação de serviços jurídicos com excelência.
              Com qualidade e experiência, buscamos o êxito de nossos clientes nos mais diversos litígios e controvérsias.</p>
          </div>
          <div class="col-md-6">
              <div class="titulo"><h2>Artigos</h2></div>

              <?php 
                foreach($noticia as $dados):
              ?>
                  <div class="data"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{Helpers::dateFormat($dados['created_at'])}}</div><a style="color:#333" href="{{secure_url('/')}}/noticias/{{$dados['titulo_conv']}}.html">{{$dados['titulo']}} </a>  
              <?php 
                endforeach;
              ?>
          </div>
          <div class="col-md-6">
              <div class="titulo"><h2>Boletins</h2></div>
              <?php 
                foreach($boletim as $dados):
              ?>
                  <div class="data"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{Helpers::dateFormat($dados['created_at'])}}</div><a style="color:#333" href="{{secure_url('/')}}/noticias/{{$dados['titulo_conv']}}.html">{{$dados['titulo']}} </a>  
              <?php 
                endforeach;
              ?>
          </div>
      </div>
          
@endsection
