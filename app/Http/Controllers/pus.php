<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Vinkla\Pusher\PusherManager;



class pus extends Controller
{
    public function pus()
    {
        $pusher = App::make('pusher');

        $pusher->trigger( 'test-channel',
            'test-event',
            array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

        return view('welcome');
    }
}

