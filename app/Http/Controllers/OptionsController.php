<?php

namespace App\Http\Controllers;

use App\Models\Endreco;
use App\SERVICES\Options;
use App\SERVICES\venteService;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class OptionsController extends Controller
{
    public function optionsp(){
        return view('options.home');
    }
    public function getAdressep(Request $request){
        $data=[];
        $servicesoption=Options::getAdresse();
        $data['data']=$servicesoption;
        return view('options.getadresse',$data);
    }

    public function getOrder(Request $request){
        $data=[];
        $servicesoption=VenteService::getOrder();
        $data['data']=$servicesoption;
        return view('options.getorder',$data);
    }

    public function addnewadress(){
        return view('options.addnewadress');

    }
    public  function addnewadressdata(Request $request){
        
          if(!$request->name){
            return response()->json(['status'=>400,'message'=>'name obrigatoire']);
          }else if(!$request->cpf){
            return response()->json(['status'=>401,'message'=>'cpf obrigatoire']);

          }else if(!$request->cep){
            return response()->json(['status'=>402,'message'=>'cep obrigatoire']);

          }else if(!$request->numero){
            return response()->json(['status'=>403,'message'=>'numero obrigatoire']);

          }else if(!$request->estado){
            return response()->json(['status'=>404,'message'=>'estado obrigatoire']);

          }else if(!$request->cidade){
            return response()->json(['status'=>405,'message'=>'cidade obrigatoire']);

          }else{
            $values=$request->all();
            $endereco=new Endreco($values);
            $endereco->newname=$request->name;
            $endereco->user_id=Auth::id();
            $endereco->save(); 
            return response()->json(['status'=>200,'message'=>"success"]);

          }
         
    }
    public function showadresse($idadresse,Request $request){
      $data=Endreco::find($idadresse);
      
      return view('options.editadresse',compact('data'));
    }

    public function editadresse($idadresse,Request $request){
      $data=Endreco::find($idadresse);
      $data->cpf=$request->cpf;
      $data->newname=$request->name;
      $data->numero=$request->numero;
      $data->cidade=$request->cidade;
      $data->endreco=$request->endreco;
      $data->complement=$request->complement;
      $data->estado=$request->estado;
      $data->update();
      return redirect()->route('pagar');
    
    }
}
