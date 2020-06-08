<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Produit extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'produits';
    protected $fillable = ['libelle','cat','desc','qte','pu'];
}
