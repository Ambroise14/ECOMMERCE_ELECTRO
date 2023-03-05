<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PolygoneController extends Controller
{
    public function chart(Request $request){
        $order=Order::select(DB::raw("COUNT(*) as count"))
                            ->whereYear('orderdate',date('Y'))
                            ->groupBy(DB::raw("Month(orderdate)"))
                            ->pluck("count");

        $months=Order::select(DB::raw("Month(orderdate) as month"))
                            ->whereYear('created_at',date('Y'))
                            ->groupBy(DB::raw("Month(orderdate)"))
                            ->pluck("month");
         $datas=array(0,0,0,0,0,0,0,0,0,0,0,0);     
         
         foreach($months as $index=>$month)
         {

             $datas[$month]=$order[$index];
         }

         return view('Frontend.chart',compact('datas'));

    }
}
