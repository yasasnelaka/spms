@extends('student_dashboard.dashboard')

@section('content')
    <div class="text-center">
        <h2> <span class="badge badge-pill badge-primary">Extra Curricular Activities</span></h2>>
    </div>
    <img src="img\ball.jpg"  width="100px" height="100px" class="animated bounce infinite" alt="Transparent MDB Logo" id="animated-img1">
    <div class="container-fluid">

        <table id="table1" class="table">
            <thead class="grey lighten-2">
            <tr>
                <th scope="col">Date </th>
                <th scope="col">Category</th>
                <th scope="col">Event</th>
                <th scope="col">Activity</th>
                <th scope="col">Level</th>
                <th scope="col">Rank</th>
            </tr>
            </thead>
            <tbody>
            @foreach($extra as $value=>$extra)
                @foreach($extra as $extra)
                <tr>

                    <td>{{$extra->date}}</td>
                    <td>{{$extra->category}}</td>
                    <td>{{$extra->event}}</td>
                    <td>{{$extra->activity}}</td>
                    <td>{{$extra->level}}</td>
                    <td>{{$extra->rank}}</td>

                </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
        <!-- Data Table -->
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr>
                <td class="gutter">
                    <div class="line number1 index0 alt2" style="display: none;">1</div>
                </td>
                <td class="code">
                    <div class="container" style="display: none;">
                        <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
@endsection
