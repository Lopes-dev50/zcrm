<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aviso;
use App\Classes\Enc;
use App\Jobs\SemailMarkt;
use App\Models\Financ;
use App\Models\Suporte;
use App\Models\Plano;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;



class PainelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Enc = new Enc();

    }
          //=========================================
      //Exibir o recurso especificado.//lista planos
     public function painel($id)
     {
        $id = $this->Enc->desencriptar($id);

        $User = new User();
        $User = User::find($id);
        $data["user"] = $User;

         $resultados = new Financ();
         $data['valor'] = $resultados->where([
             ['user_id', '=', $id],
         ])->get();

               return view('painel', $data);
     }
      //=========================================
      //Exibir o recurso especificado.
      public function index()
      {
         $id = Auth::user()->id;
         $User = new User();
         $User = User::find($id);
         $data["user"] = $User;

         $plano = new Plano();
         $data["planos"] = $plano = Plano::All();

                return view('painel', $data);
      }
       //=========================================
      //escolher planos.
      public function escolherPlano()
      {
         $id = Auth::user()->id;
         $User = new User();
         $User = User::find($id);
         $data["user"] = $User;

         $plano = new Plano();
         $data["planos"] = $plano = Plano::All();

                return view('planos', $data);
      }
      //=========================================
      // Mostra o formulário para editar o recurso por id.
     public function painel_edit($id, Request $request)
     {
        $id = $this->Enc->desencriptar($id);

        $membro = User::find($id);
        $membro->name =  strip_tags($request->get('name'));
        $membro->CPF =  strip_tags($request->get('CPF'));
        $membro->celular =  strip_tags($request->get('celular'));
        $membro->creci =  strip_tags($request->get('creci'));
        $membro->cidade =  strip_tags($request->get('cidade'));
        $membro->onde =  strip_tags($request->get('onde'));

        $membro->save();

        $id = $this->Enc->encriptar(Auth::user()->id);

    return redirect()->route('painel', $id)->with('success', 'Atualizado com sucesso!');
     }
      //=========================================
     // Atualize o recurso especificado no banco.
     public function ativanot(Request $request, $id)
     {
        $id = $this->Enc->desencriptar($id);

        $User = new User();
        $User = User::find($id);
        $data["user"] = $User;

        return view('ativanot', $data);
     }
      //=========================================
      public function add_notifica($id)
     {
        $id = $this->Enc->desencriptar($id);

        DB::table('users')
        ->where('id', $id)
        ->update(['notifica' => 1]);

        $user = new User();
        $user = User::find($id);
        $data["user"] = $user;
        $ids = $this->Enc->encriptar($id);

        $smailData = [
            'chamado' => 'Ativar Notificações.',
            'title' => 'Olá! ' . $user->name,
            'body' => 'Falta pouco.',
            'body2' => 'Para confirmar recebimento das notificações.',
            'body3' => 'Click no botão abaixo.',
            'link' => 'https://www.crmcorretor.com.br/confirma_notifica/'.$ids,
            'bott' => 'Ativar notificações',
            'corretor' => 'CrmCorretor ',
            'rodape' => ' E-MAIL AUTOMATICO NÃO RESPONDA',
            'emailCorretor' => $user->email,
        ];
        SemailMarkt::dispatch($smailData)->delay(now()->addSeconds(15));

        return view('ativanot', $data);
     }
      //=========================================
      public function confirma_notifica($id)
     {
        $id = $this->Enc->desencriptar($id);

        DB::table('users')
        ->where('id', $id)
        ->update(['notifica' => 2]);

        $User = new User();
        $User = User::find($id);
        $data["user"] = $User;

        return view('ativanotok');
     }

}
