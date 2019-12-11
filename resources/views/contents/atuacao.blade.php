@extends('master.layout')
@section('title', 'Holanda Advogados')
@section('content')
<!-- Jumbotron -->
      <br>
      
      <div class="jumbotron testeteste"  style="background-image: linear-gradient(rgba(10, 10, 10, 0.85), rgba(10, 10, 10, 0.30)),url({{secure_asset('images/holanda-advogados-3.jpg')}})  ">
        <!--<h1>Áreas de Atuação</h1>
        <p>Consulte abaixo as áreas de atuação.</p>-->
        <!--<a class="btn btn-lg btn-default" href="/contato" role="button">Entre em contato</a></p>-->
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
        <div class="col-lg-12 col-md-12">
          <div class="titulo"><h2>Áreas de atuação</h2></div>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#civel" aria-expanded="true" aria-controls="civel">
                            <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                            Cível
                        </a>
                    </h4>
                </div>
                <div id="civel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                          <p>Atuamos não apenas na prevenção de litígios, mas também na solução de demandas judiciais e extrajudiciais nos mais diversos tipos de processos e procedimentos previstos na área cível. Dentre os procedimentos de atuação, destacamos:</p>
                        <div class="details-list">
                                <ul style="list-style: none;margin-left:-40px">
                                    <li><i class="fa fa-check"></i>&nbsp;Acompanhamento, propositura de medidas judiciais e recursos em ações cíveis, nos diversos Tribunais brasileiros</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Direito de família e sucessões, com a adoção de procedimentos e planejamentos em defesa dos interesses das partes</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Representação em litígios bancários e contratuais</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Condução de conflitos relativos à constituição, manutenção e proteção de patrimônio</li>
                                </ul>
                       </div>
                    </div>
                </div>
              </div>
		<hr>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTrabalhista">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#trabalhista" aria-expanded="true" aria-controls="trabalhista">
                            <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                            Trabalhista
                        </a>
                    </h4>
                </div>
                <div id="trabalhista" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTrabalhista">
                    <div class="panel-body">
                          <ul style="list-style: none;margin-left:-40px">
                            <li><i class="fa fa-check"></i>&nbsp;Assessoria jurídica preventiva e consultiva para departamentos de Recursos Humanos das empresas</li>
                            <li><i class="fa fa-check"></i>&nbsp;Representação de pessoas físicas e jurídicas em processos judiciais e administrativos relacionados à aplicação das normas trabalhistas</li>
                            <li><i class="fa fa-check"></i>&nbsp;Elaboração de estudos e pareceres sobre temas que envolvem o direito do trabalho</li>
                            <li><i class="fa fa-check"></i>&nbsp;Análise de métodos para redução de passivo trabalhista</li>
                        </ul>
                    </div>
                </div>
              </div>
		<hr>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTrib">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#tributario" aria-expanded="true" aria-controls="tributario">
                            <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                            Tributário
                        </a>
                    </h4>
                </div>
                <div id="tributario" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTrib">
                    <div class="panel-body">
                         <div class="titulo"><h2>Contencioso</h2></div>
                         <div class="details-list">
                                <ul style="list-style: none;margin-left:-40px">
                                    <li><i class="fa fa-check"></i>&nbsp;Judiciário</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Administrativo</li>
                                </ul>
                          </div>
                         <div class="titulo"><h2>Consultoria</h2></div>
                         <div class="details-list">
                                <ul style="list-style: none;margin-left:-40px">
                                    <li><i class="fa fa-check"></i>&nbsp;Análise de procedimentos fiscais e carga tributária incidente</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Planejamento Tributário</li>
                                    <li><i class="fa fa-check"></i>&nbsp;Recuperação de créditos tributários</li>
                                    
                                </ul>
                          </div>
                    </div>
                </div>
              </div>
		<hr>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingContratual">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#contratual" aria-expanded="true" aria-controls="contratual">
                    <!--        <i class="more-less glyphicon glyphicon-plus"></i>-->
                            Contratual
                        </a>
                    </h4>
                </div>
                <div id="contratual" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingContratual">
                    <div class="panel-body">
                          <p>Elaboramos contratos comerciais das mais diversas naturezas, objetivando o adequado enquadramento legal e respectiva sintonia com a realidade da operação fática. A minucia na elaboração, discussão e/ou análise contratual traz a tona os pontos prejudiciais, benéficos e demais assuntos de suma importância para as transações.</p>
                    </div>
                </div>
              </div>
		<hr>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingImob">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#imobiliario" aria-expanded="true" aria-controls="imobiliario">
                    <!--        <i class="more-less glyphicon glyphicon-plus"></i>-->
                            Imobiliário
                        </a>
                    </h4>
                </div>
                <div id="imobiliario" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingImob">
                    <div class="panel-body">
                          <ul style="list-style: none;margin-left:-40px">
                              <li><i class="fa fa-check"></i>&nbsp;Consultoria na aquisição, regularização, partilha e manutenção de imóveis, urbanos e/ou rurais</li>
                              <li><i class="fa fa-check"></i>&nbsp;Ajuizamento de demandas judiciais e/ou extrajudiciais para retificação de área, manutenção de posse e/ou propriedade</li>
                          </ul>
                    </div>
                </div>
              </div>
		<hr>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingPrevi">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#previdenciaria" aria-expanded="true" aria-controls="previdenciaria">
<!--                            <i class="more-less glyphicon glyphicon-plus"></i>-->
                            Previdenciário
                        </a>
                    </h4>
                </div>
                <div id="previdenciaria" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPrevi">
                    <div class="panel-body">
                          <ul style="list-style: none;margin-left:-40px">
                              <li><i class="fa fa-check"></i>&nbsp;Requerimento de benefício previdenciário</li>
                              <li><i class="fa fa-check"></i>&nbsp;Ajuizamento de medidas judiciais</li>
                              <li><i class="fa fa-check"></i>&nbsp;Revisão de contribuições previdenciárias</li>
                              <li><i class="fa fa-check"></i>&nbsp;Elaboração de recursos administrativos em cobranças e enquadramentos indevidos</li>
                              <li><i class="fa fa-check"></i>&nbsp;Recuperação de créditos</li>
                              <li><i class="fa fa-check"></i>&nbsp;Elaboração de pareceres</li>
                              <li><i class="fa fa-check"></i>&nbsp;<i>Due Diligence</i></li>
                              
                          </ul>
                    </div>
                </div>
              </div>
		
		<hr>
          </div><!-- panel-group -->
      </div>
    </div><!-- container -->

@endsection
