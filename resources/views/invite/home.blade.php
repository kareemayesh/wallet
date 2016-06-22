@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1>wallet requests</h1>
        </div>
        @foreach($m as $a)
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Request from {{$a->sendername}}</h3>
                        </div>
                        <?php $id = $a->id ; ?>
                        {!! Form::open(array('action' => array('invite@update', $a->id) , 'method' => 'PATCH')) !!}
                        <div class="panel-body">{{$a->sendername}} wants you to join his wallet </div>
                        <div class="panel-footer">

                                <button  value="approved" class="btn btn-success" name="status" type="submit">accpet</button>


                                <button  value="rejected" name="status" class="btn  btn-danger" type="submit">reject</button>

                        </div>
                    </div>
                    </div>
                </div>
            {!! Form::close() !!}
        @endforeach
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {{ $m->links() }}
                </div>
        </div>
    </div>
@endsection