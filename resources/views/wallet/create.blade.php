@extends('layouts.app')
@section('content')

    {!! Form::open(array('url' => '/wallet', 'method' => 'post')) !!}

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
            <div class="form-group">
                <label for="exampleInputName2">Name</label>
                <input type="text"  name="name" class="form-control" id="exampleInputName2" >
            </div>
            <div class="form-group">
                <label for="exampleInputName3">description</label>
                <textarea class="md-textarea" name="description" id="exampleInputName3"></textarea>

            </div>
            <button type="submit"  class="btn btn-success" >save</button>

            </div>

        </div>
    </div>

    {!! Form::close() !!}
@endsection