<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Imovel;

use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
   public function grafico_cliente(Request $request){


    $id = Auth::user()->id;
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
    ['plantapronto', '=','NA PLANTA'],
])->get();

$data['CONSTRUIDO'] = $imovel->where([
    ['user_id', '=', $id],
    ['plantapronto', '=','EM CONSTRUÇÃO'],
])->get();
$users = Client::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
->where('user_id', '=', $id)->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count', 'month_name');

    $labels = $users->keys();
    $adata = $users->values();
   // dd($data);
    return view('corretor/grafico', compact('labels', 'adata'), $data);

   }
}
