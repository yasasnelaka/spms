@extends('class_teacher_dashboard.dashboard')
@section('content')
    <h3>Enter the Admission Number who want to get recomedation letter</h3><br>

    <form action="{{url('/class_teacher/email_form')}}" method="get">
        @csrf
            <div class="row">
                <div class=" col-md-6">
                    <div class="md-form">
                    <i class="fas fa-id-card-alt prefix"></i>
                    <input type="text" name="admission_number" id="admission_number" class="form-control @error('admission_number') is-invalid @enderror" >
                    <label for="orangeForm-name" name="admission_number">Admition number</label>
                    @error('admission_number')
                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-6">
                    <input class="btn btn-primary" type="submit" >
                </div>
            </div>
    </form>

    @endsection
