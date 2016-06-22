@extends('layouts.app')
@section('content')

    {!! Form::open(array('url' => '/category', 'method' => 'post')) !!}

    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <label for="name">wallet name  :  </label>
                    <input type="text" name="name" class="form-control" id="name" >
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <label for="description">wallet description  : </label>
                    <textarea rows="5" class="form-control" name="description" id = "description"></textarea>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <button type="submit" class="btn btn-success" >save</button>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection