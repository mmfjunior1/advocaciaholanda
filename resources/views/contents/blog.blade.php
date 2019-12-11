@extends('master.layout')
@section('title', 'Notícias e boletins - Holanda Advogados ')
@section('content')

      <br>
      	<!--<div style="width:100%;float:left">
	      	<div class="titulo"><h2>Publicações</h2></div>
      	</div>-->
      	<div style="width:100%;float:left;min-height:380px;">
      	<div class="row">
	      	<div class="col-lg-6 col-md-6 col-sm-6">
	      		<div class="titulo"><h2>Artigos</h2></div>
	      		<ul class="publicacoes">
					<?php 
						
		                foreach($textos as $dados):
		                	if($dados->tipo_texto == 'n')
		                	{
		            ?>
		                <li>
		                	<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{Helpers::dateFormat($dados['created_at'])}}<br>
							<i class="fa fa-chevron-right"></i>
								<a href="{{secure_url('/')}}/noticias/{{$dados['titulo_conv']}}.html">{{$dados['titulo']}}</a>
						</li>
		            <?php 
		            		}
		                endforeach;
		            	
		            ?>
		        </ul>
	      	</div>
	      	<div class="col-lg-6 col-md-6 col-sm-6">
	      	<div class="titulo"><h2>Boletins</h2></div>
	      		<ul class="publicacoes">
					<?php 
						
		                foreach($textos as $dados):
		                	if($dados->tipo_texto == 'b')
		                	{
		            ?>
		                <li>
		                	<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{Helpers::dateFormat($dados['created_at'])}}<br>
							<i class="fa fa-chevron-right"></i>
								<a href="{{secure_url('/')}}/noticias/{{$dados['titulo_conv']}}.html">{{$dados['titulo']}}</a>
						</li>
		            <?php 
		            		}
		                endforeach;
		            	
		            ?>
		        </ul>
	      	</div>
      	</div>
    
      		<!--foreach($textos as $dados):-->
    
      		
      			<!--<div class="blog-post2">
      				<div class="blog-post-detail">
        				<span><i class="fa fa-calendar"></i>{{Helpers::dateFormat($dados['created_at'])}}</span>
            				 <span style="font-size:12px">
            					Escrito por: Holanda Advogados                           
            				</span>
        			</div>
					<div>
						<h3 style="text-align: center;">
	        				<a href="{{secure_url('/')}}/noticias/{{Helpers::parseTitleInURL($dados['titulo'])}}.html" target="_blank" style="color:rgb(11, 4, 112)">
	        					{{$dados['titulo']}}                            
							</a>
						</h3>
					</div>
	        		<div>
	        			<p>
	        				<img alt="{{$dados['titulo']}}" src="{{secure_url($dados['imagem'])}}" style="width: 100%;">
	        			</p>	
					</div>
       			</div>-->
			
	
		<!--endforeach;-->
	
	</div>
	<br style="clear: both">
     
@endsection
