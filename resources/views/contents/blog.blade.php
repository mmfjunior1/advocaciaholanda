@extends('master.layout')
@section('title', 'Blog - Holanda Advogados ')
@section('content')

      <br>
      	<div style="width:100%;float:left">
	      	<div style="margin: 15px;text-align:center;text-decoration:underline">
	      	<h2 style="color:rgb(11, 4, 112)">Notícias</h2>
	      	</div>
      	</div>
      	<?php 
      		foreach($textos as $dados):
      	?>
      		<div style="width:100%;float:left">
      			<div class="blog-post2">
      				<div class="blog-post-detail">
        				<span><i class="fa fa-calendar"></i>{{Helpers::dateFormat($dados['created_at'])}}</span>
            				<!--  <span style="font-size:12px">
            					Escrito por: FeelGreat                           
            				</span>-->
        			</div>
					<div>
						<h3 style="text-align: center;">
	        				<a href="{{url('/')}}/blog/noticias/{{Helpers::parseTitleInURL($dados['titulo'])}}.html" target="_blank" style="color:rgb(11, 4, 112)">
	        					{{$dados['titulo']}}                            
							</a>
						</h3>
					</div>
	        		<div>
	        			<p>
	        				<img alt="{{$dados['titulo']}}" src="{{url($dados['imagem'])}}" style="width: 100%;">
	        			</p>	
					</div>
       			</div>
			</div>
	<?php 
		endforeach;
	?>
	<br style="clear: both">
     
@endsection
