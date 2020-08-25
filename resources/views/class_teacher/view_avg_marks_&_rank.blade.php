@extends('class_teacher_dashboard.dashboard')
@section('content')
    <div class="container-fluid">

        <table id="table1" class="table">
            <thead class="grey lighten-2">
            <tr>
                <th scope="col">Admission Number</th>
                <th scope="col">Student Name</th>
                <th scope="col">year</th>
                <th scope="col">avg</th>
            </tr>
            </thead>
            <tbody>

            @foreach($avgs as $avg)
                <tr>
                    <td>{{$avg->student_admission_number}}</td>
                    <td>{{$avg->full_name}}</td>
                    <td>{{$avg->year}}</td>
                    <td>{{$avg->avg}}</td>

                </tr>
            @endforeach
{{--            <form action="{{url('/class_teacher)}}" method="get">--}}
{{--                <input type="submit" class="btn  btn-primary" value="Back to home">--}}
{{--            </form>--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--        <!-- Data Table -->--}}
{{--        <table cellspacing="0" cellpadding="0" border="0">--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <td class="gutter">--}}
{{--                    <div class="line number1 index0 alt2" style="display: none;">1</div>--}}
{{--                </td>--}}
{{--                <td class="code">--}}
{{--                    <div class="container" style="display: none;">--}}
{{--                        <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
        </table>
    </div>

@endsection
