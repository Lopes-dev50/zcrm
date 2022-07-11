<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Jobs\SemailMarkt;
use Illuminate\Support\Facades\Mail;
use App\Classes\Enc;
use Illuminate\Http\Request;
use App\Models\Imovel;
use App\Models\Anuncio;
use App\Models\Client;
use App\Models\Galeria;
use App\Models\User;
use App\Classes\Logger;
use App\Http\Requests\ImovelRequeste;

class ImovelController extends Controller
{
    private $Enc;
    private $Logger;

 public function __construct()
 {
     $this->middleware('auth');
     $this->Enc = new Enc();
     $this->Logger = new Logger();
 }

    public function index()
    {
        //
    }
    //==============================================================
    public function ativa_imovel($id)
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

              $data["anuncios"] = $plano = Anuncio::All();

              return view('corretor/imoveis', $data);
    }
 //==============================================================
    public function desativa_imovel($id)
    {
        $id = $this->Enc->desencriptar($id);
        $imovel = Imovel::find($id);
        $imovel->ativo =  0;
        $imovel->save();

       $resultados = new Imovel();
        $data['imovel'] = $resultados->where([
            ['user_id', '=', $id],   ])->paginate(12);
          //inicia dados na sessao
          // busca por temperatura
          $id = Auth::user()->id;
          $resultados = new Imovel();
          $data['imovel'] = $resultados->where([
              ['user_id', '=', $id],   ])->orderByDesc('updated_at')->paginate(12);

              $data["anuncios"] = $plano = Anuncio::All();

        return view('corretor/imoveis', $data);
    }
      //==============================================================
      public function ativa_destaque($id)
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

                $data["anuncios"] = $plano = Anuncio::All();

          return view('corretor/imoveis', $data);
      }
   //==============================================================
      public function desativa_destaque($id)
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

                $data["anuncios"] = $plano = Anuncio::All();
          return view('corretor/imoveis', $data);
      }
     //==========================================================
     public function show($id)
     {
        $id = Auth::user()->id;
         // criação pasta imagem por corretor
         if (file_exists("$id")){

         $resultados = new Imovel();
         $data['imovel'] = $resultados->where([
             ['user_id', '=', $id],
         ])->paginate(12);
            return view('corretor/imoveis', $data);
          } else {
           //aqui faz a crião da pasta fotos do corretor usando id
         File::makeDirectory($id, 0711, true, true);
          //========================
         $resultados = new Imovel();
         $data['imovel'] = $resultados->where([
             ['user_id', '=', $id],
         ])->paginate(12);
         //inicia dados na sessao
         $id = Auth::user()->id;
         $painel = new User();
         $data["painel"] = $painel = User::find($id);

         $data["anuncios"] = $plano = Anuncio::All();

            return view('corretor/imoveis', $data);

             }
     }
    //=========================================================
    public function store(Request $request)
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
            'corretor' =>  $painel->name,
     ]);
             if($request->file('image')){
                $file= $request->file('image');
              $filename= date('YmdHi').$file->getClientOriginalName();
                $file = $request->file('image')->storeAs("$criar->user_id/$criar->galeria", $filename);
                $criar->fotocapa =  $file;
                $criar->save();
            }

            $data["anuncios"] = $plano = Anuncio::All();

            $id = $this->Enc->encriptar(Auth::user()->id);
        return redirect()->route('list_imovel', $id)->with('success', 'CADASTRADO com sucesso!');
    }
   //=========================================================
    public function add_edit_imovel($id)
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
        $data["anuncios"] = $plano = Anuncio::All();

        return view('corretor/add_edit_imovel', $data);
    }
    //========================================================
    public function update(Request $request, $id)
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
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path("storage/$criar->user_id/$criar->galeria"), $filename);
        $end=  ($criar->user_id.'/'.$criar->galeria.'/'.$filename);
     //   $file = Storage::move("storage/$criar->user_id/$criar->galeria", $filename);
        $criar->fotocapa = $end;
        $criar->save();
}

          $data["anuncios"] = $plano = Anuncio::All();
        $id = $this->Enc->encriptar(Auth::user()->id);
        return redirect()->route('list_imovel', $id)->with('success', 'ATUALIZADO com sucesso!');
    }
    //==================================================deltar imovel e todas fotos
    public function destroy($id)
    {
        $this->Logger->log('info', 'Deletou um imóvel');
        $id = $this->Enc->desencriptar($id);
         $criar = Imovel::find($id);
       $caminho = (public_path("storage/$criar->user_id/$criar->galeria"));
       File::deleteDirectory($caminho);
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

              $data["anuncios"] = $plano = Anuncio::All();

        return view('corretor/imoveis', $data);

    }
