<!DOCTYPE html>
<html>
<head>
    <title>Payment gateway using Paytm</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" width="500px">
    <div class="panel panel-primary" style="margin-top:110px;">
        <div class="panel-heading"><h3 class="text-center">Payment gateway using Paytm Laravel 7</h3></div>
        <div class="panel-body">
            <form action="{{ route('make.payment') }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}

                @if($message = Session::get('message'))
                        <p>{!! $message !!}</p>
                    <?php Session::forget('success'); ?>
                @endif

                <div class="row">

                    <div class="col-md-12">
                        <br/>
                        <button type="submit" class="btn btn-success">Paytm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
