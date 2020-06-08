<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clients extends Controller
{
   public function insertion(){
    $clt = new App\Client();
    $clt->name = 'Med';
    $clt->tel = 21699439357;
    $clt->save();
    return ('Ok insertion éffectuer');
   }
}
