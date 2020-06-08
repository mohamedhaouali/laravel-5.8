<?php

namespace App;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Categorie extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'categories';
    protected $fillable = ['libelle'];
}
