<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Classes\Enc;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Imovel;

use App\Models\User;
use App\Classes\Logger;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
       private $Enc;
       private $Logger;

    public function __construct()
    {
        $this->middleware('auth');
        $this->Enc = new Enc();
        $this->Logger = new Logger();
    }

 //=======================================================================
    public function index()
    {
        $cliente = new Client();

        $cliente = DB::table('clients')
                ->orderByRaw('updated_at  DESC')
                ->get();
        $data["clientes"] = $cliente;

        return view('corretor/funil', $data);
    }

   //=======================================================================
    public function form_cliente(Request $request)
    {
        return view('corretor/add_edit_cliente');
    }
    //=======================================================================
    public function store(Request $request)
    {

        $this->Logger->log('info', 'Cadastrou um cliente');

        $id = Auth::user()->id;
        $user = new User();
        $user = User::find($id);

        Client::create([

            'user_id' => $id,
            'equipe_id' =>  $user->equipe_id,
            'corretor' => $user->name,
            'coduni' => (random_int(9999999, 99999999)),
            'nome_cliente' => strip_tags($request->nome_cliente ?? 'Não Preenchido'),
            'celular_cliente' => strip_tags($request->celular_cliente ?? 'Não Preenchido'),
            'email_cliente' => strip_tags($request->email_cliente ?? ''),

            'renda_cliente' => strip_tags($request->renda_cliente ?? 'Não Preenchido'),
            'cidade_cliente' => strip_tags($request->cidade_cliente ?? 'Não Preenchido'),
            'nascimento_cliente' => strip_tags($request->nascimento_cliente ?? 'Não Preenchido'),
            'bairro_interesse_cliente' => strip_tags($request->bairro_interesse_cliente ?? 'Não Preenchido'),
            'empreendimento_cliente' => strip_tags($request->empreendimento_cliente ?? 'Não Preenchido'),

            'fgts_cliente' => strip_tags($request->fgts_cliente ?? 'Não Preenchido'),
            'nascimento_cliente' => strip_tags($request->nascimento_cliente ?? 'Não Preenchido'),
            'etiqueta' => strip_tags($request->etiqueta ?? 'Não Preenchido'),
            'nivel_cliente' => strip_tags($request->nivel_cliente ?? 'Não Preenchido'),
            'origem_cliente' => strip_tags($request->origem_cliente ?? 'Não Preenchido'),
            'conversa_cliente' =>  strip_tags($request->conversa_cliente),
            'controle_cliente' => strip_tags($request = '1'),

        ]);
        return redirect()->route('funil')->with('success', 'Cliente CADASTRADO com sucesso!');
    }
     //=======================================================================
    public function show(Request $request)
    {
        $id = Auth::user()->id;

        $resultados = new Client();
        $data['clientes'] = $resultados->where([
            ['user_id', '=', $id]
        ])->get();

        //gera contagem doc pendencias analise vendidos
        $data['produtos']  = Client::select('nivel_cliente')->where([
            ['user_id', '=', $id]])->get()->toArray();
        //inicia dados na sessao
        $painel = new User();
        $data["painel"] = $painel = User::find($id);
        session()->put('corretor', $painel->usuario);
        session()->put('user_id', $painel->user_id);
        session()->put('equipe_id', $painel->equipe_id);
        session()->put('celular', $painel->celular);
        // busca por nivel
        // busca por data
        //Parados
        $hoje =date("Y-m-d H:i:s");
        $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
        $data['frio'] = $resultados->where([
            ['user_id', '=', $id],
            ['updated_at', '<', $tempo  ],
            ['nivel_cliente', '!=','VENDIDO'],
            ['nivel_cliente', '!=','DOCUMENTOS'],
            ['nivel_cliente', '!=','ANALISE'],
            ['nivel_cliente', '!=','PENDENCIA'],
        ])->get();
        //Ativos
        $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
        $data['quente'] = $resultados->where([
            ['user_id', '=', $id],
            ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
            ['nivel_cliente', '!=','VENDIDO'],
            ['nivel_cliente', '!=','DOCUMENTOS'],
            ['nivel_cliente', '!=','ANALISE'],
            ['nivel_cliente', '!=','PENDENCIA'],
        ])->get();
        $data['controle'] = $resultados->where([
            ['user_id', '=', $id],
        ])->get();
        return view('corretor/funil', $data );
    }
     //=======================================================================
     public function parado(Request $request)
     {
        $id = Auth::user()->id;
        //inicia dados na sessao
         $painel = new User();
         $data["painel"] = $painel = User::find($id);
         session()->put('corretor', $painel->usuario);
         session()->put('user_id', $painel->user_id);
         session()->put('equipe_id', $painel->equipe_id);
         // busca por nivel
         $resultados = new Client();
        // busca por data
        //parados
        $hoje =date("Y-m-d H:i:s");
        $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
        $data['frio'] = $resultados->where([
            ['user_id', '=', $id],
            ['updated_at', '<', $tempo  ],
            ['nivel_cliente', '!=','VENDIDO'],
            ['nivel_cliente', '!=','DOCUMENTOS'],
            ['nivel_cliente', '!=','ANALISE'],
            ['nivel_cliente', '!=','PENDENCIA'],
        ])->get();
        //ativos
        $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
        $data['quente'] = $resultados->where([
            ['user_id', '=', $id],
            ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
            ['nivel_cliente', '!=','VENDIDO'],
            ['nivel_cliente', '!=','DOCUMENTOS'],
            ['nivel_cliente', '!=','ANALISE'],
            ['nivel_cliente', '!=','PENDENCIA'],
        ])->get();
         //lista parados
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['clientes'] = $resultados->where([
             ['user_id', '=', $id],
             ['updated_at', '<', $tempo  ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],
         ])->get();

         $data['controle'] = $resultados->where([
            ['user_id', '=', $id],
        ])->get();

        $data['produtos']  = Client::select('nivel_cliente')->where([
            ['user_id', '=', $id]])->get()->toArray();
         return view('corretor/funil', $data);
     }
     //=======================================================================
     public function ativo(Request $request)
     {
        $id = Auth::user()->id;
        //inicia dados na sessao
         $painel = new User();
         $data["painel"] = $painel = User::find($id);
         session()->put('corretor', $painel->usuario);
         session()->put('user_id', $painel->user_id);
         session()->put('equipe_id', $painel->equipe_id);
         // busca por nivel
         $resultados = new Client();
         // busca por data
        //parados
        $hoje =date("Y-m-d H:i:s");
        $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
        $data['frio'] = $resultados->where([
            ['user_id', '=', $id],
            ['updated_at', '<', $tempo  ],
            ['nivel_cliente', '!=','VENDIDO'],
            ['nivel_cliente', '!=','DOCUMENTOS'],
            ['nivel_cliente', '!=','ANALISE'],
            ['nivel_cliente', '!=','PENDENCIA'],
        ])->get();
        //ativos
        $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
        $data['quente'] = $resultados->where([
            ['user_id', '=', $id],
            ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
            ['nivel_cliente', '!=','VENDIDO'],
            ['nivel_cliente', '!=','DOCUMENTOS'],
            ['nivel_cliente', '!=','ANALISE'],
            ['nivel_cliente', '!=','PENDENCIA'],
        ])->get();
         //lista ativos
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['clientes'] = $resultados->where([
             ['user_id', '=', $id],
             ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],

         ])->get();

         $data['controle'] = $resultados->where([
            ['user_id', '=', $id],
        ])->get();

        $data['produtos']  = Client::select('nivel_cliente')->where([
            ['user_id', '=', $id]])->get()->toArray();
         return view('corretor/funil', $data);
     }
     //=======================================================================
     public function vendido(Request $request)
     {
        $id = Auth::user()->id;
         //inicia dados na sessao
         $painel = new User();
         $data["painel"] = $painel = User::find($id);
         session()->put('corretor', $painel->usuario);
         session()->put('user_id', $painel->user_id);
         session()->put('equipe_id', $painel->equipe_id);
         // busca por nivel
         $resultados = new Client();
         // busca por data
        //parados
        $hoje =date("Y-m-d H:i:s");
        $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
        $data['frio'] = $resultados->where([
            ['user_id', '=', $id],
            ['updated_at', '<', $tempo  ],
            ['nivel_cliente', '!=','VENDIDO'],
            ['nivel_cliente', '!=','DOCUMENTOS'],
            ['nivel_cliente', '!=','ANALISE'],
            ['nivel_cliente', '!=','PENDENCIA'],
        ])->get();
        //ativos
        $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
        $data['quente'] = $resultados->where([
            ['user_id', '=', $id],
            ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
            ['nivel_cliente', '!=','VENDIDO'],
            ['nivel_cliente', '!=','DOCUMENTOS'],
            ['nivel_cliente', '!=','ANALISE'],
            ['nivel_cliente', '!=','PENDENCIA'],
        ])->get();
         //lista ativos
         $data['clientes'] = $resultados->where([
            ['user_id', '=', $id],
            ['nivel_cliente', '=','VENDIDO'],
        ])->get();

         $data['controle'] = $resultados->where([
            ['user_id', '=', $id],
        ])->get();

        $data['produtos']  = Client::select('nivel_cliente')->where([
            ['user_id', '=', $id]])->get()->toArray();

         return view('corretor/funil', $data);
     }
      //=======================================================================
      public function documentos(Request $request)
      {
        $id = Auth::user()->id;
         //inicia dados na sessao
          $painel = new User();
          $data["painel"] = $painel = User::find($id);
          session()->put('corretor', $painel->usuario);
          session()->put('user_id', $painel->user_id);
          session()->put('equipe_id', $painel->equipe_id);
          // busca por nivel
          $resultados = new Client();
          // busca por data
         //parados
         $hoje =date("Y-m-d H:i:s");
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['frio'] = $resultados->where([
             ['user_id', '=', $id],
             ['updated_at', '<', $tempo  ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],
         ])->get();
         //ativos
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['quente'] = $resultados->where([
             ['user_id', '=', $id],
             ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],
         ])->get();
          //lista ativos
          $data['clientes'] = $resultados->where([
             ['user_id', '=', $id],
             ['nivel_cliente', '=','DOCUMENTOS'],
         ])->get();

          $data['controle'] = $resultados->where([
             ['user_id', '=', $id],
         ])->get();

         $data['produtos']  = Client::select('nivel_cliente')->where([
            ['user_id', '=', $id]])->get()->toArray();
          return view('corretor/funil', $data);
      }
      //=======================================================================
       public function pendencia(Request $request)
       {
        $id = Auth::user()->id;
           //inicia dados na sessao
           $painel = new User();
           $data["painel"] = $painel = User::find($id);
           session()->put('corretor', $painel->usuario);
           session()->put('user_id', $painel->user_id);
           session()->put('equipe_id', $painel->equipe_id);
           // busca por nivel
           $resultados = new Client();
           // busca por data
          //parados
          $hoje =date("Y-m-d H:i:s");
          $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
          $data['frio'] = $resultados->where([
              ['user_id', '=', $id],
              ['updated_at', '<', $tempo  ],
              ['nivel_cliente', '!=','VENDIDO'],
              ['nivel_cliente', '!=','DOCUMENTOS'],
              ['nivel_cliente', '!=','ANALISE'],
              ['nivel_cliente', '!=','PENDENCIA'],
          ])->get();
          //ativos
          $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
          $data['quente'] = $resultados->where([
              ['user_id', '=', $id],
              ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
              ['nivel_cliente', '!=','VENDIDO'],
              ['nivel_cliente', '!=','DOCUMENTOS'],
              ['nivel_cliente', '!=','ANALISE'],
              ['nivel_cliente', '!=','PENDENCIA'],
          ])->get();
           //lista ativos
           $data['clientes'] = $resultados->where([
              ['user_id', '=', $id],
              ['nivel_cliente', '=','PENDENCIA'],
          ])->get();

           $data['controle'] = $resultados->where([
              ['user_id', '=', $id],
          ])->get();

          $data['produtos']  = Client::select('nivel_cliente')->where([
            ['user_id', '=', $id]])->get()->toArray();
           return view('corretor/funil', $data);
       }
        //=======================================================================
        public function analise(Request $request)
        {
            $id = Auth::user()->id;
            //inicia dados na sessao
            $painel = new User();
            $data["painel"] = $painel = User::find($id);
            session()->put('corretor', $painel->usuario);
            session()->put('user_id', $painel->user_id);
            session()->put('equipe_id', $painel->equipe_id);
            // busca por nivel
            $resultados = new Client();
            // busca por data
           //parados
           $hoje =date("Y-m-d H:i:s");
           $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
           $data['frio'] = $resultados->where([
               ['user_id', '=', $id],
               ['updated_at', '<', $tempo  ],
               ['nivel_cliente', '!=','VENDIDO'],
               ['nivel_cliente', '!=','DOCUMENTOS'],
               ['nivel_cliente', '!=','ANALISE'],
               ['nivel_cliente', '!=','PENDENCIA'],
           ])->get();
           //ativos
           $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
           $data['quente'] = $resultados->where([
               ['user_id', '=', $id],
               ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
               ['nivel_cliente', '!=','VENDIDO'],
               ['nivel_cliente', '!=','DOCUMENTOS'],
               ['nivel_cliente', '!=','ANALISE'],
               ['nivel_cliente', '!=','PENDENCIA'],
           ])->get();
            //lista ativos
            $data['clientes'] = $resultados->where([
               ['user_id', '=', $id],
               ['nivel_cliente', '=','ANALISE'],
           ])->get();

            $data['controle'] = $resultados->where([
               ['user_id', '=', $id],
           ])->get();

           $data['produtos']  = Client::select('nivel_cliente')->where([
            ['user_id', '=', $id]])->get()->toArray();

            return view('corretor/funil', $data);
        }
    //=======================================================================
    public function edit($id)
    {
        $id = $this->Enc->desencriptar($id);
        //buscatos clientes por corretor
        $resultados = new Client();
        $resultados = Client::find($id);
        $data["cliente"] = $resultados;

        // Busca equipe do corretor
        $resultados = new User();
        $resultados = User::find($id);
        $data["buscaequipe"] = $resultados;

        return view('corretor/add_edit_cliente', $data);
    }
     //=======================================================================
    public function update($id, Request $request )
    {

        $this->Logger->log('info', 'Atualizou um cliente');

        $id = $this->Enc->desencriptar($id);
        $cliente = Client::find($id);
        $cliente->nome_cliente =  strip_tags($request->get('nome_cliente'));
        $cliente->celular_cliente = strip_tags($request->get('celular_cliente'));
        $cliente->email_cliente =  strip_tags($request->get('email_cliente'));
        $cliente->renda_cliente =  strip_tags($request->get('renda_cliente'));
        $cliente->cidade_cliente =  strip_tags($request->get('cidade_cliente'));
        $cliente->nascimento_cliente = strip_tags($request->get('nascimento_cliente'));
        $cliente->bairro_interesse_cliente =  strip_tags($request->get('bairro_interesse_cliente'));
        $cliente->empreendimento_cliente =  strip_tags($request->get('empreendimento_cliente'));
        $cliente->fgts_cliente =  strip_tags($request->get('fgts_cliente'));
        $cliente->etiqueta =  strip_tags($request->get('etiqueta'));
        $cliente->nivel_cliente =  strip_tags($request->get('nivel_cliente'));
        $cliente->origem_cliente =  strip_tags($request->get('origem_cliente'));
        $cliente->conversa_cliente = strip_tags($request->get('conversa_cliente'));
        $cliente->save();

        $id = $this->Enc->encriptar(Auth::user()->id);
        return redirect()->route('funil',$id)->with('success', 'Cliente ATUALIZADO com sucesso!');
    }
     //=======================================================================
      public function lista($id, Request $request){

        $id = $this->Enc->desencriptar($id);
        $resultados = new Client();
        $data['clientes'] = $resultados->where([
            ['user_id', '=', $id],

        ])->get();

        return view('corretor/ex_excel', $data);

      }
