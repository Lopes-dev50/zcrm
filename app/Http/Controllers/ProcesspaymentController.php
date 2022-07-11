<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use SantiGraviano\LaravelMercadoPago\Facades\MP;
use Carbon\Carbon;
use MercadoPago;

class ProcesspaymentController extends Controller
{
    public function __invoke(Request $request)
    {



        require base_path('vendor/autoload.php');
   // Adicione as credenciais
   MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

   $payment = new MercadoPago\Payment();
   $payment->transaction_amount = (float)$_POST['transactionAmount'];
   $payment->token = $_POST['token'];
   $payment->description = $_POST['description'];
   $payment->installments = (int)$_POST['installments'];
   $payment->payment_method_id = $_POST['paymentMethodId'];
   $payment->issuer_id = (int)$_POST['issuer'];

   $payer = new MercadoPago\Payer();
   $payer->email = $_POST['cardholderEmail'];
   $payer->identification = array(
       "type" => $_POST['identificationType'],
       "number" => $_POST['identificationNumber']
   );
   $payer->first_name = $_POST['cardholderName'];
   $payment->payer = $payer;

   $payment->save();

   $response = array(
       'status' => $payment->status,
       'status_detail' => $payment->status_detail,
       'id' => $payment->id
   );
   echo json_encode($response);
    }
}

