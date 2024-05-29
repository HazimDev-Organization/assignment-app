@extends('layouts.master')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="content">
    <div class="container-fluid">
        <div class="row">                      
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List of Assignment</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Course</th>
                                    <th>Created at</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1; // Initialize count variable
                            @endphp
                            @foreach($assignments as $assignment)
                            <tr>    
                                <td>{{ $count }}</td>
                                <td>{{ $assignment->teach->course->name }}</td>
                                    <td>{{ $assignment->created_at }}</td>
                                    <td>{{ $assignment->dateline }}</td>
                                    <td>
                                    <form method="POST" action="{{ route('toggle-assignment-status', $assignment->id) }}">
                                        @csrf
                                        @if($assignment->status == 'Active')
                                            <button type="submit" class="btn btn-success btn-sm">ACTIVE</button>
                                        @else
                                            <button type="submit" class="btn btn-default btn-sm">INACTIVE</button>
                                        @endif
                                    </form>
                                    </td>
                                    <td>
                <a class="btn btn-primary btn-sm" href="{{ route('assignment-details', $assignment->id) }}">DETAILS</a>
                <p></p>
                <form method="POST" action="{{ route('delete-assignment', $assignment->id) }}" onsubmit="return confirm('Are you sure you want to delete this assignment record?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                </form>
            </td>
            <td></td> <!-- Empty cell to maintain alignment -->
        </tr>
                                @php
                                $count++; // Increment count variable
                            @endphp
                            @endforeach                                           
                            </tbody>                               
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
</body>
</html>
