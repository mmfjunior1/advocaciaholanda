@extends('master.layout')
@section('title', "$noticiaContent->titulo  - Holanda Advogados ")
@section('content')
<div class="row">
	<div class="col-md-12 blog-content">
		<div class="blog-post">
        	<div class="blog-post-detail">
            	<span><i class="fa fa-calendar"></i>{{Helpers::dateFormat($noticiaContent->created_at)}}</span>
			</div>
			<div class="blog-post-body">
				<h1><strong itemprop="name">{{$noticiaContent->titulo}}</strong></h1>
					<!-- Botão Curtir Facebook-->	
						<!--<div class="fb-like fb_iframe_widget" id="fb" data-href="{{url('/')}}"  data-layout="button_count" data-show-faces="false" data-share="true" href="http://www.feelgreat.com.br/Veja-8-raz%C3%B5es-para-come%C3%A7ar-a-fazer-yoga-em-casa-0-82" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&container_width=1040&href=http%3A%2F%2Fwww.feelgreat.com.br%2Fblog%2FVeja-8-raz%25C3%25B5es-para-come%25C3%25A7ar-a-fazer-yoga-em-casa-0-82&layout=button_count&locale=pt_BR&sdk=joey&share=true&show_faces=false"><span style="vertical-align: bottom; width: 157px; height: 20px;"><iframe name="f97ad720ec7bea" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" style="border: medium none; visibility: visible; width: 157px; height: 20px;" src="https://www.facebook.com/v2.0/plugins/like.php?app_id=&channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F_dMxoUH0Bax.js%3Fversion%3D42%23cb%3Df38882367fdf4be%26domain%3Dwww.feelgreat.com.br%26origin%3Dhttp%253A%252F%252Fwww.feelgreat.com.br%252Ff3b4cb22f2fbbea%26relation%3Dparent.parent&container_width=1040&href=http%3A%2F%2Fwww.feelgreat.com.br%2Fblog%2FVeja-8-raz%25C3%25B5es-para-come%25C3%25A7ar-a-fazer-yoga-em-casa-0-82&layout=button_count&locale=pt_BR&sdk=joey&share=true&show_faces=false" class="" height="1000px" frameborder="0" width="1000px"></iframe></span></div>-->
							<script type="text/javascript">
								var sUrl = window.location;
									document.getElementById('fb').setAttribute('href', sUrl);
							</script>
		
					<!-- Posicione esta tag no cabeçalho ou imediatamente antes da tag de fechamento do corpo. -->
					<script src="https://apis.google.com/js/platform.js" async="" defer="" gapi_processed="true">
		  				{lang: 'pt-BR'}
					</script>
		
				<!-- Posicione esta tag onde você deseja que o botão +1 apareça. -->
						 <!--<div style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent none repeat scroll 0% 0%; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px;" id="___plusone_0"><iframe ng-non-bindable="" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1492274547397" name="I0_1492274547397" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&size=medium&hl=pt-BR&origin=http%3A%2F%2Fwww.feelgreat.com.br&url=http%3A%2F%2Fwww.feelgreat.com.br%2Fblog%2FVeja-8-raz%25C3%25B5es-para-come%25C3%25A7ar-a-fazer-yoga-em-casa-0-82&gsrc=3p&jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.pt_BR.A69-IZUDzUg.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCMGq5Iz-FoYIvWMpICoTPGRBacwCw#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&id=I0_1492274547397&parent=http%3A%2F%2Fwww.feelgreat.com.br&pfname=&rpctoken=39930219" data-gapiattached="true" title="+1" frameborder="0" width="100%"></iframe>
						</div>-->
				<!-- Fim botão-->	
				<div class="conteudo_blog">
					<p><img alt="{{$noticiaContent->titulo}}" src="{{url($noticiaContent->imagem)}}" style="width: 100%;"></p>
					<span><i class="fa fa-calendar"></i>{{Helpers::dateFormat($noticiaContent->created_at)}}</span>
					<br>
					{!!$noticiaContent->texto!!}
				</div>
				                         
				<!-- Botão Curtir Facebook-->	
					<!--<div class="fb-like fb_iframe_widget" id="fb2" data-href="{{url('/')}}" data-layout="box_count" data-action="like" data-show-="" faces="false" data-share="true" href="{{url('/')}}/noticias/{{Helpers::parseTitleInURL($noticiaContent->titulo)}}.html" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&app_id=&container_width=1040&href={{url('/')}}/noticias/{{Helpers::parseTitleInURL($noticiaContent->titulo)}}.html&layout=box_count&locale=pt_BR&sdk=joey&share=true"><span style="vertical-align: bottom; width: 79px; height: 64px;"><iframe name="f13b869b7e6c466" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" style="border: medium none; visibility: visible; width: 79px; height: 64px;" src="https://www.facebook.com/v2.0/plugins/like.php?action=like&app_id=&channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F_dMxoUH0Bax.js%3Fversion%3D42%23cb%3Dfd4e14640149bc%26domain%3Dwww.feelgreat.com.br%26origin%3Dhttp%253A%252F%252Fwww.feelgreat.com.br%252Ff3b4cb22f2fbbea%26relation%3Dparent.parent&container_width=1040&href=http%3A%2F%2Fwww.feelgreat.com.br%2Fblog%2FVeja-8-raz%25C3%25B5es-para-come%25C3%25A7ar-a-fazer-yoga-em-casa-0-82&layout=box_count&locale=pt_BR&sdk=joey&share=true" class="" height="1000px" frameborder="0" width="1000px"></iframe></span></div>-->
				<!-- Fim botão-->
			<br><br>
			</div>
		</div>
                    <!-- BLOG POST END-->
	</div>
                <!-- BLOG CONTENT - END -->
</div>
<br style="clear: both">
     
@endsection
