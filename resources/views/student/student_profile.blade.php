@extends('student_dashboard.dashboard')
@section('content')
    <!-- Card -->
    <br><br>
    <div class="card testimonial-card" style="background-color:#ccffff">

        <!-- Background color -->
        <div class="card z-depth-1-half lighten-1 "></div>

        <!-- Avatar -->
        <div class="avatar mx-auto white mb-4 z-depth-1-half" style="width: 300px;height: 300px">
            <img src="{{$find->profile_picture}}" class="rounded-circle "
                 alt="woman avatar">
        </div>

        <!-- Content -->
        <div class="card-body" style="background-color:#ccffff">
            <!-- Name -->
            <h4 class="card-title" style="color:blue;">{{$find->full_name}}</h4>
            <hr>
            <!-- Quotation -->
            <ul class="striped list-unstyled md-4">
                <li><strong>Admission number</strong> {{$find->admission_number}}</li>

                <li><strong>Name with initials</strong> {{$find->name_with_initials}}</li>

                <li><strong>Date of birth:</strong> {{$find->dob}}</li>

                <li><strong>Grade:</strong> {{$find->grade}}</li>

                <li><strong>Class:</strong> {{$find->class}}</li>

                <li><strong>Address:</strong> {{$find->address}}</li>

                <li><strong>Blood group:</strong> {{$find->blood_group}}</li>

                <li><strong>Guardian name:</strong> {{$find->guardian_name}}</li>

                <li><strong>Guardian phone number:</strong> {{$find->guardian_tp_number}}</li>

                <li><strong>Religion:</strong> {{$find->religion}}</li>

                <li><strong> Nationality:</strong>{{$find->nationality}}</li>

                <li><strong>Username:</strong>{{$find->username}}</li>

            </ul>
        </div>

    </div>
    <!-- Card -->
    <br>

    <h5>If you want change your user name , password & profile picture</h5>
    <form method="POST" action="{{ url('/student_profile_update')}}"  enctype="multipart/form-data">
        @csrf
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="md-form">
                <i class="fas fa-user prefix"></i>
                <label for="username" >{{ __('New username') }}</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$find->username}}"   autocomplete="username">

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
                        <span>Upload your new picture</span>
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
                <label for="password" >{{ __('New Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br>

            <br>
        </div>
    </div>
        <input  type="hidden" class="form-control" name="user_id" value="{{$find->user_id}}">
        <input  type="hidden" class="form-control" name="role_id" value="{{$find->role_id}}">

        <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary" id="submit" >
                {{ __('Update') }}
            </button>
            <a href="{{url('/view_reg')}}" class="btn btn-primary" id="reset" >
                {{ __('Cancel') }}
            </a>
        </div>
    </div>
    </form>
@endsection
