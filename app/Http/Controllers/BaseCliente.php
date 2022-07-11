<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
class BaseCliente extends Controller
{

     public function base(){


          $this->inserir();

          echo'ok';

     }




    private function inserir($num_clientes = 30){

        //cliar cliente
        $user_ids =['2', '3'];
        $corretors = ['Demo Corretor', 'Demo Corretor' ];
        $nome_clientes = ['Joao Noite', 'Maria Lopes', 'Carlos Machado','Paulo Santos','Max Lopes','Maria Dias', 'Leticia Taborda','Murilo Lemos', 'Laiza Lemos', 'Larice Lemos','Guilerme Santos Maia', 'Renato taborda dias', 'Joao das Noite', 'Maria Silva Lopes', 'Eduardo de Machado', 'Laura Otto Santos', 'Maximiano Neves', 'Maria João Alves', 'Deise de Taborda','Roberta flores Lemos', 'Mariana Lemos', 'Clarice Matos Lemos', 'julia maria Santos', 'Renata dias'];

        $celular_clientes = ['(51) 87666-5443','(54) 98765-7654', '(53) 97765-7654', ''];
        $email_clientes = ['meu@email.com','aqui@email.com', 'fulano@email.com', 'fulano33@email.com', 'fulano2@email.com', ''];

        $renda_clientes = ['3.200,00','4.100,00','1.990,00', '7.430,00','5.200,00','1.100,00','2.990,00', '17.430,00'];
        $cidade_clientes = ['PORTO ALEGRE','ALVORADA','CANOAS','CURITIBA', 'NOVO HAMBURGO', 'ESTEIO'];
        $nascimento_clientes = ['08/07/1979','09/03/2011', '01/07/2001', '06/03/1981'];
        $bairro_interesse_clientes = ['FATIMA','CAVALHADA','BELA VISTA', 'Vila Fatima'];
        $empreendimento_clientes = ['Casa 3D', 'Casa 1D', 'Casa 2D', 'Terreno', 'Apartamento 1D', 'Apartamento 2D', 'Apartamento 3D', 'Loja', 'Sobrado', 'Casa em Condomíno', 'Loja'];

        $fgts_clientes = ['344333','8765', '8654', '43887', '8793'];

        $spc_clientes = ['SPC', 'JA_COMPROU', 'REPROVADO', 'DESISTIU','OUTROS','SEM_RENDA','SEM_RESPOSTA', 'INVESTIDOR', 'CONSTRUTOR', 'MCMV'];
        $nivel_clientes = ['QUENTE','FRIO', 'LEADS', 'VENDIDO', 'DOCUMENTOS','ANALISE', 'PENDENCIA'];
        $origem_clientes = ['Indicado', 'Roleta', 'Anuncio', 'Site', 'CAll', 'PDV', 'Facebook', 'Instagram'];
        $conversa_clientes = ['Agendou mas não foi ', 'visita confirmada ', 'Quer conhecer empreendimento, Agendou mas depois mudou data da visita, encaminei simulação, faltou documentos'];
        $controle_clientes = ['1'];
        $created_ats = ['2022-01-01 20:51:07','2022-01-21 20:51:07', '2022-02-11 20:51:07', '2022-05-17 20:51:07', '2022-04-21 20:51:07','2022-05-27 20:51:07', '2022-06-11 20:51:07', '2022-07-27 20:51:07'  ];
        $updated_ats = ['2022-01-01 20:51:07','2022-01-21 20:51:07', '2022-02-11 20:51:07', '2022-04-21 20:51:07', '2022-04-21 20:51:07','2022-05-27 20:51:07', '2022-06-11 20:51:07', '2022-07-27 20:51:07'  ];
        $ex_clientes = ['1'];

         $clientes = [];
         for ($i=1; $i <= $num_clientes; $i++){

             $user_id = $user_ids[rand(0,count($user_ids)-1)];
             $corretor = $corretors[rand(0,count($corretors)-1)];
             $nome_cliente = $nome_clientes[rand(0,count($nome_clientes)-1)];
             $celular_cliente = $celular_clientes[rand(0,count($celular_clientes)-1)];
             $email_cliente = $email_clientes[rand(0,count($email_clientes)-1)];

             $renda_cliente = $renda_clientes[rand(0,count($renda_clientes)-1)];
             $cidade_cliente = $cidade_clientes[rand(0,count($cidade_clientes)-1)];
             $nascimento_cliente = $nascimento_clientes[rand(0,count($nascimento_clientes)-1)];
             $bairro_interesse_cliente = $bairro_interesse_clientes[rand(0,count($bairro_interesse_clientes)-1)];
             $empreendimento_cliente = $empreendimento_clientes[rand(0,count($empreendimento_clientes)-1)];

             $fgts_cliente = $fgts_clientes[rand(0,count($fgts_clientes)-1)];

             $spc_cliente = $spc_clientes[rand(0,count($spc_clientes)-1)];
             $nivel_cliente = $nivel_clientes[rand(0,count($nivel_clientes)-1)];
             $origem_cliente = $origem_clientes[rand(0,count($origem_clientes)-1)];
             $conversa_cliente = $conversa_clientes[rand(0,count($conversa_clientes)-1)];
             $controle_cliente = $controle_clientes[rand(0,count($controle_clientes)-1)];
             $created_at = $created_ats[rand(0,count($created_ats)-1)];
             $updated_at = $updated_ats[rand(0,count($updated_ats)-1)];
             $ex_cliente = $ex_clientes[rand(0,count($ex_clientes)-1)];

             array_push($clientes, [
                  'user_id' => $user_id,
                  'corretor' => $corretor,
                  'nome_cliente' => $nome_cliente,
                  'celular_cliente' => $celular_cliente,
                  'coduni' => (random_int(9999999, 99999999)),
                  'email_cliente' => $email_cliente,

                  'renda_cliente' => $renda_cliente,
                  'cidade_cliente' => $cidade_cliente,
                  'nascimento_cliente' => $nascimento_cliente,
                  'bairro_interesse_cliente' => $bairro_interesse_cliente,
                  'empreendimento_cliente' => $empreendimento_cliente,

                  'fgts_cliente' => $fgts_cliente,

                  'etiqueta' => $spc_cliente,
                  'nivel_cliente' => $nivel_cliente,
                  'origem_cliente' => $origem_cliente,
                  'conversa_cliente' => $conversa_cliente,
                  'controle_cliente' => $controle_cliente,
                  'ex_cliente' => $ex_cliente,
                  'equipe_id' => '9999999',
                  'created_at' => $created_at,
                  'updated_at' => $updated_at



             ]);


         }

         //limpa tabela
         Client::truncate();

         // inserir cliente
         Client::insert($clientes);
     }


}


//<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
//<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
//{!! RecaptchaV3::initJs() !!}

//<div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
//<div class="col-md-6">
//    {!! RecaptchaV3::field('register') !!}
//    @if ($errors->has('g-recaptcha-response'))
//        <span class="help-block">
//            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
//        </span>
//    @endif
//</div>
//</div>
