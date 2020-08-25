@extends('class_teacher_dashboard.dashboard')
@section('content')
    <h1>PERFORMANCE</h1>


        <div class="container-fluid">
            <form action="{{url('/class_teacher/view_filter_performance')}}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <select name="category" id="category" class="mdb-select md-form" required>
                            <option value="">Select category</option>
                            <option value="Physical">Physical</option>
                            <option value="None-Physical">None-Physical</option>
                        </select>
                        <label class="mdb-main-label">Select category</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <select  class="mdb-select md-form"  name="level" required>
                            <option value="National level">National Level </option>
                            <option value="Provincial level">Provincial Level</option>
                            <option value="District level">District Level</option>
                            <option value="Inter national school">Inter national School</option>
                            <option value="Inter house">Inter-House</option>
                            <option value="English day competition">English day competition</option>
                            <option value="sinhala day competition">sinhala day competition</option>
                        </select>
                        <label class="mdb-main-label" >Select Level</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <select  class="mdb-select md-form" searchable="Search here.." name="grade" >
                            <option value="" selected>Select Grade</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <label class="mdb-main-label">Select Grade</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="md-form">
                        <input type="date" name="date" id="date" class="form-control" >
                        <label for="Date_Of_Birth">Date</label>
                    </div>
                </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6" id="physical">
                                <select  class="mdb-select md-form" searchable="Search here.." name="physical">
                                    <option value="">Select activity of category</option>
                                    <option value="Running 100m">Running 100m</option>
                                    <option value="Running 200m">Running 200m</option>
                                    <option value="Running 400m">Running 400m</option>
                                    <option value="Running 800m">Running 800m</option>
                                    <option value="Running 1500m">Running 1500m</option>
                                    <option value="Relay 100*4">Relay 100*4</option>
                                    <option value="Running">Relay 400*4</option>
                                    <option value="Football">Football</option>
                                    <option value="Netball">Netball</option>
                                    <option value="Basketball">Basketball</option>
                                    <option value="Hockey">Hockey</option>
                                    <option value="Gymnastics">Gymnastics</option>
                                    <option value="Swimming">Swimming </option>
                                    <option value="Tennis">Tennis</option>
                                    <option value="Volleyball">Volleyball</option>
                                    <option value="Boxing">Boxing</option>
                                    <option value="Cricket">Cricket</option>
                                    <option value="Rugby">Rugby</option>
                                    <option value="Karate">Karate</option>
                                    <option value="High jump">High jump</option>
                                    <option value="Long jump">Long jump</option>
                                    <option value="Triple jump">Triple jump</option>
                                    <option value="Shot put">Shot put</option>
                                    <option value="Marathon">Marathon</option>
                                    <option value="Bicycle_race">Bicycle race</option>
                                    <option value="Discus_throw">Discus throw</option>
                                    <option value="Javelin_throw">Javelin throw</option>
                                    <option value="Carrom">Carrom</option>
                                    <option value="Chess">Chess</option>
                                </select>
                                <label class="mdb-main-label">Select activity of category</label>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-6" id="none_physical">
                                <select  class="mdb-select md-form" searchable="Search here.." name="none_physical">
                                    <option value="">Select activity of category</option>
                                    <option value="Dancing">Dancing</option>
                                    <option value="Western music">Western music</option>
                                    <option value="Eastern music">Eastern music</option>
                                    <option value="Western band">Western band</option>
                                    <option value="Eastern band">Eastern band</option>
                                    <option value="Sinhala Debiting">Sinhala Debiting</option>
                                    <option value="English Debiting">English Debiting</option>
                                    <option value="Olympiad mathematics">Olympiad mathematics</option>
                                    <option value="Poem">Poem</option>
                                    <option value="Copy writing">Copy writing</option>
                                    <option value="Easy writing">Easy writing</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Dictation">Dictation</option>
                                    <option value="Reading">Reading</option>
                                    <option value="Writing">Writing</option>
                                </select>
                                <label class="mdb-main-label">Select activity of category</label>
                            </div>
                        </div>

                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary" value="Search" id="submit" name="submit">
                </div>
            </form>
        </div>
    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
    <script>
        $(function () {
            $('#physical').hide();
            $('#none_physical').hide();
            $('#category').change(function () {
                if($('#category').val() == 'Physical') {
                    $('#none_physical').hide();
                    $('#physical').show();

                }else if($('#category').val()=='None-Physical') {
                    $('#physical').hide();
                    $('#none_physical').show();

                }

            })
        })
    </script>
@endsection
