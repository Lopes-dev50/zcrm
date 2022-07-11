<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Jobs\SemailMarkt;
class CobrarCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cobrar:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cobrando os usuarios';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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

        DB::table('model_has_permissions')
        ->where('model_id', $planos->id)
        ->update(['permission_id' => '4 - free']);

        DB::table('users')
        ->where('id', $planos->id)
        ->update(['plano' => 'Free'],['nivel' => '4']);
         }

        //======================================================
        // QUARTO EMAIL
        if(($updated_at->diff($now)->days ) == 60){
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

         //======================================================PLANO SEMESTRAL
         if ($planos->acesso == 180){
            //PRIMEIRO EMAIL
            if(($updated_at->diff($now)->days ) == 178){
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
            if(($updated_at->diff($now)->days ) == 180){
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
            if(($updated_at->diff($now)->days ) == 182){
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

            DB::table('model_has_permissions')
            ->where('model_id', $planos->id)
            ->update(['permission_id' => '4 - free']);

            DB::table('users')
            ->where('id', $planos->id)
            ->update(['plano' => 'Free'],['nivel' => '4']);
             }

            //======================================================
            // QUARTO EMAIL
            if(($updated_at->diff($now)->days ) == 220){
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

             //======================================================PLANO MENSAL
        if ($planos->acesso == 365){
            //PRIMEIRO EMAIL
            if(($updated_at->diff($now)->days ) == 363){
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
            if(($updated_at->diff($now)->days ) == 365){
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
            if(($updated_at->diff($now)->days ) == 367){
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

            DB::table('model_has_permissions')
            ->where('model_id', $planos->id)
            ->update(['permission_id' => '4 - free']);

            DB::table('users')
            ->where('id', $planos->id)
            ->update(['plano' => 'Free'],['nivel' => '4']);
             }

            //======================================================
            // QUARTO EMAIL
            if(($updated_at->diff($now)->days ) == 400){
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
