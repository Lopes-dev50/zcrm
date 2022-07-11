<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Aviso;
use App\Models\Banner;
use App\Models\Valor;
use App\Models\Anuncio;
use App\Models\Suporte;
use App\Models\Imovel;
use App\Models\Plano;
use App\Models\Jobs;
use App\Models\Financ;
use App\Jobs\SemailMarkt;
use App\Classes\Enc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Galeria;

class AdminController extends Controller
{

    private $Enc;

    public function __construct()
    {
        $this->middleware('auth');
        $this->Enc = new Enc();
    }

    //======================================================
    public function index(){

        $painel = new User();
        $data["tudo"] = $painel = User::All();
        $resultados = new User();

        $data['free'] = $resultados->where([
         ['plano', '=','free'],
       ])->get();

       $data['corretor'] = $resultados->where([
        ['plano', '=','corretor'],
      ])->get();

      $data['gerente'] = $resultados->where([
        ['plano', '=','gerente'],
      ])->get();

      $data['equipe'] = $resultados->where([
        ['plano', '=','equipe'],
      ])->get();

      $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
      $data['pagante'] = $resultados->where([
        ['plano', '!=','FREE'],
        ['tempo', '>', $tempo  ],
        ['plano', '!=','EQUIPE'],
      ])->get();

      $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
      $data['naopagante'] = $resultados->where([
        ['plano', '!=','Gerente'],
        ['tempo', '>', $tempo  ],
        ['plano', '!=','Corretor'],
      ])->get();
         // onde?
    $data['Indicado'] = $resultados->where([

        ['onde', '=','Indicado'],
    ])->get();

      $data['Anuncio'] = $resultados->where([

        ['onde', '=','Anuncio'],
    ])->get();

    $data['Youtube'] = $resultados->where([

        ['onde', '=','Youtube'],
    ])->get();

    $data['Facebook'] = $resultados->where([

        ['onde', '=','Facebook'],
    ])->get();

    $data['Instagram'] = $resultados->where([

        ['onde', '=','Instagram'],
    ])->get();

          return view('admin/homeadmin', $data);
    }

//======================================================
    public function lista_geral(){

        $painel = new User();
        $data["tudo"] = $painel = User::All();

        $resultados = new User();

       $data['free'] = $resultados->where([
         ['plano', '=','free'],
       ])->get();

       $data['corretor'] = $resultados->where([
        ['plano', '=','corretor'],
      ])->get();

      $data['gerente'] = $resultados->where([
        ['plano', '=','gerente'],
      ])->get();

      $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
      $data['pagante'] = $resultados->where([
        ['plano', '!=','free'],
        ['tempo', '>', $tempo  ],
        ['plano', '!=','equipe'],
      ])->get();

         return view('admin/admin', $data);
    }
//=========================================
    public function frees(){

        $resultados = new User();

        $data['tudo'] = $resultados->where([
            ['plano', '=','free'],
          ])->get();

       $data['free'] = $resultados->where([
         ['plano', '=','free'],
       ])->get();

       $data['corretor'] = $resultados->where([
        ['plano', '=','corretor'],
      ])->get();

      $data['gerente'] = $resultados->where([
        ['plano', '=','gerente'],
      ])->get();

      $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
      $data['pagante'] = $resultados->where([
        ['plano', '!=','free'],
        ['tempo', '>', $tempo  ],
        ['plano', '!=','equipe'],
      ])->get();

         return view('admin/admin', $data);
    }
//=========================================
public function corretors(){

    $resultados = new User();

    $data['tudo'] = $resultados->where([
        ['plano', '=','corretor'],
      ])->get();

   $data['free'] = $resultados->where([
     ['plano', '=','free'],
   ])->get();

   $data['corretor'] = $resultados->where([
    ['plano', '=','corretor'],
  ])->get();

  $data['gerente'] = $resultados->where([
    ['plano', '=','gerente'],
  ])->get();

  $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
  $data['pagante'] = $resultados->where([
    ['plano', '!=','free'],
    ['tempo', '>', $tempo  ],
    ['plano', '!=','equipe'],
  ])->get();

     return view('admin/admin', $data);
}
//=========================================
public function gerentes(){

    $resultados = new User();

    $data['tudo'] = $resultados->where([
        ['plano', '=','gerente'],
      ])->get();

   $data['free'] = $resultados->where([
     ['plano', '=','free'],
   ])->get();

   $data['corretor'] = $resultados->where([
    ['plano', '=','corretor'],
  ])->get();

  $data['gerente'] = $resultados->where([
    ['plano', '=','gerente'],
  ])->get();

  $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
  $data['pagante'] = $resultados->where([
    ['plano', '!=','free'],
    ['tempo', '>', $tempo  ],
    ['plano', '!=','equipe'],
  ])->get();

     return view('admin/admin', $data);
}

//=========================================
public function pagante(){

    $resultados = new User();

    $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
    $data['tudo'] = $resultados->where([
      ['plano', '!=','free'],
      ['tempo', '>', $tempo  ],
    ])->get();

   $data['free'] = $resultados->where([
     ['plano', '=','free'],
   ])->get();

   $data['corretor'] = $resultados->where([
    ['plano', '=','corretor'],
  ])->get();

  $data['gerente'] = $resultados->where([
    ['plano', '=','gerente'],
  ])->get();

  $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
      $data['pagante'] = $resultados->where([
        ['plano', '!=','free'],
        ['tempo', '>', $tempo  ],
        ['plano', '!=','equipe'],
      ])->get();

     return view('admin/admin', $data);
}
//====================================
public function info(){

    $aviso = new Aviso();
    $aviso = Aviso::all();
    $data["aviso"] = $aviso;

    return view('admin/info', $data);

}
//===========================================
public function add_info(Request $request)
{
    Aviso::create([

        'titulo' => strip_tags($request->titulo ?? 'Não Preenchido'),
        'texto' => strip_tags($request->texto ?? 'Não Preenchido'),
        'cor' => strip_tags($request->cor ?? 'Não Preenchido'),
    ]);
    $aviso = new Aviso();
    $aviso = Aviso::all();
    $data["aviso"] = $aviso;
   return view('admin/info', $data);
}

//===========================================
public function add_suporte(Request $request)
{
    Suporte::create([
        'titulo' => strip_tags($request->titulo ?? 'Não Preenchido'),
        'texto' => strip_tags($request->texto ?? 'Não Preenchido'),
        'video' => strip_tags($request->video ?? 'Não Preenchido'),
    ]);
    $aviso = new Suporte();
    $aviso = Suporte::all();
    $data["suporte"] = $aviso;
    return view('admin/add_suporte', $data);
}

//================================
public function destroy($id, Request $request ){

    $id = $this->Enc->desencriptar($id);
    Aviso::destroy($id);

    $aviso = new Aviso();
    $aviso = Aviso::all();
    $data["aviso"] = $aviso;
   return view('admin/info', $data);
}

//================================
public function deletar_suporte($id, Request $request ){
    Suporte::destroy($id);
    $aviso = new Suporte();
    $aviso = Suporte::all();
    $data["suporte"] = $aviso;
    return view('admin/suporte', $data);
}

//==========================================
public function banner()
{
    $banner = new Banner();
    $banner = Banner::all();
    $data["banner"] = $banner;
return view('admin/banner', $data);
}

//===========================================
public function add_banner(Request $request)
{
    Banner::create([
        'valor' => strip_tags($request->valor ?? 'Não Preenchido'),
        'frase' => strip_tags($request->frase ?? 'Não Preenchido'),
      'ativo' => '0',
    ]);
    $banner = new Banner();
    $banner = Banner::all();
    $data["banner"] = $banner;

return view('admin/banner', $data);

}
//================================
public function deletar_banner($id, Request $request ){

    $id = $this->Enc->desencriptar($id);
    Banner::destroy($id);

        $banner = new Banner();
        $banner = Banner::all();
        $data["banner"] = $banner;
    return view('admin/banner', $data);
}
//=========================================

public function lucro(){
    $resultados = new User();
    $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
    $data['pagacorretor'] = $resultados->where([
      ['plano', '!=','free'],
      ['tempo', '>', $tempo  ],
      ['plano', '!=','equipe'],
      ['plano', '=','corretor'],
    ])->get();

    $data['pagagerente'] = $resultados->where([
        ['plano', '!=','free'],
        ['tempo', '>', $tempo  ],
        ['plano', '!=','equipe'],
        ['plano', '!=','gerente'],
      ])->get();
    return view('admin/lucro', $data);
}
//=============================================
    public function list_suporte(){

        $aviso = new Suporte();
        $aviso = Suporte::all();
        $data["suporte"] = $aviso;

        return view('admin/add_suporte', $data);
    }

//==============================================
   public function emailTodos(){
    $painel = new User();
    $data["todos"] = $painel = User::All();
    return view('admin/emailTodos', $data);

   }
//==============================================
public function add_emailTodos(Request $request){

    $id = $request->plano;

    $assunto = $request->assunto;
    $mensagem =  $request->mensagem;

   $painel = new User();
   $data["painel"] = $painel = User::All();
    foreach($painel as $painel){

       $smailData = [
            'chamado' => $assunto,
            'title' => 'Olá! ' . $painel->name,
            'body' => $mensagem,
            'body2' => '',
            'body3' => '',
            'link' => 'https://www.crmcorretor.com.br/login',
            'bott' => 'CRM CORRETOR',
            'corretor' => 'CrmCorretor',
            'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
            'emailCorretor' => $painel->email,
     ];
     SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));
    }
    return redirect()->route('emailTodos')->with('success', 'Email enviado!');
   }
//=====================================================plano
public function plano(Request $request){
    $plano = new valor();
    $data["planos"] = $plano = Valor::All();

    return view('admin/plano', $data);
}
//=====================================================plano
public function add_plano($id, Request $request){
    $valor = valor::find($id);
    $valor->perildo =  strip_tags($request->get('perildo'));
    $valor->valores = strip_tags($request->get('valores'));
    $valor->nivel =  strip_tags($request->get('nivel'));
    $valor->dia =  strip_tags($request->get('dia'));
    $valor->save();
    $plano = new Valor();
    $data["planos"] = $plano = Valor::All();

    return view('admin/plano', $data);
}
//=====================================================plano
public function cadd_plano(Request $request){



    Valor::create([
        'perildo' => strip_tags($request->perildo ),
        'valores' => strip_tags($request->valores ),
        'nivel' => strip_tags($request->nivel ),
        'dia' => strip_tags($request->dia ),


    ]);

    $plano = new Valor();
    $data["planos"] = $plano = Valor::All();

    return view('admin/plano', $data);
}
//=====================================
 public function anuncio(){
    $data["anuncios"] = $plano = Anuncio::All();

    return view('admin/anuncio', $data);
 }
//=====================================
    public function add_anuncio($id){

        $id = $this->Enc->desencriptar($id);
        $imovel = new Imovel();
        $data["imovel"] = $imovel = Imovel::find($id);

        Anuncio::create([
            'user_id' => $imovel->user_id,
            'imovel_id' => $imovel->id,
            'corretor' => $imovel->corretor,
            'cod' => $imovel->cod,
            'nomeimovel' => $imovel->nomeimovel

        ]);

        $resultados = new Imovel();
        $data['imovel'] = $resultados->where([
            ['id', '=', $id],
            ['anuncio', '=', 0],

        ])->paginate(12);

        $data["anuncios"] = $plano = Anuncio::All();

    return view('admin/anuncio', $data);

    }
