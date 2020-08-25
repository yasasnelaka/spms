@extends('teacher_dashboard.dashboard')

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
                <th scope="col">Full Name</th>
                <th scope="col">Date </th>
                <th scope="col">Category</th>
{{--                <th scope="col">Event</th>--}}
                <th scope="col">Activity</th>
                <th scope="col">Level</th>
                <th scope="col">Rank</th>
                <th scope="col">Class</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->admission_number_student}}</td>
                    <td>{{$student->full_name}}</td>
                    <td>{{$student->date}}</td>
                    <td>{{$student->category}}</td>
{{--                    <td>{{$student->event}}</td>--}}
                    <td>{{$student->activity}}</td>
                    <td>{{$student->level}}</td>
                    <td>{{$student->rank}}</td>
                    <td>{{$student->grade}}</td>
                    <td>
                        <form  action="{{url('/teacher/update_performance')}}" method="get">
                            <input type="hidden" name="id" value="{{$student->id}}">
                            <button class="btn btn-sm btn-warning" type="submit" name="submit">Update</button>
                        </form>
                    </td>
                    <td>
                        <form  action="{{url('/teacher/delete_performance')}}" method="post">
                            {{ method_field('DELETE') }}
                            @csrf
                            <input type="hidden" name="delete_id" value="{{$student->id}}">
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure , do you want to delete .. ?')" type="submit" name="submit">Delete</button>
                        </form>
                    </td>

                </tr>
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
