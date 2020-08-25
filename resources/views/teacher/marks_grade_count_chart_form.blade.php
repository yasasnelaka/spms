@extends('teacher_dashboard.dashboard')
@section('content')
    <br><br><br>
        <div class="container-fluid">
            <form action="{{url('/teacher/marks_grade_count_chart')}}" method="get">

                <div class="row">
                    <div class="col-md-6">

                        <select class="mdb-select md-form" name="year" id="year" required>
                            <option value="" disabled selected>year</option>
                            @foreach( $year_list as $year )
                                <option value="{{$year->year}}">{{$year->year}}</option>
                            @endforeach
                        </select>

                        <label class="mdb-main-label">Select Year</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <select class="mdb-select md-form" name="grade" id="grade" required>
                            <option value="" >Choose grade</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select class="mdb-select md-form" name="class" id="class_s" required>
                            <option value="">Choose Class</option>
                            @foreach($class as $class)
                                <option value="{{$class->class}}">{{$class->class}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <select class="mdb-select md-form" name="term" id="term" required>
                        <option value="" disabled selected>Choose Term</option>
                        <option value="1">1st term</option>
                        <option value="2">2nd term</option>
                        <option value="3">3rd term</option>
                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select class="mdb-select md-form" name="subject" id="subject" required>
                            <option value="">Subject</option>
                            @foreach($subject_list as $sub)
                                <option value="{{$sub->id}}">{{$sub->subject_name}}</option>
                            @endforeach
                        </select>
                        <label class="mdb-main-label">Select Subject</label>
                    </div>
                </div>
            </form>
        </div>

    <canvas id="pieChart"></canvas>
    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
<script>
    //pie
    var year;
    var subject;
    var term;
    var grade;
    var class_s;

    $(document).on('change','#term',function () {
        term = $(this).val();
    });

    $(document).on('change','#year',function () {
        year = $(this).val();
    });
    $(document).on('change','#class',function () {
       class_s = $(this).val();
    });

    $(document).on('change','#grade',function () {
        grade = $(this).val();
    });
    $(document).on('change','#subject',function () {
        subject = $(this).val();

        $.ajax({
            type: 'get',
            url: '{!!URL::to('/teacher/marks_grade_count_chart')!!}',
            data: {'year': year, 'subject': subject , 'term': term , 'grade': grade , 'class_s' : class_s },
            success: function (graph) {
                var ctxP = document.getElementById("pieChart").getContext('2d');
                var myPieChart = new Chart(ctxP, {
                    type: 'pie',
                    data: {
                        labels: ["A", "B", "C", "S","F"],
                        datasets: [{
                            data: graph,
                            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            }
        });

    });
</script>
@endsection
