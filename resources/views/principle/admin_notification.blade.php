
@extends('principle_dashboard.dashboard')
@section('content')


<head>


    <!-- Your custom styles (optional)  -->
    <style>
        .toast {
            overflow: auto;
        }
    </style>
</head>

<body class="fixed-sn white-skin">
@foreach($find as $find)
<div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
    <div class="toast-header">
        <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
             preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <rect fill="#007aff" width="100%" height="100%" /></svg>
        <strong class="mr-auto">Message from {{$find->name}}</strong>

        <button type="submit" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    <div class="toast-body">
        {{$find->message}}
    </div>
</div>
@endforeach


</body>
<script>$('.toast').toast('show');</script>



@endsection
