@extends('dashboard.dashboard')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container-fluid">

        <table id="table1" class="table">
            <thead class="grey lighten-2">
            <tr>
                <th scope="col">Admission Number</th>
                <th scope="col">Student Name</th>
                <th scope="col">Class</th>
                <th scope="col">Grade</th>
                <th scope="col">Update</th>
            </tr>
            </thead>
            <tbody>

            @foreach($classes as $class)
                <tr>
                    <td>{{$class->student_admission_number}}</td>
                    <td>{{$class->full_name}}</td>
                    <td>{{$class->class}}</td>
                    <td>{{$class->grade}}</td>
                    <td>



                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
                                Update
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Class</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{url('/student_class_edit')}}" method="post">
                                            {{ method_field('PUT') }}
                                            @csrf
                                        <div class="modal-body">
                                            <label>Enter grade</label>
                                            <input type="text"  name="grade"><br>
                                            <label>Enter class</label>
                                            <input type="text" name="class">
                                        </div>

                                        <div class="modal-footer">
                                            <input type="hidden" class="btn  btn-primary" name="admission_number" value="{{$class->student_admission_number}}">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                    </td>

                </tr>
            @endforeach

                        </tbody>
                    </table>

                    <!-- Data Table -->
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                        <tr>
                            <td class="gutter">
                                <div class="line number1 index0 alt2" style="display: none;">1</div>
                            </td>
                            <td class="code">
                                <div class="container" style="display: none;">
                                    <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
        </table>
    </div>

@endsection
