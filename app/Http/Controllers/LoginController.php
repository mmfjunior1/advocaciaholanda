<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Search;
use Auth;
use Hash;
class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function login( Request $request )
    {
    	$password	= ($request->password);
    	
    	$email		= $request->email;
    	
    	if (Auth::attempt(['email' => $email, 'password' => $password])) {
    		
    		return redirect()->intended('painelCliente');
    	}
    	
    	$cpf	= str_replace(array(".","-"),"",$email);
    	
    	$cpf1	= substr($cpf,0,3).".".substr($cpf,3,3).".".substr($cpf,6,3)."-".substr($cpf,9,2);
    	
    	if (Auth::attempt(['cpf' => $cpf, 'password' => $password])) {
    	
    		return redirect()->intended('painelCliente');
    	}
    	
    	if (Auth::attempt(['cpf' => $cpf1, 'password' => $password])) {
    		 
    		return redirect()->intended('painelCliente');
    	}
    	return redirect()->secure('falha');
    }
    
	public function loginAdmin( Request $request )
    {
		$password	= $request->password;
		$email		= $request->login;
		if($_SERVER['SERVER_PORT'] != '8080') {
			$recap      = $_POST['g-recaptcha-response'];
			$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeQbbQUAAAAAMlNIrBoV-88gzWG4AmW40RKYvj7&response=" . $recap . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
			$resposta = json_decode($resposta);
			
			if (!$resposta->success) {
				return redirect()->secure('/admin/sigin');
			}
		}
    	if( auth()->guard('administrator')->attempt(['login' => $email, 'password' => $password]))
    	{
    		//return redirect()->intended('/admin');
    		return redirect()->secure('/admin');
    	}
    	
    	//return redirect()->intended('/admin/sigin');
    	return redirect()->secure('/admin/sigin');
    	//return view('contents.indexContentFalhaLogon');
    }
    function loginIndexAdmin(Request $request)
    {
    	return view('contents.indexContentLogonAdmin');
    }
    public function logout( Request $request )
    {
    	Auth::logout();
    	return redirect()->secure('/');
    }
    
    public function logoutAdmin( Request $request )
    {
    	auth()->guard('administrator')->logout();
    	//return redirect()->intended('/admin/sigin');
    	return redirect()->secure('/admin/sigin');
    }
    
    function falha()
    {
    	return view('contents.indexContentFalhaLogon',['search'=>Search::class]);
    }
}
