<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $table = "events";
    protected $fillable = [
        'title', 'color', 'descrition', 'nome_cliente', 'nome_celular', 'email_corretor', 'prive', 'hora', 'start', 'end', 'user_id', 'equipe_id', 'corretor',
    ];
}
