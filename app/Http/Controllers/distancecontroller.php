<?php

namespace App\Http\Controllers;

use App\Models\adresse;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class distancecontroller extends Controller
{
    public function vu(){
        return view('distance');
    }

    public function d(Request $request){
        $store=new store();
        $store->name=$request->name;
        $store->latitude=$request->lat;
        $store->longitude=$request->lon;
        $store->save();
    
        return back();
    }
    public function all(Request $request){
     
        $stores= DB::table('stores')
        ->select('name', 'latitude', 'longitude', DB::raw(sprintf(
            '(6371 * acos(cos(radians(%1$.7f)) * cos(radians(latitude)) * cos(radians(longitude) - radians(%2$.7f)) + sin(radians(%1$.7f)) * sin(radians(latitude)))) AS distance',
            $request->input('lat'),
            $request->input('lon') 
        )))
       
        ->get();

       return response()->json($stores);
        //return view('data',compact('stores'));  
    }

    public function reg(){
        return view('registerphama');
    }

 
}
