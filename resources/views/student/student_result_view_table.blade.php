@extends('student_dashboard.dashboard')
@section('content')

    <table id="table1" class="table">
        <thead class="grey lighten-2">
        <tr>
            <th scope="col">Subjects</th>
            <th scope="col">Marks</th>
        </tr>
        </thead>
        <tbody>

        @foreach($find as $find)
            <tr>
                <td>{{$find->subject_name}}</td>
                <td>{{$find->marks}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($avg != null)
        <h4>Average mark : {{$avg->avg}}</h4>
    @else
        <h4>Average mark :Not defined</h4>
    @endif
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


@endsection
