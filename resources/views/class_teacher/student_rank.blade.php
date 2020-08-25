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
                <th scope="col">Full Name</th>
                <th scope="col">marks</th>
                <th scope="col">Rank</th>
            </tr>
            </thead>
            <tbody>
            <?php $rank=1 ;?>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->admission_number}}</td>
                    <td>{{$student->full_name}}</td>

                    <td>{{$student->avg}}</td>

                    <td><?php echo $rank ; ?></td>
                </tr>
                <?php $rank++; ?>
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
