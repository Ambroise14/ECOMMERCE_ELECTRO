<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\category;
use App\Models\commentaireProduct;
use App\Models\product;
use App\SERVICES\Imageservice;
use App\SERVICES\venteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function list(Request $request){
        $data=[];
        $cart=category::all();
        $product=product::all();
        $status=product::where('status','1')->get();
        $data['category']=$cart;
        $data['list']=$product;
        $data['status']=$status;
        return view('Frontend.liste2',$data);
    }

    public function description($id,Request $request){
               $data=[];
            if(product::where('id',$id)->exists()){
                $datai=product::find($id);
                $commentaire=commentaireProduct::where('product_id',$id)->get();
                $memecategory=product::where('category_id',$datai->category_id)->limit(24)->get();
                $data['data']=$datai;
                $data['cat']=$memecategory;
                $data['commentaires']=$commentaire;
            }
            return view('Frontend.description',$data);
        
    }

    public function filter(Request $request){
        $data=[];
        if($request->category_id!=0){
            $query=product::where('category_id',$request->category_id);

        }else{
            $query=product::limit(40);

        }
        $list=$query->get();
        $data['list']=$list;
        return view('sessions.filter',$data);
    }
    public function filterprice(Request $request){
        $data=[];
       
        if($request->min){
            $query=product::where('price','<=',$request->min);
        }
        
        $list=$query->get();
        $data['list']=$list;
        return view('sessions.filter',$data);
    }

    public function historico(Request $request){
        $data=[];
        $data['orders']=VenteService::getOrder();
        return view('compra.historico',$data);
    }

    public function details_order(Request $request){
        $data=[];
        $data['details']=venteService::details_order($request->order_id);
        $data['total']=Imageservice::getTotal();
        return view('compra.details',$data);

    }

    public function seach(Request $request){
        $EXPRESSIONREGULIERE=$request->mots;
        if($EXPRESSIONREGULIERE!=""){
            $query=product::where('name','LIKE','%'.$EXPRESSIONREGULIERE.'%');

        }else{
            $query=product::limit(8);
        }
        $product=$query->get();
      $resulta="";
      $resulta='<ul class="list-group" style="position:absolute;display:block;z-index:1;margin-left:0px;width:555px;decoration-style:none;margin-top:2px">';
      foreach($product as $row){
        $resulta.="<li class='list-group-item'><a href='/$row->id/description'>$row->name</a></li>";
     
      }
      $resulta.='</ul>';
      echo $resulta;
    }

    public function cartdata(){
            $data=Cart::where('user_id',Auth::id())->get();
            return view('sessions.cart',compact('data'));
    
    }

#

    public function filter_category_select($category_id,Request $request){
        $data=[];
       
        $status=product::where('status','1')->get();
       $cart= product::where('category_id',$category_id)->get();
        $data['status']=$status;
        $data['cat']=$cart;
        return view('Frontend.selectfilter',$data);
    }

    public function showmodal(Request $request){
        $show=product::join('categories','categories.id','=','products.category_id')
        ->where('products.id',$request->product_id)
        ->first(['products.*','categories.name as n']);
      return view('sessions.datamodal',compact('show'));
    }
}
