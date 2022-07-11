<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    public $table = "imovels";
    protected $casts =[
        'items' =>'array',
    ];
    protected $fillable = [
        'user_id',
        'equipe_id',
        'corretor',
        'nomeimovel',
        'endereco',
        'numero',
        'bairro',
        'CEP',
        'cidade',
        'estado',
        'tipo',
        'locarvender',
        'plantapronto',
        'fotocapa',
        'iptu',
        'quartos',
        'banheiros',
        'vaga',
        'items',
        'suite',
        'metragem',
        'texto',
        'video',
        'valor',
        'dono',
        'docs',
        'cod',
        'perto',
        'galeria',
        'imcorporadora',
        'valorcondominio',
        'destaque',
        'ativo',
        'visitas',
        'equipe_id',
        'created_at',
        'updated_at'
    ];
}
