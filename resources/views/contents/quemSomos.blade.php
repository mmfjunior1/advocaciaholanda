@extends('master.layout')
@section('title', 'Holanda Advogados')
@section('content')
<!-- Jumbotron -->
      <br>
      <div class="jumbotron testeteste"  style="background-image: linear-gradient(rgba(10, 10, 10, 0.85), rgba(10, 10, 10, 0.30)),url({{secure_asset('images/holanda-advogados-5.jpg')}})  ">
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
              <div class="titulo"><h2>Quem somos</h2></div>
              <p>Fundado por profissionais que atuaram em outras bancas jurídicas e, com a experiência adquirida e o propósito de construir uma relação mais personalizada com seus clientes e demandas, nasceu o escritório Holanda Advogados, dedicado à prestação de serviços jurídicos, que tem por princípio a garantia de relação de confiança, parceria, previsibilidade e segurança no desempenho de suas atividades.</p>
          </div>

          <div class="col-lg-12 col-md-12">
              <div class="titulo"><h2>Advogados</h2></div>
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingAdv1">
                      <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#adv1" aria-expanded="true" aria-controls="adv1">
                              <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                              Harrisson Barboza de Holanda
                          </a>
                      </h4>
                  </div>
                  <div id="adv1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                      		<p>Sócio-fundador da Holanda Advogados.</p>
                            <p>Bacharel em Direito pela Universidade Paulista – UNIP.</p>
                            <p>Pós-Graduado (Especialização) em Direito Tributário pela Fundação Getúlio Vargas – FGV.</p>
                            <p>Membro da Comissão de Direito Aduaneiro e Comércio Exterior da OAB/SP.</p>
                            <p>Membro da Comissão de Direito Tributário da OAB/SP.</p>
                            <p>Presidente da Comissão de Direito e Contencioso Tributário da Subseção de Atibaia/SP (2014-2015).</p>
                            <p>Envie e-mail para: <i>h.holanda@holandaadvogados.com</i></p>
                      </div>
                  </div>
                </div>
                <hr>
                <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingAdv2">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#trabalhista" aria-expanded="true" aria-controls="trabalhista">
                            <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                            Bárbara Mancuzo
                        </a>
                    </h4>
                </div>
                <div id="trabalhista" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                    	  <p>Sócia-fundadora da Holanda Advogados.</p>
                          <p>Bacharel em Direito pela Faculdades Atibaia – FAAT.</p>
                          <p>Pós - Graduada (Especialização) em Direito Processual Civil pelo Complexo Educacional Damásio de Jesus.</p>
                          <p>Envie e-mail para: <i>barbara@holandaadvogados.com</i></p>
                    </div>
                </div>
              </div>
	       <hr>
	      <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingAdv4">
                      <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#adv4" aria-expanded="true" aria-controls="adv4">
                              <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                              Thaylane Ferreira Vieira
                          </a>
                      </h4>
                  </div>
                  <div id="adv4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                            <p>Bacharel em Direito pela UNIFAAT – Centro Universitário Faculdades Atibaia.</p>
                            <p>Pós-graduanda em Direito Processual Civil pela USP Ribeirão Preto – Faculdade de Direito da Universidade de São Paulo</p>
                            <p>Envie e-mail para: <i>t.vieira@holandaadvogados.com</i></p>
                      </div>
                  </div>
		</div>
		<hr>
              <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingAdv3">
                      <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#adv3" aria-expanded="true" aria-controls="adv3">
                              <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                              Maria Fernanda Andrade
                          </a>
                      </h4>
                  </div>
                  <div id="adv3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                            <p>Bacharel em Direito pelo Complexo Educacional FMU</p>
                            <p>Envie e-mail para: <i>fernanda@holandaadvogados.com </i></p>
                      </div>
                  </div>
                </div>
              <hr>
              </div>
          </div>
          
          <!--<div class="col-md-12 subDivisor" style="text-align:center;">
              <h2>Advogados</h2>
          </div>

          <div class="col-md-6">
              <div class="titulo"><h3>Harisson Barbosa de Holanda</h3></div>
                <p>Bacharel em Direito pela Universidade Paulista – UNIP.</p>
                <p>Pós-Graduado (Especialização) em Direito Tributário pela Fundação Getúlio Vargas – FGV.</p>
                <p>Membro da Comissão de Direito Aduaneiro e Comércio Exterior da OAB/SP. Membro da Comissão de Direito Tributário da OAB/SP.</p>
                <p>Presidente da Comissão de Direito e Contencioso Tributário da Subseção de Atibaia/SP (2014-2015).</p>
          </div>
          <div class="col-md-6">
              <div class="titulo"><h3>Bárbara Mancuzo</h3></div>
              <p>Bacharel em Direito pela Faculdades Atibaia– FAAT.</p>
              <p>Pós-Graduada (Especialização) em Direito Processual Civil pelo Complexo Educacional Damásio de Jesus.</p>
          </div>-->
      </div>
      <!--<div class="col-md-12">
            <div class="col-md-6 col-sm-6" style="border-right: 3px solid rgb(11, 4, 112);border-radius: 2px;">
                <div class="about-info">
                    <h2 class="heading" style="color:rgb(11, 4, 112)">Áreas de atuação</h2>
                    <a name="areas"></a> 
                    <p>Nossos profissionais estão preparados para atender nossos clientes de forma abrangente nos seguintes segmentos:</p>
                 <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">
                        <a class="accordion-toggle" href="/inicio/civel#areas">
                          Cível
                          <i class="fa fa-angle-right pull-right"></i>
                        </a>
                      </h3>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">
                        <a class="accordion-toggle" href="/inicio/previdenciario#areas">
                          Previdenciário
                          <i class="fa fa-angle-right pull-right"></i>
                        </a>
                      </h3>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">
                        <a class="accordion-toggle" href="/inicio/consumidor#areas">
                          Consumidor
                          <i class="fa fa-angle-right pull-right"></i>
                        </a>
                      </h3>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">
                        <a class="accordion-toggle" href="/inicio/imobiliaria#areas">
                          Imobiliaria
                          <i class="fa fa-angle-right pull-right"></i>
                        </a>
                      </h3>
                    </div>
                  </div>
                   <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">
                        <a class="accordion-toggle" href="/inicio/tributaria#areas">
                          Tributaria
                          <i class="fa fa-angle-right pull-right"></i>
                        </a>
                      </h3>
                    </div>
                  </div>
                  
                  
                </div>
                
            </div>
            <div class="col-md-6 col-sm-6">
            	
            	
            </div>
      </div>-->
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
