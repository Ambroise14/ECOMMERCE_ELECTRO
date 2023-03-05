<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endreco extends Model
{
    protected $table='endrecos';
    protected $fillable=['endreco','cidade','cep','complement','estado','numero','telephone','newname','cpf'];
}
