<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class TestController extends Controller
{

    Public function __construct()
    {
    $this->middleware('VerifAge');
    }
    

    public function afficher_msg($age,$tel=null)
    {
        $all=Client::all();
        return view('msg',['all'=>$all,'tel'=>$tel,'age'=>$age]);
    }
}
