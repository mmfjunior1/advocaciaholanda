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
	
	Route::any('admin/imoveis',							'SearchController@adminImoveisIndex');;
	
	Route::any('admin/imoveis/search',					'SearchController@adminImoveisIndex');;
	
	Route::get('admin/imoveis/cadastro',				'SearchController@create');;
	
	Route::post('admin/imoveis/gravar',					'SearchController@store');;
	
	Route::get('admin/imoveis/show/{id}',				'SearchController@show');;
	
	Route::any('admin/imoveis/cancelar',				'SearchController@cancelar');;
	
	Route::any('admin/imoveis/cadfotos',				'SearchController@storeFotos');;
	
	Route::any('admin/imoveis/cliente',					'SearchController@getClienteImovel');;
	
	Route::post('admin/imoveis/excluir',				'SearchController@delete');;
	
	Route::any('admin/imoveis/enderecoMaps',			'SearchController@getEnderecoMaps');;
	
	Route::get('admin/clientes', 						'ClienteController@index');
	
	Route::any('admin/proprietarios', 					'ClienteController@index');
	
	Route::any('admin/clientes/search', 				'ClienteController@index');
	
	Route::any('admin/proprietarios/search', 			'ClienteController@index');
	
	Route::get('admin/clientes/cadastro',				'ClienteController@create');
	
	Route::get('admin/proprietarios/cadastro',			'ClienteController@create');
	
	Route::post('admin/clientes/gravar', 				'ClienteController@store');
	
	Route::post('admin/clientes/cancelar',				'ClienteController@cancelar');
	
	Route::any('admin/clientes/show/{id}',				'ClienteController@show');
	
	Route::any('admin/proprietarios/show/{id}',			'ClienteController@show');
	
	Route::post('admin/clientes/excluir',				'ClienteController@delete');
	
	Route::any('admin/clientes/buscaCep',				'ClienteController@buscaCep');
	
	Route::any('admin/mensagem',						'MensagemController@index');
	
	Route::any('admin/mensagem/show/{id}',				'MensagemController@show');
	
	Route::post('admin/mensagem/excluir',				'MensagemController@delete');
	
	Route::post('admin/mensagem/gravar',				'MensagemController@enviar');
	//Rotas possíveis para cadastro de usuários
	Route::any('admin/usuarios',						'UsuarioSistemaController@index');
	
	Route::get('admin/usuarios/show/{id}',				'UsuarioSistemaController@show');
	
	Route::post('admin/usuarios/gravar',				'UsuarioSistemaController@store');
	
	Route::get('admin/usuarios/cadastro',				'UsuarioSistemaController@create');
	
	Route::any('admin/usuarios/excluir',				'UsuarioSistemaController@delete');
	
	Route::post('admin/usuarios/cancelar',				'UsuarioSistemaController@cancelar');
	
	Route::post('admin/usuarios/cancelar',				'UsuarioSistemaController@cancelar');
	
	Route::get('admin/sair',							'LoginController@logoutAdmin');
	
	Route::any('admin/aluguel/index',					'AluguelController@index');
	
	Route::any('admin/aluguel',							'AluguelController@index');
	
	Route::any('admin/docs',							'ClienteController@clientesDocs');
	
	Route::any('admin/docs/delDoc',						'ClienteController@deleteDoc');
	
	Route::any('admin/docs/show/{id}',					'ClienteController@clienteDoc');
	
	Route::post('/admin/docs/cadDocs',					'ClienteController@storeDocs');
	
	Route::any('admin/aluguel/show/{id}',				'AluguelController@show');
	
	Route::post('admin/aluguel/alteraAluguel',			'AluguelController@alteraAluguel');
	
	Route::post('admin/aluguel/delAluguel',				'AluguelController@delete');
	
	Route::post('/admin/aluguel/cadAluguel',			'AluguelController@store');
	
	Route::post('admin/aluguel/cancelar',				'AluguelController@alteraAluguel');
	
	
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

Route::any('busca', 'SearchController@busca');

Route::get('/', 'SearchController@home');

Route::get('/index', function () {
	return view('contents.indexContent');
});

Route::get('/contato', function () {
	return view('contents.contatoContent');
});

Route::post('/obrigado', function () {
	return view('contents.sucessoContent');
});

Route::post("logonSistema",							'LoginController@login');

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
