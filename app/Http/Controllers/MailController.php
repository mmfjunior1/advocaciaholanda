<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Mail;
use Illuminate\Auth\Access\Response;
class MailController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function envia()
    {
    	$attach	= array("boletos/ImoBiliariaShima-145990425111-1.pdf");
    	return $this->sendEmail("mmfjunior1@gmail.com","Boleto aluguel","Anexo Boleto referente ao mês corrente",$attach);
    }
	function sendEmail($subject = "Boleto", $text= "",$attach = array(),$to = "",$name = "")
	{
		try{
			$fromName 			= "Contato - Holanda Advogados";
			$fromMail           = "contato@holandaadvogados.com";
			$texto				= (Object)"";
			$texto->texto		= $text;
			
			Mail::send('master.email',array("user"=>$texto), function($messagem) use ($fromName,$fromMail,$subject)
			{
				$messagem->to($fromMail,$fromMail);
                $messagem->from('sistema@holandaadvogados.com','sistema@holandaadvogados.com');
				
				$messagem->subject($subject);
			});
			return response()->json(['msg'=>'<strong>Email enviado.</strong>','statusOperation'=>true,]);
		}catch(Exception $e)
		{
			return response()->json(['msg'=>'<strong>Falha ao enviar a mensagem. Tente novamente</strong>','statusOperation'=>false,]);
		}
	}
}
