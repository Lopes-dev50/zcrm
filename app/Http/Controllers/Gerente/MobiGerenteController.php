<?php

namespace App\Http\Controllers\Gerente;

use App\Classes\Enc;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Imovel;
use App\Models\Event;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MobiGerenteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->Enc = new Enc();
    }

   public function index(){

    $id = Auth::user()->id;
    $equipe = new User();
    $data["equipe"] = $equipe = User::find($id);

    $resultados = new User();
    $data['corretor'] = $resultados->where([
        ['equipe_id', '=', $equipe->equipe_id],
        ['plano', '!=', $equipe->plano],

    ])->get();

    $resultados = new Client();
    $data['leads'] = $resultados->where([
        ['equipe_id', '=', $equipe->equipe_id],
        ['nivel_cliente', '=','LEADS'],
    ])->get();
    //total de clientes
    $data['total'] = $resultados->where([
        ['equipe_id', '=', $equipe->equipe_id],

    ])->get();
//frio
$data['frio'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['nivel_cliente', '=','FRIO'],
])->get();

  //morno
  $data['morno'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['nivel_cliente', '=','MORNO'],
])->get();

  //quente
  $data['quente'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['nivel_cliente', '=','QUENTE'],
])->get();
 //quente
 $data['vendido'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['nivel_cliente', '=','VENDIDO'],
])->get();
// onde?
$data['Indicado'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['origem_cliente', '=','Indicado'],
])->get();

$data['Roleta'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['origem_cliente', '=','Roleta'],
])->get();

$data['Anuncio'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['origem_cliente', '=','Anuncio'],
])->get();

$data['Call'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['origem_cliente', '=','Call'],
])->get();

$data['Site'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['origem_cliente', '=','Site'],
])->get();

$data['Facebook'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['origem_cliente', '=','Facebook'],
])->get();

$data['Instagram'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['origem_cliente', '=','Instagram'],
])->get();

$data['PDV'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['origem_cliente', '=','PDV'],
])->get();

$data['call1'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['controle_cliente', '=',1],
])->get();

$data['call2'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['controle_cliente', '=','2'],
])->get();
$data['call3'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['controle_cliente', '=','3'],
])->get();
$data['call4'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['controle_cliente', '=','4'],
])->get();
$data['call5'] = $resultados->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['controle_cliente', '=','5'],
])->get();

//situacao imoveis
$imovel = new Imovel();

$data['imovel'] = $imovel->where([
    ['equipe_id', '=', $equipe->equipe_id],])->get();

$data['PRONTO'] = $imovel->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['plantapronto', '=','PRONTO'],
])->get();

$data['NAPLANTA'] = $imovel->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['plantapronto', '=','PLANTA'],
])->get();

$data['CONSTRUIDO'] = $imovel->where([
    ['equipe_id', '=', $equipe->equipe_id],
    ['plantapronto', '=','CONSTRUÇÃO'],
])->get();

$users = Client::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
->where(  'equipe_id', '=', $equipe->equipe_id)->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count', 'month_name');

    $labels = $users->keys();
    $adata = $users->values();
   // dd($data);
    return view('mobi/painelgerente', compact('labels', 'adata'), $data);

   }
