<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Texto;
class BlogController extends BaseController
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
    				$textos->orWhere($field,'ilike','%'.$value.'%');
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
    	$textos							= $this->listaTextooDb($request);
    	return view('contents.blog',['textos'=>$textos['search'],]);
    }
    
    public function noticias($title = "")
    {
    	$title			= trim(str_replace(array("-",".html")," ",$title));
    	
    	$resultSet		= Texto::select('*')->where('titulo','ilike','%'.$title.'%')->get();
    	
    	$noticia		= $resultSet[0];
    	
    	return view('contents.blogContent',['noticia' => $noticia,'created_at'=>$noticia->created_at]);
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
    
}
