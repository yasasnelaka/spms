@extends('class_teacher_dashboard.dashboard')
@section('content')

    <div class="student">
        @if(session()->has('message'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('message') }}
            </div>
    @endif
    <!-- Grid row -->
        <div class="container">
            <!--Success Alert-->
            <form action="{{url('/class_teacher/update_performance')}}" method="post">
                {{ method_field('PUT') }}
                @csrf
                <div class="row justify-content-center">
                    <!-- Grid column -->
                    <div class="col-md-6">
                        <div class="md-form">
                            <i class="fas fa-id-card-alt prefix"></i>
                            <input type="text" name="admission_number" id="admission_number" value="{{$student->admission_number_student}}" class="form-control" >
                            <label for="orangeForm-name" name="admission_number">Admition number</label>
                        </div>
                        <br>
                        <div class="md-form">
                            <select class="mdb-select md-form" name="category" id="category">
                                <option value="{{$student->category}}"  selected>{{$student->category}} </option>
                                <option value="Physical">Physical</option>
                                <option value="None-Physical">None-Physical</option>
                            </select>
                        </div>
                        <br>

                        <div class="md-form">
                            <select  class="mdb-select md-form"  name="level">
                                <option value="{{$student->level}}"  selected>{{$student->level}} </option>
                                <option value="National level">National Level </option>
                                <option value="Provincial level">Provincial Level</option>
                                <option value="District level">District Level</option>
                                <option value="Inter national school">Inter national School</option>
                                <option value="Inter house">Inter-House</option>
                                <option value="English day competition">English day competition</option>
                                <option value="sinhala day competition">sinhala day competition</option>
                            </select>
                        </div>

                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-6">
                        <div class="md-form">
                            <i class="fas fa-calendar-alt prefix"></i>
                            <input type="date" name="date" id="date" class="form-control"  value="{{$student->date}}">
                            <label for="Date_Of_Birth">Date</label>
                        </div>
                        <br>
{{--                        <div class="md-form" id="event">--}}
{{--                            <select  class="mdb-select md-form"  name="event">--}}
{{--                                <option value="{{$student->event}}"  selected>{{$student->event}} </option>--}}
{{--                                <option value="Sport meet">Sport meet</option>--}}
{{--                                <option value="English day competition">English day competition</option>--}}
{{--                                <option value="sinhala day competition">sinhala day competition</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="md-form row">
                            <div class="md-form col-md-6">
                                <select  class="mdb-select md-form"  name="rank">
                                    <option value="{{$student->rank}}"  selected>Rank {{$student->rank}} </option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                </select>
                            </div>
                            <div class="md-form col-md-6">
                                <select  class="mdb-select md-form" searchable="Search here.." name="grade">

                                    <option value="{{$student->grade}}"  selected>{{$student->grade}} </option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>

                                </select>
                            </div>
                        </div>
                            <br>

                    </div>
                    <!-- Grid column -->

                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-3">
                        <div class="md-form" id="physical">
                            <select  class="mdb-select md-form" searchable="Search here.." name="activity">
                                <option value="{{$student->activity}}"  selected>{{$student->activity}} </option>
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
                        </div>
                        <br>
                        <div class="md-form" id="none_physical">
                            <select  class="mdb-select md-form" searchable="Search here.." name="activity">
                                <option value="{{$student->activity}}"  selected>{{$student->activity}} </option>
                                <option value=""  selected>Select activity of category </option>
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
                        </div>
                        <br>

                    </div>
                    <input type="hidden" value="{{$student->id}}" name="id">
                </div>
                <div class="form-group row mb-0" id="btn">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" id="submit" >
                            {{ __('Update') }}
                        </button>
                        <button type="reset" class="btn btn-primary" id="reset" >
                            {{ __('clear') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Grid row -->

    </div>
    </form>
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
    <script>

        $(function () {
            $('#physical').hide();
            $('#none_physical').hide();
            $('#category').ready(function () {
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