//===================================================busca grafico por corretor de equipe
public function buscaGraficoCorretor($id, Request $request){

    $id = $this->Enc->desencriptar($id);

    $ide = Auth::user()->id;
    $equipe = new User();
    $data["equipe"] = $equipe = User::find($ide);

    $resultados = new User();
    $data['corretor'] = $resultados->where([
        ['equipe_id', '=', $equipe->equipe_id],
        ['plano', '!=', $equipe->plano],

    ])->get();

    $resultados = new Client();
    $data['leads'] = $resultados->where([
        ['id', '=', $id],
        ['nivel_cliente', '=','LEADS'],
    ])->get();
    //total de clientes
    $data['total'] = $resultados->where([
        ['id', '=', $id],

    ])->get();
//frio
$data['frio'] = $resultados->where([
    ['id', '=', $id],
    ['nivel_cliente', '=','FRIO'],
])->get();

  //morno
  $data['morno'] = $resultados->where([
    ['id', '=', $id],
    ['nivel_cliente', '=','MORNO'],
])->get();

  //quente
  $data['quente'] = $resultados->where([
    ['id', '=', $id],
    ['nivel_cliente', '=','QUENTE'],
])->get();
 //quente
 $data['vendido'] = $resultados->where([
    ['id', '=', $id],
    ['nivel_cliente', '=','VENDIDO'],
])->get();
// onde?
$data['Indicado'] = $resultados->where([
    ['id', '=', $id],
    ['origem_cliente', '=','Indicado'],
])->get();

$data['Roleta'] = $resultados->where([
    ['id', '=', $id],
    ['origem_cliente', '=','Roleta'],
])->get();

$data['Anuncio'] = $resultados->where([
    ['id', '=', $id],
    ['origem_cliente', '=','Anuncio'],
])->get();

$data['Call'] = $resultados->where([
    ['id', '=', $id],
    ['origem_cliente', '=','Call'],
])->get();

$data['Site'] = $resultados->where([
    ['id', '=', $id],
    ['origem_cliente', '=','Site'],
])->get();

$data['Facebook'] = $resultados->where([
    ['id', '=', $id],
    ['origem_cliente', '=','Facebook'],
])->get();

$data['Instagram'] = $resultados->where([
    ['id', '=', $id],
    ['origem_cliente', '=','Instagram'],
])->get();

$data['PDV'] = $resultados->where([
    ['id', '=', $id],
    ['origem_cliente', '=','PDV'],
])->get();

$data['call1'] = $resultados->where([
    ['id', '=', $id],
    ['controle_cliente', '=',1],
])->get();

$data['call2'] = $resultados->where([
    ['id', '=', $id],
    ['controle_cliente', '=','2'],
])->get();
$data['call3'] = $resultados->where([
    ['id', '=', $id],
    ['controle_cliente', '=','3'],
])->get();
$data['call4'] = $resultados->where([
    ['id', '=', $id],
    ['controle_cliente', '=','4'],
])->get();
$data['call5'] = $resultados->where([
    ['id', '=', $id],
    ['controle_cliente', '=','5'],
])->get();

//situacao imoveis
$imovel = new Imovel();

$data['imovel'] = $imovel->where([
    [ 'id', '=', $id],])->get();

$data['PRONTO'] = $imovel->where([
    [ 'id', '=', $id],
    ['plantapronto', '=','PRONTO'],
])->get();

$data['NAPLANTA'] = $imovel->where([
    [ 'id', '=', $id],
    ['plantapronto', '=','NA PLANTA'],
])->get();

$data['CONSTRUIDO'] = $imovel->where([
    [ 'id', '=', $id],
    ['plantapronto', '=','EM CONSTRUÇÃO'],
])->get();

$users = Client::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
->where('id', '=', $id)->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count', 'month_name');

    $labels = $users->keys();
    $adata = $users->values();
   // dd($data);
    return view('mobi/mobi_painelgerente', compact('labels', 'adata'), $data);

   }
//=====================================================
   public function mobi_busca_corretor(){

    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);

    $resultados = new User();
    $data['corretore'] = $resultados->where([
        ['equipe_id', '=', $gerente->equipe_id],
        ['id', '!=',$gerente->id],
    ])->get();

    return view('mobi/mobi_buscar_corretor',$data);
   }

//======================================================
public function mobi_add_corretor(Request $request){

    $email=  strip_tags($request->get('email'));
    $CPF=    strip_tags($request->get('CPF'));

    $resultados = new User();
    $data['corretor'] = $resultados->where([
        ['emailusuario', '=', $email],
        ['CPF', '=',$CPF],
    ])->get();

    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);

    $resultados = new User();
    $data['corretore'] = $resultados->where([
        ['equipe_id', '=', $gerente->equipe_id],
        ['id', '!=',$gerente->id],
    ])->get();

    return view('mobi/mobi_buscar_corretor', $data);
   }

   //======================================================
public function mobi_add_um_corretor($id, Request $request){

    $id = $this->Enc->desencriptar($id);
    //buscatos clientes por corretor
    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);

    DB::table('Users')
    ->where('id', $id)
    ->update(['equipe_id' => $gerente->equipe_id]);

    DB::table('Users')
    ->where('id', $id)
    ->update(['plano' => 'EQUIPE']);

    $contagem = date('Y-m-d H:i:s');
    DB::table('Users')
    ->where('id', $id)
    ->update(['contagem' => $contagem]);

    DB::table('model_has_permissions')
    ->where('model_id', $id)
    ->update(['permission_id' => '3 - corretor']);

    $resultados = new User();
    $data['corretore'] = $resultados->where([
        ['equipe_id', '=', $gerente->equipe_id],
        ['id', '!=',$gerente->id],
    ])->get();

    return view('mobi/mobi_buscar_corretor', $data);
   }
//============================================================
public function mobi_remove_corretor($id, Request $request){

    $id = $this->Enc->desencriptar($id);

    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);
    $cliente = DB::table('clientes')
    ->where('equipe_id', '=', $gerente->equipe_id)
    ->where('id', '=', $id)
    ->get();

    $n = $cliente->count();
    $i= 0;

    //distruição dos cliente
do{

    $i++;

   //busca corretores da equipe
    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);
    $result = DB::table('Users')
                ->where('equipe_id', '=', $gerente->equipe_id)
                ->where('id', '!=', $id)
                ->where('id', '!=', $idg)
                ->inRandomOrder()->get();

 foreach ($result as $result):

 endforeach;

 $proximo = DB::table('Users')
                ->where('equipe_id', '=', $gerente->equipe_id)
                ->where('id', '=', $result->id)
                ->get();

                foreach ($proximo as $proximo):

                endforeach;

 $cliente = DB::table('clientes')
 ->where('equipe_id', '=', $gerente->equipe_id)
 ->where('id', '=', $id)
 ->get();
 foreach ($cliente as $cliente):

 endforeach;

     //distruibir clientes
     DB::table('clientes')
     ->where('id', $cliente->id)
     ->update(['corretor' => $proximo->usuario]);

     DB::table('clientes')
     ->where('id', $cliente->id)
     ->update(['id' => $proximo->id]);

}
while($i<$n);
    //========================
         DB::table('model_has_permissions')
               ->where('model_id', $id)
               ->update(['permission_id' => '4 - free']);

               DB::table('Users')
               ->where('id', $id)
               ->update(['plano' => 'FREE']);

               DB::table('Users')
               ->where('id', $id)
               ->update(['equipe_id' => '9999999']);

               $idg = Auth::user()->id;
               $gerente= new User();
               $gerente = User::find($idg);

               $resultados = new User();
               $data['corretore'] = $resultados->where([
               ['equipe_id', '=', $gerente->equipe_id],
               ['id', '!=',$gerente->id],
               ])->get();

    return view('mobi/mobi_buscar_corretor', $data)->with('success', 'Atualizado com sucesso!');
  }

