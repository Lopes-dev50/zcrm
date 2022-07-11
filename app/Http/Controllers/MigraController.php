<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class MigraController extends Controller
{
    public function busca(){

        $idc = 13;
        $response = HTTP::get("https://zimb.com.br/apicliente/" );

        $response  =  json_decode($response, true);





        dd($response);


    }




    public function insere(){






    }
}
