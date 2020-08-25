
@extends('principle_dashboard.dashboard')
@section('content')

<form action="{{url('/news_&_updates')}}"  method="post" enctype="multipart/form-data">
    @csrf
    <div class="md-form">
        <i class="fas fa-heading prefix"></i>
        <input type="text" name="Tittle" id="Tittle" class="form-control">
        <label for="orangeForm-name">Tittle of news </label>
    </div>
    <br>
    <div class="md-form">
        <i class="fas fa-edit prefix"></i>
        <input type="text" name="Description" id="Description" class="form-control">
        <label for="orangeForm-email">Description</label>
    </div>
    <br>
    <!--img upload-->
    <div class="md-form">
        <div class="file-field">
            <div class="btn btn-primary btn-sm float-left">
                <span>Upload picture</span>
                <input accept="image/*" type="file" name="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload your file">
            </div>
        </div>
    </div>
    <br>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary" id="submit" >
                {{ __('Submit') }}
            </button>
            <button type="reset" class="btn btn-primary" id="reset" >
                {{ __('clear') }}
            </button>
        </div>
    </div>
</form>
@endsection
