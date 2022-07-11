<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Classes\Enc;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Event;
use App\Models\User;
use App\Classes\Logger;
use App\Models\Imovel;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;

use App\Models\Galeria;
use Illuminate\Support\Facades\DB;

class MobiController extends Controller
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

        return view('mobi/mobiFunil', $data);
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
            'nome_cliente' => strip_tags($request->nome_cliente ?? 'Não Preenchido'),
            'celular_cliente' => strip_tags($request->celular_cliente ?? 'Não Preenchido'),
            'email_cliente' => strip_tags($request->email_cliente ?? ''),
            'renda_cliente' => strip_tags($request->renda_cliente ?? 'Não Preenchido'),
            'cidade_cliente' => strip_tags($request->cidade_cliente ?? 'Não Preenchido'),
            'interesse_cliente' => strip_tags($request->interesse_cliente ?? 'Não Preenchido'),
            'bairro_interesse_cliente' => strip_tags($request->bairro_interesse_cliente ?? 'Não Preenchido'),
            'empreendimento_cliente' => strip_tags($request->empreendimento_cliente ?? 'Não Preenchido'),
            'fgts_cliente' => strip_tags($request->fgts_cliente ?? 'Não Preenchido'),
            'nascimento_cliente' => strip_tags($request->nascimento_cliente ?? 'Não Preenchido'),
            'spc_cliente' => strip_tags($request->spc_cliente ?? 'Não Preenchido'),
            'nivel_cliente' => strip_tags($request->nivel_cliente ?? 'Não Preenchido'),
            'origem_cliente' => strip_tags($request->origem_cliente ?? 'Não Preenchido'),
            'conversa_cliente' =>  strip_tags($request->conversa_cliente),
            'controle_cliente' => strip_tags($request = '1'),

        ]);
        return redirect()->route('mobi_funil')->with('success', 'Cliente CADASTRADO com sucesso!');
    }

     //=======================================================================
    public function show(Request $request)
    {
        $id = Auth::user()->id;
        $resultados = new Client();
        $data['clientes'] = $resultados->where([
            ['user_id', '=', $id],
            ['nivel_cliente', '=','LEADS'],
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
        return view('mobi/mobiFunil', $data );
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
         return view('mobi/mobiFunil', $data);
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
         return view('mobi/mobiFunil', $data);
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
         return view('mobi/mobiFunil', $data);
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
          return view('mobi/mobiFunil', $data);
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
           return view('mobi/mobiFunil', $data);
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
            return view('mobi/mobiFunil', $data);
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

        return view('mobi/mobi_add_edit_cliente', $data);
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
        $cliente->interesse_cliente = strip_tags($request->get('interesse_cliente'));
        $cliente->bairro_interesse_cliente =  strip_tags($request->get('bairro_interesse_cliente'));
        $cliente->empreendimento_cliente =  strip_tags($request->get('empreendimento_cliente'));
        $cliente->fgts_cliente =  strip_tags($request->get('fgts_cliente'));
        $cliente->spc_cliente =  strip_tags($request->get('spc_cliente'));
        $cliente->nivel_cliente =  strip_tags($request->get('nivel_cliente'));
        $cliente->origem_cliente =  strip_tags($request->get('origem_cliente'));
        $cliente->conversa_cliente = strip_tags($request->get('conversa_cliente'));

        $cliente->save();

        $id = $this->Enc->encriptar(Auth::user()->id);
        return redirect()->route('mobi_funil',$id)->with('success', 'Cliente ATUALIZADO com sucesso!');
    }
 //=======================================================================
 public function destroy($id)
 {
     $this->Logger->log('info', 'Deletou um Cliente');

     $id = $this->Enc->desencriptar($id);
     $cliente = Client::findOrFail($id);
     $cliente->delete();

     $id = $this->Enc->encriptar(Auth::user()->id);

     return redirect()->route('mobiFunil',$id)->with('success', 'Cliente DELETADO com sucesso!');
 }
 //====================agenda==========
   public function indexmobi(){
    $id = Auth::user()->id;
    $resultados = new Event();
    $data['event'] = $resultados->where([
        ['user_id', '=', $id],

    ])->get();
    return view('mobi/mobi_agenda_corretor', $data);
}
 //================================================================
 public function storeagenda(Request $request)
 {
   // dd($request);
     $id = Auth::user()->id;
     $painel = new User();
     $data["painel"] = $painel = User::find($id);

           $titulo = htmlspecialchars( $request->title);
           $descricao = htmlspecialchars( $request->descrition);
           $event = Event::create([
               'title' => $titulo,
               'descrition' => $descricao,
               'color' => strip_tags($request->color),
               'hora' => strip_tags($request->hora),
               'start' => date('Y/m/d H:i', strtotime($request->inicio .''. $request->hora)),
               'end' => date('Y/m/d H:i', strtotime($request->inicio .''. $request->hora)),
               'user_id' => $painel->id,
               'equipe_id' => $painel->equipe_id,
               'corretor' => $painel->name,
               'email_corretor' => $painel->email,
           ]);

     $id = $this->Enc->encriptar(Auth::user()->id);
     return redirect()->route('agenda_cliente',$id)->with('success', 'Cliente CADASTRADO com sucesso!');
 }
//==========================================================
 public function updateagenda(Request $request)
 {
  $id= $request->get('id');
  $dele = $request->get('delete');
  $event = Event::find($id);
  $event->title =  htmlspecialchars($request->get('title'));
  $event->descrition = htmlspecialchars($request->get('descrition'));
  $event->color =  strip_tags($request->get('color'));
  $event->start = date('Y/m/d H:i', strtotime(strip_tags($request->get('inicio')) .''. strip_tags($request->get('hora'))));
  $event->end =  date('Y/m/d H:i', strtotime(strip_tags($request->get('inicio')) .''. strip_tags($request->get('hora'))));
  $event->save();

    if($dele != ''){
    $event = Event::findOrFail($id);
    $event->delete();

    }
    $id = Auth::user()->id;
     $painel = new User();
     $data["painel"] = $painel = User::find($id);
     $id = $this->Enc->encriptar(Auth::user()->id);
     return redirect()->route('agenda_cliente',$id)->with('success', 'Cliente CADASTRADO com sucesso!');
 }
//============================================================
 public function visita(Request $request, $id)
 {
   // dd($request);
   $idc = $this->Enc->desencriptar($id);
   $titulo = $request->color;
   $titulos = ($titulo == '#008000') ? 'visita' : 'Ligar';
     $id = Auth::user()->id;
     $painel = new User();
     $data["painel"] = $painel = User::find($id);

     $cliente = new Client();
     $data["cliente"] = $cliente = Client::find($idc);
     $event = Event::create([
               'title' => $titulos,
               'descrition' => $request->descrition . ' - ' . $cliente->nome_cliente .' - ' . $cliente->celular_cliente,
               'color' => $request->color,
               'hora' => $request->hora,
               'start' => date('Y/m/d H:i', strtotime($request->inicio .''. $request->hora)),
               'end' => date('Y/m/d H:i', strtotime($request->inicio .''. $request->hora)),
               'nome_cliente' => $cliente->nome_cliente,
               'nome_celular' => $cliente->celular_cliente,
               'prive' => 1,
               'user_id' => $painel->user_id,
               'equipe_id' => $painel->equipe_id,
               'corretor' => $painel->usuario,
               'email_corretor' => $painel->emailusuario,
           ]);

     $id = $this->Enc->encriptar(Auth::user()->id);
     return redirect()->route('mobi_funil_corretor',$id)->with('success', 'CADASTRADO com sucesso!');
 }
//========================imovel=================================
 public function ativa_imovelmobi($id)
 {
     $id = $this->Enc->desencriptar($id);
     $imovel = Imovel::find($id);
     $imovel->ativo =  1;

     $imovel->save();
     $resultados = new Imovel();
     $data['imovel'] = $resultados->where([
         ['user_id', '=', $id],   ])->paginate(12);
       //inicia dados na sessao
       $id = Auth::user()->id;
      $resultados = new Imovel();
       $data['imovel'] = $resultados->where([
           ['user_id', '=', $id],   ])->orderByDesc('updated_at')->paginate(12);

           return view('mobi/mobi_imoveis', $data);

 }
//==============================================================
 public function desativa_imovelmobi($id)
 {
     $id = $this->Enc->desencriptar($id);
     $imovel = Imovel::find($id);
     $imovel->ativo =  0;

     $imovel->save();
     $resultados = new Imovel();
     $data['imovel'] = $resultados->where([
         ['user_id', '=', $id],   ])->paginate(12);
       // busca por temperatura
       $id = Auth::user()->id;
       $resultados = new Imovel();
       $data['imovel'] = $resultados->where([
           ['user_id', '=', $id],   ])->orderByDesc('updated_at')->paginate(12);

     return view('mobi/mobi_imoveis', $data);
 }
   //==============================================================
   public function ativa_destaquemobi($id)
   {
       $id = $this->Enc->desencriptar($id);
       $imovel = Imovel::find($id);
       $imovel->destaque =  1;

       $imovel->save();
         //inicia dados na sessao
         $id = Auth::user()->id;
         $painel = new User();
         $data["painel"] = $painel = user::find($id);
         session()->put('corretor', $painel->usuario);
         session()->put('user_id', $painel->user_id);
         session()->put('equipe_id', $painel->equipe_id);
         session()->put('celular', $painel->celular);
         // busca por temperatura
         $resultados = new Imovel();
         $data['imovel'] = $resultados->where([
             ['user_id', '=', $id],   ])->orderByDesc('updated_at')->paginate(12);

       return view('mobi/mobi_imoveis', $data);
   }
//==============================================================
   public function desativa_destaquemobi($id)
   {
       $id = $this->Enc->desencriptar($id);
       $imovel = Imovel::find($id);
       $imovel->destaque =  0;

       $imovel->save();

         //inicia dados na sessao
         $id = Auth::user()->id;
         $painel = new User();
         $data["painel"] = $painel = user::find($id);
         session()->put('corretor', $painel->usuario);
         session()->put('user_id', $painel->user_id);
         session()->put('equipe_id', $painel->equipe_id);
         session()->put('celular', $painel->celular);
         // busca por temperatura
         $resultados = new Imovel();
         $data['imovel'] = $resultados->where([
             ['user_id', '=', $id],   ])->orderByDesc('updated_at')->paginate(12);

       return view('mobi/mobi_imoveis', $data);

   }

 /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
 public function create()
 {
     //
 }
  //==========================================================
  public function showmobi($id)
  {
     $id = Auth::user()->id;
      // criação pasta imagem por corretor
      if (file_exists("$id")){
      $resultados = new Imovel();
      $data['imovel'] = $resultados->where([
          ['user_id', '=', $id],

      ])->paginate(12);
         return view('mobi/mobi_imoveis', $data);

       } else {
        //aqui faz a crião da pasta fotos do corretor usando id
      //  mkdir("./imgSite/$id");
       Storage::makeDirectory($id);
       //========================
      $resultados = new Imovel();
      $data['imovel'] = $resultados->where([
          ['user_id', '=', $id],

      ])->paginate(12);
      //inicia dados na sessao
      $id = Auth::user()->id;
      $painel = new User();
      $data["painel"] = $painel = User::find($id);

         return view('mobi/mobi_imoveis', $data);

          }
  }
 //=========================================================
 public function storemobi(Request $request)
 {
     $this->Logger->log('info', 'Cadastrou um imóvel');
//=====================
                $id = Auth::user()->id;
                $painel = new User();
                $painel = User::find($id);

               $cidade= preg_replace('/[ -]+/' , '_' , strip_tags($request->cidade ?? 'Não Informado'));
//====================

   $criar =  Imovel::create([

         'user_id' => $painel->id,
         'nomeimovel' =>  strip_tags($request->nomeimovel ?? 'Não Informado'),
         'endereco' =>  strip_tags($request->endereco ?? 'Não Informado'),
         'numero' =>  strip_tags($request->numero ?? 'Não Informado'),
         'bairro' =>  strip_tags($request->bairro ?? 'Não Informado'),
         'CEP' =>  strip_tags($request->CEP ?? 'Não Informado'),
         'cidade' => $cidade,
         'estado' =>  strip_tags($request->estado ?? 'Não Informado'),
         'tipo' =>  strip_tags($request->tipo ?? 'Não Informado'),
         'locarvender' =>  strip_tags($request->locarvender ?? 'Não Informado'),
         'plantapronto' =>  strip_tags($request->plantapronto ?? 'Não Informado'),
         'iptu' =>  strip_tags($request->iptu ?? 'Não Informado'),
         'quartos' =>  strip_tags($request->quartos ?? 'Não Informado'),
         'banheiros' =>  strip_tags($request->banheiros ?? 'Não Informado'),
         'vaga' =>  strip_tags($request->vaga ?? 'Não Informado'),
         'suite' =>  strip_tags($request->suite ?? 'Não Informado'),
         'metragem' =>  strip_tags($request->metragem ?? 'Não Informado'),
         'texto' =>  strip_tags($request->texto ?? 'Não Informado'),
         'video' =>  strip_tags($request->video ?? 'Não Informado'),
         'valor' =>  strip_tags($request->valor ?? 'Não Informado'),
         'dono' =>  strip_tags($request->dono ?? 'Não Informado'),
         'docs' =>  strip_tags($request->docs ?? 'Não Informado'),
         'imcorporadora' =>  strip_tags($request->imcorporadora ?? 'Não Informado'),
         'valorcondominio' =>  strip_tags($request->valorcondominio ?? 'Não Informado'),
         'items' =>  $request->input('items') ?? ' ',
         'destaque' =>  strip_tags($request->destaque ?? 'Não Informado'),
         'perto' =>  strip_tags($request->perto ?? 'Não Informado'),
         'galeria' =>  (random_int(9999, 999999)),
         'cod' =>  (random_int(9999, 99999)),
         'equipe_id' =>  $painel->equipe_id,
         'corretor' =>  $painel->usuario,
  ]);
          if($request->file('image')){
             $file= $request->file('image');
     //        $filename = Image::make($file)->resize(400, 400);
             $filename= date('YmdHi');

             $file = $request->file('image')->storeAs("$criar->user_id/$criar->galeria", $filename);

             $criar->fotocapa =  $file;
             $criar->save();
         }

         $id = $this->Enc->encriptar(Auth::user()->id);
     return redirect()->route('mobi_list_imovel', $id)->with('success', 'CADASTRADO com sucesso!');
 }
 //=========================================================
 public function add_edit_imovelmobi($id)
 {
     $id = $this->Enc->desencriptar($id);
     //buscatos clientes por corretor
     $resultados = new Imovel();
     $resultados = Imovel::find($id);
     $data["imovel"] = $resultados;

     //inicia dados na sessao
     $id = Auth::user()->id;
     $painel = new User();
     $data["painel"] = $painel = User::find($id);

     // busca por temperatura

     return view('mobi/mobi_add_edit_imovel', $data);
 }

 //========================================================
 public function updatemobi(Request $request, $id)
 {
     $this->Logger->log('info', 'Atualizou um imóvel');
     $cidade= preg_replace('/[ -]+/' , '_' , strip_tags($request->get('cidade')));
     $idt = Auth::user()->id;
     $painel = new User();
     $painel = User::find($idt);
     $id = $this->Enc->desencriptar($id);
     $imovel = Imovel::find($id);

     $imovel->nomeimovel =  strip_tags($request->get('nomeimovel'));
     $imovel->user_id =  $painel->id;
     $imovel->endereco =  strip_tags($request->get('endereco'));
     $imovel->numero =  strip_tags($request->get('numero'));
     $imovel->bairro =  strip_tags($request->get('bairro'));
     $imovel->CEP =  strip_tags($request->get('CEP'));
     $imovel->cidade =  $cidade;
     $imovel->estado =  strip_tags($request->get('estado'));
     $imovel->tipo =  strip_tags($request->get('tipo'));
     $imovel->locarvender =  strip_tags($request->get('locarvender'));
     $imovel->plantapronto =  strip_tags($request->get('plantapronto'));
     $imovel->iptu =  strip_tags($request->get('iptu'));
     $imovel->quartos =  strip_tags($request->get('quartos'));
     $imovel->banheiros =  strip_tags($request->get('banheiros'));
     $imovel->vaga =  strip_tags($request->get('vaga'));
     $imovel->suite =  strip_tags($request->get('suite'));
     $imovel->metragem =  strip_tags($request->get('metragem'));
     $imovel->texto =  strip_tags($request->get('texto'));
     $imovel->video =  strip_tags($request->get('video'));
     $imovel->valor =  strip_tags($request->get('valor'));
     $imovel->dono =  strip_tags($request->get('dono'));
     $imovel->docs =  strip_tags($request->get('docs'));
     $imovel->imcorporadora =  strip_tags($request->get('imcorporadora'));
     $imovel->valorcondominio =  strip_tags($request->get('valorcondominio'));
     $imovel->items =  $request->get('items');
     $imovel->perto =  strip_tags($request->get('perto'));
     $imovel->equipe_id =  $painel->equipe_id;
     $imovel->save();

     //inserir foto
     $criar = Imovel::find($id);
     if($request->file('image')){
     @unlink("storage/$criar->fotocapa");
     $file= $request->file('image');
     $filename= date('YmdHi');
     $file-> move(public_path("storage/$criar->user_id/$criar->galeria"), $filename);
     $end=  ($criar->user_id.'/'.$criar->galeria.'/'.$filename);
  //   $file = Storage::move("storage/$criar->user_id/$criar->galeria", $filename);
     $criar->fotocapa = $end;
     $criar->save();
}
     $id = $this->Enc->encriptar(Auth::user()->id);
     return redirect()->route('mobi_list_imovel', $id)->with('success', 'ATUALIZADO com sucesso!');
 }

 //==============================================================
 public function destroymobi($id)
 {

     $this->Logger->log('info', 'Deletou um imóvel');
     $id = $this->Enc->desencriptar($id);
      $criar = Imovel::find($id);
      $folderPath = public_path("storage/$criar->user_id/$criar->galeria");
      $response = File::deleteDirectory($folderPath);
      $response = Storage::deleteDirectory($criar->galeria);
      Imovel::destroy($id);
      $resultados = new Galeria();
      $data['imovel'] = $resultados->where([
          ['imovel_id', '=', $id],   ])->delete();
       //inicia dados na sessao
       $id = Auth::user()->id;
       $painel = new user();
       $data["painel"] = $painel = user::find($id);
       session()->put('corretor', $painel->usuario);
       session()->put('user_id', $painel->user_id);
       session()->put('equipe_id', $painel->equipe_id);
       session()->put('celular', $painel->celular);
       $resultados = new Imovel();
       $data['imovel'] = $resultados->where([
           ['user_id', '=', $id],   ])->orderByDesc('updated_at')->paginate(12);

     return view('mobi/mobi_imoveis', $data);
 }
//adicionar mais fotos na galeria
//==========================================================================
public function add_fotomobi($id){

 $id = $this->Enc->desencriptar($id);

 $data ['imovel'] = Imovel::find($id);
 $resultados = new Galeria();
 $data['galeria'] = $resultados->where([
     ['imovel_id', '=', $id],
 ])->orderByDesc('created_at')->get();

return view('mobi/mobi_add_mais_fotos', $data);

}
//======================================================================
public function add_fotosmobi($id, Request $request, ){

 $id = $this->Enc->desencriptar($id);

 $criar  = Imovel::find($id);

//=== ainda tem que diminir tamanho das imagens
$filename= $request->file('image');
//$filename = Image::make($file)->resize(400, 150);
//$file-> move(public_path("./imgSite/$criar->user_id/$criar->galeria"), $filename);
$file2 = $request->file('image')->storeAs("$criar->user_id/$criar->galeria", $filename);

     Galeria::create([
     'foto' => $file2,
     'imovel_id' => $id ,
     'user_id' => $criar->user_id ,
     'galeria' => $criar->galeria,
     ]);

 $data ['imovel'] = Imovel::find($id);
 $resultados = new Galeria();
 $data['galeria'] = $resultados->where([
     ['imovel_id', '=', $id],
 ])->orderByDesc('created_at')->get();

 return view('mobi/mobi_add_mais_fotos', $data);
}
//============================================================
public function deletar_fotomobi($id){

    $id = $this->Enc->desencriptar($id);

    $criar = DB::table('galerias')->where('id', $id)->get();

    foreach ($criar as $criar) {
    $pasta =  $criar->user_id;
    $pasta2 =  $criar->galeria;
    $foto =  $criar->foto;
    $idg =  $criar->imovel_id;

    @unlink("storage/$pasta/$pasta2/$foto");
   $d = DB::table('galerias')->where('id', $id)->delete();


   $resultados = new Galeria();
    $data['galeria'] = $resultados->where([
        ['imovel_id', '=', $idg],
    ])->orderByDesc('created_at')->get();

    $data ['imovel']  = Imovel::find($idg);

    return view('mobi/mobi_add_mais_fotos', $data);

 }

}

}
