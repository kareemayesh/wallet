@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <table class="table">
                <tr>
                    <th style="width: 10%;">name</th>
                    <th>description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>show users</th>
                    <th>show categories</th>
                </tr>
                @foreach($data as $a)
                    <tr>
                        <td>
                            {!! Form::open(array('route' => array('wallet.update', $a->id), 'method' => 'PATCH')) !!}
                            <input name="name" type="text" value="{{$a->name}}" ></td>
                        <td width="60%">

                            <input type="text" name="description" value="{{$a->description }}"></td>
                        <td><button type="submit" class="btn btn-success">Edit</button>

                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::open(array('route' => array('wallet.destroy', $a->id), 'method' => 'DELETE')) !!}
                            <button  onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-danger ">Delete </button>
                            <input type="hidden"name="id" value="{{$a->id}}">
                            {!! Form::close() !!}
                        </td>
                        <td>
                            <a class="btn btn-info" href="/users/{{$a->id}}">show users</a>
                        </td>
                        <td><a class="btn btn-secondary" href="{{url("category/$a->id")}}">show categories</a></td>

                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection