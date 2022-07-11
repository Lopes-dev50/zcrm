<?php

namespace App\Http\Controllers\Gerente;

use App\Classes\Enc;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Imovel;
use App\Models\Event;
use App\Models\Client;
use App\Models\Plano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SemailMarkt;
use App\Models\Visita;
use App\Models\Click;

class GerenteController extends Controller
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
    return view('gerente/painelgerente', compact('labels', 'adata'), $data);
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
    return view('gerente/painelgerente', compact('labels', 'adata'), $data);
   }
//=====================================================
   public function busca_corretor(){

    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);

    $resultados = new User();
    $data['corretore'] = $resultados->where([
        ['equipe_id', '=', $gerente->equipe_id],
        ['id', '!=',$gerente->id],
    ])->get();

    return view('gerente/buscar_corretor',$data);
   }

//======================================================
public function add_corretor(Request $request){

    $email=  strip_tags($request->get('email'));
    $CPF=    strip_tags($request->get('CPF'));

    $resultados = new User();
    $data['corretor'] = $resultados->where([
        ['email', '=', $email],
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

    return view('gerente/buscar_corretor', $data);
   }
   //======================================================
public function add_um_corretor($id, Request $request){

    $id = $this->Enc->desencriptar($id);

    //buscatos clientes por corretor
    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);

    $painel = DB::table('planos')->where('user_id', $idg)->get();

        foreach($painel as $painel)
         //adicionar ao plano
    Plano::where('user_id',$id)->update(array( 'acesso' => $painel->acesso ));

    DB::table('users')
    ->where('id', $id)
    ->update(['equipe_id' => $gerente->equipe_id]);

    DB::table('users')
    ->where('id', $id)
    ->update(['plano' => 'EQUIPE']);


    DB::table('model_has_permissions')
    ->where('model_id', $id)
    ->update(['permission_id' => '3 - corretor']);


    $resultados = new User();
    $data['corretore'] = $resultados->where([
        ['equipe_id', '=', $gerente->equipe_id],
        ['id', '!=',$gerente->id],
    ])->get();
    return view('gerente/buscar_corretor', $data);
   }
//============================================================
public function remove_corretor($id, Request $request){

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

               Plano::where('user_id',$id)->update(array( 'acesso' => 0 ));

               $idg = Auth::user()->id;
               $gerente= new User();
               $gerente = User::find($idg);

               $resultados = new User();
               $data['corretore'] = $resultados->where([
               ['equipe_id', '=', $gerente->equipe_id],
               ['id', '!=',$gerente->id],
               ])->get();

    return view('gerente/buscar_corretor', $data)->with('success', 'Atualizado com sucesso!');
  }
//============================================================
   public function lista_agenda(Request $request){

    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);

    $resultados = new Event();
    $data['event'] = $resultados->where([
        ['equipe_id', '=', $gerente->equipe_id],
        ['prive', '=', 1],

    ])->get();
    return view('gerente/agendaequipe', $data);

   }
     //=======================================================================
     public function funil_equipe(Request $request)
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
         return view('gerente/funilequipe', $data);
     }
     //=======================================================================
      public function parado($id, Request $request)
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

         return view('gerente/funilequipe', $data);
      }
      //=======================================================================
      public function ativo($id, Request $request)
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

         return view('gerente/funilequipe', $data);
      }
      //=======================================================================
      public function vendido($id, Request $request)
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

         return view('gerente/funilequipe', $data);
      }
       //=======================================================================
       public function documentos($id, Request $request)
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

          return view('gerente/funilequipe', $data);
       }
       //=======================================================================
        public function pendencia($id, Request $request)
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

           return view('gerente/funilequipe', $data);
        }
         //=======================================================================
         public function analise($id, Request $request)
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

            return view('gerente/funilequipe', $data);
         }