//============================================================
   public function mobi_lista_agenda(Request $request){

    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);

    $resultados = new Event();
    $data['event'] = $resultados->where([
        ['equipe_id', '=', $gerente->equipe_id],
        ['prive', '=', 1],
    ])->get();
    return view('mobi/mobi_agendaequipe', $data);

   }
     //=======================================================================
     public function mobi_funil_equipe(Request $request)
     {
        $idg = Auth::user()->id;
        $gerente= new User();
        $gerente = User::find($idg);

         $resultados = new Client();
         $data['clientes'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();
         // busca por data
         //Parados
         $hoje =date("Y-m-d H:i:s");
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['frio'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
             ['updated_at', '<', $tempo  ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],
         ])->get();

         //Ativos
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['quente'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
             ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],

         ])->get();
         $data['controle'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();

         $data['produtos'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();
         return view('mobi/mobi_funilequipe', $data);
     }
     //=======================================================================
      public function mobi_parado($id, Request $request)
      {
        $idg = Auth::user()->id;
        $gerente= new User();
        $gerente = User::find($idg);

         // busca por temperatura
          $resultados = new Client();
         // busca por data
         //parados
         $hoje =date("Y-m-d H:i:s");
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['frio'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
             ['updated_at', '<', $tempo  ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],
         ])->get();

         //ativos
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['quente'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
             ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],
         ])->get();

          //lista parados
          $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
          $data['clientes'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
              ['updated_at', '<', $tempo  ],
              ['nivel_cliente', '!=','VENDIDO'],
              ['nivel_cliente', '!=','DOCUMENTOS'],
              ['nivel_cliente', '!=','ANALISE'],
              ['nivel_cliente', '!=','PENDENCIA'],
          ])->get();

          $data['controle'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();

         $data['produtos'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();

         return view('mobi/mobi_funilequipe', $data);
      }
      //=======================================================================
      public function mobi_ativo($id, Request $request)
      {
        $idg = Auth::user()->id;
        $gerente= new User();
        $gerente = User::find($idg);

          $resultados = new Client();
          // busca por data
         //parados
         $hoje =date("Y-m-d H:i:s");
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['frio'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
             ['updated_at', '<', $tempo  ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],
         ])->get();

         //ativos
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['quente'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
             ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],
         ])->get();

          //lista ativos
          $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
          $data['clientes'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
              ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
              ['nivel_cliente', '!=','VENDIDO'],
              ['nivel_cliente', '!=','DOCUMENTOS'],
              ['nivel_cliente', '!=','ANALISE'],
              ['nivel_cliente', '!=','PENDENCIA'],

          ])->get();

          $data['controle'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();

         $data['produtos'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();

         return view('mobi/mobi_funilequipe', $data);
      }
      //=======================================================================
      public function mobi_vendido($id, Request $request)
      {
        $idg = Auth::user()->id;
        $gerente= new User();
        $gerente = User::find($idg);
          // busca por temperatura
          $resultados = new Client();
          // busca por data
         //parados
         $hoje =date("Y-m-d H:i:s");
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['frio'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
             ['updated_at', '<', $tempo  ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],
         ])->get();

         //ativos
         $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
         $data['quente'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
             ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
             ['nivel_cliente', '!=','VENDIDO'],
             ['nivel_cliente', '!=','DOCUMENTOS'],
             ['nivel_cliente', '!=','ANALISE'],
             ['nivel_cliente', '!=','PENDENCIA'],

         ])->get();

          //lista ativos
          $data['clientes'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
             ['nivel_cliente', '=','VENDIDO'],
         ])->get();

          $data['controle'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();

           $data['produtos'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();

         return view('mobi/mobi_funilequipe', $data);
      }

       //=======================================================================
       public function mobi_documentos($id, Request $request)
       {
        $idg = Auth::user()->id;
        $gerente= new User();
        $gerente = User::find($idg);
           // busca por temperatura
           $resultados = new Client();
           // busca por data
          //parados
          $hoje =date("Y-m-d H:i:s");
          $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
          $data['frio'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
              ['updated_at', '<', $tempo  ],
              ['nivel_cliente', '!=','VENDIDO'],
              ['nivel_cliente', '!=','DOCUMENTOS'],
              ['nivel_cliente', '!=','ANALISE'],
              ['nivel_cliente', '!=','PENDENCIA'],
          ])->get();

          //ativos
          $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
          $data['quente'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
              ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
              ['nivel_cliente', '!=','VENDIDO'],
              ['nivel_cliente', '!=','DOCUMENTOS'],
              ['nivel_cliente', '!=','ANALISE'],
              ['nivel_cliente', '!=','PENDENCIA'],

          ])->get();

           //lista ativos
           $data['clientes'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
              ['nivel_cliente', '=','DOCUMENTOS'],
          ])->get();

           $data['controle'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
          ])->get();

          $data['produtos'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();

          return view('mobi/mobi_funilequipe', $data);
       }
        //=======================================================================
        public function mobi_pendencia($id, Request $request)
        {
            $idg = Auth::user()->id;
            $gerente= new User();
            $gerente = User::find($idg);
            // busca por temperatura
            $resultados = new Client();
            // busca por data
           //parados
           $hoje =date("Y-m-d H:i:s");
           $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
           $data['frio'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
               ['updated_at', '<', $tempo  ],
               ['nivel_cliente', '!=','VENDIDO'],
               ['nivel_cliente', '!=','DOCUMENTOS'],
               ['nivel_cliente', '!=','ANALISE'],
               ['nivel_cliente', '!=','PENDENCIA'],
           ])->get();

           //ativos
           $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
           $data['quente'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
               ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
               ['nivel_cliente', '!=','VENDIDO'],
               ['nivel_cliente', '!=','DOCUMENTOS'],
               ['nivel_cliente', '!=','ANALISE'],
               ['nivel_cliente', '!=','PENDENCIA'],

           ])->get();

            //lista ativos
            $data['clientes'] = $resultados->where([
                ['equipe_id', '=', $gerente->equipe_id],
               ['nivel_cliente', '=','PENDENCIA'],
           ])->get();

            $data['controle'] = $resultados->where([
                ['equipe_id', '=', $gerente->equipe_id],
           ])->get();

             $data['produtos'] = $resultados->where([
            ['equipe_id', '=', $gerente->equipe_id],
         ])->get();

           return view('mobi/mobi_funilequipe', $data);
        }
         //=======================================================================
         public function mobi_analise($id, Request $request)
         {
            $idg = Auth::user()->id;
            $gerente= new User();
            $gerente = User::find($idg);
             // busca por temperatura
             $resultados = new Client();
             // busca por data
            //parados
            $hoje =date("Y-m-d H:i:s");
            $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
            $data['frio'] = $resultados->where([
                ['equipe_id', '=', $gerente->equipe_id],
                ['updated_at', '<', $tempo  ],
                ['nivel_cliente', '!=','VENDIDO'],
                ['nivel_cliente', '!=','DOCUMENTOS'],
                ['nivel_cliente', '!=','ANALISE'],
                ['nivel_cliente', '!=','PENDENCIA'],
            ])->get();

            //ativos
            $tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
            $data['quente'] = $resultados->where([
                ['equipe_id', '=', $gerente->equipe_id],
                ['updated_at', '>=', $tempo, 'AND','updated_at', '<', $hoje ],
                ['nivel_cliente', '!=','VENDIDO'],
                ['nivel_cliente', '!=','DOCUMENTOS'],
                ['nivel_cliente', '!=','ANALISE'],
                ['nivel_cliente', '!=','PENDENCIA'],

            ])->get();

             //lista ativos
             $data['clientes'] = $resultados->where([
                ['equipe_id', '=', $gerente->equipe_id],
                ['nivel_cliente', '=','ANALISE'],
            ])->get();

             $data['controle'] = $resultados->where([
                ['equipe_id', '=', $gerente->equipe_id],
            ])->get();

            $data['produtos'] = $resultados->where([
                ['equipe_id', '=', $gerente->equipe_id],
             ])->get();

            return view('mobi/mobi_funilequipe', $data);
         }
