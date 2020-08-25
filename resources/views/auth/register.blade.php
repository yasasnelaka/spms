@extends('dashboard.dashboard')

@section('content')

    <h2 class="font-weight-bold my-4 text-center mb-5 mt-4 font-weight-bold">
        <strong>REGISTER</strong>
    </h2>
    <hr>
    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
        @csrf
        <center>
            <div class="col-md-5 alert-dark align-content-center">
                <select  class="browser-default form-control @error('role_id') is-invalid @enderror custom-select" name="role_id"  required autocomplete="role_id" id="role_id">
                    <option >Select The Role Who Want To Register</option>
                    <option value="3" {{ old('role_id') == 3 ? 'selected' : '' }}>Student</option>
                    <option value="2"  {{ old('role_id') == 2 ? 'selected' : '' }}>Principle</option>
                    <option value="5" {{ old('role_id') == 5 ? 'selected' : '' }}>Class Teacher</option>
                    <option value="4" {{ old('role_id') == 4 ? 'selected' : '' }}>Teacher</option>
                </select>
                @error('role_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </center>
        <hr>
        <div class="card">
                <div class="container" id="container" >
                <div class="row justify-content-center">
                    <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-user prefix"></i>
                                    <label for="username" >{{ __('username') }}</label>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                                <br>
                                <!--img upload-->
                                <div class="md-form">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm float-left">
                                            <span>Upload your picture</span>
                                            <input accept="image/*" type="file" name="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Upload your file">
                                        </div>
                                    </div>
                                </div>
                                <br>
                    </div>
                    <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-lock prefix"></i>
                                    <label for="password" >{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="md-form">
                                    <i class="fas fa-lock prefix"></i>
                                    <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <br>
                    </div>
                </div>
            </div>
                <div class="student">
                    <!-- Grid row -->
                    <div class="container">
                             <div class="row justify-content-center">
                                    <!-- Grid column -->
                                    <div class="col-md-6">

                                        <!-- Body -->
                                        <div class="md-form">
                                            <i class="fas fa-user prefix"></i>
                                            <input type="text" name="Full_name" id="Full_name" class="form-control @error('Full_name') is-invalid @enderror">
                                            <label for="orangeForm-name">Your full name</label>
                                            @error('Full_name')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="md-form">
                                            <i class="fas fa-user prefix"></i>
                                            <input type="text" name="Initial_Name" id="Initial_Name" class="form-control @error('Initial_Name') is-invalid @enderror">
                                            <label for="orangeForm-email">Name with initials</label>
                                            @error('Initial_Name')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="md-form">
                                            <i class="fas fa-map-marker-alt prefix"></i>
                                            <input type="text" name="Address" id="Address" class="form-control  @error('Address') is-invalid @enderror">
                                            <label for="orangeForm-name">Your address</label>
                                            @error('Address')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <i class="fas fa-calendar-alt prefix"></i>
                                                    <input type="date" name="Date_Of_Birth" id="Date_Of_Birth" class="form-control  @error('Date_Of_Birth') is-invalid @enderror">
                                                    <label for="Date_Of_Birth">Date of birth</label>
                                                    @error('Date_Of_Birth')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <div class="md-form">
                                                        <select class="mdb-select md-form @error('Blood_Group') is-invalid @enderror" id="Blood_Group" name="Blood_Group">
                                                            <option value="" disabled selected>Blood Group</option>
                                                            <option value="AB">AB</option>
                                                            <option value="AB-">AB-</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                        </select>
                                                        @error('Blood_Group')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <select class="mdb-select md-form @error('Grade') is-invalid @enderror" name="Grade">
                                                        <option value="" disabled selected>Grade</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                    </select>
                                                    @error('Grade')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <select class="mdb-select md-form @error('Class') is-invalid @enderror"  id="Class" name="Class">
                                                        <option value="" disabled selected>Class</option>
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
                                                    @error('Class')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
                                            <input type="text" name="Guardian_Name" id="Guardian_Name" class="form-control">
                                            <label for="orangeForm-name" name="Admission_Number">Guardian name</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->
                                    <!-- Grid column -->
                                    <div class="col-md-6">


                                        <!-- Body -->
                                        <div class="md-form">
                                            <i class="fas fa-id-card-alt prefix"></i>
                                            <input type="text" name="Admission_Number" id="Admission_Number" class="form-control @error('Admission_Number') is-invalid @enderror">
                                            <label for="orangeForm-name" name="Admission_Number">Admition number</label>
                                            @error('Admission_Number')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" value="male" id="materialInline5" name="Gender">
                                            <label class="form-check-label" for="materialInline5">Male</label>
                                        </div>
                                        <!-- Material inline 2 -->
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" value="female" id="materialInline6" name="Gender">
                                            <label class="form-check-label" for="materialInline6">Female</label>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="md-form">
                                            <i class="fas fa-phone-volume prefix"></i>
                                            <input type="tel" name="Telephone_Number" id="orangeForm-email" class="form-control @error('Telephone_Number') is-invalid @enderror">
                                            <label for="orangeForm-email">Telephone number</label>
                                            @error('Telephone_Number')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <i class="fas fa-flag prefix"></i>
                                                    <input type="text" name="Nationality" id="Nationality" class="form-control @error('Nationality') is-invalid @enderror">
                                                    <label for="Nationality">Nationality</label>
                                                    @error('Nationality')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <i class="fas fa-bus-alt prefix"></i>
                                                    <input type="text" name="Transport_Method" id="Transport_Method" class="form-control @error('Transport_Method') is-invalid @enderror">
                                                    <label for="Transport method">Transport method</label>
                                                    @error('Transport_Method')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="md-form">
                                            <i class="fas fa-praying-hands prefix"></i>
                                            <input type="text" name="Religion" id="Religion" class="form-control @error('Religion') is-invalid @enderror">
                                            <label for="Religion">Religion</label>
                                            @error('Religion')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="md-form">
                                            <i class="fas fa-poll prefix"></i>
                                            <input type="number" name="Grade_5_Scholarship_Marks" id="Grade_5_Scholarship_marks" class="form-control">
                                            <label for="Religion">Grade 5 Scholarship marks</label>
                                        </div>
                                        <br>
                                        <div class="md-form">
                                            <i class="fas fa-tty prefix"></i>
                                            <input type="text" name="Guardian_Telephone_Number" id="Guardian_Telephone_Number" class="form-control @error('Guardian_Telephone_Number') is-invalid @enderror">
                                            <label for="orangeForm-name" name="Admission_Number">Guardian Telephone number</label>
                                            @error('Guardian_Telephone_Number')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <!-- Grid column -->
                             </div>
                    </div>
                </div>
                <div class="teacher">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-user prefix"></i>
                                    <input type="text" name="Full_Name_Teacher" id="Full_Name_Teacher" class="form-control @error('Full_Name_Teacher') is-invalid @enderror">
                                    <label for="orangeForm-name">Your full name</label>
                                    @error('Full_Name_Teacher')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="md-form">
                                    <i class="fas fa-user prefix"></i>
                                    <input type="text" name="Initial_Name_Teacher" id="Initial_Name_Teacher" class="form-control @error('Initial_Name_Teacher') is-invalid @enderror">
                                    <label for="orangeForm-email">Name with initials</label>
                                    @error('Initial_Name_Teacher')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="md-form">
                                    <i class="fas fa-map-marker-alt prefix"></i>
                                    <input type="text" name="Address_Teacher" id="Address" class="form-control @error('Address_Teacher') is-invalid @enderror">
                                    <label for="orangeForm-name">Your address</label>
                                    @error('Address_Teacher')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <i class="fas fa-calendar-alt prefix"></i>
                                            <input type="date" name="Date_Of_Birth_Teacher" id="Date_Of_Birth" class="form-control @error('Date_Of_Birth_Teacher') is-invalid @enderror">
                                            <label for="Date_Of_Birth">Date of birth</label>
                                            @error('Date_Of_Birth_Teacher')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <select class="mdb-select md-form  @error('Grade_Teacher') is-invalid @enderror" name="Grade_Teacher">
                                                <option value="" disabled selected>Grade</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                            @error('Grade_Teacher')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <select class="mdb-select md-form @error('Class_Teacher') is-invalid @enderror"  id="Class" name="Class_Teacher">
                                                <option value="" disabled selected>Class</option>
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
                                            @error('Class_Teacher')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>

                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-id-card-alt prefix"></i>
                                    <input type="text" name="Staff_Id" id="Staff_Id" class="form-control @error('Staff_Id') is-invalid @enderror">
                                    <label for="orangeForm-name" name="Admission_Number">Staff ID</label>
                                    @error('Staff_Id')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>

                                <br>
                                <div class="md-form">
                                    <i class="fas fa-at prefix"></i>
                                    <input type="text" name="Email" id="Email" class="form-control">
                                    <label for="orangeForm-email">email</label>
                                </div>
                                <br>
                                <div class="md-form">
                                    <i class="fas fa-phone-volume prefix"></i>
                                    <input type="tel" name="Telephone_Number_Teacher" id="Telephone_Number" class="form-control @error('Telephone_Number_Teacher') is-invalid @enderror">
                                    <label for="orangeForm-email">Telephone number</label>
                                    @error('Telephone_Number_Teacher')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="mdb-select md-form" name="Subject">
                                            <option value="">Subject</option>
                                            @foreach($subject_list as $sub)
                                                <option value="{{$sub->id}}">{{$sub->subject_name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="mdb-main-label">Select Subject</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
        <div class="form-group row mb-0" id="btn">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="submit" >
                    {{ __('Register') }}
                </button>
                <button type="reset" class="btn btn-primary" id="reset" >
                    {{ __('clear') }}
                </button>
            </div>
        </div>
        <div id="1" ><br>Please select the role</div>
    </form>
    <!-- Grid column -->
    <script>
        $(function() {

            $('#1').show();
            $('.student').hide();
            $('.teacher').hide();
            $('#role_id').change(function(){
                if($('#role_id').val() == '3') {
                    $('#1').hide();
                    $('#bt').hide();
                    $('.student').show();
                    $('#btn').show();
                    $('.teacher').hide();
                } else if($('#role_id').val()=='4'||$('#role_id').val()=='1'||$('#role_id').val()=='2'||$('#role_id').val()=='5'){
                    $('#1').hide();
                    $('#bt').show();
                    $('.teacher').show();
                    $('.student').hide();
                    $('#btn').show();
                } else{
                    $('.student').hide();
                    $('.teacher').hide();
                    $('#1').show();
                    $('#btn').hide();
                }
            });
        });
    </script>
    <script>

        $(document).ready(function () {
            $('#1').show();
            $('.student').hide();
            $('.teacher').hide();
            if($('#role_id').val() == '3') {
                $('#1').hide();
                $('#bt').hide();
                $('.teacher').hide();
                $('.student').show();
            } else if($('#role_id').val()=='4'||$('#role_id').val()=='1'||$('#role_id').val()=='2'||$('#role_id').val()=='5'){
                $('#1').hide();
                $('#bt').show();
                $('.teacher').show();
                $('.student').hide();
            } else{
                $('.student').hide();
                $('.teacher').hide();
                $('#1').show();
                $('#btn').hide();
            }
        });
    </script>
    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>

        <script>
        $("#addRow4").click(function () {
            $('.mdb-select').materialSelect();
        });
         </script>


@endsection

