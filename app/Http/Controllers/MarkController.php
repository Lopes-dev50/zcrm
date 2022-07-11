<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Jobs\SemailMarkt;

class MarkController extends Controller
{
    public function index(){

          $plano = DB::table('clients')
    ->join('users', 'clients.user_id', '=', 'users.id')
     ->select('clients.*', 'users.celular', 'users.name', 'users.subdomain')
    ->where('users.plano', '!=', 'FREE')
    ->get()->toArray();

   foreach($plano as $planos){
   $updated_at = new Carbon($planos->updated_at);
   $now = Carbon::now();
      $d1 =  $updated_at->diffForHumans($now);
    //======================================================
    // envia email para clientes parados a 35 dias
      if(($updated_at->diff($now)->days ) == 35){
       //envia email
       $smailData = [
        'chamado' => 'Meu novo site de imóveis.',
        'title' => 'Olá! ' . $planos->nome_cliente,
        'body' => 'Quero convidar para conhecer meu novo site.',
        'body2' => 'Acesse meu site para ver os imoveis.',
        'body3' => 'Espero que encontre o imóvel que procura!',
        'link' => 'https://www.'.$planos->subdomain.'.crmcorretor.com.br',
        'bott' => 'Visitar site',
        'corretor' => 'Corretor '. $planos->name,
        'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
        'emailCorretor' => $planos->email_cliente,
    ];
    SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));
      }
     //======================================================
    // envia email para clientes parados a 61 dias
    if(($updated_at->diff($now)->days ) == 61){
        //envia email
        $smailData = [
            'chamado' => 'Novos imoveis',
            'title' => 'Olá! ' . $planos->nome_cliente. ', lembrei de você.',
             'body' => 'Acaba de chegar novo imóvel talvez seja o que esta procurando',
             'body2' => 'Acesse meu site para ver o novo imóvel',
             'body3' => 'Se prefeir pode chamar no wthassap '. $planos->celular,
             'link' => 'https://www.'.$planos->subdomain.'.crmcorretor.com.br',
             'bott' => 'Ver imóvel  ',
             'corretor' => 'Corretor '. $planos->name,
             'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
             'emailCorretor' => $planos->email_cliente,
        ];
         SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(25));
       }
         //======================================================
    // envia email para clientes parados a 90 dias
    if(($updated_at->diff($now)->days ) == 90){
        //envia email
        $smailData = [
            'chamado' => 'Deixa eu ajudar você, encontrar seu imóvel',
            'title' => 'Olá! ' . $planos->nome_cliente. ', Já faz tempo que conversamos',
            'body' => 'Espero que tenha achado imóvel que procura.',
            'body2' => 'Caso não tenha encontrato, deixa eu ajudar você, acessa meu site.',
            'body3' => 'Tem um formulario o imóvel que procuro',
            'link' => 'https://www.'.$planos->subdomain.'.crmcorretor.com.br',
            'bott' => 'Imovel que procuro',
            'corretor' => 'Corretor '. $planos->name,
            'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
            'emailCorretor' => $planos->email_cliente,
     ];
     SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(35));
       }
  //======================================================
    // envia email para clientes parados a 150 dias
    if(($updated_at->diff($now)->days ) == 150){
        //envia email
        $smailData = [
            'chamado' => 'Novos imoveis, Acredito que vai gostar.',
            'title' => 'Olá! ' . $planos->nome_cliente,
            'body' => 'Tem novos imóveis no meu site.',
            'body2' => 'Pode ser que goste de algum caso ainda não tenha encontrado.',
            'body3' => 'Acredito que vai gostar.',
            'link' => 'https://www.'.$planos->subdomain.'.crmcorretor.com.br',
            'bott' => 'Ver Imóveis',
            'corretor' => 'Corretor '. $planos->name,
            'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
            'emailCorretor' => $planos->email_cliente,
     ];
     SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(45));
       }
       //======================================================
    // envia email para clientes parados a 150 dias
    if(($updated_at->diff($now)->days ) == 180){
        //envia email
        $smailData = [
            'chamado' => 'Procurando imóvel ainda? tenho novas oportunidades',
            'title' => 'Olá! ' . $planos->nome_cliente,
            'body' => 'Tem novos imóveis no meu site.',
            'body2' => 'Pode ser que goste de algum caso ainda não tenha encontrado.',
            'body3' => 'Acredito que vai gostar.',
            'link' => 'https://www.'.$planos->subdomain.'.crmcorretor.com.br',
            'bott' => 'Ver Imóveis',
            'corretor' => 'Corretor '. $planos->name,
            'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
            'emailCorretor' => $planos->email_cliente,
     ];
     SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(55));
       }

    };

    }

//======================================avisos de cobranca plano corretor======================
public function cobrar(){

    $plano = DB::table('planos')
->join('users', 'planos.user_id', '=', 'users.id')
->select('planos.*', 'users.celular', 'users.name')
->where('users.plano', '!=', 'FREE')
->get()->toArray();

dd($plano);

foreach($plano as $planos){
$updated_at = new Carbon($planos->updated_at);
$now = Carbon::now();
$d1 =  $updated_at->diffForHumans($now);
//======================================================PLANO MENSAL
if ($planos->acesso == 30){
//PRIMEIRO EMAIL
if(($updated_at->diff($now)->days ) == 28){
 //envia email
 $smailData = [
  'chamado' => 'CrmCorretor.',
  'title' => 'Olá!' . $planos->name,
  'body' => 'Tudo bem?',
  'body2' => 'Lembrar que sua fatura já esta disponivel.',
  'body3' => 'Para realizar o pagamento agora.',
  'link' => 'https://www.crmcorretor.com.br/login',
  'bott' => 'Pagar agora',
  'corretor' => 'Financeiro ',
  'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
  'emailCorretor' => $planos->email,
];
SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));
}

//======================================================
// SEGUNDO EMAIL
if(($updated_at->diff($now)->days ) == 30){
  //envia email
  $smailData = [
      'chamado' => 'Crm Corretor',
      'title' => 'Olá! ' . $planos->name,
       'body' => 'Hoje vence sua fatura!',
       'body2' => 'Pode realizar o pagamento via cartão ou Pix',
       'body3' => 'Acesse o site para pagar agora',
       'link' => 'https://www.crmcorretor.com.br/login',
       'bott' => 'Pagar Agora!  ',
       'corretor' => 'Financeiro ',
       'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
       'emailCorretor' => $planos->email,
  ];
   SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(25));
 }

   //======================================================
// TERCEIRO EMAIL
if(($updated_at->diff($now)->days ) == 32){
  //envia email
  $smailData = [
      'chamado' => 'Crm Corretor - Financeiro',
      'title' => 'Olá! ' . $planos->name,
      'body' => 'Não identificamos seu pagamento.',
      'body2' => 'Sua conta vai voltar a ser FREE.',
      'body3' => 'Vai ocorrer o bloqueio do seu site e de outras ferramentas.',
      'link' => 'https://www.crmcorretor.com.br/login',
      'bott' => 'Pagar Agora!',
      'corretor' => 'Financeiro',
      'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
      'emailCorretor' => $planos->email,
];
SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(35));
 }

//======================================================
// QUARTO EMAIL
if(($updated_at->diff($now)->days ) == 120){
  //envia email
  $smailData = [
      'chamado' => 'CrmCorretor - Financeiro.',
      'title' => 'Olá! ' . $planos->name,
      'body' => 'Não identificamos seu pagamento vencimento superior a 90 dias.',
      'body2' => 'Sua conta vai ser deletada de nosso sistema em 48hs.',
      'body3' => 'Realize pagamento agora.',
      'link' => 'https://www.crmcorretor.com.br/login',
      'bott' => 'Pagar agora!',
      'corretor' => 'Financeiro',
      'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
      'emailCorretor' => $planos->email,
];
SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(45));
 }
}

};

}












}
