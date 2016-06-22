@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <table class="table">
                    <tr>
                        <th>category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($data as $a)
                        <tr>
                            <td>
                                {!! Form::open(array('route' => array('category.update', $a->id), 'method' => 'PATCH')) !!}
                                <input type="text" name="value" value="{{$a->value}}"></td>
                            <td>

                                <button type="submit" class="btn btn-success">Edit</button>
                                <input type="hidden" name="wid" value="{{$id}}">
                                {!! Form::close() !!}</td>
                            <td>
                                {!! Form::open(array('route' => array('category.destroy', $a->id), 'method' => 'DELETE')) !!}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <input type="hidden" name="wid" value="{{$id}}">
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection