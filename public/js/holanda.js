function resetModal()
{	
	$("#myModal").close();
	return $(".modal-footer").html('<button type="button" class="btn btn-default" data-dismiss="modal" id="btnOkModal">Ok</button>');
}

function createCurriculum()
{
	$("#myCurriculum").modal();
}


$("#enviaCurriculo").click(function(){
		var formulario	= new FormData();
		var fileSelect = document.getElementById('documento');
		var files = fileSelect.files;
		for(var i = 0; i < files.length; i++) {
			var file = files[i];
			var nome = file.name;
			  // Add the file to the request.
			formulario.append('sendFile[]', file, nome);
		}
		formulario.append('_token',$("#_token").val());
		formulario.append('nome',$("#nome").val());
		$("input[name='tipo']").each(function()
		{
			if(this.checked == true)
			{
				formulario.append('tipo',this.value);
			}
		})
		
		formulario.append('email',$("#email").val());
		formulario.append('telefone',$("#telefone").val());
		formulario.append('celular',$("#celular").val());
		formulario.append('endereco',$("#endereco").val());
		formulario.append('cidade',$("#cidade").val());

		$.ajax({
			url		: '/enviaCurriculo',
			method 	: 'POST',
			data	: formulario,
			beforeSend: function(){
				//$("#divProcessando").show();
				$("#enviaCurriculo").html("<li class=\"fa fa-spinner fa-spin fa-1x\"></li>&nbsp;Enviando").attr("disabled","disabled");
			},
			contentType: false,
		    processData: false,
		}).done(function(response){
			var textoErro = '';
			//$("#divProcessando").hide();
			if(response !='')
			{
				$.each(response,function(field,value)
				{
					if(field != 'statusOperation' && field !='id' && field !='fotos')
					{
						$("#error"+field).html(value);
					}
				});
				if(response.statusOperation == true)
				{
					if(response.statusOperation == true)
					{
						$("#formularioObrigado").submit();
						return;
					}
				}
				$("#enviaCurriculo").html("Enviar").removeAttr("disabled");
				//$("#removeAttr").attr("disabled");
			}
		}).error(function()
		{
			$("#enviaCurriculo").html("Enviar").removeAttr("disabled");
			alert('Houve um erro ao enviar as imagens. Contate o administrador do sistema.');
		});
	});
function excluirBlog(id)
{
	$.ajax({
		url		: '/admin/textos/excluir',
		method 	: 'POST',
		data	: 'id='+id+'&_token='+$("#_token").val(),
		beforeSend: function(){
			$("#divProcessando").show();
		},
	}).done(function(response){
		$("#divProcessando").hide();
		var textoErro = '';
		if(response.statusOperation == true)
		{
			return location.reload();
		}
		
		$.each(response,function(field,value)
		{
			if(field != 'statusOperation' && field !='id' && field !='redirect' && field!='dados')
			{
				textoErro+=value+"<br>";
			}
		});
		
		if(textoErro!='')
		{
			$(".modal-body").html(textoErro);
			disparaModal();
		}
		
	}).error(function(){
            $(".modal-body").html('<strong style="color:red">Houve uma falha ao pesquisar o CEP. Tente novamente.</strong>');
            
            $("#divProcessando").hide();
            
            disparaModal();
    });
}
function disparaModal()
{
	resetModal();
	return setTimeout(function(){
    	$("#myModal").modal();
    },1000);
}
function msgModal(msg, error)
{
	if(error)
	{
		$(".modal-body").html('<strong style="color:red">'+msg+'</strong>');
	}
	if(!error)
	{
		$(".modal-body").html('<strong>'+msg+'</strong>');
	}
    return $('#myModal').modal();
}

function zerarCampos(form)
{
	$.each($('#'+form+' :input[type="text"], #'+form+' :input[type="hidden"]'),function()
	{
		var obj	= this;
		if(obj.name !='_token')
		{
			$(obj).val('');
		}
	});
	return;
}

function alimentaCamposAjax(response)
{
	$.each(response,function(field,value)
	{
		$("#"+field).val(value);
	});
}

