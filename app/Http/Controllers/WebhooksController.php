<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use SantiGraviano\LaravelMercadoPago\Facades\MP;
use Carbon\Carbon;
use MercadoPago;
use App\Models\Financ;
use App\Models\User;
use App\Models\Plano;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class WebhooksController extends Controller
{
    public function __invoke(Request $request)
    {

        $payment_id = $request->get('payment_id');

        $response = HTTP::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=APP_USR-2918293577668167-061710-afb97071ac434aa3d87f976bab9abd7a-1144559409");

       $response =  json_decode($response, true);

       $user_id =  $response['additional_info']['items'][0]['id'];
       $nivel = $response['additional_info']['items'][0]['category_id'];
       $dia = $response['additional_info']['items'][0]['description'];

       $status = $response['status'];

        if($status == 'approved'){

            Plano::where('user_id',$user_id)->update(array( 'status'=> $status));
            Plano::where('user_id',$user_id)->update(array( 'acesso' => $dia ));
            Financ::create([ 'pagamento' => 'Pago', 'user_id' => $user_id,  ]);

        if($nivel == 2){

            DB::table('model_has_permissions')
            ->where('model_id', $user_id)
            ->update(['permission_id' => '2 - gerente']);

            DB::table('users')
            ->where('id', $user_id)
            ->update(['plano' => 'Gerente']);
            return view('pgseguro/approved');
        //atualizar satados de toda equipe

        $gerente= new User();
        $gerente = User::find($user_id);

        foreach($gerente as $gerente):

        $painel = DB::table('users')->where('equipe_id', $gerente->equipe_id)->get();

        Plano::where('user_id',$painel->id)->update(array( 'acesso' => $dia ));

        endforeach;


        }
        if($nivel == 1){

            DB::table('model_has_permissions')
                  ->where('model_id', $user_id)
                  ->update(['permission_id' => '3 - corretor']);


            DB::table('users')
            ->where('id', $user_id)
            ->update(['plano' => 'Corretor']);

            return view('pgseguro/approved');

        }
       }
      //pagamento pendente
      if($status == 'pending'){
          return view('pgseguro/pending');
       }
       //pagamento negado
         if($status == 'failure'){
        return view('pgseguro/failure');
       }

}
}
