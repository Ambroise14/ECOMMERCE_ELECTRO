<?php

namespace App\SERVICES;

use App\Models\Cart;
use App\Models\Gallery;
use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class Imageservice{

    public function Upload(UploadedFile $file,$path){
      $name=$file->getClientOriginalName();
      $file->move($path,$name);

    }

    public function multipleFile($file=[],$path,product $product,Model $model){
      foreach($file as $key=>$files){
        $name=time().'.'.$key.$files->getClientOriginalName();
        $files->move($name,$path);
        $mod=new $model;
        $mod->name=$name;
        $mod->product_id=$product->id;
        $mod->save();
      }
    }
   public static function getTotal(){
  $cart=Cart::where('user_id',Auth::id())->get();
  $total=0;
  foreach($cart as $c){
    $total+=$c->product->desconte()*$c->quantity;
  }
  return $total;
}

public static function getCart(){
  $cart=Cart::where('user_id',Auth::id())->get();
  return $cart;
}

public static function countCart(){
  $cart=Cart::where('user_id',Auth::id())->count();
  return $cart;
}

}