//=====================================================
public function mobi_add_leads_gerente(Request $request){

    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);

     // busca por temperatura
     $resultados = new Client();
     $data['lead'] = $resultados->where([
        ['equipe_id', '=', $gerente->equipe_id],
        ['nivel_cliente', '=', 'LEADS'  ],

    ])->get();

    $resultados = new User();
    $data['corretor'] = $resultados->where([
       ['equipe_id', '=', $gerente->equipe_id],
       ['id', '!=', $idg],


   ])->get();


    return view('mobi/mobi_gerenteaddleads', $data);

}
//===================================================
public function mobi_gerente_add_leads(Request $request){

    $gerente= new User();
    $gerente = User::find($request->id);

    Client::create([

        'id' => $gerente->id,
        'equipe_id' => $gerente->equipe_id,
        'corretor' => $gerente->usuario,
        'nome_cliente' => strip_tags($request->nome_cliente ?? 'Não Preenchido'),
        'celular_cliente' => strip_tags($request->celular_cliente ?? 'Não Preenchido'),
        'email_cliente' => strip_tags($request->email_cliente ?? ''),
        'conversa_cliente' =>  strip_tags($request->conversa_cliente),
        'controle_cliente' => strip_tags($request = '0'),
        'nivel_cliente' => 'LEADS',

    ]);

    $idg = Auth::user()->id ;
    $gerente= new User();
    $gerente = User::find($idg);
     // busca por temperatura
     $resultados = new Client();
     $data['lead'] = $resultados->where([
        ['equipe_id', '=', $gerente->equipe_id],
        ['nivel_cliente', '=', 'LEADS'  ],

    ])->get();

    $resultados = new User();
    $data['corretor'] = $resultados->where([
       ['equipe_id', '=', $gerente->equipe_id],


   ])->get();

    return view('mobi/mobi_gerenteaddleads', $data);

}
//============================== lista imoveis equipe
public function mobi_ListaImovelEquipe($id, Request $request ){

    $id = $this->Enc->desencriptar($id);

    $equipe = new User();
    $data["equipe"] = $equipe = User::find($id);

    $resultados = new Imovel();
    $data['imovel'] = $resultados->where([
        ['equipe_id', '=', $equipe->equipe_id],

    ])->paginate(12);
       return view('mobi/mobi_ListaImovelEquipe', $data);

        }

}
