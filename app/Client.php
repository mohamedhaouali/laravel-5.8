<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Client extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'clients';
    protected $fillable = ['nom','prenom','tel','cp','ville'];
    protected $hidden=['created_at','updated_at',];

}
