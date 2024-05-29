@extends('layouts.master')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- User Details Card now comes first and takes up 4 columns -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Assignment details</h4>
                    </div>
                    <div class="card-body">
                        <table>
                            <tbody>
                                <tr class="table table-bordered">
                                    <th>Lecture</th>
                                    <td>{{ $lecturer->name }}</td>
                                </tr>
                                <tr class="table table-bordered">
                                    <th>Course</th>
                                    <td>{{ $course->code }}</td>
                                </tr>
                                <tr class="table table-bordered">
                                    <th>Status</th>
                                    <td>{{ $assignment->status }}</td>
                                </tr>
                                <tr class="table table-bordered">
                                    <th>File Attached</th>
                                    <td><a href="{{ $assignment->assignmentDetails_file }}" target="_blank">{{ basename($assignment->assignmentDetails_file) }}</a></td>
                                </tr>
                                <tr class="table table-bordered">
                                    <th>Total Registered Students</th>
                                    <td>{{ $submits->count() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Edit Profile Card now comes second and takes up 8 columns -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List of submitted Assignment</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Student ID</th>
                                    <th>Submitted File</th>
                                    <th>Marks</th>
                                    <th>Give Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($submits->isEmpty())
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">No submitted assignments yet.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @else
                                @foreach($submits as $submit)
                                <tr>
                                    <td>{{ $submit->id }}</td>
                                    <td>{{ $submit->student->name }}</td>
                                    <td>{{ $submit->student->student_id }}</td>
                                    <td><a href="{{ $submit->submitted_file }}" target="_blank">{{ basename($submit->submitted_file) }}</a></td>
                                    <td>{{ $submit->marks ?? 'n/a' }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('give-marks', $submit->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="marks" placeholder="Enter marks">
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill btn-sm">Submit</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
