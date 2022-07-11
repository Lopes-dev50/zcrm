<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Classes\Enc;
use App\Models\Event;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class AgendarVisitaController extends Controller
{

    private $Enc;

    public function __construct()
    {
        $this->middleware('auth');
        $this->Enc = new Enc();
    }
//=======================================
    public function index(){

        $id = Auth::user()->id;

        $resultados = new Event();
        $data['event'] = $resultados->where([
            ['user_id', '=', $id],

        ])->get();

        return view('corretor/agenda_corretor', $data);
    }
//================================================================
    public function store(Request $request)
    {
      // dd($request);
        $id = Auth::user()->id;
        $painel = new User();
        $data["painel"] = $painel = User::find($id);

              $titulo = htmlspecialchars( $request->title);
              $descricao = htmlspecialchars( $request->descrition);

              $event = Event::create([
                  'title' => $titulo,
                  'descrition' => $descricao,
                  'color' => strip_tags($request->color),
                  'hora' => strip_tags($request->hora),
                  'start' => date('Y/m/d H:i', strtotime($request->inicio .''. $request->hora)),
                  'end' => date('Y/m/d H:i', strtotime($request->inicio .''. $request->hora)),
                  'user_id' => $id,
                  'equipe_id' => $painel['equipe_id'],
                  'corretor' => $painel['name'],
                  'email_corretor' => $painel['email'],
              ]);

        $id = $this->Enc->encriptar(Auth::user()->id);
        return redirect()->route('agenda_cliente',$id)->with('success', 'Cliente CADASTRADO com sucesso!');
    }
//==========================================================
    public function update(Request $request)
    {

     $id= $request->get('id');
     $dele = $request->get('delete');
     $event = Event::find($id);
     $event->title =  htmlspecialchars($request->get('title'));
     $event->descrition = htmlspecialchars($request->get('descrition'));
     $event->color =  strip_tags($request->get('color'));
     $event->start = date('Y/m/d H:i', strtotime(strip_tags($request->get('inicio')) .''. strip_tags($request->get('hora'))));
     $event->end =  date('Y/m/d H:i', strtotime(strip_tags($request->get('inicio')) .''. strip_tags($request->get('hora'))));
     $event->save();

       if($dele != ''){

       $event = Event::findOrFail($id);
       $event->delete();

       }
       $id = Auth::user()->id;
        $painel = new User();
        $data["painel"] = $painel = User::find($id);

        $id = $this->Enc->encriptar(Auth::user()->id);
        return redirect()->route('agenda_cliente',$id)->with('success', 'Cliente CADASTRADO com sucesso!');
    }

//============================================================
    public function visita(Request $request, $id)
    {
      // dd($request);
      $idc = $this->Enc->desencriptar($id);

      $titulo = $request->color;

      $titulos = ($titulo == '#008000') ? 'visita' : 'Ligar';

        $id = Auth::user()->id;

        $painel = new User();
        $data["painel"] = $painel = User::find($id);

        $cliente = new Client();
        $data["cliente"] = $cliente = Client::find($idc);


        $event = Event::create([
                  'title' => $titulos,
                  'descrition' => $request->descrition . ' - ' . $cliente->nome_cliente .' - ' . $cliente->celular_cliente,
                  'color' => $request->color,
                  'hora' => $request->hora,
                  'start' => date('Y/m/d H:i', strtotime($request->inicio .''. $request->hora)),
                  'end' => date('Y/m/d H:i', strtotime($request->inicio .''. $request->hora)),
                  'nome_cliente' => $cliente->nome_cliente,
                  'nome_celular' => $cliente->celular_cliente,
                  'prive' => 1,
                  'user_id' => $id,
                  'equipe_id' => $painel['equipe_id'],
                  'corretor' => $painel['name'],
                  'email_corretor' => $painel['email'],
              ]);

        $id = $this->Enc->encriptar(Auth::user()->id);
        return redirect()->route('funil_corretor',$id)->with('success', 'CADASTRADO com sucesso!');
    }

}

