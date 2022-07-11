<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imovel;
use App\Models\Site;
use App\Models\User;
use App\Models\Galeria;
use App\Models\Client;
use App\Models\Visita;
use App\Models\Click;
use App\Models\Event;
use App\Classes\Enc;
use App\Jobs\SemailMarkt;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    private $Enc;


 public function __construct()
 {

     $this->Enc = new Enc();
 }
    public function index()//vai subdamain
    {


        $painel = DB::table('users')->where('subdomain', 'imoveldemo')->get();

        foreach($painel as $painel)



        $resultados = new User();
        $data['corretor'] = $resultados->where([
            ['id', '=', $painel->id],//vai subdomain
            ])->get();

            $resultados = new Site();
        $data['site'] = $resultados->where([
            ['user_id', '=', $painel->id],
            ])->get();


            $resultados = new Imovel();
            $data['imovelalugar'] = $resultados->where([
                 ['user_id', '=', $painel->id],
                 ['locarvender', '=', 'ALUGAR'],
                 ['ativo', '=', 1],
                 ])->paginate(12);

             $resultados = new Imovel();
             $data['destaque'] = $resultados->where([
                  ['user_id', '=', $painel->id],
                  ['ativo', '=', 1],
                  ['destaque', '=', 1],
                  ])->get();

          $data['busca1'] = Imovel::distinct()->where([
               ['user_id', '=', $painel->id],
               ['ativo', '=', 1],

               ])->orderBy('plantapronto')->get(['plantapronto']);

               $data['busca2'] = Imovel::distinct()->where([
                ['user_id', '=', $painel->id],
                ['ativo', '=', 1],

                ])->orderBy('cidade')->get(['cidade']);

        $resultados = new Imovel();
        $data['imovel'] = $resultados->where([
            ['user_id', '=', $painel->id],
            ['locarvender', '=', 'VENDER'],
            ['ativo', '=', 1],

                    ])->paginate(12);

                    Visita::create(['user_id' =>  $painel->id]);

                    return view('/site/pagina', $data);

     ////=========verifica se libera site ou não conforme pagamento
$plano = DB::table('planos')->where('user_id', '=', $painel->id)->get();

foreach($plano as $planos){
$updated_at = new Carbon($planos->updated_at);
$now = Carbon::now();
$d1 =  $updated_at->diffForHumans($now);
//=================================PLANO MENSAL
if ($planos->acesso == 30){

if(($updated_at->diff($now)->days ) > 32){

    return view('/site/suspenso');
}else{
    return view('/site/pagina', $data);
}
}
//=================================PLANO SEMESTRAL
if ($planos->acesso == 30){

    if(($updated_at->diff($now)->days ) > 182){

        return view('/site/suspenso');
    }else{
        return view('/site/pagina', $data);
    }
    }
    //=================================PLANO ANUAL
if ($planos->acesso == 30){

    if(($updated_at->diff($now)->days ) > 367){

        return view('/site/suspenso');
    }else{
        return view('/site/pagina', $data);
    }
    }
}
  }
//
//=====================================================
    public function detalhes($id){

        $id = $this->Enc->desencriptar($id);

        $resultados = new Imovel();
        $data['detalhes'] = $resultados->where([
            ['id', '=', $id],
            ])->get();

            $imovel = new Imovel();
            $data["imovel"] = $imovel = Imovel::find($id);

            $imovel = Imovel::find($id);
            $imovel->visitas =  $imovel->visitas + 1;
            $imovel->save();

        $resultados = new User();
        $data['corretor'] = $resultados->where([
            ['id', '=', $imovel->user_id],
            ])->get();

        $resultados = new Site();
        $data['site'] = $resultados->where([
            ['user_id', '=', $imovel->user_id],
            ])->get();

             $resultados = new Imovel();
             $data['destaque'] = $resultados->where([
                  ['user_id', '=', $imovel->user_id],
                  ['ativo', '=', 1],
                  ['destaque', '=', 1],
                  ])->get();

                  $resultados = new Galeria();
                  $data['galeria'] = $resultados->where([
                       ['imovel_id', '=', $imovel->id],
                       ])->get();

                  $data['busca1'] = Imovel::distinct()->where([
                    ['user_id', '=', $imovel->user_id],
                    ['ativo', '=', 1],
                    ])->orderBy('plantapronto')->get(['plantapronto']);

                    $data['busca2'] = Imovel::distinct()->where([
                     ['user_id', '=', $imovel->user_id],
                     ['ativo', '=', 1],
                     ])->orderBy('cidade')->get(['cidade']);

                    $resultados = new Imovel();
                     $data['osimovel'] = $resultados->where([
                         ['user_id', '=', $imovel->user_id],
                         ['locarvender', '=', 'VENDER'],
                         ['ativo', '=', 1],
                                 ])->paginate(3);

                                 Click::create(['user_id' =>  $imovel->user_id,]);

        return view('/site/detalhes', $data);

    }
