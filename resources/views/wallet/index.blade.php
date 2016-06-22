@extends('layouts.app')
@section('content')
        <div class="container">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 ">
                @foreach($data as $a)
                <div class="jumbotron">
                    <h1 class="h1-responsive">{{$a->name}}</h1>

                    <hr class="m-y-2">
                    <p class="lead">{{$a->description}}</p>
                    <p class="lead">
                        <a  href="{{url('/wallet')}}/{{$a->id}}" class="btn btn-primary btn-lg" role="button">view</a>
                    </p>
                </div>
                @endforeach
            </div>
            <div class="col-lg-3">
                <!--Panel-->
                <div class="card card-block" style="padding-right: 12px;">
                    <h4 class="card-title">Navigation</h4>
                    <a class="btn btn-primary btn-block" href="/home">Home page</a>
                    <a class="btn btn-success btn-block" href="/wallet/create">Create wallet</a>
                    <a class="btn btn-secondary btn-block" href="{{url('/wallet/showmine')}}">Edit my wallets</a>


                </div>
                <!--/.Panel-->
            </div>
        </div>
            <div class="row">
                <div style="align-content: center" class="col-lg-6 col-lg-offset-3">
                    {{ $data->links() }}
                </div>
            </div>


        </div>
@endsection