function buscaCliente(object)
{
	var valor = '';
	var inquilino = '';
	if(object)
	{
		var obj 		= object;
		
		inquilino	= obj.name.split("_");
		
		inquilino		= inquilino[1]!=undefined?'_'+inquilino[1]:'';
		
		valor = obj.value;
		
		if(valor == '')
		{
			$("#id_cliente,#nome").val('');
			return false;
		}
	}
	
	if(valor == '' && $("#idcliente").val() == '')
	{
		return false;
	}
	$.ajax({
		url		: '/admin/imoveis/cliente',
		method 	: 'POST',
		data	: 'cpf='+valor+'&_token='+$("#_token").val()+'&id_cliente='+$("#idcliente").val(),
		beforeSend: function(){
			$("#divProcessando").show();
		},
	}).done(function(response){
		$("#divProcessando").hide();
		var textoErro = '';
		if(response.cpf == undefined)
		{
			$(".modal-body").html("Nenhum cliente foi encontrado.");
			$('#myModal').modal();
			$("#cpf,#nome").val('');
			return false;
		}
		if(response !='')
		{
			$.each(response,function(field,value)
			{
				console.log(field+inquilino+"="+value)
				$("#"+field+inquilino).val(value);
			});
			
		}
		
	}).error(function(){
            $(".modal-body").html('<strong style="color:red">Houve uma falha ao pesquisar o CEP. Tente novamente.</strong>');
            $("#myModal").modal();
            $("#divProcessando").hide();
    });
}
function excluirImagem()
{
		$.ajax({
			url		: '/admin/textos/excluirImagem',
			method 	: 'POST',
			data	: $("form").serialize(),
			beforeSend: function(){
				$("#divProcessando").show();
			},
		}).done(function(response){
			var textoErro = '';
			$("#divProcessando").hide();
			if(response !='')
			{
					$.each(response,function(field,value)
					{
						if(field != 'statusOperation' && field !='id' && field !='redirect')
						{
							textoErro+=value+"<br>";
						}
					});
					
					if(textoErro!='')
					{
						$(".modal-body").html(textoErro);
						$("#myModal").modal();
					}
					setTimeout(function(){
						return location.reload();
					},2000);
									
			}
		}).error(function(){
                        $(".modal-body").html('<strong style="color:red">Houve uma falha ao pesquisar o CEP. Tente novamente.</strong>');
                        $("#myModal").modal();
                        $("#divProcessando").hide();
                });
	
	
}

