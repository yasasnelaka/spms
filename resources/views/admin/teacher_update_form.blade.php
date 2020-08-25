@extends('dashboard.dashboard')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <form  action="{{url('/teacher_update')}}" method="post">

        {{ method_field('PUT') }}
        @csrf
<div class="teacher">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" name="Full_Name_Teacher" id="Full_Name_Teacher" class="form-control" value="{{$teacher->full_name}}" autofocus>
                    <label for="orangeForm-name">Your full name</label>
                </div>
                <br>
                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" name="Initial_Name_Teacher" id="Initial_Name_Teacher" class="form-control" value="{{$teacher->name_with_initials}}">
                    <label for="orangeForm-email">Name with initials</label>
                </div>
                <br>
                <div class="md-form">
                    <i class="fas fa-map-marker-alt prefix"></i>
                    <input type="text" name="Address_Teacher" id="Address" class="form-control" value="{{$teacher->address}}" autofocus>
                    <label for="orangeForm-name">Your address</label>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form">
                            <i class="fas fa-calendar-alt prefix"></i>
                            <input type="date" name="Date_Of_Birth_Teacher" id="Date_Of_Birth" class="form-control" value="{{$teacher->dob}}">
                            <label for="Date_Of_Birth">Date of birth</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form">
                            <select class="mdb-select md-form" name="Grade_Teacher">
                                <option value="{{$teacher->grade}}"  selected>Grade {{$teacher->grade}} </option>
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
                            <select class="mdb-select md-form"  id="Class" name="Class_Teacher">
                                <option value="{{$teacher->class}}"  selected>Grade {{$teacher->class}} </option>
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

            </div>
            <div class="col-md-6">
                <div class="md-form">
                    <i class="fas fa-id-card-alt prefix"></i>
                    <input type="text" name="Staff_Id" id="Staff_Id" class="form-control" value="{{$teacher->staff_id}}">
                    <label for="orangeForm-name" name="Admission_Number">Staff ID</label>
                </div>

                <br>
                <div class="md-form">
                    <i class="fas fa-at prefix"></i>
                    <input type="text" name="Email" id="Email" class="form-control" value="{{$teacher->email}}" autofocus>
                    <label for="orangeForm-email">email</label>
                </div>
                <br>
                <div class="md-form">
                    <i class="fas fa-phone-volume prefix"></i>
                    <input type="tel" name="Telephone_Number_Teacher" id="Telephone_Number" class="form-control" value="{{$teacher->tp_number}}" autofocus>
                    <label for="orangeForm-email">Telephone number</label>
                </div>
                <br>
                <div class="md-form">
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
            {{ __('Update') }}
        </button>
        <button type="reset" class="btn btn-primary" id="reset" >
            {{ __('clear') }}
        </button>
    </div>
</div>
    </form>

    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
    <script>
        // add row
        $("#addRow4").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="Subject[]" class="form-control m-input" placeholder="Subject" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger btn-sm">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow4').append(html);
        });
        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>

@endsection
