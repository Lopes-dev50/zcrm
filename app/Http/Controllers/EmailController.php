<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Classes\Enc;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Jobs\SemailMarkt;

class EmailController extends Controller
{

    private $Enc;


 public function __construct()
 {
     $this->middleware('auth');
     $this->Enc = new Enc();

 }

   public function index($id){

    $id = $this->Enc->desencriptar($id);
    $resultados = new Client();
    $data['clientes'] = $resultados->where([
        ['id', '=', $id]
    ])->get();
    //  dd($data);

   return view('corretor/emailunico', $data);

   }
//==========================================
   public function add_emailunico(Request $request){

    $id = Auth::user()->id;
    $resultados = new User();
    $corretor = $resultados->where([
        ['id', '=', $id]
    ])->get();
    foreach ($corretor as $corretor):

    endforeach;

    $smailData = [
        'chamado' => strip_tags($request->assunto),
        'title' => 'Olá! ' . strip_tags($request->nome_cliente),
        'body' => strip_tags($request->mensagem),
        'body2' => '',
        'body3' => 'Pode visitar meu site.',
        'link' => 'https://www.'.$corretor->subdomain.'.crmcorretor.com.br',
        'bott' => 'Visitar site',
        'corretor' => 'Corretor(a): '. $corretor->name,
        'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
        'emailCorretor' => strip_tags($request->email_cliente),
      ];
      SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));

      return redirect()->route('funil')->with('success', 'Email enviado com sucesso!');
   }
}
