@extends('master.layoutAdmin')
@section('title', 'Holanda')
@section('content')
		<style>
			input.notEdit{
				width:80%;
				height:30px;
				visibility:hidden;
			}
			input[type="email"],input[type="password"]
			{
				height:30px;
			}
			table tr  td
			{
				padding:5px !important;
			}
			placeholder
			{
				font-size:30px;
				font-family: "Times New Roman", Times, serif;
				font-weight:bold;
			}
			input[type="text"]::-webkit-input-placeholder { /* Chrome/Opera/Safari */
			 	 font-size:30px;
				font-family: "Times New Roman", Times, serif;
				font-weight:bold;
			}
			input[type="text"]::-moz-placeholder { /* Firefox 19+ */
			  	font-size:30px;
				font-family: "Times New Roman", Times, serif;
				font-weight:bold;
			}
			input[type="text"]:-ms-input-placeholder { /* IE 10+ */
			  	font-size:30px;
				font-family: "Times New Roman", Times, serif;
				font-weight:bold;
			}
			input[type="text"]:-moz-placeholder { /* Firefox 18- */
			  	font-size:30px;
				font-family: "Times New Roman", Times, serif;
				font-weight:bold;
			}
			.trashImg:hover
			{
				cursor:pointer;
			}
			input[type="text"]
			{
				border:0px;
				padding:0;
				box-shadow: none;
				font-size:30px;
				font-family: "Times New Roman", Times, serif;
				font-weight:bold;
			}
			
		</style>
		<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
		<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-2 col-xs-10 main" >
          <h2 class="sub-header">Texto do blog</h2> 
		<form name="formCadtextos" id="formCadtextos" class="formCad" action="/admin/textos/gravar" method="post" enctype="multipart/form-data">
          	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
          	<div class="form-group">
			    @if (isset($search)) 
          		@if(file_exists('storage/public/' . $search->imagem))
          			<div style="width:100%;border:1px solid;">
          				<img src="{{ secure_asset('storage/public/' . $search->imagem) }}" style="width: 100%" />
          				<input type="hidden" value="{{$search->imagem}}" name="imagem_atual" id="imagem_atual">
          			</div>
          			<br>
          			<button type="button" class="btn btn-default trashImg"><span class="glyphicon glyphicon-trash"></span>&nbsp;Trocar imagem de cabeçalho</button>
          			
          		@else
          			<label>Imagem de cabeçalho do texto</label>
          			<input type="file" placeholder="Você pode incluir uma imagem de cabeçalho" name="imagem" id="imagem">
          		@endif
				@else
				<label>Imagem de cabeçalho do texto</label>
          			<input type="file" placeholder="Você pode incluir uma imagem de cabeçalho" name="imagem" id="imagem">
				@endif
          	</div>
          	<hr>
          	<div class="form-group">
          		<input type="text" class="form-control " placeholder="Título" name="titulo" id="titulo" size="45" value="{{{@$search->titulo}}}">
          	</div>
          	
          	<div class="form-group">
          		
          		<textarea name="texto" id="texto">{{@$search->texto}}</textarea>
          		<script>
          		tinymce.init({
          		  selector: '#texto',
          		  language: 'pt_BR',
          		  height: 200,
          		  menubar: false,
	          	  setup: function (editor) {
	          	        editor.on('change', function () {
	          	            tinymce.triggerSave();
	          	        });
	          	  },
          		  plugins: [
          		    'advlist autolink lists link charmap print preview anchor',
          		    'searchreplace visualblocks fullscreen',
          		    'insertdatetime table contextmenu paste code'
          		  ],
          		  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          		  content_css: '//www.tinymce.com/css/codepen.min.css'
          		});	        
                </script>
          	</div>
          	
          	<div class="form-group">
          		<label>Palavras chave</label>
          		<input type="text" 	class="form-control" placeholder="Ex: processo, tributo. Separe as palavras por vírgula" name="palavra_chave" id="palavra_chave" value="{{@$search->palavra_chave}}">
          	</div>
          	<div class="form-group">
          		<label>Tipo de publicação</label>
          		<br>
          		<select name="tipo_texto">
          			<?php
          				$selected1 	= "";
          				$selected2	= "";
          				if(@$search->tipo_texto == "n")
          				{
          					$selected1 = 'selected = "selected"';
          				}
          				if(@$search->tipo_texto == "b")
          				{
          					
          					$selected2 = 'selected = "selected"';
          				}
          				
          			?>
          			<option value="b" <?php @$search->tipo_texto =='b' ? print("selected=\"selected\"") : ''?> >Boletim </option>
          			<option value="n" <?php @$search->tipo_texto =='n' ? print("selected=\"selected\"") : ''?> >Notícia</option>
          		</select>
          	</div>
          	
          	<div class="form-group">
		    <div class="col-xs-offset-0 col-sm-10 col-md-10 col-xs-11">
			      	<button type="button" id="btnCadCli" class="btn btn-primary btnCad" >Gravar</button>
	          		<a class="btn btn-default" href="/admin/textos">Cancelar e voltar</a>
		    </div>
		  </div>
          <input type="hidden" name="id" id="id" value="{{{@$search->id}}}"> 
          </form>
        </div>
      </div>
    </div>
@endsection