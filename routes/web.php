<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhooksController;

use Illuminate\Support\Facades\Log;
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

Route::group(array('domain' => '{subdomain}.'.env('APP_URL')), function () {

    Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('sitepagina');


 });

//Route::domain('{subdomain}.' .env('APP_URL'))->group(function(){
    Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('sitepagina');
//});

Route::get('/', function () {
    return view('welcome');
});

Route::get('termo', function () {
    return view('termo');
});

Route::get('log', function () {
    return view('/admin/log-reader');
});

Route::get('privacidade', function () {
    return view('privacidade');
});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware(['auth'])->name('crmlogs');


//...

//Inicio
Route::match(['get', 'post'],'/dashboard', [App\Http\Controllers\AvisoController::class, 'index'])->middleware(['auth'])->name('dashboard');

//mudande pano
Route::match(['get', 'post'],'escolherPlano', [App\Http\Controllers\PainelController::class, 'escolherPlano'])->middleware(['auth'])->name('escolherPlano');

//painel-cuidadados do usuario
Route::match(['get', 'post'],'/painel/{id}', [App\Http\Controllers\PainelController::class, 'painel'])->middleware(['auth'])->name('painel');
Route::post('/painel_edit/{id}', [App\Http\Controllers\PainelController::class, 'painel_edit'])->middleware(['auth'])->name('painel_edit');
Route::match(['get', 'post'],'/ativanot/{id}', [App\Http\Controllers\PainelController::class, 'ativanot'])->middleware(['auth'])->name('ativanot');
Route::match(['get', 'post'],'/add_notifica/{id}', [App\Http\Controllers\PainelController::class, 'add_notifica'])->middleware(['auth'])->name('add_notifica');
Route::match(['get', 'post'],'/ativanotok', [App\Http\Controllers\PainelController::class, 'confirma_notifica'])->name('confirma_notifica');


//SUPORTE
Route::get('/suporte', [App\Http\Controllers\AvisoController::class, 'suporte'])->middleware('auth')->name('suporte');
//ROTA CLIENTE CONTROLLER
Route::get('/funil', [App\Http\Controllers\ClienteController::class, 'show'])->middleware('auth')->name('funil');
Route::get('/funil2', [App\Http\Controllers\ClienteController::class, 'funil2'])->middleware('auth')->name('funil2');
Route::post('/funil3', [App\Http\Controllers\ClienteController::class, 'funil3'])->middleware('auth')->name('funil3');
Route::get('/form_cliente', [App\Http\Controllers\ClienteController::class, 'form_cliente'])->middleware('auth')->name('form_cliente');
Route::match(['get', 'post'],'/add_cliente', [App\Http\Controllers\ClienteController::class, 'store'])->middleware('auth')->name('add_cliente');
Route::get('/edit_cliente', [App\Http\Controllers\ClienteController::class, 'edit_cliente'])->middleware('auth')->name('edit_cliente');
Route::get('/envia_email_cliente', [App\Http\Controllers\ClienteController::class, 'envia_email_cliente'])->middleware('auth')->name('envia_email_cliente');
Route::get('/corretor/add_edit_cliente/{id}', [App\Http\Controllers\ClienteController::class,'edit'])->middleware('auth')->name('add_edit_cliente');
Route::post('/corretor/add_cliente', [App\Http\Controllers\ClienteController::class, 'store'])->middleware('auth')->name('add_cliente');
Route::put('/corretor/add_edit_cliente/{id}', [App\Http\Controllers\ClienteController::class,'update'])->middleware('auth')->name('add_update_cliente');
Route::get('/corretor/deletar_cliente/{id}', [App\Http\Controllers\ClienteController::class,'destroy'])->middleware('auth')->name('deletar_cliente');
Route::get('/corretor/add_edit_cliente/{id}', [App\Http\Controllers\ClienteController::class,'edit'])->middleware('auth')->name('add_edit_cliente');
Route::put('/corretor/add_edit_cliente/{id}', [App\Http\Controllers\ClienteController::class,'update'])->middleware('auth')->name('add_update_cliente');
Route::get('/corretor/funil_corretor', [App\Http\Controllers\ClienteController::class,'show'])->middleware('auth')->name('funil_corretor');
Route::get('/corretor/funil_pardo_corretor', [App\Http\Controllers\ClienteController::class,'parado'])->middleware('auth')->name('funil_parado_corretor');
Route::get('/corretor/funil_ativo_corretor', [App\Http\Controllers\ClienteController::class,'ativo'])->middleware('auth')->name('funil_ativo_corretor');
Route::get('/corretor/funil_vendido_corretor', [App\Http\Controllers\ClienteController::class,'vendido'])->middleware('auth')->name('funil_vendido_corretor');
Route::get('/corretor/funil_doc_corretor', [App\Http\Controllers\ClienteController::class,'documentos'])->middleware('auth')->name('funil_doc_corretor');
Route::get('/corretor/funil_pen_corretor', [App\Http\Controllers\ClienteController::class,'pendencia'])->middleware('auth')->name('funil_pen_corretor');
Route::get('/corretor/funil_ana_corretor', [App\Http\Controllers\ClienteController::class,'analise'])->middleware('auth')->name('funil_ana_corretor');
Route::get('/corretor/par', [App\Http\Controllers\ClienteController::class,'par'])->middleware('auth')->name('par');
Route::get('/corretor/ver_par/{coduni}/{cod?}', [App\Http\Controllers\ClienteController::class,'ver_par'])->middleware('auth')->name('ver_par');
Route::get('/corretor/impar/{id}', [App\Http\Controllers\ClienteController::class,'impar'])->middleware('auth')->name('impar');