//===============PEPINO
public function pepino(Request $request)
{
    $id = Auth::user()->id;
    $painel = new User();
    $data["painel"] = $painel = User::find($id);
    $resultados = new Client();
    // busca por data
   //parados
   $data['pepino1'] = $resultados->where([
       ['user_id', '=', $id],
       ['controle_cliente', '=','1'],
   ])->get();

   $resultados = new Client();
   // busca por data
  //parados

  $data['pepino2'] = $resultados->where([
      ['user_id', '=', $id],
      ['controle_cliente', '=','2'],
  ])->get();

  $resultados = new Client();
  // busca por data
 //parados

 $data['pepino3'] = $resultados->where([
     ['user_id', '=', $id],
     ['controle_cliente', '=','3'],
 ])->get();

 $resultados = new Client();
 // busca por data
//parados

$data['pepino4'] = $resultados->where([
    ['user_id', '=', $id],
    ['controle_cliente', '=','4'],
])->get();

$resultados = new Client();
 // busca por data
//parados

$data['pepino5'] = $resultados->where([
    ['user_id', '=', $id],
    ['controle_cliente', '=','5'],
])->get();

    return view('corretor/call', $data);

}
//====== pipino muda estatos
public function maisum($id, Request $request){

    $id = $this->Enc->desencriptar($id);

    $controle = new Client();
    $controle = Client::find($id);
    $controlle = $controle->controle_cliente +1;
    $cliente = Client::find($id);
    $cliente->controle_cliente =  $controlle;
    $cliente->save();

    $user_id = $controle->user_id;
    $painel = new User();
    $data["painel"] = $painel = User::find($user_id);

    $resultados = new Client();

   $data['pepino1'] = $resultados->where([
       ['user_id', '=', $user_id],
       ['controle_cliente', '=','1'],
   ])->get();

   $resultados = new Client();
  $data['pepino2'] = $resultados->where([
      ['user_id', '=', $user_id],
      ['controle_cliente', '=','2'],
  ])->get();

  $resultados = new Client();

 $data['pepino3'] = $resultados->where([
     ['user_id', '=', $user_id],
     ['controle_cliente', '=','3'],
 ])->get();

 $resultados = new Client();

$data['pepino4'] = $resultados->where([
    ['user_id', '=', $user_id],
    ['controle_cliente', '=','4'],
])->get();

$resultados = new Client();

$data['pepino5'] = $resultados->where([
    ['user_id', '=', $user_id],
    ['controle_cliente', '=','5'],
])->get();

    return view('corretor/call', $data);
}

