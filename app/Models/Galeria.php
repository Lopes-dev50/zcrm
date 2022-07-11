<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;
    protected $primaryKey = "imovel_id";
    public $table = "galerias";
    protected $fillable = [
        'id',
        'imovel_id',
        'user_id',
        'galeria',
        'foto',

    ];
}
