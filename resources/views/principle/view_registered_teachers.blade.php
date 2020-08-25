@extends('principle_dashboard.dashboard')
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
                <th scope="col">Staff ID</th>
                <th scope="col">Profile Picture</th>
                <th scope="col">Full Name</th>
                <th scope="col">Telephone Number</th>
                <th scope="col">Role</th>
                <th scope="col">Update</th>
                <th scope="col">delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{$teacher->staff_id}}</td>
                    <td><img src="../../{{$teacher->profile_picture}}" width="50"  height="70"></td>
                    <td>{{$teacher->full_name}}</td>
                    <td>{{$teacher->address}}</td>
                    <td>{{$teacher->role}}</td>
                    <td>
                        <form  action="{{url('/principle/teacher_update')}}" method="get">
                            <input type="hidden" name="id" value="{{$teacher->staff_id}}">
                            <button class="btn btn-warning" type="submit" name="submit">Update</button>
                        </form>
                    </td>
                    <td>
                        <form  action="{{url('principle/teacher_delete')}}" method="post">
                            {{ method_field('DELETE') }}
                            @csrf
                            <input type="hidden" name="id" value="{{$teacher->staff_id}}">
                            <input type="hidden" name="user_id" value="{{$teacher->user_id}}">
                            <button class="btn btn-danger" type="submit" name="submit">Delete</button>
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

@endsection

