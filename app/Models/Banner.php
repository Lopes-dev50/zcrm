<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    public $table = "banners";
    protected $fillable = [
        'id',
        'valor',
        'frase',

    ];
}
