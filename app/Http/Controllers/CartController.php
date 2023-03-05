<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\SERVICES\Imageservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtocart(Request $request){
        $cart=new Cart();
        if(Auth::check()){
            $cart->user_id=Auth::id();
            $cart->quantity=1;
            $cart->product_id=$request->product_id;
            $cart->save();
           $count=Imageservice::countCart();

           return response()->json(['status'=>200,'message'=>'product has been add your cart','count'=>$count]);

        }else{
            return response()->json(['status'=>'400']);
        }
        return response()->json(['status'=>200,'message'=>'product has been add your cart','count'=>0]);

    }

    public function datacart(Request $request){
        $data=[];
        $datac=cart::where('user_id',Auth::id())->get();
        $data['data']=$datac;
        $data['total']=Imageservice::getTotal();
        return view('user.datacart',$data);
    }

    
    public function showcart(Request $request){
        return view('user.cart');
    }

    public function updatecart(Request $request){
        $cart=Cart::find($request->cart_id);
        if($request->d !=0){
            ++$cart->quantity;  
        }else{
          --$cart->quantity;  
        }
      
         $cart->update();
         return response()->json(['status'=>200]);

    }

    public function removecart(Request $request){
        $cart=Cart::find($request->cart_id);
         $cart->delete();
         return response()->json(['status'=>200]);

    }


    public function getTotal(){
        $data=[];
        $datap=Imageservice::getTotal();
        $count=Imageservice::countCart();
        $data['data']=$datap;
        $data['count']=$count;
        return response()->json($data);
    }


    public function deleteitemcart(Request $request){
        Cart::where('id',$request->cart_id)->delete();
        return response()->json(['status'=>200]);
    }
}
