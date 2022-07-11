<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financ extends Model
{
    use HasFactory;
    protected $primaryKey = "user_id";
    public $table = "financs";
    protected $fillable = [
        'id',
        'user_id',
        'pagamento',



    ];
}
