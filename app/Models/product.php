<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    protected $table="products";
    protected $fillable=['ref','name','status','popular','image','price','description','category_id'];

    public function desconte(){
        return number_format($this->price*(1-30/100));
    }

    public function images(){
        return $this->hasMany(Gallery::class,'product_id','id');
    }
    public function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
}
