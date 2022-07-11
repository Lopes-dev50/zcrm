<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CapturaController extends Controller
{
    public function ApiBuscaCorretor($id, Request $request) {

        if (User::where('user_id', $id)->exists()) {
            $corretor = User::where('user_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($corretor, 200);
          } else {
            return response()->json([
              "message" => "Corretor não encontrato"
            ], 404);
          }
        }

  //=========================cadastras leads do formulario

  public function ApiNovoLead($id, Request $request){


    $painel = new User();
    $data["painel"] = $painel = User::find($id);



   Client::create([

    'user_id' => $painel->user_id,
    'equipe_id' => $painel->equipe_id,
    'corretor' => $painel->corretor,
    'temperatura_cliente' => 'LEADS',
    'nome_cliente' => strip_tags($request->nome_cliente ?? 'Não Preenchido'),
    'celular_cliente' => strip_tags($request->celular_cliente ?? 'Não Preenchido'),
    'email_cliente' => strip_tags($request->email_cliente ?? ''),
    'cidade_cliente' => strip_tags($request->cidade_cliente ?? 'Não Preenchido'),
    'renda_cliente' => strip_tags($request->renda_cliente ?? 'Não Preenchido'),
    'nascimento_cliente' => strip_tags($request->nascimento_cliente ?? 'Não Preenchido'),
    'fgts_cliente' => strip_tags($request->fgts_cliente ?? 'Não Preenchido'),
    'conversa_cliente' => 'Estado cicvil?'. ' ' . strip_tags($request->civil) . ' ' . 'Tem dependente?'. ' ' . strip_tags($request->filhos) . ' ' .
    'Carteira Assinada?' . ' ' . strip_tags($request->CTLS) . ' ' . 'Vai juntar renda?' . ' ' . strip_tags($request->juntar) . ' ' .
     'Possui imóvel?' . ' ' . strip_tags($request->TemImovel) . ' ' . 'Tem restrição?' . ' ' . strip_tags($request->SPC)
     . ' ' . 'Valor do Imovel?' . ' ' . strip_tags($request->valorImovel)



]);
return redirect('https://crmcorretor.com.br/fm/sucesso/index.php?idc='.$painel->site );

 }

}
