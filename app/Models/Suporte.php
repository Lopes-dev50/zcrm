<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suporte extends Model
{
    use HasFactory;
    protected $table = 'suportes';
    protected $fillable = [
        'titulo',
        'texto',
        'video',

    ];
}