//=====================================
public function para_anuncio($id){

    $id = $this->Enc->desencriptar($id);
    Imovel::where('id',$id)->update(array( 'anuncio'=> 0, ));
    Anuncio::where('imovel_id',$id)->update(array( 'ativo'=> 0, ));
    $data["anuncios"] = $plano = Anuncio::All();
    return view('admin/anuncio', $data);
 }
 //=====================================
public function ativa_anuncio($id){
    $id = $this->Enc->desencriptar($id);
    Imovel::where('id',$id)->update(array( 'anuncio'=> 1, ));
    Anuncio::where('imovel_id',$id)->update(array( 'ativo'=> 1, ));
    $data["anuncios"] = $plano = Anuncio::All();
    return view('admin/anuncio', $data);
 }
 //=====================================
public function busca_anuncio(Request $request){

   $cod =  strip_tags($request->get('cod'));
     $resultados = new Imovel();
     $data['imovel'] = $resultados->where([
         ['cod', '=', $cod],
     ])->paginate(12);
    $data["anuncios"] = $plano = Anuncio::All();
    return view('admin/anuncio', $data);
 }
 //=====================================
public function del_anuncio($id){

    $id = $this->Enc->desencriptar($id);
    Imovel::where('id',$id)->update(array( 'anuncio'=> 0, ));
    Anuncio::where('imovel_id', $id)->delete();
    $data["anuncios"] = $plano = Anuncio::All();

    return view('admin/anuncio', $data);
 }
