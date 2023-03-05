<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\SERVICES\Imageservice;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(Request $request){
        if($request->isMethod("post")){
            $request->validate(['ref'=>'required','name'=>'required','image'=>'required']);
            $values=$request->all();
            $category=new category();
            $category->fill($values);
            $category->image=$request->file('image')->getClientOriginalName();
            $service=new Imageservice();
            $path="image/category";
            $service->upload($request->file('image'),$path);
            $category->save();
        }
        return view('category.create');
    }
}
