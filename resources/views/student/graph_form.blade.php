@extends('student_dashboard.dashboard')
@section('content')
<form action="/students/graph" method="get">
        <div class="row">
            <div class="col-md-6">

                    <select class="mdb-select md-form" name="year" id="year">
                        <option value="" disabled selected>year</option>
                        @foreach( $year_list as $year )
                        <option value="{{$year->year}}">{{$year->year}}</option>
                        @endforeach
                    </select>

                <label class="mdb-main-label">Select Year</label>
            </div>
            <div><a href="/students/graph_form_2" class="btn btn-primary">Yearly Progress</a> </div>
        </div>
    <div class="row">
        <div class="col-md-6">
            <select class="mdb-select md-form" name="subject" id="subject" >
                <option value="">Subject</option>
                @foreach($subject_list as $sub)
                    <option value="{{$sub->id}}">{{$sub->subject_name}}</option>
                @endforeach
            </select>
            <label class="mdb-main-label">Select Subject</label>
        </div>
    </div>
</form>

<canvas id="lineChart"></canvas>



<script>
    var year;
    var subject;
    $(document).on('change','#year',function () {
         year = $(this).val();
    });
    $(document).on('change','#subject',function () {
        subject = $(this).val();

        $.ajax({
            type: 'get',
            url:'{!!URL::to('/students/graph')!!}',
            data:{'year': year , 'subject' : subject },
            success:function (graph) {
                var ctxL = document.getElementById("lineChart").getContext('2d');
                var myLineChart = new Chart(ctxL, {
                    type: 'line',
                    data: {
                        labels: ["1st term", "2nd term", "3rd term"],
                        datasets: [{
                            label: "Subjects Marks Graphical View",
                            data: graph.graph,
                            backgroundColor: [
                                'rgba(105, 0, 132, .2)',
                            ],
                            borderColor: [
                                'rgba(200, 99, 132, .7)',
                            ],
                            borderWidth: 2
                        },

                        ]
                    },
                    options: {
                        responsive: true
                    }
                });
            }
        });

    });

</script>


    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>


    @endsection
