<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Classes\Enc;

use Illuminate\Support\Facades\DB;


class GraficoController extends Controller
{

    private $Enc;


 public function __construct()
 {
     $this->middleware('auth');
     $this->Enc = new Enc();

 }
///=========================================
   public function grafico_mes(Request $request){

    $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count', 'month_name');

        $labels = $users->keys();
        $data = $users->values();

      return view('admin/grafico_admin', compact('labels', 'data',) );
   }
   ///=========================================
   public function grafico_Client_mes(Request $request){

    $users = Client::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count', 'month_name');

        $labels = $users->keys();
        $data = $users->values();

      return view('admin/grafico_admin', compact('labels', 'data',) );
   }
//========================================================================
   public function grafico_ano(Request $request){

    $members = User::select(DB::raw("COUNT(*) as count"), DB::raw("YEAR(created_at) as year_name"))
    // ->whereYear('created_at', date('Y'))
    ->groupBy(DB::raw("Year(created_at)"))
    ->pluck('count', 'year_name');

    $labels = $members->keys();
    $data = $members->values();

    return view('admin/grafico_admin', compact('labels', 'data'));

   }
//============================================================================
   public function ListaPorEquipe($id, Request $request){

    $id = $this->Enc->desencriptar($id);

    $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
    ->where('equipe_id', '=', $id )->whereYear('created_at', date('Y'))
    ->groupBy(DB::raw("Month(created_at)"))
    ->pluck('count', 'month_name');

$labels = $users->keys();
$data = $users->values();

    return view('admin/BuscaPorEquipe', compact('labels', 'data'));

   }

}
