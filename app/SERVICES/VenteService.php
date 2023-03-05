<?php

namespace App\SERVICES;

use App\Models\Cart;
use App\Models\Endreco;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VenteService{
  
 
  public function ventes($product=[],User $user){
  try{
    DB::beginTransaction();
    $order=new Order();
    $order->order_ref="PEN".rand(1111,99999);
    $order->orderdate=Date('Y-m-d:H:i');
    $order->user_id=$user->id;
    $order->total=Imageservice::getTotal();
    $order->save();
    foreach($product as $p){
      $orderitem=new OrderItem();
      $orderitem->order_id=$order->id;
      $orderitem->product_id=$p->product_id;
      $orderitem->price=$p->product->desconte();
      $orderitem->quantity=$p->quantity;
      $orderitem->save();
    }
     DB::commit();
     return ['status'=>'ok','message'=>'pedido foi concluido com successo','idorder'=>$order->order_ref];
  }catch(Exception $e){
    Log::error('error',['fille'=>'VenteService.Vente','message'=>$e->getMessage()]);
     DB::rollBack();
      return ['status'=>'ok','message'=>'opa!!!! encontramos um problema com o servidor,tente novamente'];

  }



  }
  
  public static function getCart(){
    $cart=Cart::where('user_id',Auth::id())->get();
    return $cart;
  }


  public static function getOrder(){
    $order=Order::where('user_id',Auth::id())->get();
    return $order;
  }

  public static function destroyCart(){
    return Cart::where('user_id',Auth::id())->delete();
  }

  public static function updateproduct(){
    $p=Cart::where('user_id',Auth::id())->get();
    foreach($p as $i){
      $product=product::find($i->product_id);
      $product->quantity=$product->quantity-$i->quantity;
      $product->update();
    }

  }

  public static function details_order($id){
    $details=Orderitem::join("products", "products.id", "=", "order_items.product_id")
    ->where("order_id",$id)
    ->get(["products.*","order_items.price as valor",'order_items.*']);
    return $details;
  }

  public static function getUser(){
    return User::all();
  }
  public static function getEndereo($id){
    $details=Endreco::join("users", "users.id", "=", "endrecos.user_id")
    ->where("users.id",$id)
    ->get(["users.*",'endrecos.*']);
    return $details;
  }

  public static function getEndereopadrao(){
    $p=Endreco::where("user_id",Auth::id())
    ->where('statut','1')->get();
  
    return $p;
  }

  public static function countCart(){
    $cart=Cart::where('user_id',Auth::id())->count();
    return $cart;
  }

  /* !!!: 
  $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
  
  */ 
}