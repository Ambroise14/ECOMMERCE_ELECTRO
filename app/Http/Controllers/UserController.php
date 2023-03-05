<?php

namespace App\Http\Controllers;

use App\Models\Endreco;
use App\Models\User;
use App\SERVICES\venteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(Request $request){
        if($request->isMethod("post")){
            $request->validate(['cpf'=>'required','name'=>'required','numero'=>'required','estado'=>'required','endreco'=>'required','password'=>'required','telephone'=>'required']);
            $values=$request->all();
            $user=new User();
            $user->fill($values);
            $user->password=Hash::make($request->password);
            $user->save();
            $endereco=new Endreco($values);
            $endereco->user_id=$user->id; 
            $endereco->newname=$user->name;
            $endereco->statut=1;
            $endereco->save();
            $credentials=['cpf'=>$request->cpf,'password'=>$request->password];
            if(Auth::attempt($credentials)){
               return redirect('/');
            }else{
                $request->session()->flash('danger',"mot de passe ou login invalido");
            }

        }
        return view('user.create');
    }

    public function logar(Request $request){
        if($request->isMethod("post")){
            $request->validate(['cpf'=>'required','password'=>'required']);
            $credentials=['cpf'=>$request->cpf,'password'=>$request->password];
            if(Auth::attempt($credentials)){
               return redirect('/');
            }else{
                $request->session()->flash('danger',"mot de passe ou login invalido");
            }

        }
        return view('user.logar');

    }

    public function logout(){
        Auth::logout();
        return back();
    }


    public function alluser(){
        $data=[];
        $data['users']=venteService::getUser();
        return view('user.list',$data);
    }

    public function details_endereco_user(Request $request){
        $data=[];
        $data['details']=venteService::getEndereo($request->user_id);
        return view('user.detail',$data);
    }

    public function countcart(){
        $count=VenteService::countCart();
        return $count;
    }
  
}
