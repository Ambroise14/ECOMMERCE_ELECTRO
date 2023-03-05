<?php

namespace App\SERVICES;

use App\Models\Endreco;
use Illuminate\Support\Facades\Auth;

class Options{
  public static function  getAdresse(){
    if(Auth::check()){
      $data=Endreco::join('users','users.id','=','endrecos.user_id')
      ->where('user_id',Auth::id())
      ->get(['endrecos.*','users.*']);
      return $data;
    }

  }
  public function getorder(){
    
  }
}