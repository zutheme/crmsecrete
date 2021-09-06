<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    //use HasFactory;
	protected $primaryKey = 'idexam';
    protected $fillable = ['examname','description','timeleft','iduser','trash','created_at','updated_at'];
}