//PIPINE
Route::get('/corretor/pepino', [App\Http\Controllers\ClienteController::class,'pepino'])->middleware('auth')->name('pepino');
Route::get('/corretor/funilmaisum/{id}', [App\Http\Controllers\ClienteController::class,'funilmaisum'])->middleware('auth')->name('funilmaisum');
Route::get('/corretor/maisum/{id}', [App\Http\Controllers\ClienteController::class,'maisum'])->middleware('auth')->name('maisum');
Route::get('/corretor/zera/{id}', [App\Http\Controllers\ClienteController::class,'zera'])->middleware('auth')->name('zera');

//AGENDA
Route::get('/corretor/agenda_cliente', [App\Http\Controllers\AgendarVisitaController::class,'index'])->middleware('auth')->name('agenda_cliente');
Route::get('/corretor/add_agendar_cliente/{id}', [App\Http\Controllers\AgendarVisitaController::class,'index'])->middleware('auth')->name('add_agendar_cliente');
Route::post('/corretor/add_agenda/', [App\Http\Controllers\AgendarVisitaController::class,'store'])->middleware('auth')->name('add_agenda');
Route::post('/corretor/edit_agenda/', [App\Http\Controllers\AgendarVisitaController::class,'update'])->middleware('auth')->name('edit_agenda');
Route::post('/corretor/add_visita_agenda/{id}', [App\Http\Controllers\AgendarVisitaController::class,'visita'])->middleware('auth')->name('add_visita_agenda');

//GRAFICO
Route::get('corretor/grafico_cliente/{id}', [App\Http\Controllers\GraficoController::class, 'grafico_cliente'])->middleware('auth')->name('grafico_cliente');

//FERRAMENTAS
Route::get('/corretor/ferramentas', [App\Http\Controllers\FerramentasController::class, 'index'])->middleware('auth')->name('ferramentas');
Route::get('/corretor/pgcaptura/{id}', [App\Http\Controllers\FerramentasController::class, 'formulario'])->middleware('auth')->name('pgcaptura');
Route::post('/corretor/gerasite', [App\Http\Controllers\FerramentasController::class, 'gerasite'])->middleware('auth')->name('gerasite');
Route::get('/corretor/configura_site/{id}', [App\Http\Controllers\FerramentasController::class, 'configura_site'])->middleware('auth')->name('configura_site');
Route::post('/corretor/configura_site_edit/{id}', [App\Http\Controllers\FerramentasController::class, 'configura_site_edit'])->middleware('auth')->name('configura_site_edit');

//IMOVEIS
Route::get('/corretor/list_imovel/{id}', [App\Http\Controllers\ImovelController::class, 'show'])->middleware('auth')->name('list_imovel');
Route::post('/corretor/add_imovel', [App\Http\Controllers\ImovelController::class, 'store'])->middleware('auth')->name('add_imovel');
Route::get('/corretor/add_edit_imovel/{id}', [App\Http\Controllers\ImovelController::class,'add_edit_imovel'])->middleware('auth')->name('add_edit_imovel');
Route::get('/corretor/ativa_imovel/{id}', [App\Http\Controllers\ImovelController::class, 'ativa_imovel'])->middleware('auth')->name('ativa_imovel');
Route::get('/corretor/desativa_imovel/{id}', [App\Http\Controllers\ImovelController::class, 'desativa_imovel'])->middleware('auth')->name('desativa_imovel');
Route::get('/corretor/ativa_destaque/{id}', [App\Http\Controllers\ImovelController::class, 'ativa_destaque'])->middleware('auth')->name('ativa_destaque');
Route::get('/corretor/desativa_destaque/{id}', [App\Http\Controllers\ImovelController::class, 'desativa_destaque'])->middleware('auth')->name('desativa_destaque');
Route::get('/corretor/deletar_imovel/{id}', [App\Http\Controllers\ImovelController::class, 'destroy'])->middleware('auth')->name('deletar_imovel');
Route::get('/corretor/edit_imovel/{id}', [App\Http\Controllers\ImovelController::class, 'edit'])->middleware('auth')->name('edit_imovel');
Route::put('/corretor/update_imovel/{id}', [App\Http\Controllers\ImovelController::class, 'update'])->middleware('auth')->name('update_imovel');
Route::post('/corretor/buscacod', [App\Http\Controllers\ImovelController::class, 'buscacod'])->middleware('auth')->name('buscacod');
Route::get('/corretor/add_site_anuncio/{id}', [App\Http\Controllers\ImovelController::class, 'add_site_anuncio'])->middleware('auth')->name('add_site_anuncio');
Route::get('/corretor/paga_anuncio/{id}', [App\Http\Controllers\ImovelController::class, 'paga_anuncio'])->middleware('auth')->name('paga_anuncio');

//MARKTING ENVIO DE EMAIL
Route::get('/corretor/add_markting/{id}', [App\Http\Controllers\ImovelController::class, 'add_markting'])->middleware('auth')->name('add_markting');
Route::get('/corretor/add_par_markting/{coduni}/{cod?}', [App\Http\Controllers\ImovelController::class, 'add_par_markting'])->middleware('auth')->name('add_par_markting');
Route::get('/mark', [App\Http\Controllers\MarkController::class, 'index'])->middleware('auth')->name('mark');
Route::get('/cobrar', [App\Http\Controllers\MarkController::class, 'cobrar'])->middleware('auth')->name('cobrar');
Route::get('/corretor/add_foto/{id}', [App\Http\Controllers\ImovelController::class, 'add_foto'])->middleware('auth')->name('add_foto');
Route::match(['get', 'post'],'/corretor/add_fotos/{id}', [App\Http\Controllers\ImovelController::class, 'add_fotos'])->middleware('auth')->name('add_fotos');
Route::get('/corretor/deletar_foto/{id}', [App\Http\Controllers\ImovelController::class, 'deletar_foto'])->middleware('auth')->name('deletar_foto');
//EXCEL
Route::get('/corretor/add_excel', [App\Http\Controllers\ExcelController::class,'export'])->middleware('auth')->name('add_excel');

