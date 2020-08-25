@extends('principle_dashboard.dashboard')
@section('content')

        <div class="student">
            <!-- Grid row -->
            <div class="container">
                <!--Success Alert-->

                <div class="row justify-content-center">
                    <!-- Grid column -->
                    <div class="col-md-6">

                        <!-- Body -->
                        <div class="md-form">
                            <i class="fas fa-user prefix"></i>
                            <input type="text" name="Full_name" id="Full_name" value="{{$student->full_name}}" class="form-control" autofocus>
                            <label for="orangeForm-name">Your full name</label>
                        </div>
                        <br>
                        <div class="md-form">
                            <i class="fas fa-user prefix"></i>
                            <input type="text" name="Initial_Name" id="Initial_Name" value="{{$student->name_with_initials}}" class="form-control" autofocus>
                            <label for="orangeForm-email">Name with initials</label>
                        </div>
                        <br>
                        <div class="md-form">
                            <i class="fas fa-map-marker-alt prefix"></i>
                            <input type="text" name="Address" id="Address" value="{{$student->address}}" class="form-control" autofocus>
                            <label for="orangeForm-name">Your address</label>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-calendar-alt prefix"></i>
                                    <input type="date" name="Date_Of_Birth" id="Date_Of_Birth" class="form-control" autofocus value="{{$student->dob}}">
                                    <label for="Date_Of_Birth">Date of birth</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <div class="md-form">
                                        <select class="mdb-select md-form" id="Blood_Group" name="Blood_Group" >
                                            <option value="{{$student->blood_group}}"  selected>Blood Group {{$student->blood_group}} </option>
                                            <option value="AB">AB</option>
                                            <option value="AB-">AB-</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <select class="mdb-select md-form" name="Grade">
                                        <option value="{{$student->grade}}"  selected>Grade {{$student->grade}} </option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <select class="mdb-select md-form"  id="Class" name="Class">
                                        <option value="{{$student->class}}"  selected>class {{$student->class}} </option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
                                        <option value="I">I</option>
                                        <option value="J">J</option>
                                        <option value="K">K</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>

                        <label>Red cross participation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <!-- Material inline 1 -->
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="yes" id="materialInline1" name="Red_cross_participation">
                            <label class="form-check-label" for="materialInline1">Yes</label>
                        </div>
                        <!-- Material inline 2 -->
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="no" id="materialInline2" name="Red_cross_participation">
                            <label class="form-check-label" for="materialInline2">No</label>
                        </div>
                        <br>
                        <br>
                        <label>Guiding participation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <!-- Material inline 1 -->
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="yes" id="materialInline3" name="Guiding_participation">
                            <label class="form-check-label" for="materialInline3">Yes</label>
                        </div>
                        <!-- Material inline 2 -->
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="no" id="materialInline4" name="Guiding_participation">
                            <label class="form-check-label" for="materialInline4">No</label>
                        </div>
                        <div class="md-form">
                            <i class="fas fa-street-view prefix"></i>
                            <input type="text" name="Guardian_Name" id="Guardian_Name" class="form-control" value="{{$student->guardian_name}}" autofocus>
                            <label for="orangeForm-name" name="Admission_Number">Guardian name</label>
                        </div>

                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-6">


                        <!-- Body -->
                        <div class="md-form">
                            <i class="fas fa-id-card-alt prefix"></i>
                            <input type="text" name="Admission_Number" id="Admission_Number" value="{{$student->admission_number}}" class="form-control" autofocus>
                            <label for="orangeForm-name" name="Admission_Number">Admition number</label>
                        </div>

                        <br>
                        <div class="md-form">
                            <i class="fas fa-venus-mars prefix"></i>
                            <input type="text" name="Gender" id="orangeForm-email" class="form-control" value="{{$student->gender}}"  autofocus>
                            <label for="orangeForm-email">Gender</label>
                        </div>
                        <br>
                        <div class="md-form">
                            <i class="fas fa-phone-volume prefix"></i>
                            <input type="tel" name="Telephone_Number" id="orangeForm-email" class="form-control" ">
                            <label for="orangeForm-email">Telephone number</label>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-flag prefix"></i>
                                    <input type="text" name="Nationality" id="Nationality" class="form-control" autofocus value="{{$student->nationality}}" >
                                    <label for="Nationality">Nationality</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-bus-alt prefix"></i>
                                    <input type="text" name="Transport_Method" id="Transport_Method" class="form-control" value="{{$student->transport_method}}" autofocus>
                                    <label for="Transport method">Transport method</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="md-form">
                            <i class="fas fa-praying-hands prefix"></i>
                            <input type="text" name="Religion" id="Religion" class="form-control" value="{{$student->religion}}" autofocus>
                            <label for="Religion">Religion</label>
                        </div>
                        <br>
                        <div class="md-form">
                            <i class="fas fa-poll prefix"></i>
                            <input type="number" name="Grade_5_Scholarship_Marks" id="Grade_5_Scholarship_marks" class="form-control" value="{{$student->grade_5_scholarship_marks}}" autofocus>
                            <label for="Religion">Grade 5 Scholarship marks</label>
                        </div>
                        <br>
                        <div class="md-form">
                            <i class="fas fa-tty prefix"></i>
                            <input type="text" name="Guardian_Telephone_Number" id="Guardian_Telephone_Number" class="form-control" value="{{$student->guardian_tp_number}}" autofocus>
                            <label for="orangeForm-name" name="Admission_Number">Guardian Telephone number</label>
                        </div>

                    </div>
                    <!-- Grid column -->

                </div>

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

@endsection
