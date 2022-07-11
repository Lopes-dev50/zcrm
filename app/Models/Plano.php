<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;
    protected $primaryKey = "user_id";
    public $table = "planos";
    protected $fillable = [
        'id',
        'user_id',
        'status',
        'acesso',


    ];
}
