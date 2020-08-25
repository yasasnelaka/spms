@extends('class_teacher_dashboard.dashboard')
@section('content')
    <div class="container-fluid">
        <!--Success Alert-->
        @if(session()->has('message'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif

        <table id="table1" class="table">
            <thead class="grey lighten-2">
            <tr>
                <th scope="col">Admission Number</th>
                <th scope="col">Full name</th>
                <th scope="col">Marks </th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach($marks as $marks)
                <tr>
                        <td>{{$marks->admission_number}}</td>
                        <td>{{$marks->full_name}}</td>
                        <td> {{$marks->marks}}</td>
                    <td>



                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#basicExampleModal">
                            Update
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Mark</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{url('/class_teacher/edit_mark')}}" method="post">
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <div class="modal-body">
                                            <label>Enter Mark</label>
                                            <input type="text"  name="mark" class="form-control"><br>
                                        </div>

                                        <div class="modal-footer">
                                            <input type="hidden" class="btn  btn-primary" name="id" value="{{$marks->id}}">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td>
                        <form action="{{url('/class_teacher/delete_mark')}}" method="post">
                            {{method_field('DELETE')}}
                            @csrf
                            <input type="hidden" class="btn  btn-primary" name="id" value="{{$marks->id}}">
                            <button class="btn btn-danger btn-sm" type="submit" >Delete</button>
                        </form>
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
    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>


@endsection
