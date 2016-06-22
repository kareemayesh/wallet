@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('content')
<div class="container">
    <div class="page-header">
        <h1>wallet analysis</h1>
    </div>
    <div class="row">
         <div class="col-lg-6 ">
        <div id="bar-example"></div>
         </div>


        <div class="col-lg-6 ">
            <div id="bar-example2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <a class="btn btn-primary" href="{{url('wallet/'.$id)}}"><span class="fa fa-arrow-left"></span> back</a>
        </div>
    </div>

</div>
@endsection
@section('js')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        Morris.Bar({
            element: 'bar-example',
            data: [
                    <?php $x = 0 ?>
                    @foreach($categories as $a )

                { y: <?php echo "'". $a ."'" ; ?> , a: <?php echo $costs[$x]; ?>},
                    <?php $x = $x +1 ; ?>

                    @endforeach


            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['costs']
        });
        Morris.Donut({
            element: 'bar-example2',
            data: [
                    <?php $x = 0 ?>
                    @foreach($categories as $a )

                { label: <?php echo "'". $a ."'" ; ?> , value: <?php echo $costs[$x]; ?>},
                <?php $x = $x +1 ; ?>

                @endforeach


            ],

        });
    </script>
@endsection