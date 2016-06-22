@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <table class="table">
                    <tr>
                        <th>name</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($data2 as $b)
                    @foreach($data as $a)

                        <tr>
                            <td>{{$a->name}}</td>
                            <td>
                                {!! Form::open(array('route' => array('delete_user'), 'method' => 'DELETE')) !!}
                                <button  onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-danger ">Delete </button>
                                <input type="hidden" name="userid" value="{{$a->id}}">
                                <input type="hidden" name="wid" value="{{$b->wid}}" >
                                {!! Form::close() !!}



                            </td>
                        </tr>
                            @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection