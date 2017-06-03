@extends('master.layout')
@section('title', 'Holanda Advogados')
@section('content')
<!-- Jumbotron -->
      <br>
      
      <div class="jumbotron testeteste"  style="background-image: linear-gradient(rgba(10, 10, 10, 0.85), rgba(10, 10, 10, 0.30)),url({{asset('images/direito2.jpeg')}})  ">
        <h1>Áreas de Atuação</h1>
        <p class="lead">Nossos profissionais estão preparados para atender em diversas áreas do direito.</p>
        <p>Consulte abaixo nossas especialidades.</p>
        <p><a class="btn btn-lg btn-default" href="#" role="button">Entre em contato</a></p>
      </div>

      
       <div class="row">
        <div class="col-lg-4">
          <h2 style="color:rgb(11, 4, 112)">Cível</h2>
          <p>Podemos ajudar em assuntos que envolvam elaboração de contratos, documentos em geral, execução de inventários, partilhas e elaboração de testamentos, condução de conflitos, manutenção e proteção de
          patrimônio, divóricos, pensão alimentícia, entre outros assuntos que dizem respeito a área cível.
          </p>
          <p><a class="btn btn-default" href="/inicio/civel#areas" role="button">Saiba mais &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2 style="color:rgb(11, 4, 112)">Trabalhista</h2>
          <p>Nossos profissionais estão preparados para assegurar ao trabalhador que seus direitos sejam respeitados, bem como garantir que a empresa contratante esteja bem assistida juridicamente, realizando elaboração de contratos de trabalho para cada função, visando assim futuras demandas trabalhistas.</p>
          <p><a class="btn btn-default" href="/inicio/trabalhista#areas" role="button">Saiba mais&raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2 style="color:rgb(11, 4, 112)">Tributário</h2>
          <p>É sabido que a legislação tributária brasileira é uma das mais complexas do mundo.</p>
          <p>Nossos profissionais estão preparados para essa demanda. Empresário, deixe a burocracia tributária em nossos cuidados e granhe mais tempo para fazer seu negócio crescer.</p>
          <p><a class="btn btn-default"href="/inicio/tributaria#areas" role="button">Saiba mais &raquo;</a></p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-4">
          <h2 style="color:rgb(11, 4, 112)">Imobiliária</h2>
          <p>Podemos ajudar nos processos de aquisição, regularização e manutenção de patrimônio imobiliário, urbano e rural, coordenando estratégias tributárias e de proteção patrimonial.</p>
          <p><a class="btn btn-default" href="/inicio/imobiliaria#areas" role="button">Saiba mais &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2 style="color:rgb(11, 4, 112)">Previdenciário</h2>
          <p>Você está por dentro da nova regra para se aposentar?</p>
          <p>Nossos profissionais estão prontos para ajudar você a conquistar seu direito batalhado por anos de trabalho. Podemos cuidar de tudo para você.</p>
          <p><a class="btn btn-default" href="/inicio/previdenciario#areas" role="button">Saiba mais&raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2 style="color:rgb(11, 4, 112)">Entre em contato agora</h2>
          <p>Entre em contato agora mesmo ou venha tomar um café conosco. Estamos na rua Lourenço Franco, 349, centro de Atibaia. Nosso telefone é (11) 2427-5033. </p>
          <p>Nosso email é contato@holandaadvogados.com.</p>
          <p><a class="btn btn-default" href="/contato" role="button">Saiba mais &raquo;</a></p>
        </div>
      </div> 

     
@endsection
