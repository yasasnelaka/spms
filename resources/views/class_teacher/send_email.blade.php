
@extends('class_teacher_dashboard.dashboard')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('message') }}
        </div>.
    @endif
    <br><h2> Recommendation Letter Form</h2>
    <form action="{{url('/class_teacher/send_email')}}" method="post">
        @csrf
        <div class="row">
            <div class=" col-md-6">
                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" name="full_name"  value="{{$student->full_name}}" class="form-control" autofocus required>
                    <label for="orangeForm-name">Student Name</label>
                </div>
            </div>
            <div class=" col-md-6">
                <div class="md-form">
                    <i class="fas fa-id-card-alt prefix"></i>
                    <input type="text" name="admission_number"  value="{{$student->admission_number}}" class="form-control" autofocus required>
                    <label for="orangeForm-name">Admission_number</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                    <br><b>&nbsp;&nbsp;Performance</b>
                    <ul>
                   @foreach($performances as $admission=>$performance)
                        @foreach($performance as $performance)
                               <input  class="form-control" name="performance[]" value=" {{$performance->activity}}"><br>
                        @endforeach
                    @endforeach
                    </ul>
            </div>
            <div class=" col-md-6">
                <div class="md-form">
                    <i class="fas fa-calendar-alt prefix"></i>
                    <input type="date" name="date"   class="form-control" autofocus required>
                    <label for="orangeForm-name">Date</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class=" col-md-8">
                <div class="md-form">
                    <input type="text" name="recommendation_for"   class="form-control" autofocus>
                    <label for="orangeForm-name">Recommendation For</label>
                </div>
            </div>
        </div>
        <!--Material textarea-->
        <div class="row">
            <div class="col-md-8">
                <div class="md-form md-outline">
                    <textarea id="form75" class="md-textarea form-control" rows="3" name="other_qualifications"></textarea>
                    <label for="form75">Other qualifications</label>
                </div>
            </div>
        </div>
        <!--Material textarea-->
        <div class="row">
            <div class="col-md-8">
                <div class="md-form md-outline">
                    <textarea id="form75" class="md-textarea form-control" rows="3" name="description"></textarea>
                    <label for="form75">Description</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-6">
                <div class="md-form">
                    <input type="email" name="email"   class="form-control" required>
                    <label for="orangeForm-name">Email</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-6">
                <input class="btn btn-primary" type="submit" name="send" value="Generate letter">
            </div>
        </div>
    </form>


@endsection
