@extends('class_teacher_dashboard.dashboard')
@section('content')
    <div class="container-fluid">
        <!--Success Alert-->
        @if(session()->has('message'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif


        <table id="table1" class="table">
            <thead class="grey lighten-2">
            <tr>
                <th scope="col">Admission Number</th>
                <th scope="col">Subject</th>
                <th scope="col">Marks </th>
                <th scope="col">Subject</th>
                <th scope="col">Marks</th>
                <th scope="col">Subject</th>
                <th scope="col">Marks</th>
                <th scope="col">Subject</th>
                <th scope="col">Marks</th>
                <th scope="col">Subject</th>
                <th scope="col">Marks</th>
                <th scope="col">Subject</th>



            </tr>
            </thead>
            <tbody>

                @foreach($marks as $admission=>$marks)
                    <tr>
                        <td>{{$admission}}</td>
                         @foreach($marks as $marks)
                            <td>{{$marks->subject_name}}</td>
                            <td> {{$marks->marks}}</td>
                        @endforeach
                    </tr>
                    @endforeach
                <form action="{{url('/class_teacher/cal_avg_rank')}}" method="get">
                    <input type="hidden" name="year" value="{{$year}}">
                    <input type="hidden" name="term" value="{{$term}}">
                    <input type="submit" class="btn  btn-primary" value="Cal Avg & Rank">
                </form>
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
