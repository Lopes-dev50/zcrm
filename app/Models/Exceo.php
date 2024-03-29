<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exceo extends Model
{
    use HasFactory;
    protected $primaryKey = "tenant_id";
    public $table = "clients";
    protected $fillable = [
            'tenant_id',
            'equipe_id',
            'corretor',
            'nome_cliente',
            'celular_cliente',
            'email_cliente',
            'renda_cliente',
            'cidade_cliente',
            'nascimento_cliente',
            'bairro_interesse_cliente',
            'empreendimento_cliente',
            'fgts_cliente',
            'situacao_cliente',
            'nivel_cliente',
            'origem_cliente',
            'conversa_cliente',
            'controle_cliente',
    ];
}
