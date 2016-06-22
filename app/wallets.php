<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallets extends Model
{
    protected $table = "wallets";
    protected $fillable = ['name','description','owner'] ;
    public function category(){
        return $this->hasMany('App/categories');
    }
}
