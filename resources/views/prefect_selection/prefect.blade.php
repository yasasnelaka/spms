
@extends('prefect_board_dashboard.dashboard')
@section('content')

    <h2 class="font-weight-bold my-4 text-center mb-5 mt-4 font-weight-bold">
        <strong>APPLY FOR PREFECT</strong>
    </h2>


<div class="container">
    <ul class="stepper horizontal horizontal-fix" id="horizontal-stepper">
        <li class="step active">
            <div class="step-title waves-effect waves-dark">Step 1</div>
            <div class="step-new-content">
                <div class="row">
                    <div class="md-form col-12 ml-auto">
                        <!-- Intro Section -->
                        <div class="mask rgba-gradient">
                            <div class="container h-100 d-flex justify-content-center align-items-center">

                                <!-- Grid row -->


                                <!-- Grid column -->
                                <div class="col-md-12">

                                    <div class="card">
                                        <div class="card-body">


                                            <!-- Grid row -->
                                            <div class="row mt-2">
                                                <!-- Grid column -->
                                                <div class="col-md-6">

                                                    <!-- Body -->
                                                    <div class="md-form">
                                                        <i class="fas fa-user prefix"></i>
                                                        <input type="text" id="orangeForm-name" class="form-control">
                                                        <label for="orangeForm-name">Your name</label>
                                                    </div>
                                                    <br>
                                                    <div class="md-form">
                                                        <i class="fas fa-user prefix"></i>
                                                        <input type="text" id="orangeForm-email" class="form-control">
                                                        <label for="orangeForm-email">Your name with initials</label>
                                                    </div>
                                                    <br>
                                                    <div class="md-form">
                                                        <i class="fas fa-map-marker-alt prefix"></i>
                                                        <input type="text" id="orangeForm-name" class="form-control">
                                                        <label for="orangeForm-name">Your address</label>
                                                    </div>
                                                    <br>
                                                    <div class="md-form">
                                                        <i class="fas fa-calendar-alt prefix"></i>
                                                        <input type="date" id="orangeForm-pass" class="form-control">
                                                        <label for="orangeForm-pass">Date of birth</label>
                                                    </div>
                                                    <!-- Body -->
                                                    <br>

                                                    <br>

                                                </div>
                                                <!-- Grid column -->
                                                <!-- Grid column -->
                                                <div class="col-md-6">


                                                    <!-- Body -->
                                                    <div class="md-form">
                                                        <i class="fas fa-id-card-alt prefix"></i>
                                                        <input type="text" id="orangeForm-name" class="form-control">
                                                        <label for="orangeForm-name">Admition number</label>
                                                    </div>

                                                    <br>
                                                    <div class="md-form">
                                                        <i class="fas fa-at prefix"></i>
                                                        <input type="text" id="orangeForm-email" class="form-control">
                                                        <label for="orangeForm-email">Your email</label>
                                                    </div>
                                                    <!--upload image-->
                                                    <br>
                                                    <form class="md-form">
                                                        <div class="file-field">
                                                            <div class="btn btn-primary btn-sm float-left">
                                                                <span>Upload your picture</span>
                                                                <input type="file">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text" placeholder="Upload your file">
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <br>
                                                    <div class="md-form">
                                                        <i class="fas fa-phone-volume prefix"></i>
                                                        <input type="tel" id="orangeForm-email" class="form-control">
                                                        <label for="orangeForm-email">Telephone number</label>
                                                    </div>


                                                </div>
                                                <!-- Grid column -->

                                            </div>
                                            <!-- Grid row -->

                                        </div>
                                    </div>
                                    <div class="col-md-5"></div>
                                        <div class="step-actions">
                                            <button class="waves-effect waves-dark btn btn-indigo btn-rounded mt-5 next-step" data-feedback="someFunction21">CONTINUE</button>
                                        </div>


                                </div>
                                <!-- Grid column -->


                                <!-- Grid row -->

                            </div>
                        </div>
                        <!-- Intro Section -->
                    </div>
                </div>

            </div>
        </li>
        <li class="step">
            <div class="step-title waves-effect waves-dark">Step 2</div>
            <div class="step-new-content">
                <div class="row">
                    <h6>2)  POSTS HELD (Steward, Junior Leader, House Prefect, Positions in School Clubs,
                        Captaincy in Sports, Troupe Leader, Cadet Sergeant, Band Leader, etc.)</h6><br>
                    <div class="md-form col-12 ml-auto">
                        <!-- Material column sizing form -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="inputFormRow">
                                            <div class="input-group mb-3">
                                                <div class="col-md-7">
                                                <input type="text" name="title[]" class="form-control m-input " placeholder="Sport / Activities / Club" autocomplete="off">
                                                </div>
                                                <div class="col-md-3">
                                                <input type="text" name="title[]" class="form-control m-input" placeholder="Post" autocomplete="off">
                                                </div>
                                                <div class="input-group-append">
                                                    <button id="removeRow" type="button" class="btn btn-danger btn-sm">Remove</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="newRow"></div>
                                        <button id="addRow" type="button" class="btn btn-info btn-sm">Add Row</button><br>
                                    </div>
                                </div>

                        <!-- Material column sizing form -->
                    </div>

                    <h6>3) PERFORMANCE IN EXTRA-CURRICULAR ACTIVITIES (Physical / Non-Physical)
                            (Attach copies of certificates) </h6><br>
                    <div class="md-form col-12 ml-auto">
                        <!-- Material column sizing form -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="inputFormRow">
                                    <div class="input-group mb-3">
                                        <div class="col-md-7"><br>
                                            <input type="text" name="title[]" class="form-control m-input " placeholder="Name of Event / Activity" autocomplete="off">
                                        </div>
                                        <div class="col-md-3" >
                                            <select class="mdb-select md-form" name="">
                                                <option value="" selected>Choose your option</option>
                                                <option value="NationalLevel">National Level </option>
                                                <option value="ProvincialLevel">Provincial Level</option>
                                                <option value="DistrictLevel">District Level</option>
                                                <option value="InterInternationalSchool">Inter International School</option>
                                                <option value="InterHouse">Inter-House</option>
                                            </select>

                                        </div>
                                        <div class="input-group-append">
                                            <button id="removeRow" type="button" class="btn btn-danger h-50 btn-sm">Remove</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="newRow3"></div>
                                <button id="addRow3" type="button" class="btn btn-info btn-sm">Add Row</button><br>
                                <button class="waves-effect waves-dark btn  btn-indigo btn-rounded mt-5 next-step" data-feedback="someFunction21">CONTINUE</button>
                                <button class="waves-effect waves-dark btn  btn-secondary btn-rounded mt-5 previous-step">BACK</button>
                            </div>
                        </div>

                        <!-- Material column sizing form -->
                    </div>
                </div>
            </div>

        </li>
        <li class="step">
            <div class="step-title waves-effect waves-dark">Step 3</div>
            <div class="step-new-content">
                <div class="row">
                <h6>4) ACHIEVEMENTS OUTSIDE SCHOOL (Leadership positions in Sunday School
                    or achievements in Sports / Extra-curricular activities out of school) </h6><br>
                <div class="md-form col-12 ml-auto">
                    <!-- Material column sizing form -->

                        <div class="col-lg-12">
                            <div id="inputFormRow">
                                <div class="input-group mb-3">
                                    <input type="text" name="title[]" class="form-control m-input " placeholder="Please list the achievements down with evidence" autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="removeRow" type="button" class="btn btn-danger btn-sm">Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div id="newRow4"></div>

                            <button id="addRow4" type="button" class="btn btn-info btn-sm">Add Row</button><br>
                            <button class="waves-effect waves-dark btn  btn-indigo btn-rounded mt-5 m-0 " type="button">SUBMIT</button>
                        </div>
                    </div>

                    <!-- Material column sizing form -->
                </div>
            </div>
        </li>
    </ul>
