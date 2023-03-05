<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
public function sendmail(){
    $nickiminaj="bell";
    Mail::to("gleudesdmedeiros@gmail.com")->send(new SignUp($nickiminaj));
    return "success";
}
}
