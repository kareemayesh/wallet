<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pivot extends Model
{
    protected $table="pivot" ;
    protected $fillable = ['wid','userid'] ;
    
    
    
    
    public function wallet(){
        return $this->belongsToMany('App\wallets');
    }
}