</div>
    <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<div class="col-md-7">';
            html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Sport/Activities/Club" autocomplete="off">';
            html += '</div>';
            html += '<div class="col-md-3">';
            html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Post" autocomplete="off">';
            html += '</div>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger btn-sm">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
    <script>
        $("#addRow3").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<div class="col-md-7">';
            html += '<br><input type="text" name="title[]" class="form-control m-input" placeholder="Sport/Activities/Club" autocomplete="off">';
            html += '</div>';
            html += '<div class="col-md-3">';
            html += '<select class="mdb-select md-form" name="">';
            html += '<option value="" selected>Choose your option</option>';
            html += '<option value="NationalLevel">National Level </option>';
            html += '<option value="ProvincialLevel">Provincial Level</option>';
            html += '<option value="DistrictLevel">District Level</option>';
            html += '<option value="InterInternationalSchool">Inter International School</option>';
            html += '<option value="InterHouse">Inter-House</option>';
            html += '</select>';
            html += '</div>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger btn-sm">Remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            $('#newRow3').append(html);
        });
    </script>
    <script>
        // Material Select Initialization

        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
    <script>
        $("#addRow3").click(function () {
            $('.mdb-select').materialSelect();
        });
    </script>
    <script>
        // add row
        $("#addRow4").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Please list the achievements down with evidence" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger btn-sm">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow4').append(html);
        });
    </script>
@endsection