//========================================ativar corretor
public function add_admin_corretor($id){

    $id = $this->Enc->desencriptar($id);

    $resultados = new User();

        $data['tudo'] = $resultados->where([
            ['plano', '=','free'],
          ])->get();

       $data['free'] = $resultados->where([
         ['plano', '=','free'],
       ])->get();

       $data['corretor'] = $resultados->where([
        ['plano', '=','corretor'],
      ])->get();

      $data['gerente'] = $resultados->where([
        ['plano', '=','gerente'],
      ])->get();

      $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
      $data['pagante'] = $resultados->where([
        ['plano', '!=','free'],
        ['tempo', '>', $tempo  ],
        ['plano', '!=','equipe'],
      ])->get();

      DB::table('model_has_permissions')
      ->where('model_id', $id)
      ->update(['permission_id' => '3 - corretor']);

       DB::table('users')
       ->where('id', $id)
       ->update(['plano' => 'Corretor'],['nivel' => '1']);

       Plano::where('user_id',$id)->update(array( 'status'=> 'approved'));
       Plano::where('user_id',$id)->update(array( 'acesso' => 365 ));
       Financ::create([ 'pagamento' => 'Pago', 'user_id' => $id,  ]);

         return view('admin/admin', $data);
}
//========================================ativar gerente
public function add_admin_gerente($id){

    $id = $this->Enc->desencriptar($id);
    $resultados = new User();
        $data['tudo'] = $resultados->where([
            ['plano', '=','free'],
          ])->get();

       $data['free'] = $resultados->where([
         ['plano', '=','free'],
       ])->get();

       $data['corretor'] = $resultados->where([
        ['plano', '=','corretor'],
      ])->get();

      $data['gerente'] = $resultados->where([
        ['plano', '=','gerente'],
      ])->get();

      $tempo =date("Y-m-d H:i:s", strtotime('-365 days' ));
      $data['pagante'] = $resultados->where([
        ['plano', '!=','free'],
        ['tempo', '>', $tempo  ],
        ['plano', '!=','equipe'],
      ])->get();

         DB::table('model_has_permissions')
         ->where('model_id', $id)
         ->update(['permission_id' => '2 - gerente']);

         DB::table('users')
         ->where('id', $id)
         ->update(['plano' => 'Gerente'],['nivel' => '2']);

         Plano::where('user_id',$id)->update(array( 'status'=> 'approved'));
         Plano::where('user_id',$id)->update(array( 'acesso' => 365 ));
         Financ::create([ 'pagamento' => 'Pago', 'user_id' => $id,  ]);

         return view('admin/admin', $data);
}
//==========================================================LISTA IMOVEIS
public function adminlistaimovel($id)
    {
        $id = $this->Enc->desencriptar($id);

        $resultados = new Imovel();
        $data['imovel'] = $resultados->where([
            ['user_id', '=', $id],   ])->orderByDesc('updated_at')->paginate(12);

            $data["anuncios"] = $plano = Anuncio::All();

      return view('admin/adminimoveis', $data);

    }
//==========================================================DELETAR IMOVEIS CONTAS PARADAS
    public function adminapagaimovel($id)
    {
        $id = $this->Enc->desencriptar($id);
         $criar = Imovel::find($id);
       $caminho = (public_path("storage/$criar->user_id/$criar->galeria"));
       File::deleteDirectory($caminho);
        Imovel::destroy($id);
         $resultados = new Galeria();
         $data['imovel'] = $resultados->where([
             ['imovel_id', '=', $id],   ])->delete();

          $resultados = new Imovel();
          $data['imovel'] = $resultados->where([
              ['user_id', '=', $id],   ])->orderByDesc('updated_at')->paginate(12);

              $data["anuncios"] = $plano = Anuncio::All();

        return view('admin/adminimoveis', $data);

    }
//==========================================================JOBS ERRO
public function jobs(){

    $data["jobs"] = $plano = Jobs::All();

    return view('admin/jobs', $data);

}
//==========================================================JOBS DELETA
public function deletajobs(){
    $data["jobs"] = $plano = Jobs::All();

    DB::delete('DELETE FROM failed_jobs ');

    return view('admin/jobs', $data);

}

}
