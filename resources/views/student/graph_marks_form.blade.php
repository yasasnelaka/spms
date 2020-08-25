@extends('student_dashboard.dashboard')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="/students/graph_2" method="get">
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

    <canvas id="barChart" width="100px" height="30px"></canvas>


    <script>
        //bar
        var subject;

        $(document).on('change','#subject',function () {
            subject = $(this).val();

            $.ajax({
                type: 'get',
                url:'{!!URL::to('/students/graph_2')!!}',
                data:{ 'subject' : subject },
                success:function (graph_2) {
                    var ctxB = document.getElementById("barChart").getContext('2d');
                    var myBarChart = new Chart(ctxB, {
                        type: 'bar',
                        data: {
                            labels: ["Grade 6 - 3rd term marks", "Grade 7 - 3rd term marks"],
                            datasets: [{
                                label: 'Marks',
                                data: graph_2,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
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
