<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Jobs\SemailMarkt;

class MarktingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'markting:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio email automatico para clientes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $plano = DB::table('clients')
        ->join('users', 'clients.user_id', '=', 'users.id')
         ->select('clients.*', 'users.celular', 'users.name', 'users.site')
        ->where('users.plano', '!=', 'FREE')
        ->get()->toArray();

       foreach($plano as $planos){
       $updated_at = new Carbon($planos->updated_at);
       $now = Carbon::now();
          $d1 =  $updated_at->diffForHumans($now);
        //======================================================
        // envia email para clientes parados a 35 dias
          if(($updated_at->diff($now)->days ) == 26){
           //envia email
           $smailData = [
            'chamado' => 'Meu novo site de imóveis.',
            'title' => 'Olá! ' . $planos->nome_cliente,
            'body' => 'Quero convidar para conhecer meu novo site.',
            'body2' => 'Acesse meu site para ver os imoveis.',
            'body3' => 'Espero que encontre o imóvel que procura!',
            'link' => 'https://www.'.$planos->site.'.crmcorretor.com.br',
            'bott' => 'Visitar site',
            'corretor' => 'Corretor '. $planos->name,
            'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
            'emailCorretor' => $planos->email_cliente,
        ];
        SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));
          }

         //======================================================
        // envia email para clientes parados a 61 dias
        if(($updated_at->diff($now)->days ) == 622){
            //envia email
            $smailData = [
                'chamado' => 'Novos imoveis',
                'title' => 'Olá! ' . $planos->nome_cliente. ', lembrei de você.',
                 'body' => 'Acaba de chegar novo imóvel talvez seja o que esta procurando',
                 'body2' => 'Acesse meu site para ver o novo imóvel',
                 'body3' => 'Se prefeir pode chamar no wthassap '. $planos->celular,
                 'link' => 'https://www.'.$planos->site.'.crmcorretor.com.br',
                 'bott' => 'Ver imóvel  ',
                 'corretor' => 'Corretor '. $planos->name,
                 'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
                 'emailCorretor' => $planos->email_cliente,
            ];
             SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(25));
           }

             //======================================================
        // envia email para clientes parados a 120 dias
        if(($updated_at->diff($now)->days ) == 622){
            //envia email
            $smailData = [
                'chamado' => 'Deixa eu ajudar você, encontrar seu imóvel',
                'title' => 'Olá! ' . $planos->nome_cliente. ', Já faz tempo que conversamos',
                'body' => 'Espero que tenha achado imóvel que procura.',
                'body2' => 'Caso não tenha encontrato, deixa eu ajudar você, acessa meu site.',
                'body3' => 'Tem um formulario o imóvel que procuro',
                'link' => 'https://www.'.$planos->site.'.crmcorretor.com.br',
                'bott' => 'Imovel que procuro',
                'corretor' => 'Corretor '. $planos->name,
                'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
                'emailCorretor' => $planos->email_cliente,
         ];
         SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(35));
           }

      //======================================================
        // envia email para clientes parados a 180 dias
        if(($updated_at->diff($now)->days ) == 622){
            //envia email
            $smailData = [
                'chamado' => 'Novos imoveis, Acredito que vai gostar.',
                'title' => 'Olá! ' . $planos->nome_cliente,
                'body' => 'Tem novos imóveis no meu site.',
                'body2' => 'Pode ser que goste de algum caso ainda não tenha encontrado.',
                'body3' => 'Acredito que vai gostar.',
                'link' => 'https://www.'.$planos->site.'.crmcorretor.com.br',
                'bott' => 'Ver Imóveis',
                'corretor' => 'Corretor '. $planos->name,
                'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
                'emailCorretor' => $planos->email_cliente,
         ];
         SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(45));
           }

        };

        }


}
