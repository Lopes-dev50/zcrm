<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Imovel;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Classes\Enc;
use Illuminate\Http\Request;
use App\Classes\Logger;
use App\Models\Site;

use PhpParser\Node\Stmt\Foreach_;


class FerramentasController extends Controller
{

    private $Enc;
    private $Logger;

 public function __construct()
 {
     $this->middleware('auth');
     $this->Enc = new Enc();
     $this->Logger = new Logger();
 }


    public function index(){

        $id = Auth::user()->id;
        $painel = new User();
        $data["corretor"] = $painel = User::find($id);
        return view('corretor/lista_ferramentas', $data);
    }
//====================================================================
    public function formulario(Request $request, $id){

        $this->Logger->log('info', 'Ativou Pagina de Leads');

        $id = $this->Enc->desencriptar($id);
        function generatePassword($qtyCaraceters = 6)
      {
      //Letras minúsculas embaralhadas
      $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
      //Letras maiúsculas embaralhadas
      $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
      //Números aleatórios
      $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
      $numbers .= 1234567890;
      //Caracteres Especiais
     // $specialCharacters = str_shuffle('!@#$%*-');
      //Junta tudo
      $characters = $capitalLetters.$smallLetters.$numbers;
      //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
      $password = substr(str_shuffle($characters), 0, $qtyCaraceters);
      //Retorna a senha
      return $password;
  }
  $pasta = generatePassword();//Resultado aleatório com 8 caraceters

mkdir('fm/'."$pasta/", 0755 );
echo "";
echo "<br>";

// Cria um arquivo .php dentro da pasta que foi criada no diretório atual
$idc = $id;
$php = '<?php $idc = '. $idc. ';
include("../oformulario.php");
?>
';

$arquivo = fopen('fm/'. $pasta . '/index.php','w+');
fwrite($arquivo,$php);
fclose($arquivo);
//copias os arquivos

$corretor = User::find($id);
$corretor->pgcaptura =  $pasta;
$corretor->save();
$painel = new User();
$data["corretor"] = $painel = User::find($id);

return view('corretor/lista_ferramentas', $data);
    }

//================================================================
    public function gerasite(Request $request){

        $this->Logger->log('info', 'Ativou Site Padrão');
//// cria site
        $site =  strip_tags($request->get('site'));
        $id = Auth::user()->id;
        $count = Site::where('subdomain',$site)->count();

        if ($count != 1 ) {

            $site =  strip_tags($request->get('site'));

        Site::create([
            'user_id' => $id,
            'subdomain' =>  $site,
            'slug' =>  $site,
        ]);

        $cliente = User::find($id);
        $cliente->subdomain =  $site;
        $cliente->save();

        $id = Auth::user()->id;
        $painel = new User();
        $data["corretor"] = $painel = User::find($id);

        return view('corretor/lista_ferramentas', $data);
 }else{
//// site ja exixte
        $painel = new User();
        $data["corretor"] = $painel = User::find($id);
        $id = $this->Enc->encriptar(Auth::user()->id);
        return redirect()->route('ferramentas',$id)->with('success', 'Nome em uso escolha outro!');
 }
    }
//=====================configura site
public function configura_site($id, Request $request){

    $id = $this->Enc->desencriptar($id);

    $resultados = new Site();
    $data['site'] = $resultados->where([
        ['User_id', '=', $id]
    ])->get();

    return view('corretor/configura_site', $data);
}
//====================================edita site
public function configura_site_edit($id, Request $request){

    $this->Logger->log('info', 'Atualizou Site');
    $id = $this->Enc->desencriptar($id);
        $User = Site::find($id);
        $User->name =  strip_tags($request->get('name'));
        $User->fabebookusuario =  strip_tags($request->get('fabebookusuario'));
        $User->instagramusuario =  strip_tags($request->get('instagramusuario'));
        $User->youtubeusuario =  strip_tags($request->get('youtubeusuario'));
        $User->pix =  strip_tags($request->get('pix'));
        $User->cor =  strip_tags($request->get('cor'));
        $User->sobre =  strip_tags($request->get('sobre'));
        $User->sobretexto =  strip_tags($request->get('sobretexto'));
        $User->save();

        if($request->file('image')){
            $file= $request->file('image');
         //   $filename = Image::make($file)->resize(400, 400);
            $filename= date('YmdHi');

            $file = $request->file('image')->storeAs('site', $filename);

            $User->logo =  $filename;
            $User->save();
        }

        $resultados = new Site();
        $data['painel'] = $resultados->where([
            ['User_id', '=', $id]
        ])->get();

        $id = $this->Enc->encriptar(Auth::user()->id);

    return redirect()->route('configura_site',$id)->with('success', 'Atualizado com sucesso!');
}

}
