<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  //protected $dates=['orderdate'];
  public function product(){
    return $this->belongsTo(product::class);
  }
  public function user(){
    return $this->belongsTo(User::class);
  }

  public function decision(){
    $status="";
    switch($this->status){
      case 'PEN':$status="PENDENTE" ;break;
      case 'APR':$status="APROVADO" ;break;
      case 'CAN':$status="CANCELADO" ;break;
      case 'REN':$status="RECURSADO" ;break;
    }
    return $status;
  }
}
