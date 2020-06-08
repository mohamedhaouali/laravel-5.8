<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DeatilsCommande extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'detailscommande';
    protected $fillable = ['numcommande','produit','pu','qte'];
}
