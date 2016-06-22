@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-4">
                <a class="btn btn-warning" href="{{url('wallet/analyis/'.$wid[0])}}">analyis wallet</a>
            </div>
            <div class="col-lg-2 ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">add user</button>
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title" id="exampleModalLabel">search</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('url' => '/user_S', 'method' => 'post')) !!}
                           <div class="form-group">
                               <label for="search">search</label>
                               <input type="text" id="search" name="search" class="form-control">
                               @foreach($data1 as $a)
                               <input type="hidden" name="wid" value="{{$a->id}}">
                               @endforeach
                           </div>






                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">search</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            </div>
        <div class="col-lg-2 ">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">add expenses</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title" id="exampleModalLabel">Add expenses</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('url' => '/expenses', 'method' => 'post')) !!}

                            <div class="form-group">
                                <label for="category" data-live-search="true" >name</label>
                                <select style="    height: 39.6px !important;" class="form-control" id="category" name="category" >
                                    @foreach($data3 as $a)
                                        <option value="{{$a->value}}"> {{$a->value}}</option>
                                    @endforeach


                                </select>
                            </div>


                                <div class="form-group">
                                    <label class="sr-only" for="cost">cost</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                        <input type="number" class="form-control" name="cost" id="cost" >
                                        <div class="input-group-addon">.00</div>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="date">date</label>
                                <input type="date"   name="date" class="form-control" id="date" >
                                <input type="hidden" name="wid" value="{{$id}}">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>


            <div class="col-lg-2 ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">add category</button>
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(array('url' => '/category', 'method' => 'post')) !!}

                                <div class="form-group">
                                    <label for="value">category name</label>
                                    <input type="text" name="value" class="form-control" id="value" placeholder="category name">
                                    <input type="hidden" name="wid" value="{{$id}}">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">save</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-1">
            <table class="table ">
                <tr>
                    <th>user</th>
                    <th>category</th>
                    <th>costs</th>
                    <th>Delete</th>
                </tr>
                @foreach($data2 as $a )
                    <tr>
                        <td>{{$a->username}}</td>
                        <td>{{$a->category}}</td>
                        <td>{{$a->cost}}</td>
                        <td>@if($a->userid == $uid)
                                @foreach($data1 as $b)
                                {!! Form::open(array('route' => array('expenses.destroy', $a->id), 'method' => 'DELETE')) !!}
                                <input type="hidden" name="wid" value="{{$b->id}}">
                                 <button type="submit" class="btn btn-danger">Delete</button>
                                {!! Form::close() !!}
                                @endforeach
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td ></td>
                    <td> </td>
                    <td >{{$sum}}</td>
                    <td></td>

                </tr>
            </table>
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


    </div>

@endsection
@section('js')

@endsection