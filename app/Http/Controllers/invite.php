<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth ;
use App\user ;
use App\invites ;
use App\pivot ;

class invite extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home(){
        $uid = Auth::user()->id;
        $m = invites::where('reciverid',$uid)->where('status','pending')->count();
        $w = pivot::where('userid',$uid)->count();
        return view('home',compact('m','w'));
    }
    public function index()
    {
        $uid = Auth::user()->id;
        $m = invites::where('reciverid',$uid)->where('status','pending')->paginate(2);
        return view('invite.home',compact('m'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    $data = $request->only('reciverid','senderid','wid');
        $id = Auth::user()->id;
        $sen = user::where('id',$id)->lists('name');
        $rec = user::where('id',$data['reciverid'])->lists('name');
        $data['recivername']= $rec[0];
        $data['sendername']= $sen[0];
        $data['status']= "pending";
        if($id == $data['senderid']){

            invites::create($data);
            return $data ;
         
        }else{
            return "sorry it seems that you are trying to hack our website" ;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $sta = $request->input('status');

        $up = invites::find($id);

       $piv['wid'] = $up->wid ;
        $up->status = $sta ;
        $up->save();
        if($sta =='approved'){

        $piv['userid'] = Auth::user()->id;
        pivot::create($piv);

        }

        return redirect('/home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
