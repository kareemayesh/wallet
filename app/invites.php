<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invites extends Model
{
    protected $table = "request";
    protected $fillable=['reciverid','recivername','sendername','senderid','status','wid'];
}
