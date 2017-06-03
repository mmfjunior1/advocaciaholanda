@extends('master.layout')
@section('title', 'Holanda Advogados')
@section('content')
<!-- Jumbotron -->
      <br>
      <div class="jumbotron testeteste"  style="background-image: linear-gradient(rgba(10, 10, 10, 0.85), rgba(10, 10, 10, 0.30)),url({{asset('images/direito2.jpeg')}})  ">
        <h1>O Escritório</h1>
        <p class="lead">Localizado na cidade de Atibaia, nosso escritório está estruturado para atender nossos clientes de forma especializada, sempre buscando a prestação de serviços jurídicos com excelência.</p>
        <p>Com qualidade e experiência, buscamos o êxito de nossos clientes no mais diversos litígios e controvérsias.</p>
        <p><a class="btn btn-lg btn-default" href="#" role="button">Entre em contato</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="col-md-12">
                    <div class="col-md-6 col-sm-6" style="border-right: 3px solid rgb(11, 4, 112);border-radius: 2px;">
                        <div class="about-info">
                            <h2 class="heading" style="color:rgb(11, 4, 112)">Áreas de atuação</h2>
                            <a name="areas"></a> 
                            <p>Nossos profissionais estão preparados para atender nossos clientes de forma abrangente nos seguintes segmentos:</p>
                         <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse"  href="/inicio/contratual#areas">
                                  Cível
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse"  href="/inicio/previdenciario#areas">
                                  Previdenciário
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse"  href="/inicio/consumidor#areas">
                                  Consumidor
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse"  href="/inicio/imobiliaria#areas">
                                  Imobiliaria
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                          </div>
                           <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse"  href="/inicio/tributaria#areas">
                                  Tributaria
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                          </div>
                          
                          
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-sm-6">
                    	@php
                    	switch($rota)
                    	{
                    		case 'civel':
                    		default:
                    		echo '<h2 class="heading" style="text-align: center;color:rgb(11, 4, 112);text-decoration:underline" >Cível</h2>
                        <p>Atuamos não apenas na prevenção de litígios, mas, também na solução de demandas judiciais e extrajudiciais nos mais diversos tipos de processos e procedimentos previstos na área cível. Dentre os procedimentos de atuação, destacamos:</p>
                        <div class="details-list">
                                <ul style="list-style: none;margin-left:-40px">
                                    <li><i class="fa fa-check"></i>&nbsp;Acompanhamento, propositura de medidas judiciais e recursos em ações cíveis, nos diversos Tribunais brasileiros</li>
                                    <li><i class="fa fa-check"></i>&nbsp;em direito de família e sucessões, com a adoção de procedimentos e planejamentos em defesa dos interesses das partes</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Representação em litígios bancários e contratuais</li>
                                    <li><i class="fa fa-check"></i>&nbsp;na condução de conflitos relativos à constituição, manutenção e proteção de patrimônio</li>
                                </ul>
                       </div>';
                    		break;
                    		case 'trabalhista':
                    		echo '<h2 class="heading" style="text-align: center;color:rgb(11, 4, 112);text-decoration:underline" >Trabalhista</h2>
                        <div class="details-list">
                                <ul style="list-style: none;margin-left:-40px">
                                    <li><i class="fa fa-check"></i>&nbsp;Assessoria jurídica preventiva e consultiva para departamentos de Recursos Humanos das empresas</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Representação de pessoas físicas e jurídicas em processos judiciais e administrativos relacionados à aplicação das normas trabalhistas</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Elaboração de estudos e pareceres sobre temas que envolvem o direito do trabalho</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Análise de métodos para redução de passivo trabalhista</li>
                                </ul>
                       </div>';
                    		break;
                    		case 'imobiliaria':
                    		echo '<h2 class="heading" style="text-align: center;color:rgb(11, 4, 112);text-decoration:underline" >Imobiliario</h2>
                        <div class="details-list">
                                <ul style="list-style: none;margin-left:-40px">
                                    <li><i class="fa fa-check"></i>&nbsp;Consultoria na aquisição, regularização, partilha e manutenção de imóveis, urbanos e/ou rurais</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Ajuizamento de demandas judiciais e/ou extrajudiciais para retificação de área, manutenção de posse e/ou propriedade</li>
                                </ul>
                       </div>';
                    		break;
                    		case 'consumidor':
                    		echo '<h2 class="heading" style="text-align: center;color:rgb(11, 4, 112);text-decoration:underline" >Consumidor</h2>
                        <div class="details-list">
                                <ul style="list-style: none;margin-left:-40px">
                                    <li><i class="fa fa-check"></i>&nbsp; Assessoria jurídica em processos administrativos e judiciais, como multas e penalidades administrativas</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Assessoria consultiva na prevenção de demandas consumerista</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Assessoria na elaboração e aplicação das normas em contratos relacionados à relação de consumo</li>
                                </ul>
                       </div>';
                    		break;
                    		case 'tributaria':
                    		echo '<h2 class="heading" style="text-align: center;color:rgb(11, 4, 112);text-decoration:underline" >Tributário</h2>
                    		<h3 class="heading" style="center;color:rgb(11, 4, 112)" >Contencioso</h3>
                    		 <div class="details-list">
                                <ul style="list-style: none;margin-left:-40px">
                                    <li><i class="fa fa-check"></i>&nbsp;Judiciário</li>
                                    <li><i class="fa fa-check"></i>&nbsp; Administrativo</li>
                                </ul>
                       		</div>
                       		<h3 class="heading" style="center;color:rgb(11, 4, 112)" >Consultoria</h3>
                    		 <div class="details-list">
                                <ul style="list-style: none;margin-left:-40px">
                                    <li><i class="fa fa-check"></i>&nbsp;Análise de procedimentos fiscais e carga tributária incidente</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Planejamento Tributário</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Recuperação de créditos tributários</li>
                                    
                                </ul>
                       		</div>
                        ';
                    		break;
                    		case 'contratual':
                    		echo '<h2 class="heading" style="text-align: center;color:rgb(11, 4, 112);text-decoration:underline" >Contratual</h2>
                        <div class="details-list">
                                <p>Elaboramos contratos comerciais das mais diversas naturezas, objetivando o adequado enquadramento legal e respectiva sintonia com a realidade da operação fática. A minucia na elaboração, discussão e/ou análise contratual traz a tona os pontos prejudiciais, benéficos e demais assuntos de suma importância para as transações.</p>
                       </div>';
                    		break;
                    		case 'previdenciario':
                    		echo '<h2 class="heading" style="text-align: center;color:rgb(11, 4, 112);text-decoration:underline" >Previdenciário</h2>
                        <div class="details-list">
                                <ul style="list-style: none;margin-left:-40px">
                                    <li><i class="fa fa-check"></i>&nbsp;Requerimento de benefício previdenciário</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Ajuizamento de medidas judiciais</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Revisão de contribuições previdenciárias</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Elaboração de recursos administrativos em cobranças e enquadramentos indevidos</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Recuperação de créditos</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Elaboração de pareceres</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Regimes Especiais</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Regimes Especiais</li>
                                    <li><i class="fa fa-check"></i>&nbsp;<i>Due Diligence</i></li>
                                    
                                </ul>
                       </div>';
                    		break;
                    	}
                    	@endphp
                    	
                    </div>
                </div>
     <!--  <div class="row">
        <div class="col-lg-4">
          <h2>Cível</h2>
          <p>Podemos ajudar em assuntos que envolvam elaboração de contratos, documentos em geral, execução de inventários, partilhas e elaboração de testamentos, condução de conflitos, manutenção e proteção de
          patrimônio, divóricos, pensão alimentícia, entre outros assuntos que dizem respeito a área cível.
          </p>
          <p><a class="btn btn-default" href="#" role="button">Saiba mais &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Trabalhista</h2>
          <p>Nossos profissionais estão preparados para assegurar ao trabalhador que seus direitos sejam respeitados, bem como garantir que a empresa contratante esteja bem assistida juridicamente, realizando elaboração de contratos de trabalho para cada função, visando assim futuras demandas trabalhistas.</p>
          <p><a class="btn btn-default" href="#" role="button">Saiba mais&raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Tributária</h2>
          <p>É sabido que a legislação tributária brasileira é uma das mais complexas do mundo.</p>
          <p>Nossos profissionais estão preparados para essa demanda. Empresário, deixe a burocracia tributária em nossos cuidados e granhe mais tempo para fazer seu negócio crescer.</p>
          <p><a class="btn btn-default" href="#" role="button">Saiba mais &raquo;</a></p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-4">
          <h2>Imobiliária</h2>
          <p>Podemos ajudar nos processos de aquisição, regularização e manutenção de patrimônio imobiliário, urbano e rural, coordenando estratégias tributárias e de proteção patrimonial.</p>
          <p><a class="btn btn-default" href="#" role="button">Saiba mais &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Aposentadoria</h2>
          <p>Você está por dentro da nova regra para se aposentar?</p>
          <p>Nossos profissionais estão prontos para ajudar você a conquistar seu direito batalhado por anos de trabalho. Podemos cuidar de tudo para você.</p>
          <p><a class="btn btn-default" href="#" role="button">Saiba mais&raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Entre em contato agora</h2>
          <p>Entre em contato agora mesmo ou venha tomar um café conosco. Estamos na rua Lourenço Franco, 349, centro de Atibaia. Nosso telefone é (11) 2427-5033. </p>
          <p>Nosso email é contato@holandaadvogados.com.</p>
          <p><a class="btn btn-default" href="#" role="button">Saiba mais &raquo;</a></p>
        </div>
      </div> -->

     
@endsection
