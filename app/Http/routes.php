<?php


use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'administrator'], function () {
	
	Route::get('admin', function ()
	{
		return view('contents.indexAdminContent');
	});
	
	Route::get('admin/sair',							'LoginController@logoutAdmin');
	
	Route::any('admin/textos',							'TextoController@index');
	
	Route::get('admin/textos/show/{id}',				'TextoController@show');
	
	Route::post('admin/textos/gravar',					'TextoController@store');
	
	Route::get('admin/textos/cadastro',					'TextoController@create');
	
	Route::any('admin/textos/excluir',					'TextoController@delete');
	
	Route::post('admin/textos/cancelar',				'TextoController@cancelar');
	
	Route::post('admin/textos/excluirImagem',			'TextoController@excluirImagem');
	
	Route::post('admin/textos/cancelar',				'TextoController@cancelar');
	
	Route::any('admin/usuarios',						'UsuarioSistemaController@index');
	
	Route::get('admin/usuarios/show/{id}',				'UsuarioSistemaController@show');
	
	Route::post('admin/usuarios/gravar',				'UsuarioSistemaController@store');
	
	Route::get('admin/usuarios/cadastro',				'UsuarioSistemaController@create');
	
	Route::any('admin/usuarios/excluir',				'UsuarioSistemaController@delete');
	
	Route::post('admin/usuarios/cancelar',				'UsuarioSistemaController@cancelar');
	
	Route::post('admin/usuarios/cancelar',				'UsuarioSistemaController@cancelar');
	
	
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/painelCliente',							'PainelClienteController@index');
	
	Route::get('/painelCliente/dados',						'PainelClienteController@dadosPessoais');
	
	Route::get('/painelCliente/alugueis',					'PainelClienteController@financeiro');
	
	Route::get('/painelCliente/alugueis_a_receber',			'PainelClienteController@financeiroReceber');
	
	Route::get('/painelCliente/alugueis_a_receber/{id}',	'PainelClienteController@alugueisReceber');
	
	Route::get('/painelCliente/financeiro',					'PainelClienteController@painelFinanceiro');
	
	Route::get('/painelCliente/documentos',					'PainelClienteController@documentos');
	
	Route::get('/painelCliente/financeiro/{id}',			'PainelClienteController@alugueis');
	
	Route::get('/painelCliente/imovel/{id}',				'PainelClienteController@imovel');
	
	Route::get('/painelCliente/sair',						'LoginController@logout');
	
	Route::post('admin/clientesuser/gravar',				'ClienteController@store');
	
});



Route::any('/emailAnuncio',								'SearchController@emailImovel');

Route::any('/emailContato',								'SearchController@emailContato');

Route::get('/imovel/{id}', 								'SearchController@viewImovel');

Route::get('admin/sigin', 								'UsuarioSistemaController@sigin');

Route::post("admin/logonSistema",						'UsuarioSistemaController@login');
	
Route::post("admin/login",								'LoginController@loginAdmin');

Route::get('/quem-somos', 								'SearchController@homePage');

Route::get('/inicio/{rota}', 							'SearchController@home');

Route::get('/areas-de-atuacao', 						'SearchController@homePage');

Route::get('/home', 									'SearchController@homePage');

Route::get('/index', 									'SearchController@homePage');

Route::get('/', 										'SearchController@homePage');

Route::get('/contato',									'SearchController@homePage');

Route::get('/noticias', 								'BlogController@index');

Route::post('/enviaCurriculo', 								'SearchController@enviaCurriculo');

Route::get('/noticias/{title}', 						'BlogController@noticias');

Route::post('/obrigado', function () {
	return view('contents.sucessoContent');
});

// Route::post("logonSistema",							'LoginController@login');

Route::any("falha"		,							'LoginController@falha' );

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
