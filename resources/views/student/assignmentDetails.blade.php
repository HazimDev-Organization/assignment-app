@extends('layouts.masterStudent')
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
                                <th style="width: 10%;">No.</th>
                                <th style="width: 15%;">Lecturer</th>
                                <th style="width: 10%;">Course ID</th>
                                <th style="width: 20%;">Assignment File</th>
                                <th style="width: 15%;">Deadline</th>
                                <th style="width: 30%;">Submit Assignment</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1; // Initialize count variable
                            @endphp
                            @foreach($assignments as $assignment)
                            <tr>    
                                <td>{{ $count }}</td>
                                <td>{{ $assignment->teach->lecturer->name }}</td>
                                <td>{{ $assignment->teach->course->code }}</td>
                                <td><a href="{{ asset('storage/app/public/' . $assignment->assignmentDetails_file) }}" target="_blank">Download File</a></td>
                                    <td>{{ $assignment->dateline }}</td>
                                    <td>
                                        @php
                                            $submission = $assignment->submits->where('student_id', $student->id)->first();
                                        @endphp

                                        @if($submission)
                                            <!-- If the student has submitted the assignment, show the unsubmit button -->
                                            <form method="POST" action="{{ route('unsubmit-assignment', $submission->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-fill btn-sm">Unsubmit</button>
                                            </form>
                                        @else
                                            <!-- If the student has not submitted the assignment, show the submit form -->
                                            <form method="POST" action="{{ route('submit-assignment') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                                                <div class="form-group">
                                                    <label for="assignmentFile"></label>
                                                    <input type="file" class="form-control-file" id="assignmentFile" name="assignmentFile">
                                                </div>
                                                <button type="submit" class="btn btn-info btn-fill btn-sm">Submit</button>
                                            </form>
                                        @endif
                                    </td>                                   
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