//=====================================================
public function add_leads_gerente(Request $request){

    $idg = Auth::user()->id;
    $gerente= new User();
    $gerente = User::find($idg);
     // busca por temperatura
     $resultados = new Client();
     $data['lead'] = $resultados->where([
        ['equipe_id', '=', $gerente->equipe_id],
        ['nivel_cliente', '=', 'LEADS'  ], ])->get();

    $resultados = new User();
    $data['corretor'] = $resultados->where([
       ['equipe_id', '=', $gerente->equipe_id],
       ['id', '!=', $idg], ])->get();

    return view('gerente/gerenteaddleads', $data);

}
//===================================================
public function gerente_add_leads(Request $request){

    $gerente= new User();
    $gerente = User::find($request->id);
    $cliente = strip_tags($request->nome_cliente);

    Client::create([

        'id' => $gerente->id,
        'equipe_id' => $gerente->equipe_id,
        'corretor' => $gerente->name,
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

    $painel = new User();
    $data["painel"] = $painel = User::find($gerente->id);

   $smailData = [
    'chamado' => 'Novo Leads',
    'title' => 'Olá! ' . $painel->name,
    'body' => 'Acaba de chegar novo lead ao CrmCorretor.',
    'body2' => 'Seu nome é ' . $cliente,
    'body3' => 'Enviado por seu gerente.',
    'link' => 'https://www.crmcorretor.com.br/login',
    'bott' => 'Acesse Crm Corretor',
    'corretor' => 'Boas Vendas!',
    'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
    'emailCorretor' => $gerente->email,
];

      SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));
    return view('gerente/gerenteaddleads', $data);
}
//============================== lista imoveis equipe
public function ListaImovelEquipe($id, Request $request ){

    $id = Auth::user()->id ;

    $equipe = new User();
    $data["equipe"] = $equipe = User::find($id);

    $resultados = new Imovel();
    $data['imovel'] = $resultados->where([
        ['equipe_id', '=', $equipe->equipe_id],

    ])->paginate(12);

       return view('gerente/ListaImovelEquipe', $data);
        }