//======================================================
    public function busca($id, Request $request){

        $cidade =  strip_tags($request->cidade);
        $plantapronto =  strip_tags($request->plantapronto);

        $id = $this->Enc->desencriptar($id);
        $painel = new User();
        $data["painel"] = $painel = User::find($id);

        $resultados = new User();
        $data['corretor'] = $resultados->where([
            ['id', '=', $painel->id],
            ])->get();

        $resultados = new Site();
        $data['site'] = $resultados->where([
            ['user_id', '=', $painel->id],
            ])->get();

        $resultados = new Imovel();
        $data['alugar'] = $resultados->where([
             ['user_id', '=', $painel->id],
             ['plantapronto', '=', $plantapronto],
             ['ativo', '=', 1],
             ])->paginate(12);

             $data['imovel'] = Imovel::where([['user_id','=', $id],['ativo', '=', 1]] )->where([['plantapronto', '=', $plantapronto ]])->Where('cidade', '=', $cidade )->get();

             $resultados = new Imovel();
             $data['destaque'] = $resultados->where([
                  ['user_id', '=', $painel->id],
                  ['ativo', '=', 1],
                  ['destaque', '=', 1],
                  ])->get();

          $data['busca1'] = Imovel::distinct()->where([
               ['user_id', '=', $painel->id],
               ['ativo', '=', 1],

               ])->orderBy('plantapronto')->get(['plantapronto']);

               $data['busca2'] = Imovel::distinct()->where([
                ['user_id', '=', $painel->id],
                ['ativo', '=', 1],

                ])->orderBy('cidade')->get(['cidade']);

        return view('/site/busca', $data);

    }
