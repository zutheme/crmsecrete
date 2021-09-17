<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attribute extends Model
{
     protected $primaryKey = 'idattribute';
     protected $fillable = ['idposttype','nameattribute','idstatustype','iduser','created_at','updated_at'];
}