//////////GERENTE
Route::get('/gerente/gerente', [App\Http\Controllers\Gerente\GerenteController::class, 'index'])->middleware('auth')->name('gerente');
Route::get('/gerente/lista_agenda/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'lista_agenda'])->middleware('auth')->name('lista_agenda');
Route::post('/gerente/add_corretor', [App\Http\Controllers\Gerente\GerenteController::class, 'add_corretor'])->middleware('auth')->name('add_corretor');
Route::get('/gerente/add_leads', [App\Http\Controllers\Gerente\GerenteController::class, 'add_leads'])->middleware('auth')->name('add_leads');
Route::get('/gerente/busca_corretor', [App\Http\Controllers\Gerente\GerenteController::class, 'busca_corretor'])->middleware('auth')->name('busca_corretor');
Route::get('/gerente/add_um_corretor/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'add_um_corretor'])->middleware('auth')->name('add_um_corretor');
Route::post('/gerente/remove_corretor/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'remove_corretor'])->middleware('auth')->name('remove_corretor');
Route::get('/gerente/buscaGraficoCorretor/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'buscaGraficoCorretor'])->middleware('auth')->name('buscaGraficoCorretor');
Route::get('/gerente/ListaImovelEquipe/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'ListaImovelEquipe'])->middleware('auth')->name('ListaImovelEquipe');
Route::get('/gerente/funil_equipe/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'funil_equipe'])->middleware('auth')->name('funil_equipe');
Route::get('/gerente/funil_parado_gerente/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'parado'])->middleware('auth')->name('funil_parado_gerente');
Route::get('/gerente/funil_ativo_gerente/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'ativo'])->middleware('auth')->name('funil_ativo_gerente');
Route::get('/gerente/funil_doc_gerente/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'documentos'])->middleware('auth')->name('funil_doc_gerente');
Route::get('/gerente/funil_pen_gerente/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'pendencia'])->middleware('auth')->name('funil_pen_gerente');
Route::get('/gerente/funil_ana_gerente/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'analise'])->middleware('auth')->name('funil_ana_gerente');
Route::get('/gerente/funil_vendido_gerente/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'vendido'])->middleware('auth')->name('funil_vendido_gerente');
Route::get('/gerente/add_leads_gerente/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'add_leads_gerente'])->middleware('auth')->name('add_leads_gerente');
Route::post('/gerente/gerente_add_leads', [App\Http\Controllers\Gerente\GerenteController::class, 'gerente_add_leads'])->middleware('auth')->name('gerente_add_leads');
Route::get('/gerente/add_relatorio/{id}', [App\Http\Controllers\Gerente\GerenteController::class, 'add_relatorio'])->middleware('auth')->name('add_relatorio');
Route::get('/gerente/relatorio', [App\Http\Controllers\Gerente\GerenteController::class, 'add_gerarelatorio'])->middleware('auth')->name('add_gerarelatorio');

Route::get('/fim', [App\Http\Controllers\PainelController::class, 'fim'])->name('fim');
/////////////////ADMIN
Route::get('/admin/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->middleware('auth')->name('admin');
Route::get('/admin/frees', [App\Http\Controllers\Admin\AdminController::class, 'frees'])->middleware('auth')->name('frees');
Route::get('/admin/corretors', [App\Http\Controllers\Admin\AdminController::class, 'corretors'])->middleware('auth')->name('corretors');
Route::get('/admin/gerentes', [App\Http\Controllers\Admin\AdminController::class, 'gerentes'])->middleware('auth')->name('gerentes');
Route::get('/admin/pagante', [App\Http\Controllers\Admin\AdminController::class, 'pagante'])->middleware('auth')->name('pagante');
Route::get('/admin/lista_geral', [App\Http\Controllers\Admin\AdminController::class, 'lista_geral'])->middleware('auth')->name('lista_geral');
Route::get('admin/grafico_ano', [App\Http\Controllers\Admin\GraficoController::class, 'grafico_ano'])->middleware('auth')->name('grafico_ano');
Route::get('admin/grafico_mes', [App\Http\Controllers\Admin\GraficoController::class, 'grafico_mes'])->middleware('auth')->name('grafico_mes');
Route::get('admin/grafico_Client_mes', [App\Http\Controllers\Admin\GraficoController::class, 'grafico_Client_mes'])->middleware('auth')->name('grafico_Client_mes');
Route::get('admin/ListaPorEquipe/{id}', [App\Http\Controllers\Admin\GraficoController::class, 'ListaPorEquipe'])->middleware('auth')->name('ListaPorEquipe');
Route::get('/admin/info', [App\Http\Controllers\Admin\AdminController::class, 'info'])->middleware('auth')->name('info');
Route::post('/admin/add_info', [App\Http\Controllers\Admin\AdminController::class, 'add_info'])->middleware('auth')->name('add_info');
Route::get('/admin/deletar_aviso/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])->middleware('auth')->name('deletar_aviso');
Route::get('/admin/lucro', [App\Http\Controllers\Admin\AdminController::class, 'lucro'])->middleware('auth')->name('lucro');
Route::get('/admin/list_suporte', [App\Http\Controllers\Admin\AdminController::class, 'list_suporte'])->middleware('auth')->name('list_suporte');
Route::post('/admin/add_suporte', [App\Http\Controllers\Admin\AdminController::class, 'add_suporte'])->middleware('auth')->name('add_suporte');
Route::get('/admin/deletar_suporte/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deletar_suporte'])->middleware('auth')->name('deletar_suporte');
Route::get('/admin/banner', [App\Http\Controllers\Admin\AdminController::class, 'banner'])->middleware('auth')->name('banner');
Route::post('/admin/add_banner', [App\Http\Controllers\Admin\AdminController::class, 'add_banner'])->middleware('auth')->name('add_banner');
Route::get('/admin/deletar_banner/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deletar_banner'])->middleware('auth')->name('deletar_banner');
Route::get('/admin/emailTodos', [App\Http\Controllers\Admin\AdminController::class, 'emailTodos'])->middleware('auth')->name('emailTodos');
Route::post('/admin/add_emailTodos', [App\Http\Controllers\Admin\AdminController::class, 'add_emailTodos'])->middleware('auth')->name('add_emailTodos');
Route::get('/admin/plano', [App\Http\Controllers\Admin\AdminController::class, 'plano'])->middleware('auth')->name('plano');
Route::post('/admin/add_plano/{id}', [App\Http\Controllers\Admin\AdminController::class, 'add_plano'])->middleware('auth')->name('add_plano');
Route::post('/admin/cadd_plano', [App\Http\Controllers\Admin\AdminController::class, 'cadd_plano'])->middleware('auth')->name('cadd_plano');
Route::get('/admin/anuncio', [App\Http\Controllers\Admin\AdminController::class, 'anuncio'])->middleware('auth')->name('anuncio');
Route::get('/admin/para_anuncio/{id}', [App\Http\Controllers\Admin\AdminController::class, 'para_anuncio'])->middleware('auth')->name('para_anuncio');
Route::get('/admin/ativa_anuncio/{id}', [App\Http\Controllers\Admin\AdminController::class, 'ativa_anuncio'])->middleware('auth')->name('ativa_anuncio');
Route::get('/admin/del_anuncio/{id}', [App\Http\Controllers\Admin\AdminController::class, 'del_anuncio'])->middleware('auth')->name('del_anuncio');
Route::post('/admin/busca_anuncio/{id}', [App\Http\Controllers\Admin\AdminController::class, 'busca_anuncio'])->middleware('auth')->name('busca_anuncio');
Route::get('/admin/add_anuncio/{id}', [App\Http\Controllers\Admin\AdminController::class, 'add_anuncio'])->middleware('auth')->name('add_anuncio');
Route::get('/admin/add_admin_corretor/{id}', [App\Http\Controllers\Admin\AdminController::class, 'add_admin_corretor'])->middleware('auth')->name('add_admin_corretor');
Route::get('/admin/add_admin_gerente/{id}', [App\Http\Controllers\Admin\AdminController::class, 'add_admin_gerente'])->middleware('auth')->name('add_admin_gerente');
Route::get('/admin/adminlistaimovel/{id}', [App\Http\Controllers\Admin\AdminController::class, 'adminlistaimovel'])->middleware('auth')->name('adminlistaimovel');
Route::get('/admin/jobs', [App\Http\Controllers\Admin\AdminController::class, 'jobs'])->middleware('auth')->name('jobs');
Route::get('/admin/deletajobs', [App\Http\Controllers\Admin\AdminController::class, 'deletajobs'])->middleware('auth')->name('deletajobs');

//Base
Route::get('/base', [App\Http\Controllers\BaseCliente::class, 'base'])->name('base');
//EMAIL
Route::get('/send-mail/{id}', [App\Http\Controllers\EmailController::class,'index'])->middleware('auth')->name('send-mail');
Route::post('corretor/add_emailunico', [App\Http\Controllers\EmailController::class,'add_emailunico'])->middleware('auth')->name('add_emailunico');

///SITE
Route::get('/site/site', [App\Http\Controllers\SiteController::class,'index'])->middleware('auth')->name('site');
Route::get('/site/alugar/{id}', [App\Http\Controllers\SiteController::class,'alugar'])->middleware('auth')->name('alugar');
Route::get('/site/detalhes/{id}', [App\Http\Controllers\SiteController::class,'detalhes'])->middleware('auth')->name('detalhes');
Route::post('/site/busca/{id}', [App\Http\Controllers\SiteController::class,'busca'])->middleware('auth')->name('busca');
Route::post('/site/simula', [App\Http\Controllers\SiteController::class,'simula'])->middleware('auth')->name('simula');
Route::get('/site/sucesso/{id}', [App\Http\Controllers\SiteController::class,'sucesso'])->middleware('auth')->name('sucesso');
Route::post('/site/visita', [App\Http\Controllers\SiteController::class,'visita'])->middleware('auth')->name('visita');
Route::get('/site/quero/{id}', [App\Http\Controllers\SiteController::class,'quero'])->middleware('auth')->name('quero');
Route::post('/site/add_quero', [App\Http\Controllers\SiteController::class,'add_quero'])->middleware('auth')->name('add_quero');


///MOBI
Route::get('/mobi_funil', [App\Http\Controllers\MobiController::class, 'show'])->middleware('auth')->name('mobi_funil');
Route::get('/mobi/mobi_funil_corretor', [App\Http\Controllers\MobiController::class,'show'])->middleware('auth')->name('mobi_funil_corretor');
Route::get('/mobi/mobi_funil_pardo_corretor', [App\Http\Controllers\MobiController::class,'parado'])->middleware('auth')->name('mobi_funil_parado_corretor');
Route::get('/mobi/mobi_funil_ativo_corretor', [App\Http\Controllers\MobiController::class,'ativo'])->middleware('auth')->name('mobi_funil_ativo_corretor');
Route::get('/mobi/mobi_funil_vendido_corretor', [App\Http\Controllers\MobiController::class,'vendido'])->middleware('auth')->name('mobi_funil_vendido_corretor');
Route::get('/mobi/mobi_funil_doc_corretor', [App\Http\Controllers\MobiController::class,'documentos'])->middleware('auth')->name('mobi_funil_doc_corretor');
Route::get('/mobi/mobi_funil_pen_corretor', [App\Http\Controllers\MobiController::class,'pendencia'])->middleware('auth')->name('mobi_funil_pen_corretor');
Route::get('/mobi/mobi_funil_ana_corretor', [App\Http\Controllers\MobiController::class,'analise'])->middleware('auth')->name('mobi_funil_ana_corretor');
Route::get('/mobi_edit_cliente/{id}', [App\Http\Controllers\MobiController::class,'edit'])->middleware('auth')->name('mobi_edit_cliente');
Route::put('/mobi_add_edit_cliente/{id}', [App\Http\Controllers\MobiController::class,'update'])->middleware('auth')->name('mobi_add_edit_cliente');
Route::post('/mobi/mobi_add_cliente', [App\Http\Controllers\MobiController::class, 'store'])->middleware('auth')->name('mobi_add_cliente');

//AGENDA MOBI
Route::get('/mobi/agenda_cliente', [App\Http\Controllers\MobiController::class,'indexmobi'])->middleware('auth')->name('mobi_agenda_cliente');
Route::get('/mobi/add_agendar_cliente/{id}', [App\Http\Controllers\MobiController::class,'indexmobi'])->middleware('auth')->name('mobi_add_agendar_cliente');
Route::post('/mobi/add_agenda/', [App\Http\Controllers\MobiController::class,'storeagenda'])->middleware('auth')->name('mobi_add_agenda');
Route::post('/mobi/edit_agenda/', [App\Http\Controllers\MobiController::class,'updateagenda'])->middleware('auth')->name('mobi_edit_agenda');
Route::post('/mobi/add_visita_agenda/{id}', [App\Http\Controllers\MobiController::class,'visita'])->middleware('auth')->name('mobi_add_visita_agenda');
//IMOVEIS MOBI
Route::get('/mobi/list_imovel/{id}', [App\Http\Controllers\MobiController::class, 'showmobi'])->middleware('auth')->name('mobi_list_imovel');
Route::post('/mobi/add_imovel', [App\Http\Controllers\MobiController::class, 'storemobi'])->middleware('auth')->name('mobi_add_imovel');

Route::get('/mobi/add_edit_imovel/{id}', [App\Http\Controllers\MobiController::class,'add_edit_imovelmobi'])->middleware('auth')->name('mobi_add_edit_imovel');
Route::get('/mobi/ativa_imovel/{id}', [App\Http\Controllers\MobiController::class, 'ativa_imovelmobi'])->middleware('auth')->name('mobi_ativa_imovel');
Route::get('/mobi/desativa_imovel/{id}', [App\Http\Controllers\MobiController::class, 'desativa_imovelmobi'])->middleware('auth')->name('mobi_desativa_imovel');
Route::get('/mobi/ativa_destaque/{id}', [App\Http\Controllers\MobiController::class, 'ativa_destaquemobi'])->middleware('auth')->name('mobi_ativa_destaque');
Route::get('/mobi/desativa_destaque/{id}', [App\Http\Controllers\MobiController::class, 'desativa_destaquemobi'])->middleware('auth')->name('mobi_desativa_destaque');
Route::get('/mobi/deletar_imovel/{id}', [App\Http\Controllers\MobiController::class, 'destroymobi'])->middleware('auth')->name('mobi_deletar_imovel');
Route::get('/mobi/edit_imovel/{id}', [App\Http\Controllers\MobiController::class, 'editmobi'])->middleware('auth')->name('mobi_edit_imovel');
Route::put('/mobi/update_imovel/{id}', [App\Http\Controllers\MobiController::class, 'updatemobi'])->middleware('auth')->name('mobi_update_imovel');

Route::get('/mobi/add_foto/{id}', [App\Http\Controllers\MobiController::class, 'add_fotomobi'])->middleware('auth')->name('mobi_add_foto');
Route::post('/mobi/add_fotos/{id}', [App\Http\Controllers\MobiController::class, 'add_fotosmobi'])->middleware('auth')->name('mobi_add_fotos');
Route::get('/mobi/deletar_foto/{id}', [App\Http\Controllers\MobiController::class, 'deletar_fotomobi'])->middleware('auth')->name('mobi_deletar_foto');
//GERENTE MOBI

Route::get('/mobi/mobi_lista_agenda/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_lista_agenda'])->middleware('auth')->name('mobi_lista_agenda');

Route::post('/mobi/mobi_add_corretor', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_mobi_add_corretor'])->middleware('auth')->name('mobi_add_corretor');
Route::get('/mobi/mobi_add_leads', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_add_leads'])->middleware('auth')->name('mobi_add_leads');
Route::get('/mobi/mobi_busca_corretor', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_busca_corretor'])->middleware('auth')->name('mobi_busca_corretor');
Route::get('/mobi/mobi_add_um_corretor/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_add_um_corretor'])->middleware('auth')->name('mobi_add_um_corretor');
Route::post('/mobi/mobi_remove_corretor/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_remove_corretor'])->middleware('auth')->name('mobi_remove_corretor');
Route::get('/mobi/mobi_buscaGraficoCorretor/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_buscaGraficoCorretor'])->middleware('auth')->name('mobi_buscaGraficoCorretor');
Route::get('/mobi/mobi_ListaImovelEquipe/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_ListaImovelEquipe'])->middleware('auth')->name('mobi_ListaImovelEquipe');


Route::get('/mobi/mobi_funil_equipe/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_funil_equipe'])->middleware('auth')->name('mobi_funil_equipe');
Route::get('/mobi/mobi_funil_parado_gerente/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_parado'])->middleware('auth')->name('mobi_funil_parado_gerente');
Route::get('/mobi/mobi_funil_ativo_gerente/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_ativo'])->middleware('auth')->name('mobi_funil_ativo_gerente');
Route::get('/mobi/mobi_funil_doc_gerente/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_documentos'])->middleware('auth')->name('mobi_funil_doc_gerente');
Route::get('/mobi/mobi_funil_pen_gerente/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_pendencia'])->middleware('auth')->name('mobi_funil_pen_gerente');
Route::get('/mobi/mobi_funil_ana_gerente/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_analise'])->middleware('auth')->name('mobi_funil_ana_gerente');
Route::get('/mobi/mobi_funil_vendido_gerente/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_vendido'])->middleware('auth')->name('mobi_funil_vendido_gerente');
Route::get('/mobi/mobi_add_leads_gerente/{id}', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_add_leads_gerente'])->middleware('auth')->name('mobi_add_leads_gerente');
Route::post('/mobi/mobi_gerente_add_leads', [App\Http\Controllers\Gerente\MobiGerenteController::class, 'mobi_gerente_add_leads'])->middleware('auth')->name('mobi_gerente_add_leads');

// pagamentos
Route::get('/renova', [App\Http\Controllers\AvisoController::class, 'index'])->middleware('auth')->name('renova');
Route::get('/pgseguro/pgrenova', [App\Http\Controllers\MpagoController::class, 'pgrenovar'])->middleware('auth')->name('pgrenovar');

Route::get('/pagamercado', [App\Http\Controllers\MpagoController::class, 'pagamercado'])->middleware('auth')->name('pagamercado');
Route::get('/pgcorretor', [App\Http\Controllers\MpagoController::class, 'pgcorretor'])->middleware('auth')->name('pgcorretor');
Route::get('/pggerente', [App\Http\Controllers\MpagoController::class, 'pggerente'])->middleware('auth')->name('pggerente');
Route::get('/corretormes/{id}', [App\Http\Controllers\MpagoController::class, 'corretormes'])->middleware('auth')->name('corretormes');
Route::get('/novogerente/{id}', [App\Http\Controllers\MpagoController::class, 'novogerente'])->middleware('auth')->name('novogerente');
Route::get('/corretorsemestral', [App\Http\Controllers\MpagoController::class, 'corretorsemestral'])->middleware('auth')->name('corretorsemestral');
Route::get('/corretoranual', [App\Http\Controllers\MpagoController::class, 'corretoranual'])->middleware('auth')->name('corretoranual');
Route::get('/gerentemes', [App\Http\Controllers\MpagoController::class, 'gerentemes'])->middleware('auth')->name('gerentemes');
Route::get('/gerentesemestral', [App\Http\Controllers\MpagoController::class, 'gerentesemestral'])->middleware('auth')->name('gerentesemestral');
Route::get('/gerenteanual', [App\Http\Controllers\MpagoController::class, 'gerenteanual'])->middleware('auth')->name('gerenteanual');

Route::get('/gerenteanual', [App\Http\Controllers\MpagoController::class, 'gerenteanual'])->middleware('auth')->name('gerenteanual');

Route::get('/pgcard', [App\Http\Controllers\MpagoController::class, 'pgcard'])->middleware('auth')->name('pgcard');

require __DIR__.'/auth.php';
//RECEBE DE VOLTA MERCADO PAGO
Route::match(['get', 'post'],'webhooks', WebhooksController::class);


Route::get('/pay/{id}', [App\Http\Controllers\MpagoController::class, 'pay'])->name('pay');


Route::get('/admin/buscaid/{id}', [App\Http\Controllers\MigraController::class, 'busca'])->name('busca');
Route::get('/admin/insere/{id}', [App\Http\Controllers\MigraController::class, 'insere'])->name('insere');