//====== pipino muda estatos
public function funilmaisum($id, Request $request){

    $id = $this->Enc->desencriptar($id);

    $controle = new Client();
    $controle = Client::find($id);
    $controlle = $controle->controle_cliente +1;
    $cliente = Client::find($id);
    $cliente->controle_cliente =  $controlle;
    $cliente->save();

    $user_id = $controle->user_id;
    $painel = new User();
    $data["painel"] = $painel = User::find($user_id);

    $resultados = new Client();

   $data['pepino1'] = $resultados->where([
       ['user_id', '=', $user_id],
       ['controle_cliente', '=','1'],
   ])->get();

   $resultados = new Client();

  $data['pepino2'] = $resultados->where([
      ['user_id', '=', $user_id],
      ['controle_cliente', '=','2'],
  ])->get();

  $resultados = new Client();

 $data['pepino3'] = $resultados->where([
     ['user_id', '=', $user_id],
     ['controle_cliente', '=','3'],
 ])->get();

 $resultados = new Client();

$data['pepino4'] = $resultados->where([
    ['user_id', '=', $user_id],
    ['controle_cliente', '=','4'],
])->get();

$resultados = new Client();

$data['pepino5'] = $resultados->where([
    ['user_id', '=', $user_id],
    ['controle_cliente', '=','5'],
])->get();

$id = Auth::user()->id;

        $resultados = new Client();
        $data['clientes'] = $resultados->where([
            ['user_id', '=', $id],
            ['nivel_cliente', '=','LEADS'],
        ])->get();
        //Parados
        $hoje =date("Y-m-d H:i:s");
        $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
        $data['frio'] = $resultados->where([
            ['user_id', '=', $id],
            ['updated_at', '<', $tempo  ],
            ['nivel_cliente', '!=','VENDIDO'],
            ['nivel_cliente', '!=','DOCUMENTOS'],
            ['nivel_cliente', '!=','ANALISE'],
            ['nivel_cliente', '!=','PENDENCIA'],
        ])->get();
        //Ativos
        $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
        $data['quente'] = $resultados->where([
            ['user_id', '=', $id],
            ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
            ['nivel_cliente', '!=','VENDIDO'],
            ['nivel_cliente', '!=','DOCUMENTOS'],
            ['nivel_cliente', '!=','ANALISE'],
            ['nivel_cliente', '!=','PENDENCIA'],
        ])->get();

        $data['controle'] = $resultados->where([
            ['user_id', '=', $id],
        ])->get();

        $data['documentos'] = $resultados->where([
            ['user_id', '=', $id],
            ['nivel_cliente', '=','DOCUMENTOS'],
        ])->get();

        $data['pendencia'] = $resultados->where([
            ['user_id', '=', $id],
            ['nivel_cliente', '=','PENDENCIA'],
        ])->get();

        $data['analise'] = $resultados->where([
            ['user_id', '=', $id],
            ['nivel_cliente', '=','ANALISE'],
        ])->get();

        $data['vendido'] = $resultados->where([
            ['user_id', '=', $id],
            ['nivel_cliente', '=','VENDIDO'],
        ])->get();
    return view('corretor/funil', $data);
}
//====== pipino muda estatos
public function zera($id, Request $request){

    $id = $this->Enc->desencriptar($id);

    $controle = new Client();
    $controle = Client::find($id);
    $controlle = 0;
    $cliente = Client::find($id);
    $cliente->controle_cliente =  $controlle;
    $cliente->save();

    $user_id = $controle->user_id;
    $painel = new User();
    $data["painel"] = $painel = User::find($user_id);

    $resultados = new Client();

   $data['pepino1'] = $resultados->where([
       ['user_id', '=', $user_id],
       ['controle_cliente', '=','1'],
   ])->get();

   $resultados = new Client();
  $data['pepino2'] = $resultados->where([
      ['user_id', '=', $user_id],
      ['controle_cliente', '=','2'],
  ])->get();

  $resultados = new Client();
 $data['pepino3'] = $resultados->where([
     ['user_id', '=', $user_id],
     ['controle_cliente', '=','3'],
 ])->get();

 $resultados = new Client();
$data['pepino4'] = $resultados->where([
    ['user_id', '=', $user_id],
    ['controle_cliente', '=','4'],
])->get();

$resultados = new Client();
$data['pepino5'] = $resultados->where([
    ['user_id', '=', $user_id],
    ['controle_cliente', '=','5'],
])->get();

    return view('corretor/call', $data);

}
//=======================================================================
public function envia_email_cliente(Request $request)
{
}

 //=======================================================================
 public function destroy($id)
 {
     $this->Logger->log('info', 'Deletou um Cliente');

     $id = $this->Enc->desencriptar($id);
     $cliente = Client::findOrFail($id);
     $cliente->delete();

     $id = $this->Enc->encriptar(Auth::user()->id);

     return redirect()->route('funil',$id)->with('success', 'Cliente DELETADO com sucesso!');
 }
 //==================================================
 // busca relacao entre imovel e clientes
 public function par(){

    $id = Auth::user()->id;

     $data ['par'] = DB::table('clients')
    ->join('imovels','clients.empreendimento_cliente', '=', 'imovels.tipo')
    ->select('clients.*', 'imovels.*')
    ->where('clients.user_id', '=', $id)
    ->where('clients.impar', '=', null)
    ->get()->toArray();
   return view('corretor/par', $data);
 }
 //===================================================
 //ver dados do imovel e do cliente junros
 public function ver_par($id, $coduni){

    $id = $this->Enc->desencriptar($id);
    $cod = $this->Enc->desencriptar($coduni);

     $resultados = new Client();
     $data['clientes'] = $resultados->where([
         ['coduni', '=', $id],
              ])->get();

              $resultados = new Imovel();
              $data['imovel'] = $resultados->where([
                  ['cod', '=', $cod],
                       ])->get();

    return view('corretor/verpar', $data);
 }
 //===================================================
 //separa imovel do cliente
 public function impar($id){

    $id = $this->Enc->desencriptar($id);
    Client::where('id',$id)->update(array( 'impar'=> 1, ));
     return redirect()->route('par')->with('success', 'Atualizado com sucesso!');
 }

 //=======================================================
 //funil dois
 public function funil2(Request $request){

    $id = Auth::user()->id;
   $data['filtro'] = Client::distinct()->where([
    ['user_id', '=', $id],
    ])->orderBy('etiqueta')->get(['etiqueta']);

    return view('corretor/funil2', $data);
   }
    //=======================================================
 //funil dois
 public function funil3(Request $request){

    $id = Auth::user()->id;

    $data['filtro'] = Client::distinct()->where([
        ['user_id', '=', $id],
        ])->orderBy('etiqueta')->get(['etiqueta']);

    $filtro = strip_tags($request->get('etiqueta'));
    $resultados = new Client();
    $data['etiqueta'] = $resultados->where([
       ['user_id', '=', $id],
       ['etiqueta', '=',$filtro],
   ])->get();
    return view('corretor/funil2', $data);
 }

}
