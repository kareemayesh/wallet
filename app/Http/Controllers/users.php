<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\user ;
use App\pivot;
use Auth ;

class users extends Controller
{
    public function search(Request $request){
        $wida = $request->only('wid');
        $wid = $wida['wid'];
        $aid = Auth::user()->id;
        $namea = $request->only('search');
        $name = $namea['search'];
        $data = user::where('name', 'LIKE', "%$name%")->where('id','!=',$aid)->get();
        return view('user.show',compact('data','aid','wid'));
    }
    public function show($id){

        $aid = Auth::user()->id;
    $m = pivot::where('wid',$id)->lists('userid');
    $data = user::whereIn('id',$m)->where('id','!=',$aid)->distinct('id')->get();
        $data2 = pivot::where('wid',$id)->where('userid','!=',$aid)->get();


     return view('user.showusers',compact('data','data2'));

        
    }
    public function delete( Request $request){
        $userid = $request->input('userid');
        $wid = $request->input('wid');

         pivot::where('userid',$userid)->where('wid',$wid)->delete();

        return redirect("users/$wid");


    }
}
