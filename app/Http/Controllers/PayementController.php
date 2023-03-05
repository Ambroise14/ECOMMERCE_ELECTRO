<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\SERVICES\Imageservice;
use App\SERVICES\venteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PagSeguro\Configuration\Configure;

class PayementController extends Controller
{
    private $parameters;
    public function __construct()
    {
       $this->parameters=new Configure();
       $this->parameters->setCharset("utf-8");
       $this->parameters->setAccountCredentials(env("email"),env("token"));
       $this->parameters->setEnvironment(env("nature"));
       $this->parameters->setLog(true,storage_path("logs/pagseguro".date("d-m-Y").'log'));
       
    }

    public function lesParametres(){
        return $this->parameters->getAccountCredentials();
    }

    public function payement(Request $request){
            $data=[];
            if($request->isMethod("post")){
                $cart=venteService::getCart();
                $venteservice=new venteService();
            $result=$venteservice->ventes($cart,Auth::user());
            if($result['status']=='ok'){
                $transmissiondonne=new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
                $transmissiondonne->setReference("PEN");
                $transmissiondonne->setCurrency("BRL");
                //Les produits de la commande
                foreach($cart as $c){
                $transmissiondonne->addItems()->withParameters(
                    $c->product_id,
                    $c->product->name,
                    $c->quantity,
                    number_format($c->product->desconte(),2,".",""),
                );

            }
                $user=Auth::user();
                // donnee personnelles de client
                $transmissiondonne->setSender()->setName($user->name."".$user->name);
                $transmissiondonne->setSender()->setEmail($user->cpf.'@sandbox.PagSeguro.com.br');
                $transmissiondonne->setSender()->setHash($request->input("hasheller"));
                $transmissiondonne->setSender()->setPhone()->withParameters(84,998087249);
                $transmissiondonne->setSender()->setDocument()->withParameters("CPF",$user->cpf);

                // adresse de client
                $transmissiondonne->setShipping()->setAddress()->withParameters(
                'AV .A',
                '1234',
                'PIRANGI DO NORTE' ,
                '59161250',
                'RIO DE JANEIRO',
                'RJ',
                 'BRA',
                'Apt-4'
                );

            // adrresse de cartao

                $transmissiondonne->setBilling()->setAddress()->withParameters(
                    'AV .A',
                    '1234',
                    'PIRANGI DO NORTE',
                    '59161250',
                    'RIO DE JANEIRO',
                    'RJ',
                     'BRA',
                    'Apt-4'
                );
                $transmissiondonne->setToken($request->input("cardtoken"));
                $parcela=$request->input("parcela");
                $totalapagar=$request->input("totalapagar");
                $totalparcela=$request->input("totalparcela");
                $transmissiondonne->setInstallment()->withParameters($parcela,number_format($totalparcela,2,".",""));
               // $credcard->setInstallment()->withParameters($nparcela,number_format($totalparcela,2,".",""));
                // Donnees de cartao

                $transmissiondonne->setHolder()->setName("AMBROISE DIDIE");
                $transmissiondonne->setHolder()->setDocument()->withParameters("CPF",$user->cpf);
                $transmissiondonne->setHolder()->setBirthDate("04/08/1990");
                $transmissiondonne->setHolder()->setPhone()->withParameters(84,998087249);
                $transmissiondonne->setMode("DEFAULT");
                $result=$transmissiondonne->register($this->lesParametres());
                //update
                $venteservice->updateproduct();
                // destroy item cart 
               // $venteservice->destroyCart();
                return response()->json(['status'=>200,'message'=>'merci mon Dieu']);
            }
           
         }
                $code=\PagSeguro\Services\Session::create($this->lesParametres());
                $identifiant=$code->getResult();
                $data['identifiant']=$identifiant;
                $data['total']=Imageservice::getTotal();
                $data['adressepadraos']=VenteService::getEndereopadrao();
                return view('compra.pagar',$data);
    }
}
