<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    use HasFactory;


    protected $table = 'clients';
    protected $fillable = [
        'user_id',
        'equipe_id',
        'corretor',
        'coduni',
        'nome_cliente',
        'celular_cliente',
        'email_cliente',
        'renda_cliente',
        'cidade_cliente',
        'nascimento_cliente',
        'bairro_interesse_cliente',
        'empreendimento_cliente',
        'fgts_cliente',
        'etiqueta',
        'nivel_cliente',
        'origem_cliente',
        'conversa_cliente',
        'controle_cliente',
        'ex_cliente',

    ];
}
