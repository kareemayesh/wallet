@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <table class="table ">
                <tr>
                    <th>name</th>
                    <th>email</th>
                    <th>invite</th>
                </tr>
                @foreach($data as $a)
                    <tr>
                        <td>{{$a->name}}</td>
                        <td>{{$a->email}}</td>
                        <td>
                            {!! Form::open(array('url' => '/invite', 'method' => 'post')) !!}
                             <input type="hidden" name="reciverid" value="{{$a->id}}">
                            <input type="hidden" name="senderid" value="{{$aid}}">
                            <input type="hidden" name="wid" value="{{$wid}}">

                            <button type="submit" class="btn btn-success">invite</button>
                            {!! Form::close() !!}


                            </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection