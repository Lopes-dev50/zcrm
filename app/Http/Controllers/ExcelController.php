<?php

namespace App\Http\Controllers;

use App\Models\Exceo;

use Illuminate\Http\Request;
use App\Exports\ExcelsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Classes\Logger;

class ExcelController extends Controller
{


    private $Logger;

 public function __construct()
 {
     $this->middleware('auth');

     $this->Logger = new Logger();
 }



    public function index()
    {
        $users = Exceo::get();

        return view('clientes', compact('clientes'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export(Request $request)
    {

        $this->Logger->log('info', 'Baixou lista em Excel');

        return Excel::download(new ExcelsExport, 'Clientes.xlsx');

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
   //     Excel::import(new ExcelsImport,request()->file('file'));

        return back();
    }
}
