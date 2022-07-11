<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    public $table = "sites";

    protected $fillable = [
        'user_id',
         'subdomain',
         'slug'

    ];
}
