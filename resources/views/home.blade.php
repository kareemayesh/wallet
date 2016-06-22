@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">

        <!--Panel-->
        <div class="col-lg-3">
        <div class="card card-block" style="padding-right: 12px;">
            <h4 class="card-title">Notifications</h4>
            <p class="card-text">
                <a class="btn btn-danger btn-block" href="/invite"> wallet requests <span class="badge">{{$m}}</span></a>

              </p>

        </div>
        </div>
        <!--/.Panel-->

       <div class="col-lg-6">

           <!--Panel-->
           <div class="card card-block" style="padding-left: 12px;">
               <h4 class="card-title">Panel title</h4>
               <p class="card-text"></p>
               <a href="#" class="card-link">Card link</a>
               <a href="#" class="card-link">Another link</a>
           </div>
           <!--/.Panel-->

       </div>
        <div class="col-lg-3">
            <!--Panel-->
            <div class="card card-block" style="padding-right: 12px;">
                <h4 class="card-title">Navigation</h4>
                <a class="btn btn-primary btn-block" href="/wallet">All wallets <span class="badge">{{$w}}</span></a>
                <a class="btn btn-success btn-block" href="/wallet/create">Create wallet</a>
                <a class="btn btn-secondary btn-block" href="{{url('/wallet/showmine')}}">Edit my wallets</a>


            </div>
            <!--/.Panel-->
        </div>

    </div>
    </div>

@endsection
