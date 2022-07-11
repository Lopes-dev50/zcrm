<?php

namespace App\Exports;
use App\Models\Exceo;
use Illuminate\Support\Facades\Auth;
use App\Classes\Enc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExcelsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'CADASTRADO',
            'CLIENTE',
            'CELULAR',
            'E-MAIL',
            'RENDA',
            'CIDADE',
            'NASCIMENTO',
            'CONVERSA'
        ];
    }






    public function collection()
    {
        $id = Auth::user()->id;

        return Exceo::select("created_at", "nome_cliente", "celular_cliente", "email_cliente", "renda_cliente", "cidade_cliente", "nascimento_cliente", "conversa_cliente")->where('user_id', $id)->get();

    }
}


