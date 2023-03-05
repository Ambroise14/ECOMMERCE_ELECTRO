<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\distancecontroller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\PolygoneController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('send',[EmailController::class,'sendmail']);
Route::get('luana2',function(){
  return view('base2');
});
Route::get('passage',function(){
  return view('passagem');
});
Route::get('toto',function(){
  return view('todo');
});
Route::match(['get','post'],'category',[CategoryController::class,'category'])->name('category.methodes');
Route::match(['get','post'],'product',[ProductController::class,'product'])->name('product.methodes');
Route::match(['get','post'],'user',[UserController::class,'user'])->name('user.methodes');
Route::match(['get','post'],'logar',[UserController::class,'logar'])->name('user.logar');
Route::match(['get','post'],'logout',[UserController::class,'logout'])->name('user.logout');
Route::match(['get','post'],'alluser',[UserController::class,'alluser'])->name('user.all');
Route::match(['get','post'],'details_endereco_user',[UserController::class,'details_endereco_user'])->name('details_endereco_user');


Route::get('distancee',[distancecontroller::class,'vu']);
Route::post('distance1',[distancecontroller::class,'d'])->name('distance');
Route::post('all',[distancecontroller::class,'all'])->name('all');
Route::get('reg',[distancecontroller::class,'reg']);



Route::match(['get','post'],'/',[FrontendController::class,'list'])->name('/');

Route::match(['get','post'],'/{id}/description',[FrontendController::class,'description'])->name('description');

Route::match(['get','post'],'filterajax',[FrontendController::class,'filter'])->name('filter');

Route::match(['get','post'],'addtocart',[CartController::class,'addtocart'])->name('addtocart');

Route::match(['get','post'],'datacart',[CartController::class,'datacart'])->name('datacart');

Route::match(['get','post'],'showcart',[CartController::class,'showcart'])->name('showcart');

Route::match(['get','post'],'updatecart',[CartController::class,'updatecart'])->name('updatecart');

Route::match(['get','post'],'pagar',[PayementController::class,'payement'])->name('pagar');

Route::match(['get','post'],'removecart',[CartController::class,'removecart'])->name('removecart');

Route::match(['get','post'],'historico',[FrontendController::class,'historico'])->name('historico');

Route::match(['get','post'],'details_order',[FrontendController::class,'details_order'])->name('details_order');

// search
Route::match(['get','post'],'seach',[FrontendController::class,'seach'])->name('seach');
// commentaire sur un produit
Route::post('commentaire',[ProductController::class,'commentaire'])->name('commentaire');

// cart ajax


Route::match(['get','post'],'cartdata',[FrontendController::class,'cartdata'])->name('cartdata');
Route::match(['get','post'],'countcart',[userController::class,'countcart'])->name('countcart');


Route::match(['get','post'],'deleteitemcart',[cartController::class,'deleteitemcart'])->name('deleteitemcart');

Route::match(['get','post'],'/{category_id}/filter_category_select',[FrontendController::class,'filter_category_select'])->name('filter_category_select');

// show product in modal


Route::match(['get','post'],'showmodal',[FrontendController::class,'showmodal'])->name('showmodal');

// get total cart of user login
Route::match(['get','post'],'getTotal',[cartController::class,'getTotal'])->name('getTotal');

Route::match(['get','post'],'optionsp',[OptionsController::class,'optionsp'])->name('optionsp');

Route::match(['get','post'],'getAdresse',[OptionsController::class,'getAdressep'])->name('getAdresse');
Route::match(['get','post'],'/{idadresse}/showadresse',[OptionsController::class,'showadresse'])->name('showadresse');

Route::match(['get','post'],'/{idadresse}/editadresse',[OptionsController::class,'editadresse'])->name('editadresse');


Route::match(['get','post'],'getOrder',[OptionsController::class,'getOrder'])->name('getorder');


Route::match(['get','post'],'add-new-adress-formulaire',[OptionsController::class,'addnewadress'])->name('add-new-adress');
Route::match(['get','post'],'add-new-adress-data',[OptionsController::class,'addnewadressdata'])->name('add-new-adressdata');



Route::match(['get','post'],'chart',[PolygoneController::class,'chart'])->name('chart');