$(document).ready(function(){
	window.closeModal = function(){
		return $('#myModal1').modal('hide');
	};
	$(".btnVolta").click(function(){
		if($("#myModal1",window.parent.document).css('display') == 'block')
		{
			window.parent.closeModal();
			return false;
		}
		return history.back();
	});
	
	$(".trashImg").click(function(){
		
		return excluirImagem();
	});
	
	function pesquisaGenerica(element,dados)
	{
		try{
		var urlPart		= /\?page=[0-9]/;

		var action	= $("form").attr("action");
		
		if(!action)
		{
			action = window.location.href;
		}
		
		var href	= element.href;
		
		if(href)
		{
		//	action	= href;
		}
		
		var page = String((urlPart.exec(action)));
		
		page	= element.innerHTML;
		
		action		= String(action.replace(urlPart,''));
		//alert(page)
		page	= page.replace("?",'');
		
		page 	= page.replace("page=",'');
		
		var dado	= $("#dado").val();

		action		= String(action);		
		
		$('.pagination li').removeClass('active');
		
		$(element).parent().addClass('active');
		
		if(isNaN(page))
		{
			page = 1;
		}
		$.ajax({
			url		: action,
			method 	: 'POST',
			data	: $("form").serialize()+'&page='+page+'&dado='+dados,
			async	:false,
			dataType: 'json',
			beforeSend: function(){
				$("#divProcessando").show();
			},
		}).done(function(response){
			
			var grid	= '';
			var id 		= 0;
			$.each(response.search.data,function(index,value){
				grid +='<tr>';
				
				var td	= 1;
				
				$.each(value,function(campo,valor)
				{
					if(td == 1)
					{
						grid +='<td><a href="'+action.replace("/search",'/show/'+valor)+'">'+valor+'</a></td>';
						id = valor;
					}
					else if(td == 2)
					{
						grid +='<td><a href="'+action.replace("/search",'/show/'+id)+'">'+valor+'</a></td>';
					}
					else
					{
						grid +='<td>'+valor+'</td>';
					}
					td++;
				});
				grid +='</tr>';
			});
			$("#divProcessando").hide();
			$(".linkPages").html(response.page)
			$("#bodyGrid").html(grid);
		}).error(function(){
			$(".modal-body").html('<strong style="color:red">Houve uma falha ao realizar a operação. Entre em contato com o administrador do sistema.</strong>');
             $('#myModal').modal();
			$("#divProcessando").hide();
		});
		
		return false;
		}catch(err){
			alert(err);
			return false;
		}
	}
	$(".btnbusca").click(function(){
		pesquisaGenerica(this,$("#dado").val());
		return false;
	});
	
	$(".btnbusca1").click(function(){
		incluirImovel();
		return false;
	});
	
	//$(".pagination a,.pagination span").click(function(){
	$(".linkPages").delegate('a','click',function(){
		return pesquisaGenerica(this,$("#dado").val());
	});
	
	$(".cep").blur(function()
	{
		$.ajax({
			url		: '/admin/clientes/buscaCep',
			method 	: 'POST',
			data	: 'cep='+this.value+'&_token='+$("#_token").val(),
			beforeSend: function(){
				$("#divProcessando").show();
			},
		}).done(function(response){
			var textoErro = '';
			$("#divProcessando").hide();
			if(response !='')
			{
				$.each(response,function(field,value)
				{
					$("#"+field).val(value);
				});
				
			}
		}).error(function(){
                        $(".modal-body").html('<strong style="color:red">Houve uma falha ao pesquisar o CEP. Tente novamente.</strong>');
                        $("#myModal").modal();
                        $("#divProcessando").hide();
                });

	});
	
	$(".cpfSearch").blur(function()
	{
		return buscaCliente(this);
	});
	$(".btnCadParcela").click(function(){
		var formulario	= new FormData();
		var fileSelect = document.getElementsByName('boleto[]');
		for(var i = 0; i < fileSelect.length; i++) {
			if(fileSelect[i].files[0])
			{
				var file = fileSelect[i].files[0];
				var nome = fileSelect[i].files[0].name;
				formulario.append('sendFile[]', file, nome);
				formulario.append('vencimento[]', document.getElementsByName('data[]')[i].value);
				formulario.append('valor[]', document.getElementsByName('valor[]')[i].value);
			}
		}
		
		formulario.append('id_cliente',$("#id_cliente").val());
		formulario.append('id_imovel',$("#id_imovel").val());
		formulario.append('_token',$("#_token").val());
		$.ajax({
			url		: '/admin/aluguel/cadAluguel',
			method 	: 'POST',
			data	: formulario,
			beforeSend: function(){
				$("#divProcessando").show();
			},
			contentType: false,
		    processData: false,
		}).done(function(response){
			var textoErro = '';
			$("#divProcessando").hide();
			if(response !='')
			{
				$.each(response,function(field,value)
				{
					if(field != 'statusOperation' && field !='id' && field !='redirect')
					{
						textoErro+=value+"<br>";
					}
				});
				
				if(textoErro!='')
				{
					$(".modal-body").html(textoErro);
					$('#myModal').modal();
				}
				
				if(response.redirect)
				{
					$("#btnOkModal").click(function(){
						window.location.href = ''+response.redirect+'';	
					})
				}
			}
		}).error(function(){
                        $(".modal-body").html('<strong style="color:red">Houve uma falha ao cadastrar as parcelas. Contate o administrador do sistema.</strong>');
                        $("#myModal").modal();
                        $("#divProcessando").hide();
                });

	});
	
	$(".btnCadDocumento").click(function(){
		var formulario	= new FormData();
		var fileSelect = document.getElementsByName('documento[]');
		for(var i = 0; i < fileSelect.length; i++) 
		{
			try{
				if(fileSelect[i].files[0] != undefined)
				{
					var file = fileSelect[i].files[0];
					var nome = fileSelect[i].files[0].name;
					formulario.append('documento[]', file, nome);
					formulario.append('titulo[]', document.getElementsByName('titulo[]')[i].value);
				}
			}catch(err){}
		}
		
		formulario.append('id_cliente',$("#id_cliente").val());
		formulario.append('_token',$("#_token").val());
		$.ajax({
			url		: '/admin/docs/cadDocs',
			method 	: 'POST',
			data	: formulario,
			beforeSend: function(){
				$("#divProcessando").show();
			},
			contentType: false,
		    processData: false,
		}).done(function(response){
			var textoErro = '';
			$("#divProcessando").hide();
			if(response !='')
			{
				$.each(response,function(field,value)
				{
					if(field != 'statusOperation' && field !='id' && field !='redirect')
					{
						textoErro+=value+"<br>";
					}
				});
				
				if(textoErro!='')
				{
					$(".modal-body").html(textoErro);
					$('#myModal').modal();
				}
				
				if(response.redirect)
				{
					$("#btnOkModal").click(function(){
						window.location.href = ''+response.redirect+'';	
					})
				}
			}
		}).error(function(){
                        $(".modal-body").html('<strong style="color:red">Houve um erro ao enviar os documentos. Contate o administrador do sistema.</strong>');
                        $("#myModal").modal();
                        $("#divProcessando").hide();
                });

	});
	
	$(".btnCadFoto").click(function(){
		var formulario	= new FormData();
		var fileSelect = document.getElementById('enviaFoto');
		var files = fileSelect.files;
		var idImovel	= $("#id").val();
		for(var i = 0; i < files.length; i++) {
			var file = files[i];
			var nome = file.name;
			  // Add the file to the request.
			formulario.append('sendFile[]', file, nome);
		}
		formulario.append('id_imovel',idImovel);
		formulario.append('_token',$("#_token").val());
		$.ajax({
			url		: '/admin/imoveis/cadfotos',
			method 	: 'POST',
			data	: formulario,
			beforeSend: function(){
				$("#divProcessando").show();
			},
			contentType: false,
		    processData: false,
		}).done(function(response){
			var textoErro = '';
			$("#divProcessando").hide();
			if(response !='')
			{
				$.each(response,function(field,value)
				{
					if(field != 'statusOperation' && field !='id' && field !='fotos')
					{
						textoErro+=value+"<br>";
					}
				});
				if(response.statusOperation == true)
				{
					$.each(response.fotos,function(field,value){
						
						$("#"+field).attr('src','/'+value);
					});
				}
				$('#enviaFoto').val('');
				if(textoErro!='')
				{
					$(".modal-body").html(textoErro);
					$('#myModal').modal();
				}
			}
		}).error(function(){
			$(".modal-body").html("Houve um erro ao enviar as imagens. Contate o administrador do sistema.");
			$("#myModal").modal();
		});
	});
	
	$(".btnEnviaEmailImovel").click(function(){
		var nome 	= $("#nome").val();
		var email 	= $("#emailcontato").val();
		var texto	= $("#texto").val();
		
		var params		= $("#formEmail").serialize();
		if(nome.length == 0 || email.length == 0 || texto.length == 0)
		{
			$(".modal-body").html("<strong>Preencha os campos do formulário para enviar a mensagem.<br>Campo nome é obrigatório.<br>Campo email é obrigatório.<br>Um texto para a mensagem é obrigatório.</strong>")
			$('#myModal').modal();
			return ;
		}
		$.ajax({
			url		: '/emailAnuncio',
			method 	: 'POST',
			data	: params,
			beforeSend: function(){
				$(".btnEnviaEmailImovel").html("Enviando....");
				$(".btnEnviaEmailImovel").attr("disabled","disabled");
			},
		}).done(function(response){
			var textoErro = '';
			$(".btnEnviaEmailImovel").html("ENTRE EM CONTATO");
			$(".btnEnviaEmailImovel").removeAttr("disabled");
			if(response !='')
			{
				
				$.each(response,function(field,value)
				{
					if(field != 'statusOperation' && field !='id')
					{
						textoErro+=value+"<br>";
					}
				});
				if(textoErro!='')
				{
					$(".modal-body").html(textoErro);
					$('#myModal').modal();
					$(".btnEnviaEmailImovel").removeAttr("disabled");
				}
				
			}
		}).error(function(){
                        $(".modal-body").html('<strong style="color:red">Desculpe, houve um erro ao enviar o email. <br> Estamos trabalhando para corrigir o problema. Tente novamente mais tarde.</strong>');
                        $("#myModal").modal();
                        $("#divProcessando").hide();
			$(".btnEnviaEmailImovel").html("ENTRE EM CONTATO");
                        $(".btnEnviaEmailImovel").removeAttr("disabled");
                });

	});
	
	$(".send-now").click(function(){
		var nome 		= $("#contact_name1").val();
		var email 		= $("#contact_email1").val();
		var texto		= $("#contact_message1").val();
		var telefome	= $("#telefone").val();
		var params		= $("#formContato").serialize();
		if(nome.length == 0 || telefone.length < 3 || texto.length == 0)
		{
			$(".modal-body").html("<strong>Preencha os campos do formulário para enviar a mensagem.<br>Campo nome é obrigatório.<br>Campo telefone é obrigatório.<br>Um texto para a mensagem é obrigatório.</strong>")
			$('#myModal').modal();
			return ;
		}
		$.ajax({
			url		: '/emailContato',
			method 	: 'POST',
			data	: params,
			beforeSend: function(){
				$(".send-now").html("<li class=\"fa fa-spinner fa-spin fa-2x\"></li>Enviando");
				$(".send-now").attr("disabled","disabled");
			},
		}).done(function(response){
			var textoErro = '';
			if(response !='')
			{
				$.each(response,function(field,value)
				{
					if(field != 'statusOperation' && field !='id')
					{
						textoErro+=value+"<br>";
					}
				});
				try{
					if(response.statusOperation == true)
					{
						$("#formContato").submit();
						return;
					}
				}catch(err){}
				
				if(textoErro!='')
				{
					$("#corpoModal").html(textoErro);
					$('#myModal').modal();
					$(".send-now").html("<li class=\"fa fa-envelope fa-2x\"></li>&nbsp;Enviar");
					$(".send-now").removeAttr("disabled","disabled");
				}
				
			}
		}).error(function(){
						$(".send-now").html("<i class=\"fa fa-envelope fa-2x\"></i>Enviar");
						$(".send-now").removeAttr("disabled");
                        $("#corpoModal").html('<strong style="color:red">Desculpe, houve um erro ao enviar o email. <br> Estamos trabalhando para corrigir o problema. Tente novamente mais tarde.</strong>');
                        $("#myModal").modal();
                        $("#divProcessando").hide();
			$(".btnEnviaEmailImovel").html("ENTRE EM CONTATO");
                        $(".btnEnviaEmailImovel").removeAttr("disabled");
                });

	});
	$(".delBlog").click(function(){
		var obj	= this.id;
		obj		= parseInt(obj.replace('blog',''));
		$(".modal-body").html("Deseja mesmo excluir essa publicação?");
		$(".modal-footer").html('<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="excluirBlog('+obj+')">Sim</button><button type="button" class="btn btn-default btnNo" data-dismiss="modal" >Não</button>')
		$('#myModal').modal();
		$(".btnNo").unbind("click");
		$(".btnNo").click(function(){
			return resetModal();
		});
		return;
	});
	
	$(".btnCad").click(function(){
		var botamForm 	= $(this);
	    var formulario 	= botamForm.closest('form');
	    var nomeForm	= formulario[0].name
	    var actionForm	= nomeForm.replace('formCad','');		
	    var action 			= '';
		var params			= $("#"+nomeForm).serialize();
		var redirect		= 0;
		var idBtn			= this.id;
		switch(idBtn)
		{
		case 'btnCadCli':
			action = 'gravar';
			break;
		case 'btnDelCli':
			action 		= 'excluir';
			redirect	= 1;
			break;
		case 'btnCancCli':
			action 		= 'cancelar';
			params		= $("#"+nomeForm).serialize();
			break;
			default:
				action 		= idBtn;
			break;
		}
		$.ajax({
			url		: '/admin/'+actionForm+'/'+action,
			type: 'post',
	        //dataType: "JSON",
	        data: new FormData(document.forms[0]),
	        processData: false,
	        contentType: false,
			
			
			//method 	: 'POST',
			//data	: params,
			async	:false,
			beforeSend: function(){
				$("#divProcessando").show();
			},
		}).done(function(response){
			var textoErro = '';
			$("#divProcessando").hide();
			if(response !='')
			{
				if(action == 'cancelar')
				{
					return alimentaCamposAjax(response);
				}
				if(response.redirect)
				{
					$("#btnOkModal").click(function(){
						window.location.href = ''+response.redirect+'';	
					})
				}
				
				if(response.id_imovel)
				{
					$("#id").val(response.id_imovel);
				}
				$.each(response,function(field,value)
				{
					if(field != 'statusOperation' && field !='id' && field !='redirect' && field!='dados')
					{
						textoErro+=value+"<br>";
					}
				});
				if(textoErro!='')
				{
					$(".modal-body").html(textoErro);
					$('#myModal').modal();
					
					if(response.id)
					{
						$("#id").val(response.id);
						
						setTimeout(function(){
							return window.location.href = '/admin/'+actionForm+'/show/'+response.id;	
						},2000);
					}
				}
				//$("#btnCancCli").click();
				
				$.each(response.dados,function(field,value)
				{
					$("#"+field).val(value);
				});
				
				if(redirect !=0)
				{
					zerarCampos(nomeForm);
				}
			}
		}).error(function(){
			$(".modal-body").html('<strong style="color:red">Houve uma falha ao realizar a operação. Entre em contato com o administrador do sistema.</strong>');
             $('#myModal').modal();
			$("#divProcessando").hide();
		});
	});
	
	$("#addFoto").click(function(){
		if($("#id").val() == '')
		{
			return msgModal("O imóvel precisa estar cadastrado para acessar o gerenciador de fotos."); 
		}
		return $('#modalFotos').modal();
	});
	
	$("#viewMap").click(function(){
		if($("#id").val() == '')
		{
			return msgModal("O imóvel precisa estar cadastrado para visualizar o mapa."); 
		}
		
		var lat = $("#latitude").val();
		var lng = $("#longitude").val();
		setTimeout('initMap('+lat+','+lng+')',1000);
		
		return $('#modalMaps').modal();
	});
});
