<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Commande extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'commande';
    protected $fillable = ['client','total','caissier'];
}
