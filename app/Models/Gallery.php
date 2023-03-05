<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table="galleries";
    protected $fillable=['name','product_id'];

    public function images(){
        return $this->hasMany(gallery::class);
    }

}
