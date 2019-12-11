<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Texto;
use Validator;
use Storage;
use Hash;
class TextoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function listaTextooDb($request)
    {
    	$array				= array();
    	$dado				= $request->dado;
    	$array['titulo']	= $dado;
    	if(count($array) > 0)
    	{
    		$textos 		= Texto::select('*')
    		->orWhere(function ($textos) use ($array){
    			foreach($array as $field=>$value)
    			{
    				$textos->orWhere($field,'like','%'.$value.'%');
    			}
    		})->paginate(10)->appends(['dado'=>$dado]);
    	}
    	else
    	{
    		$textos 		= Texto::select('*')->paginate(10);
    	}
    	
    	return ['search'=>$textos,'dado'=>$dado];
    }
    
    public function index( Request $request )
    {
    	$array							= array();
    	$dado							= $request->dado;
    	$clienteLista					= $this->listaTextooDb($request);
    	return view('contents.indexAdminTextoBlogListaContent',['search'=>$clienteLista['search'],'dado'=>$clienteLista['dado'],]);
    }
    
    
    public function create()
    {
    	return view('contents.indexAdminTextoCadastroContent');
    }
    
    public function sigin()
    {
    	return view('master.layoutLogin');
    }
    
    private function gravaImagem(Request $request)
    {
    	$arrayFotos			= array();
    	
    	$arrayTypes			= array('png','jpg','jpeg');
    	
    	$obj				= $request->file('imagem');
        if(isset($request->imagem_atual))
        {
            return $request->imagem_atual;   
        }
        
    	if(!$obj)
    	{
    		return 'imagemBlog/holanda_advogados.png';
    	}
    	$ext				= $obj->guessExtension();
    	
    	$qtdArquivosValidos	= 0;	
    		
    	$erroTipoImagem		= 0;
    	
    	$caminhoArquivo		= "";
    	
    	if(!in_array($ext, $arrayTypes))
    	{
    		$erroTipoImagem++;
    			
    		$arquivosFalhos.=$obj->getClientOriginalName()."<br>";
    	}
    	else
    	{
    		$qtdArquivosValidos++;
    			
    		$nomeArquivo							= md5($obj->getClientOriginalName().time());
    			
    		$caminhoArquivo							= 'imagemBlog/'  .$nomeArquivo.'.'.$ext;
    			
    		$arrayFotos['foto'.$qtdArquivosValidos] = $caminhoArquivo;
    			
    		try
    		{
    		
   				$obj->move('imagemBlog', $nomeArquivo.'.'.$ext);
   				//resize
   				$tamanhoImagem			= getimagesize($caminhoArquivo);
    				
   				list($width, $height) 	= getimagesize($caminhoArquivo);
    				
   				if($width > 2048)
   				{
   					$percent	=  bcdiv(bcsub(100 ,(bcdiv( bcmul(2048, 100,2),$width,2)),2),100,2);

   					$newwidth 	=  $width - ($width * $percent);
    				
   					$newheight 	=  $height - ($height * $percent);
    					// Load
    				$thumb 		= imagecreatetruecolor($newwidth, $newheight);
    			
    				if($ext == 'png')
    				{
    					$source		= imagecreatefrompng($caminhoArquivo);
    				
    					imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    					
    					imagepng($thumb,$caminhoArquivo);
    				}
    				if($ext == 'jpg' || $ext =='jpeg')
    				{
    					$source 	= imagecreatefromjpeg($caminhoArquivo);
    			
    					imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    					
    					imagejpeg($thumb,$caminhoArquivo);
					}
				}
				Storage::disk('public')->put(
					$nomeArquivo.'.'.$ext,
					file_get_contents($caminhoArquivo)
				);
				unlink($caminhoArquivo);
    			return $nomeArquivo.'.'.$ext;
    	
    		}
    		catch(\Exception $e)
    		{
    			return response()->json(['msg'=>'<strong>Erro ao executar operação!</strong><br><div style="color:red;font-weight:bold">['.$e->getMessage().']','statusOperation'=>false,'id'=>0]);
    		}
    	}
    	
    	return $nomeArquivo.'.'.$ext;
    }
    
    public function excluirImagem(Request $request)
    {
    	$resultSet	= Texto::find((int)$request->id);
    	 
    	if(count($resultSet) > 0)
    	{
    		
    		try
    		{
    			if(file_exists($resultSet->imagem))
    			{
    				unlink($resultSet->imagem);
    			}
    	
    			$dados['imagem'] = '';
    			 
    			$update = Texto::where('id',$request->id)->update($dados);
    			
    			if($update == 1)
    			{
    				return response()->json(['msg'=>'<strong>Operação concluída</strong>','statusOperation'=>true,'id'=>$request->id]);
    			}
    			return response()->json(['msg'=>'<strong>Nenhum registro foi atualizado. Tente novamente.</strong>','statusOperation'=>false,'id'=>$request->id]);
    			 
    		}
    		catch(\Exception $e)
    		{
    			return response()->json(['msg'=>'<strong>Erro ao executar operação!</strong><br><div style="color:red;font-weight:bold">['.$e->getMessage().']','statusOperation'=>false,'id'=>0]);
    		}
    		return;
    	}	
    }
    
    public function store(Request $request)
    {
    	$dados		       = $request->all();
    	
    	$arrayBoletos	= $request->file('imagem');
    	
    	$messages	= array(
    					'titulo.required'			=>'Você deve definir um título',
    					'titulo.min'				=>'O título deve conter no mínimo :min caracteres',
    					'titulo.max'				=>'O título deve conter no máximo :max caracteres',
    					'texto.required'			=>'Você deve definir um conteúdo para o texto.',
    					
    	);
    	$camposValidacao = array(
    						'titulo'					=>'required|min:5|max:120',
    						'texto'						=>'required|min:5',
    	);
    	
    	$validator	= Validator::make($dados,$camposValidacao,$messages);
    	
    	unset($dados['_token'],$dados['imagem_atual']);
    	

        $dados['titulo']            = trim($dados['titulo']);
        
        $dados['titulo_conv']       = str_replace(array(",",".", "-","_",":","/","\\","@","#","[","]","{","}","?","=","+","$","%","&","*","(",")"), "", $dados['titulo']);
        $dados['titulo_conv']       = str_replace(" ","-", $dados['titulo_conv']);
        
    	if($validator->fails())
    	{
    		return $validator->errors();
    	}
    	
    	$resultSet	= Texto::find((int)$request->id);
    	
    	if(count($resultSet) == 0)
    	{
	    	try 
	    	{
	    		$gravaImagem	= $this->gravaImagem($request);
	    			
	    		if(!$gravaImagem)
	    		{
	    			return $gravaImagem;	
	    		}
	    		if($gravaImagem)
	    		{
	    			$dados['imagem']	= $gravaImagem;
	    		}
	    		$dados['texto'] = str_ireplace(array('<?', '<?php', '<script', 'onclick', 'onchange', 'onblur','onfocus','onmouseover', 'onmouseout', 'onkeydown', 'onload'), '', $dados['texto']);
	    		$create	= Texto::create($dados);
	    			    		
	    		return response()->json(['msg'=>'<strong>Operação concluída</strong>','statusOperation'=>true,'id'=>$create->id]);
	    		
	    	}
	    	catch(\Exception $e)
	    	{
	    		return response()->json(['msg'=>'<strong>Erro ao executar operação!</strong><br><div style="color:red;font-weight:bold">['.$e->getMessage().']','statusOperation'=>false,'id'=>0]);
	    	}
	    	return;
    	}
    	try
    	{
    		
			$gravaImagem	= $this->gravaImagem($request);
			
			$dados['texto'] = str_ireplace(array('<?', '<?php', '<script', 'onclick', 'onchange', 'onblur','onfocus','onmouseover', 'onmouseout', 'onkeydown', 'onload'), '', $dados['texto']);
    		
    		if($gravaImagem)
    		{
    			$dados['imagem']	= $gravaImagem;
    		}
    		$update = Texto::where('id',$request->id)->update($dados);
    		
    		if($update == 1)
    		{
    			return response()->json(['msg'=>'<strong>Operação concluída</strong>','statusOperation'=>true,'id'=>$request->id]);
    		}
    		return response()->json(['msg'=>'<strong>Nenhum registro foi atualizado. Tente novamente.</strong>','statusOperation'=>false,'id'=>$request->id]);
    	}
    	catch(\Exception $e)
    	{
    		return response()->json(['msg'=>'<strong>Erro ao executar operação!</strong><br><div style="color:red;font-weight:bold">['.$e->getMessage().']','statusOperation'=>false,'id'=>$request->id]);
    	}
    }
    
    public function show($id = 0,$json = false)
    {
    	$resultSet					= Texto::find((int)$id);
    	if($json )
    	{
    		return response()->json($resultSet);
    	}
    	
    	return view('contents.indexAdminTextoCadastroContent',['search'=>$resultSet]);
    }
    
    public function cancelar( Request $request )
    {
    	$id	= (int)$request->id;
    	$resultSet	= Texto::find((int)$request->id);
    	if(count($resultSet) == 0)
    	{
    		return response()->json(['nome'=>"",'login'=>"",'id'=>""]);
    	}
    	if($id == 0)
    	{
    		return response()->json(['nome'=>"",'login'=>"",'id'=>""]);
    	}
    	$resultSet					= Texto::find($id);
    	$resultSet->data_nascimento	= '';
    	return response()->json($resultSet);
    }
    
    public function delete( Request $request )
    {
    	$resultSet	= Texto::find((int)$request->id);
    	
    	if(count($resultSet) > 0)
    	{
    		try
    		{
    			if(file_exists($resultSet->imagem))
    			{
    				if($resultSet->imagem != 'imagemBlog/holanda_advogados.png')
    				{
    					unlink($resultSet->imagem);
    				}
    			}
    			$delete	= $resultSet->delete();
    			return response()->json(['msg'=>'<strong>Operação concluída</strong>','statusOperation'=>true,'id'=>0]);
    		}
    		catch(\Exception $e)
    		{
    			return response()->json(['msg'=>'<strong>Erro ao executar operação!</strong><br><div style="color:red;font-weight:bold">['.$e->getMessage().']','statusOperation'=>false,'id'=>0]);
    		}
    	}
    	return response()->json(['msg'=>'<strong>Nenhum registro foi localizado.</strong>','statusOperation'=>false,'id'=>0]);
    }
}