//adicionar mais fotos na galeria
//==========================================================================
public function add_foto($id){

    $id = $this->Enc->desencriptar($id);
    $data ['imovel'] = Imovel::find($id);
    $resultados = new Galeria();
    $data['galeria'] = $resultados->where([
        ['imovel_id', '=', $id],
    ])->orderByDesc('created_at')->get();
  return view('corretor/add_mais_fotos', $data);
}
//======================================================================
public function add_fotos($id, Request $request, ){

    $id = $this->Enc->desencriptar($id);
    $criar  = Imovel::find($id);

$file= $request->file('image');
$filename= date('YmdHi').$file->getClientOriginalName();
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

    $id = $this->Enc->encriptar($id);
    return view('corretor/add_mais_fotos', $data);

}
//============================================================
 public function deletar_foto($id){

       $id = $this->Enc->desencriptar($id);
       $criar = DB::table('galerias')->where('id', $id)->get();

       foreach ($criar as $criar) {
       $foto =  $criar->foto;
       $idg =  $criar->imovel_id;

       @unlink("storage/$foto");
      $d = DB::table('galerias')->where('id', $id)->delete();

      $resultados = new Galeria();
       $data['galeria'] = $resultados->where([
           ['imovel_id', '=', $idg],
       ])->orderByDesc('created_at')->get();

       $data ['imovel']  = Imovel::find($idg);

       return view('corretor/add_mais_fotos', $data);

    }
}
 //==========================================================
 public function buscacod(Request $request)
 {
   $cod =  strip_tags($request->get('cod'));

     $resultados = new Imovel();
     $data['imovel'] = $resultados->where([
         ['cod', '=', $cod],
     ])->paginate(12);
     //inicia dados na sessao
     $id = Auth::user()->id;
     $painel = new User();
     $data["painel"] = $painel = User::find($id);
     $data["anuncios"] = $plano = Anuncio::All();

        return view('corretor/imoveis', $data);
 }
 //=================================================markting
   public function add_markting($id){

    $idi = $this->Enc->desencriptar($id);

    $mark = Imovel::find($idi);
     //inicia dados na sessao
     $user_id = Auth::user()->id;
     $corretor = DB::table('users')->where('id', $user_id)->get();
     $cliente = DB::table('clients')->where('user_id', $user_id)->get();

     foreach($corretor as $corr):
     endforeach;

     foreach($cliente as $cli):
     $smailData = [
        'chamado' => 'Olá '. $cli->nome_cliente . ' quero indicar este imóvel.',
        'title' => $mark->nomeimovel,
        'body' => 'Cidade: '. $mark->cidade . 'Bairro: ' . $mark->bairro,
        'body2' => 'Valor: R$ ' .$mark->valor,
        'body3' => 'Para '. $mark->locarvender . ' Esta ' . $mark->plantapronto,
        'link' => 'https://www.'.$corr->subdomain.'crmcorretor.com.br',
        'bott' => 'Ver Imóvel',
        'corretor' => 'Corretor ' . $corr->name,
        'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
        'emailCorretor' => $cli->email_cliente
    ];

   SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));
       endforeach;
    //=============================
    $id = Auth::user()->id;
    $resultados = new Imovel();
    $data['imovel'] = $resultados->where([
        ['user_id', '=', $id],
    ])->paginate(12);
    //inicia dados na sessao
    $id = Auth::user()->id;
    $painel = new User();
    $data["painel"] = $painel = User::find($id);
    $data["anuncios"] = $plano = Anuncio::All();

       return view('corretor/imoveis', $data);
   }
   //=================================================
   // envia email para imovel selecionado no par
   public function add_par_markting($coduni, $cod){

    $coduni = $this->Enc->desencriptar($coduni);
    $cod = $this->Enc->desencriptar($cod);
    $id = Auth::user()->id;

              $corretor = DB::table('users')->where('id', $id)->get();
              $cliente = DB::table('clients')->where('coduni', $coduni)->get();
              $mark = DB::table('imovels')->where('cod', $cod)->get();

              foreach($mark as $mark):

              endforeach;

              foreach($corretor as $corr):

              endforeach;

foreach($cliente as $cli):
    $smailData = [
        'chamado' => 'Olá '. $cli->nome_cliente . ' quero indicar este imóvel.',
        'title' => $mark->nomeimovel,
        'body' => 'Cidade: '. $mark->cidade . ' Bairro: ' . $mark->bairro,
        'body2' => 'Valor: R$ ' .$mark->valor,
        'body3' => 'Para '. $mark->locarvender . ' Esta ' . $mark->plantapronto,
        'link' => 'https://www.'.$corr->subdomain.'crmcorretor.com.br',
        'bott' => 'Ver Imóvel',
        'corretor' => 'Corretor ' . $corr->name,
        'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
        'emailCorretor' => $cli->email_cliente
    ];

   SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));

endforeach;

    return redirect()->route('par')->with('success', 'Enviado com sucesso!');

   }
   //==================================================
   public function add_site_anuncio($id){

    $id = $this->Enc->desencriptar($id);

    $resultados = new Imovel();
    $data['imovel'] = $resultados->where([
        ['id', '=', $id],
    ])->paginate(12);
    //inicia dados na sessao
    $id = Auth::user()->id;
    $painel = new User();
    $data["painel"] = $painel = User::find($id);
    $data["anuncios"] = $plano = Anuncio::All();
    return view('corretor/anuncio_imovel', $data);
   }
//================================================
   public function paga_anuncio($id){

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

    return view('pgseguro/recebe_anuncio', $data);
   }
   //===============================linha tempo
   public function linhatempo(){
    return view('corretor/linhatempo');
   }
   //=======================================
   public function importarleads(){
   }

}
