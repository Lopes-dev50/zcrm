<?php

namespace App\Http\Controllers;
use SantiGraviano\LaravelMercadoPago\Facades\MP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Valor;
use App\Models\User;
use App\Models\Plano;
use MercadoPago;
use App\Classes\Enc;
use App\Classes\Logger;
use App\Models\Financ;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


require base_path('vendor/autoload.php');
// Adicione as credenciais
MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

class MpagoController extends Controller
{

    private $Enc;
    private $Logger;

 public function __construct()
 {
     $this->middleware('auth');
     $this->Enc = new Enc();
     $this->Logger = new Logger();
 }
//======================================
// RETONO DO MERCADO PAGO
  public function show($id){
  return view('pgseguro/pgok');
  }

  //======================================
// RETONO DO MERCADO PAGO
public function pay($id, Request $request){
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



//==========================================
// pagina escolha de tempo pagamento mesnsal semestral anual corretor
  public function pgcorretor(){

    $resultados = new Valor();
    $data['valor'] = $resultados->where([
      ['nivel', '=', 1],
    ])->get();

    return view('pgseguro/pgcorretor', $data);

  }
  //==========================================
// pagina escolha de tempo pagamento mesnsal semestral anual corretor
public function pggerente(){

    $resultados = new Valor();
    $data['valor'] = $resultados->where([
      ['nivel', '=', 2],
    ])->get();

    return view('pgseguro/pggerente', $data);

  }
//==============================================
//=============================================
// plano mensal 24,90
public function corretormes($id)
{
    $id = $this->Enc->desencriptar($id);

    $data['valor'] = Valor::find($id);
    $idu = Auth::user()->id;
    $data['user'] = User::find($idu);

  //  return view('pgseguro/pgpagamento', $data);
  return view('pgseguro/pgpagamento', $data);
}

//=============================================
// plano mensal 24,90
public function novogerente($id)
{
    $id = $this->Enc->desencriptar($id);

    $data['valor'] = Valor::find($id);
    $idu = Auth::user()->id;
    $data['user'] = User::find($idu);

    $novaequipe =rand(7777777, 8888888);
    User::where('id',$idu)->update(array( 'equipe_id' => $novaequipe ));
    User::where('id',$idu)->update(array( 'nivel' => 2 ));

  //  return view('pgseguro/pgpagamento', $data);
  return view('pgseguro/pgpagamento', $data);
}

//===================================================
//recebe dados do fromulario
public function pagamento(Request $request){

    $parsed_body = json_decode(file_get_contents('php://input'), true);

        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = $parsed_body['transaction_amount'];
        $payment->token = $parsed_body['token'];
        $payment->installments = 1;
        $payment->payment_method_id = $parsed_body['payment_method_id'];
        $payment->issuer_id = $parsed_body['issuer_id'];

        $payer = new MercadoPago\Payer();
        $payer->email = $parsed_body['payer']['email'];
        $payer->identification = array(
            "type" => $parsed_body['payer']['identification']['type'],
            "number" => $parsed_body['payer']['identification']['number']
   );

   $payment->payer = $payer;

   $payment->save();

   $response = array(
       'status' => $payment->status,
       'status_detail' => $payment->status_detail,
       'id' => $payment->id
   );
   echo json_encode($response);

        }

 //=======================================================
  public function pgrenovar()
  {

    $idu = Auth::user()->id;
    $data['user'] = User::find($idu);
    $resultados = new Valor();
    $data['valor'] = $resultados->where([
      ['nivel', '=', $data['user']->nivel],
    ])->get();
    return view('pgseguro/pgcorretor', $data);
  }

    }


















