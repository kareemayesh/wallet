<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\wallets ;
use Auth ;
use App\expenses ;
use App\categories;
use App\pivot ;

class wallet extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showmine(){
        $id =Auth::user()->id;
        $data = wallets::where('owner',$id)->get();
        return view('wallet.show_mine',compact('data'));
    }
    public function index()
    {
        $id =Auth::user()->id;
        $m = pivot::where('userid',$id)->lists('wid');

        $data = wallets::whereIn('id',$m)->paginate(3);
        return view('wallet.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wallet.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'description');
        $data['owner']= Auth::user()->id;


       $tt =  wallets::create($data);
        $pivot['userid'] = Auth::user()->id; ;
        $pivot['wid'] = $tt['id'];
        pivot::create($pivot);

        return redirect('/wallet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $uid = Auth::user()->id;
        $m = pivot::where('userid',$uid)->where('wid',$id)->count();


        if ($m == 0){
            return redirect('/wallet');
        }else{
        $data1 = wallets::where('id',$id)->get() ;
        $wid = wallets::where('id',$id)->lists('id');
        $data2 = expenses::where('wid',$id)->get();
            $sum = expenses::where('wid',$id)->lists('cost')->sum();
        $data3 = categories::where('wid',$id)->get();



        return view('wallet.show',compact('data1','data2','data3','id','sum','uid','wid'));


        }
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
    {
        $up = wallets::find($id);
        $up->name = $request->input('name');
        $up->description = $request->input('description');
        $up->save();
        return redirect('/wallet/showmine');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $de = wallets::find($id);
        $de->delete();
        return redirect('/wallet/showmine');
    }
    public function analyis($id){
        $categories = categories::where('wid',$id)->lists('value');
        $costs = array();
        foreach ($categories as $a){
            $costs[] = expenses::where('wid',$id)->where('category',$a)->lists('cost')->sum();

        }
        return view('wallet.analyis',compact('categories','costs','id'));

    }
}
