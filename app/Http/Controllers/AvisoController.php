<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Aviso;
use App\Models\Plano;
use App\Models\Valor;
use App\Models\Suporte;
use App\Models\Banner;
use App\Models\Click;
use App\Models\Client;
use App\Models\Imovel;
use App\Models\User;
use App\Models\Event;
use App\Models\Visita;
use Illuminate\Support\Facades\DB;

use DateTime;

class AvisoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //=======================================================
    public function index()
    {


        $id = Auth::user()->id;
        $plano = Plano::find($id);

        $resultados = new Valor();
    $data['valor'] = $resultados->where([
      ['nivel', '=', 1],
    ])->get();


        switch ($plano->acesso) {
            case '0':
 //=================================+++++++++++++++++++==========PLANO FREE

                           $id = Auth::user()->id;

                           $plano = Plano::find($id);



                           $resultados = new Valor();
                       $data['valor'] = $resultados->where([
                         ['nivel', '=', 1],
                       ])->get();

                           $aviso = new Aviso();
                           $aviso = Aviso::all();
                           $data["aviso"] = $aviso;

                           $banner = new Banner();
                           $banner = Banner::all();
                           $data["banner"] = $banner;


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
                       //
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


                           return view('dashboard', compact('labels', 'adata'), $data);


//=================================================================PLANO CORRETOR OU GERENTE
                break;
                case '30':
                  //pagamento mensal.
                    $m =  ($plano->updated_at)->diffInDays(date("Y-m-d H:i:s"));
                    if($m > 32){

                        if(Auth::user()->nivel == 2){

                            DB::table('model_has_permissions')
                            ->where('model_id', $id)
                            ->update(['permission_id' => '5 - renova']);

                            return view('pgseguro/pgrenovagerente');

                           }else{

                        DB::table('model_has_permissions')
                        ->where('model_id', $id)
                        ->update(['permission_id' => '4 - free']);

                        Plano::where('user_id',$id)->update(array( 'acesso' => 0 ));


                          return view('pgseguro/pgrenova');
                       //valor se for cliente

                           }




                        }else{
 //=============================================================================

                $id = Auth::user()->id;

                $plano = Plano::find($id);

                $resultados = new Valor();
            $data['valor'] = $resultados->where([
              ['nivel', '=', 1],
            ])->get();

                $aviso = new Aviso();
                $aviso = Aviso::all();
                $data["aviso"] = $aviso;

                $banner = new Banner();
                $banner = Banner::all();
                $data["banner"] = $banner;


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

            //
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

                return view('dashboard', compact('labels', 'adata'), $data);

                        }
                    break;
//============================================================PLANO SEMESTRAL
                break;
                case '180':
                  //pagamento mensal.
                    $m =  ($plano->updated_at)->diffInDays(date("Y-m-d H:i:s"));
                    if($m > 182){



                        if(Auth::user()->nivel == 2){

                            DB::table('model_has_permissions')
                            ->where('model_id', $id)
                            ->update(['permission_id' => '5 - renova']);

                            return view('pgseguro/pgrenovagerente');

                           }else{

                        DB::table('model_has_permissions')
                        ->where('model_id', $id)
                        ->update(['permission_id' => '4 - free']);

                        Plano::where('user_id',$id)->update(array( 'acesso' => 0 ));


                          return view('pgseguro/pgrenova');
                       //valor se for cliente

                           }
                        }else{
 //==========================================================================

                $id = Auth::user()->id;

                $plano = Plano::find($id);

                $resultados = new Valor();
            $data['valor'] = $resultados->where([
              ['nivel', '=', 1],
            ])->get();

                $aviso = new Aviso();
                $aviso = Aviso::all();
                $data["aviso"] = $aviso;

                $banner = new Banner();
                $banner = Banner::all();
                $data["banner"] = $banner;


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

            //
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

                return view('dashboard', compact('labels', 'adata'), $data);


                        }
                    break;
//==========================================================================PALNO ANUAL
                  case '366':
                    //pagamento.
                    $a =  ($plano->updated_at)->diffInDays(date("Y-m-d H:i:s"));
                    if($a > 367){
                        if(Auth::user()->nivel == 2){

                            DB::table('model_has_permissions')
                            ->where('model_id', $id)
                            ->update(['permission_id' => '5 - renova']);

                            return view('pgseguro/pgrenovagerente');

                           }else{

                        DB::table('model_has_permissions')
                        ->where('model_id', $id)
                        ->update(['permission_id' => '4 - free']);

                        Plano::where('user_id',$id)->update(array( 'acesso' => 0 ));


                          return view('pgseguro/pgrenova');
                       //valor se for cliente

                           }
                     }else{

 //===========================================================================
                        $id = Auth::user()->id;

                $plano = Plano::find($id);

                $resultados = new Valor();
            $data['valor'] = $resultados->where([
              ['nivel', '=', 1],
            ])->get();

                $aviso = new Aviso();
                $aviso = Aviso::all();
                $data["aviso"] = $aviso;

                $banner = new Banner();
                $banner = Banner::all();
                $data["banner"] = $banner;

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
            //
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

                return view('dashboard', compact('labels', 'adata'), $data);

                        }
                   break;

                case '4':
                    return redirect()->route('pgrenovar');
                   break;

            default:
                # code...
                break;
        }
    }

         //=======================================================
         public function suporte()
         {
           $aviso = new Suporte();
           $aviso = Suporte::all();
           $data["suporte"] = $aviso;

             return view('suporte', $data);
         }
}