//==================================================
public function simula(Request $request){

      $id = strip_tags($request->user_id );
      $cliente = strip_tags($request->nome_cliente ?? 'Não Preenchido');
      $cod =strip_tags($request->cod);

    Client::create([

        'user_id' => strip_tags($request->user_id ),
        'equipe_id' =>  strip_tags($request->equipe_id ),
        'corretor' => strip_tags($request->corretor ),
        'nome_cliente' => strip_tags($request->nome_cliente ?? 'Não Preenchido'),
        'celular_cliente' => strip_tags($request->celular_cliente ?? 'Não Preenchido'),
        'email_cliente' => strip_tags($request->email_cliente ?? ''),
        'cidade_cliente' => strip_tags($request->cidade_cliente ?? ''),
        'bairro_interesse_cliente' => strip_tags($request->bairro_interesse_cliente ?? ''),
        'renda_cliente' => strip_tags($request->renda_cliente ?? 'Não Preenchido'),
        'fgts_cliente' => strip_tags($request->fgts_cliente ?? 'Não Preenchido'),
        'nascimento_cliente' => strip_tags($request->nascimento_cliente ?? 'Não Preenchido'),
        'empreendimento_cliente' => strip_tags($request->empreendimento_cliente ?? 'Não Preenchido'),
        'nivel_cliente' => 'LEADS',
        'origem_cliente' => strip_tags($request->origem_cliente ?? 'Não Preenchido'),
        'conversa_cliente' =>  strip_tags($request->conversa_cliente)
         . ' - Trabalha CTPS? '. strip_tags($request->ctps)
         . ' - Estado civil? '. strip_tags($request->escivil)
         . ' - Possui dependente? '. strip_tags($request->dependente)
         . ' - Possui imovel? '. strip_tags($request->imovel)
         . ' - Vai juntar renda? '. strip_tags($request->juntar)
         . ' - Possui entrada? '. strip_tags($request->entrada)
         . ' - Possui restrição? '.strip_tags($request->spc)
         . ' - Possui emprestimo? '.strip_tags($request->financiamento)
         . ' - Cod: ' .strip_tags($request->cod),
        'controle_cliente' => strip_tags($request = '1'),

    ]);
     ///envia email aviso
     $painel = new User();
     $data["painel"] = $painel = User::find($id);

    $smailData = [
        'chamado' => 'Novo Lead.',
        'title' => 'Olá corretor! ' . $painel->name,
        'body' => 'Acaba de chegar novo lead ao CrmCorretor seu nome é ' . $cliente,
        'body2' => 'Solicitando uma simulação para o imóvel cod: ' . $cod,
        'body3' => 'Boas Vendas! ',
        'link' => 'https://www.crmcorretor.com.br',
        'bott' => 'CRM CORRETOR',
        'corretor' => 'CrmCorretor ' ,
        'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
        'emailCorretor' => $painel->email
    ];

      SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));

    $id = $this->Enc->encriptar($id);
    return redirect()->route('sucesso',$id)->with('success', 'Cliente ATUALIZADO com sucesso!');
}
//===================================================
       public function sucesso($id)
{
    $id = $this->Enc->desencriptar($id);
    $painel = new User();
    $data["painel"] = $painel = User::find($id);

    $resultados = new User();
    $data['corretor'] = $resultados->where([
        ['id', '=', $painel->id],
        ])->get();

    $resultados = new Site();
    $data['site'] = $resultados->where([
        ['user_id', '=', $painel->id],
        ])->get();

        $resultados = new Imovel();
        $data['imovelalugar'] = $resultados->where([
             ['user_id', '=', $painel->id],
             ['locarvender', '=', 'ALUGAR'],
             ['ativo', '=', 1],
             ])->paginate(12);

         $resultados = new Imovel();
         $data['destaque'] = $resultados->where([
              ['user_id', '=', $painel->id],
              ['ativo', '=', 1],
              ['destaque', '=', 1],
              ])->get();

      $data['busca1'] = Imovel::distinct()->where([
           ['user_id', '=', $painel->id],
           ['ativo', '=', 1],
           ])->orderBy('plantapronto')->get(['plantapronto']);

           $data['busca2'] = Imovel::distinct()->where([
            ['user_id', '=', $painel->id],
            ['ativo', '=', 1],
            ])->orderBy('cidade')->get(['cidade']);

    $resultados = new Imovel();
    $data['imovel'] = $resultados->where([
        ['user_id', '=', $painel->id],
        ['locarvender', '=', 'VENDER'],
        ['ativo', '=', 1],
                ])->paginate(12);

                return view('/site/sucesso', $data);
}
//================================================================
public function visita(Request $request){
    $id = strip_tags($request->user_id );
    $equipe_id =  strip_tags($request->equipe_id );
    $corretor = strip_tags($request->corretor );
    $inicio = strip_tags($request->dia);
    $hora =strip_tags($request->hora);
    $cliente = strip_tags($request->nome_cliente ?? 'Não Preenchido');
    $cod =strip_tags($request->cod);

  Client::create([

      'user_id' => strip_tags($request->user_id ),
      'equipe_id' =>  strip_tags($request->equipe_id ),
      'corretor' => strip_tags($request->corretor ),
      'nome_cliente' => strip_tags($request->nome_cliente ?? 'Não Preenchido'),
      'celular_cliente' => strip_tags($request->celular_cliente ?? 'Não Preenchido'),
      'email_cliente' => strip_tags($request->email_cliente ?? ''),
      'cidade_cliente' => strip_tags($request->cidade_cliente ?? ''),
      'bairro_interesse_cliente' => strip_tags($request->bairro_interesse_cliente ?? ''),
      'empreendimento_cliente' => strip_tags($request->empreendimento_cliente ?? 'Não Preenchido'),
      'nivel_cliente' => 'LEADS',
      'conversa_cliente' =>  strip_tags($request->conversa_cliente)
       . ' - Quero vistar no dia '. strip_tags($request->dia)
       . ' - Horário '. strip_tags($request->hora)
       . ' - o imovel Cod: ' .strip_tags($request->cod),
      'controle_cliente' => strip_tags($request = '1'),

  ]);

  $event = Event::create([
    'title' => 'Novo Leads ' . $cliente ,
    'descrition' => 'Quero visitar o imovel cod ' .$cod,
    'color' => '#F88D00',
    'hora' => $hora,
    'start' => date('Y/m/d H:i', strtotime($inicio .''. $hora)),
    'end' => date('Y/m/d H:i', strtotime($inicio .''. $hora)),
    'user_id' => $id,
    'equipe_id' => $equipe_id,
    'corretor' => $corretor,
    'email_corretor' => 'nc',
]);
    ///envia email aviso
    $painel = new User();
    $data["painel"] = $painel = User::find($id);

    $smailData = [
        'chamado' => 'Novo Lead.',
        'title' => 'Olá corretor! ' . $painel->name,
        'body' => 'Acaba de chegar novo lead ao CrmCorretor seu nome é ' . $cliente,
        'body2' => 'Solicitando uma simulação para o imóvel cod: ' . $cod,
        'body3' => 'Para o dia: ' . $inicio . '  horário: ' . $hora,
        'link' => 'https://www.crmcorretor.com.br',
        'bott' => 'CRM CORRETOR',
        'corretor' => 'CrmCorretor ' ,
        'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
        'emailCorretor' => $painel->email
    ];

   SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(16));

        $id = $this->Enc->encriptar($id);
  return redirect()->route('sucesso',$id)->with('success', 'Cliente ATUALIZADO com sucesso!');

}
//===================================================
public function quero($id){

    $id = $this->Enc->desencriptar($id);

    $resultados = new User();
    $data['corretor'] = $resultados->where([
        ['id', '=', $id],
        ])->get();

    $resultados = new Site();
    $data['site'] = $resultados->where([
        ['user_id', '=', $id],
        ])->get();

         $resultados = new Imovel();
         $data['destaque'] = $resultados->where([
              ['user_id', '=', $id],
              ['ativo', '=', 1],
              ['destaque', '=', 1],
              ])->get();

              $data['busca1'] = Imovel::distinct()->where([
                ['user_id', '=', $id],
                ['ativo', '=', 1],

                ])->orderBy('plantapronto')->get(['plantapronto']);
                $data['busca2'] = Imovel::distinct()->where([
                 ['user_id', '=', $id],
                 ['ativo', '=', 1],

                 ])->orderBy('cidade')->get(['cidade']);

                 $resultados = new Imovel();
                 $data['osimovel'] = $resultados->where([
                     ['user_id', '=', $id],
                     ['locarvender', '=', 'VENDER'],
                     ['ativo', '=', 1],

                             ])->paginate(3);

    return view('/site/quero', $data);
                 }
    //=============================================
    public function add_quero(Request $request){

        $id = strip_tags($request->user_id );
        $cliente = strip_tags($request->nome_cliente ?? 'Não Preenchido');
        $cod =strip_tags($request->cod);

      Client::create([

          'user_id' => strip_tags($request->user_id ),
          'equipe_id' =>  strip_tags($request->equipe_id ),
          'corretor' => strip_tags($request->corretor ),
          'nome_cliente' => strip_tags($request->nome_cliente ?? 'Não Preenchido'),
          'celular_cliente' => strip_tags($request->celular_cliente ?? 'Não Preenchido'),
          'email_cliente' => strip_tags($request->email_cliente ?? ''),
          'cidade_cliente' => strip_tags($request->cidade_cliente ?? ''),
          'bairro_interesse_cliente' => 'Não Preenchido',
          'renda_cliente' => strip_tags($request->renda_cliente ?? 'Não Preenchido'),
          'fgts_cliente' => 'Não Preenchido',
          'nascimento_cliente' => strip_tags($request->nascimento_cliente ?? 'Não Preenchido'),
          'empreendimento_cliente' => strip_tags($request->empreendimento_cliente ?? 'Não Preenchido'),
          'valor' => strip_tags($request->valor ?? 'Não Preenchido'),
          'nivel_cliente' => 'LEADS',
          'origem_cliente' => strip_tags($request->origem_cliente ?? 'Não Preenchido'),
          'conversa_cliente' =>  strip_tags($request->conversa_cliente)
           . ' - Imóvel até  '. strip_tags($request->valor)
           . ' - Possui entrada? '. strip_tags($request->entrada)
           . ' - Possui restrição? '.strip_tags($request->spc)
           . ' - Possui emprestimo? '.strip_tags($request->financiamento),
          'controle_cliente' => strip_tags($request = '1'),

      ]);

       ///envia email aviso
       $painel = new User();
       $data["painel"] = $painel = User::find($id);

      $smailData = [
          'chamado' => 'Novo Lead.',
          'title' => 'Olá corretor! ' . $painel->name,
          'body' => 'Acaba de chegar novo lead ao CrmCorretor seu nome é ' . $cliente,
          'body2' => 'Quer ajuda para encontar um imóvel.',
          'body3' => 'Boas Vendas! ',
          'link' => 'https://www.crmcorretor.com.br/login',
          'bott' => 'CRM CORRETOR',
          'corretor' => 'CrmCorretor ' ,
          'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
          'emailCorretor' => $painel->email
      ];

     SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));

      $id = $this->Enc->encriptar($id);
      return redirect()->route('sucesso',$id)->with('success', 'Cliente ATUALIZADO com sucesso!');
  }


}
