<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Search;
use App\Cliente;
use App\TipoImovel;
use App\Mensagem;
use App\Texto;
use App\Http\Controllers\CEPController;
use App\Http\Controllers\ClienteController;
use Validator;
use Mail;
class SearchController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    private $noticias;
    
    private $boletins;

    function __construct()
    {
        $this->noticias = Texto::select('*')->where('tipo_texto','=','n')
        ->orderBy('created_at','desc')->take(3)->get();
        $this->boletins = Texto::select('*')->where('tipo_texto','=','b')
        ->orderBy('created_at','desc')->take(3)->get();
    }

    public function homePage(Request $request)
    {
        if ($request->is('quem-somos'))
        {
            return view('contents.quemSomos',['boletim'=>$this->boletins,'noticia'=>$this->noticias]);
        }
        
        if ($request->is('areas-de-atuacao'))
        {
            return view('contents.atuacao',['boletim'=>$this->boletins,'noticia'=>$this->noticias]);
        }

        if ($request->is('contato'))
        {
            return view('contents.contatoContent',['boletim'=>$this->boletins,'noticia'=>$this->noticias]);
        }

        return view('contents.homeContent',['boletim'=>$this->boletins,'noticia'=>$this->noticias]);
    }

    public function home($rota = "")
    {
    	return view('contents.indexContent', array('rota' => $rota,'boletim'=>$this->boletins,'noticia'=>$this->noticias));
    }
    public function index(Request $request)
    {
    	return view('contents.indexContent',['boletim'=>$this->boletins,'noticia'=>$this->noticias]);
    }
    
    public function enviaCurriculo( Request $request)
    {

        $messages   = array(
                'nome.required'             =>'O campo <strong>nome</strong> é obrigatório.',
                'nome.min'                  =>'O campo <strong>nome</strong> deve conter no mínimo :min caracteres.',
                //'celular.required_without:telefone'  =>'O campo <strong>celular</strong> deve ser informado.',
                'email.email'               =>'O endereço de email informado não é válido.',
                'email.required'            =>'O campo <strong>e-mail</strong> deve ser informado.',
                'endereco.required'         =>'O campo <strong>endereço</strong> deve ser informado.',
                'cidade.required'           =>'O campo <strong>cidade</strong> deve ser informado.',
        );
         
        $camposValidacao = array(
                'nome'                  =>'required|min:3|max:30',
                'email'                 =>'required|email',
                'endereco'              =>'required',
                'cidade'                =>'required',
                //'celular'               =>'required_without',
        );
        $validator  = Validator::make($request->all(),$camposValidacao,$messages);
        if($validator->fails())
        {
            return $validator->errors();
        }     
        $arrayImagens   = $request->file('sendFile');
        $countImagens   = count($arrayImagens); 
        $arrayTypes     = array('pdf','txt','doc','docx');
        foreach($arrayImagens as $obj)
        {
            $ext    = $obj->guessExtension();
            if(!in_array($ext, $arrayTypes))
            {
                $erroTipoImagem++;
                $arquivosFalhos.=$obj->getClientOriginalName()."<br>";
            }
            else
            {
                $nomeArquivo                            = md5($obj->getClientOriginalName().time());
                $caminhoArquivo                         = 'fotosImoveis/'.$nomeArquivo.'.'.$ext;
                $obj->move('curriculo',$nomeArquivo.'.'.$ext);
                $attach = array("curriculo/".$nomeArquivo.'.'.$ext);
                
            }
        }
        try
        {
            $fromName           = "Contato - Holanda Advogados";
            $fromMail           = "contato@holandaadvogados.com";
            $texto              = new \stdClass();
            $body               = '<h1>Currículo de '.$request->nome.'</h1>';
            $body.= '<table>
                    <tr>
                        <td>Vaga: '.$request->tipo.'</td>
                    </tr>
                    <tr>
                        <td>Telefone: '.$request->telefone.'</td>
                    </tr>
                    <tr>
                        <td>Celular: '.$request->celular.'</td>
                    </tr>
                    <tr>
                        <td>Endereço: '.$request->endereco.'</td>
                    </tr>
                    <tr>
                        <td>Cidade: '.$request->cidade.'</td>
                    </tr>
                    </table>
                    ';
            $texto->texto = $body;
            $subject     = "Currículo de ".$request->nome;
            Mail::send('master.email',array("user"=>$texto), function($messagem) use ($fromName,$fromMail,$subject,$attach)
            {
                $messagem->to($fromMail,$fromMail);
                $messagem->from('sistema@holandaadvogados.com','sistema@holandaadvogados.com');
                foreach($attach as $file)
                {
                    $messagem->attach($file);
                }
                
                $messagem->subject($subject);
            });
            return response()->json(['msg'=>'<strong>Email enviado.</strong>','statusOperation'=>true,]);
        }
        catch(Exception $e)
        {
            return response()->json(['msg'=>'<strong>Falha ao enviar a mensagem. Tente novamente</strong>','statusOperation'=>false,]);
        }
    }


    function sendEmail($subject = "Boleto", $text= "",$attach = array(),$to = "",$name = "")
    {
        try{
            $fromName           = "Imobiliaria Shima";
            $fromMail           = "contato@imobiliariashima.com.br";
            $texto              = (Object)"";
            $texto->texto       = $text;
            
            Mail::send('master.email',array("user"=>$texto), function($messagem) use ($fromName,$fromMail,$subject,$attach,$to,$name)
            {
                if($to !="")
                {
                    $messagem->to($to,$name);
                    $messagem->cc("contato@imobiliariashima.com.br","Imobiliaria Shima");
                }
                else 
                {
                    $messagem->to("contato@imobiliariashima.com.br","Imobiliaria Shima");
                }
                $messagem->from($fromMail,"Sistema Imobiliaria");
                foreach($attach as $file)
                {
                    $messagem->attach($file);
                }
                
                $messagem->subject($subject);
            });
            return response()->json(['msg'=>'<strong>Email enviado.</strong>','statusOperation'=>true,]);
        }catch(Exception $e)
        {
            return response()->json(['msg'=>'<strong>Falha ao enviar a mensagem. Tente novamente</strong>','statusOperation'=>false,]);
        }
    }
    public function emailImovel( Request $request)
    {
    	$messages	= array(
    			'id_cliente.required'		=>'O <strong> Cliente </strong> deve ser informado',
    			'nome.required'				=>'O campo <strong>nome</strong> é obrigatório.',
    			'nome.min'					=>'O campo <strong>nome</strong> deve conter no mínimo :min caracteres.',
    			'texto.min'					=>'O campo <strong>para texto da mensagem</strong> deve conter no mínimo :min caracteres.',
    			'texto.max'					=>'O campo <strong>para texto da mensagem</strong> deve conter no máximo :max caracteres.',
    			'emailcontato.email'		=>'O <strong>email</strong> informado não é válido.',
    			'emailcontato.required'		=>'O <strong>email</strong> é obrigatório.',
    			'emailcontato.max'			=>'O campo <strong>email</strong> deve conter no máximo :max caracteres.',
    	);
    	 
    	$camposValidacao = array(
    			'nome'					=>'required|min:3|max:30',
    			'emailcontato'			=>'required|email|max:80',
    			'texto'					=>'required|min:10|max:500',
    			
    	);
    	$validator	= Validator::make($request->all(),$camposValidacao,$messages);
    	if($validator->fails())
    	{
    		return $validator->errors();
    	}
    	$email						= $request->emailcontato;
    	$nome						= $request->nome;
    	$telefone					= $request->telefone;
    	$texto						= strip_tags($request->texto);
    	$titulo						= $request->titulo;
    	$url						= $request->url;
    	$dados						= array();
    	$dados['id']				= 0;
    	$dados['mensagem']			= $texto;
    	$dados['email']				= $email;
    	$dados['titulo']			= $titulo;
    	$dados['nome']				= $nome;
    	
    	$texto		= "<table>
    					<tr>
    					<td>Nome:</td>
    					<td>$nome</td>
    					</tr>
    					<tr>
    					<td>Email:</td>
    					<td>$email</td>
    					</tr>
    					<tr>
    					<td>Telefone:</td>
    					<td>$telefone</td>
    					</tr>
    					<tr>
    					<td>Texto enviado:</td>
    					<td>$titulo <br>$texto</td>
    					</tr>
    					<tr>
    					<td>URL do anúncio:</td>
    					<td>$url</td>
    					</tr>
    					</table>";
    	$email		= new MailController();
    	$retorno	= $email->sendEmail($titulo, $texto);
    	$decode		= json_decode($retorno->getContent());
    	
    	if($decode->statusOperation == true)
    	{
    		//$create	= Mensagem::create($dados);
    		return response()->json(['msg'=>'<strong>Email enviado.</strong>','statusOperation'=>true]);
    	}
    	return $retorno;
    }
    
    public function emailContato( Request $request)
    {
        $messages	= array(
    			'contact_name1.required'	=>'O campo <strong>nome</strong> é obrigatório.',
    			'contact_name1.min'			=>'O campo <strong>nome</strong> deve conter no mínimo :min caracteres.',
    			'contact_name1.max'			=>'O campo <strong>nome</strong> deve conter no máximo :max caracteres.',
    			'telefone.required'			=>'O campo <strong>telefone</strong> é obrigatório.',
    			'telefone.min'				=>'O campo <strong>telefone</strong> deve conter no mínimo :min caracteres.',
    			'telefone.max'				=>'O campo <strong>telefone</strong> deve conter no máximo :max caracteres.',
    			'contact_message1.min'		=>'O campo <strong>para texto da mensagem</strong> deve conter no mínimo :min caracteres.',
    			'contact_message1.max'		=>'O campo <strong>para texto da mensagem</strong> deve conter no máximo :max caracteres.',
    			'emailcontato.email'		=>'O <strong>email</strong> informado não é válido.',
    			'emailcontato.required'		=>'O <strong>email</strong> é obrigatório.',
    			'emailcontato.max'			=>'O campo <strong>email</strong> deve conter no máximo :max caracteres.',
    	);
    
    	$camposValidacao = array(
    			'contact_name1'					=>'required|min:3|max:30',
    			'telefone'						=>'required|min:8|max:16',
    			'contact_message1'				=>'required|min:5|max:500',
    			 
    	);
    	$validator	= Validator::make($request->all(),$camposValidacao,$messages);
    	if($validator->fails())
    	{
    		return $validator->errors();
    	}
    	$email						= $request->contact_email1;
    	$nome						= $request->contact_name1;
    	$telefone					= $request->telefone;
    	$texto						= strip_tags($request->contact_message1);
    	$titulo						= "Contato direto do site";
    	$url						= "";
    	$dados						= array();
    	$dados['id']				= 0;
    	$dados['mensagem']			= $texto;
    	$dados['email']				= $email;
    	$dados['titulo']			= $titulo;
    	$dados['nome']				= $nome;
    	 
    	$texto		= "<table>
    	<tr>
    	<td>Nome:</td>
    	<td>$nome</td>
    	</tr>
    	<tr>
    	<td>Email:</td>
    	<td>$email</td>
    	</tr>
    	<tr>
    	<td>Telefone:</td>
    	<td>$telefone</td>
    	</tr>
    	<tr>
    	<td>Texto enviado:</td>
    	<td>$titulo <br>$texto</td>
    	</tr>
    	
    	</table>";
    	$email		= new MailController();
    	$retorno	= $email->sendEmail($titulo, $texto);
    	$decode		= json_decode($retorno->getContent());
    	 
    	if($decode->statusOperation == true)
    	{
    		//$create	= Mensagem::create($dados);
    		return response()->json(['msg'=>'<strong>Email enviado.</strong>','statusOperation'=>true]);
    	}
    	return $retorno;
    }
}
