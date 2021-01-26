<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
route::any('/filtro','agendados\AgendadosController@filtro')->name('filtro');
Route::get('/home', 'HomeController@index')->name('home');
Route::any('/home/atualizarobs/{id}', 'HomeController@atualizar')->name('home.atualizarobs');
Route::any('/home/atualizar/{id}', 'HomeController@atualizar')->name('home.atualizar');
Route::any('/home/descargar/{id}', 'HomeController@descargar')->name('home.descargar');
Route::any('/home/descargarf/{id}', 'HomeController@descargarf')->name('home.descargarf');
Route::get('/novasenha/atualizar', 'HomeController@senha')->name('novasenha.atualizar');

Route::get('/Agendar', 'agendar\AgendarController@index')->name('agendar');
Route::post('/Agendar/salvar', 'agendar\AgendarController@salvar')->name('agendar.salvar');
Route::get('/Agendados', 'agendados\AgendadosController@index')->name('agendados');
Route::get('/Agendados/editar/{id}', 'agendados\AgendadosController@edit')->name('agendados.editar');
Route::put('/Agendados/atualizar/{id}', 'agendados\AgendadosController@atualizar')->name('agendados.atualizar');
Route::get('/Agendados/deletar/{id}', 'agendados\AgendadosController@deletar')->name('agendados.deletar');


route::get('pdfF','relatorio\relatorioController@pdfF')->name('pdfF');
route::get('pdfS','relatorio\relatorioController@pdfS')->name('pdfS');
route::get('status','relatorio\relatorioController@status')->name('status');
route::get('confirm/{id}','relatorio\relatorioController@confirm')->name('confirm');
route::get('confirm/','relatorio\relatorioController@confirm2')->name('confirm2');
route::get('porDia','relatorio\relatorioController@porDia')->name('porDia');
route::get('statusPorData','relatorio\relatorioController@statusPorData')->name('statusPorData');

Route::get('status/export', 'relatorio\relatorioController@statusExport')->name('statusExcel');

Route::get('/visitante', 'visitante\visitanteController@index')->name('visitante');
Route::get('/visitante/agendados', 'visitante\visitanteController@agendados')->name('visitante.agendados');
route::any('/visitante/filtro','visitante\visitanteController@filtro')->name('visitante.filtro');

Route::get('/usuarios','gerenciaUsuario\gerenciaUsuarioController@index')->name('gerenciamento');
Route::get('/cadastrar','gerenciaUsuario\gerenciaUsuarioController@cadastrar')->name('cadastra.usuario');
Route::post('/cadastrar/salvar', 'gerenciaUsuario\gerenciaUsuarioController@create')->name('cadastrar.salvar');
Route::get('/usuario/editar/{id}', 'gerenciaUsuario\gerenciaUsuarioController@edit')->name('gerenciamento.editar');
Route::put('/usuario/atualizar/{id}', 'gerenciaUsuario\gerenciaUsuarioController@atualizar')->name('gerenciamento.atualizar');
Route::get('/usuario/deletar/{id}', 'gerenciaUsuario\gerenciaUsuarioController@deletar')->name('gerenciamento.deletar');


