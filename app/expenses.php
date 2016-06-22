<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    protected $table="expenses";
    protected $fillable =['category','cost','wid','userid','date','username'];
    public function wallets(){
        return $this->belongsTo('App\wallets');
    }
    public function user(){
        return $this->belongsTo('App\user');
    }
}