//==========================================================
public function add_gerarelatorio(){

    $id = Auth::user()->id ;

    $equipe = new User();
    $equipe = User::find($id);

    $resultados = new User();
    $data['equipe'] = $resultados->where([
        ['equipe_id', '=', $equipe->equipe_id],
        ['id', '!=', $equipe->id],

    ])->get();

    return view('gerente/equipe', $data);
}
//====================================gera relatorio para gerente
public function add_relatorio($id){

    $id = $this->Enc->desencriptar($id);

    $resultados = new Event();
    $data['agenda'] = $resultados->where('user_id', '=', $id)->whereMonth('end', date('m'))->get();

    $resultados = new Client();
    $data['leads'] = $resultados->where([
        ['user_id', '=', $id],
        ['nivel_cliente', '=','LEADS'],
    ])->get();
    //total de clientes
    $data['total'] = $resultados->where([
        ['user_id', '=', $id],

    ])->get();
//frio
$hoje =date("Y-m-d H:i:s");
$tempo =date("Y-m-d H:i:s", strtotime('-1 month' ));
$data['frio'] = $resultados->where([
    ['user_id', '=', $id],
    ['updated_at', '<', $tempo  ],
    ['nivel_cliente', '!=','VENDIDO'],

])->get();

$data['documento'] = $resultados->where([
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

  //quente
  $data['quente'] = $resultados->where([
    ['user_id', '=', $id],
    ['updated_at', '>', $tempo  ],

])->get();
 //vendidos
 $data['vendido'] = $resultados->where([
    ['user_id', '=', $id],
    ['nivel_cliente', '=','VENDIDO'],
])->get();
// onde?
$data['Indicado'] = $resultados->where([
    ['user_id', '=', $id],
    ['origem_cliente', '=','Indicado'],
])->get();

$data['Roleta'] = $resultados->where([
    ['user_id', '=', $id],
    ['origem_cliente', '=','Roleta'],
])->get();

$data['Anuncio'] = $resultados->where([
    ['user_id', '=', $id],
    ['origem_cliente', '=','Anuncio'],
])->get();

$data['Call'] = $resultados->where([
    ['user_id', '=', $id],
    ['origem_cliente', '=','Call'],
])->get();

$data['Site'] = $resultados->where([
    ['user_id', '=', $id],
    ['origem_cliente', '=','Site'],
])->get();

$data['Facebook'] = $resultados->where([
    ['user_id', '=', $id],
    ['origem_cliente', '=','Facebook'],
])->get();

$data['Instagram'] = $resultados->where([
    ['user_id', '=', $id],
    ['origem_cliente', '=','Instagram'],
])->get();

$data['PDV'] = $resultados->where([
    ['user_id', '=', $id],
    ['origem_cliente', '=','PDV'],
])->get();

    //etiqueta
    $data['Semrenda'] = $resultados->where([
        ['user_id', '=', $id],
        ['etiqueta', '=','SEM_RENDA'],
        ])->get();

        $data['SPC'] = $resultados->where([
            ['user_id', '=', $id],
            ['etiqueta', '=','SPC'],
            ])->get();

            $data['Reprovado'] = $resultados->where([
                ['user_id', '=', $id],
                ['etiqueta', '=','REPROVADO'],
                ])->get();

                   $data['Desistiu'] = $resultados->where([
                        ['user_id', '=', $id],
                        ['etiqueta', '=','DESISTIU'],
                        ])->get();

                        $data['Semresposta'] = $resultados->where([
                            ['user_id', '=', $id],
                            ['etiqueta', '=','SEM_RESPOSTA'],
                            ])->get();

                            $data['Pesquisando'] = $resultados->where([
                                ['user_id', '=', $id],
                                ['etiqueta', '=','PESQUISANDO'],
                                ])->get();

                                $data['Investidor'] = $resultados->where([
                                    ['user_id', '=', $id],
                                    ['etiqueta', '=','INVESTIDOR'],
                                    ])->get();

                                    $data['Construtor'] = $resultados->where([
                                        ['user_id', '=', $id],
                                        ['etiqueta', '=','CONSTRUTOR'],
                                        ])->get();

                                        $data['MCMV'] = $resultados->where([
                                            ['user_id', '=', $id],
                                            ['etiqueta', '=','MCMV'],
                                            ])->get();

                                            $data['Outros'] = $resultados->where([
                                                ['user_id', '=', $id],
                                                ['etiqueta', '=','OUTROS'],
                                                ])->get();

//situacao imoveis
$imovel = new Imovel();

$data['imovel'] = $imovel->where([
    ['user_id', '=', $id],])->get();

$data['PRONTO'] = $imovel->where([
    ['user_id', '=', $id],
    ['plantapronto', '=','PRONTO'],
])->get();

$data['NAPLANTA'] = $imovel->where([
    ['user_id', '=', $id],
    ['plantapronto', '=','PLANTA'],
])->get();

$data['CONSTRUIDO'] = $imovel->where([
    ['user_id', '=', $id],
    ['plantapronto', '=','CONSTRUÇÃO'],
])->get();

$users = Client::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
->where('user_id', '=', $id)->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count', 'month_name');

    $labels = $users->keys();
    $adata = $users->values();

  //visitas
    $vusers = Visita::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
    ->where('user_id', '=', $id)->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count', 'month_name');

        $data ['vlabels'] = $vusers->keys();
        $data ['vdata']  = $vusers->values();
   // dd($data);
   //clicks
   $cusers = Click::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
   ->where('user_id', '=', $id)->whereYear('created_at', date('Y'))
                   ->groupBy(DB::raw("Month(created_at)"))
                   ->pluck('count', 'month_name');

       $data ['clabels'] = $cusers->keys();
       $data ['cdata']   = $cusers->values();

       $ide = Auth::user()->id ;

       $equipe = new User();
       $equipe = User::find($ide);

       $resultados = new User();
       $data['equipe'] = $resultados->where([
           ['equipe_id', '=', $equipe->equipe_id],
           ['id', '!=', $ide],

       ])->get();

      return view('gerente/relatorio', compact('labels', 'adata'), $data);

}


}
