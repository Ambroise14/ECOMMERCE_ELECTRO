<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentaireProduct extends Model
{
    protected $table="commentaire_products";
    protected $fillable=['product_id','name','commentaire'];
}
