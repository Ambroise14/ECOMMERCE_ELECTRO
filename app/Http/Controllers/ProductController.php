<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\commentaireProduct;
use App\Models\Gallery;
use App\Models\product;
use App\SERVICES\Imageservice;
use Illuminate\Http\Request;

class ProductController extends Controller

{  
    
    public function product(Request $request){
         $data=[];
        if($request->isMethod("post")){
            $request->validate(['ref'=>'required','name'=>'required','image'=>'required']);
            $product=new product();
            $values=$request->all();
            $product->fill($values);
            $product->category_id=$request->category;
            $product->image=$request->file('image')->getClientOriginalName();
            $service=new Imageservice();
            $path="image/product";
            $service->Upload($request->file('image'),$path);
            $product->save();
      
          if($request->hasFile('photos')){
            foreach($request->file('photos') as $key=>$files){
                $mod=new Gallery();
                $name=time().'.'.$key.$files->getClientOriginalName();
                $mod->name=$name;
                $mod->product_id=$product->id;
                $files->move($path,$name);
                $mod->save();
              }
          }
            $request->session()->flash('success','Enregistrement effectué avec success');
            return back();
        }
        $listcategory=category::all();
        $data['list']=$listcategory;
        return view('product.create',$data);
}

public function commentaire(Request $request){
    $values=$request->all();
    $commentaire=new commentaireProduct();
    $commentaire->fill($values);
    $commentaire->save();

  return back();
}
}
