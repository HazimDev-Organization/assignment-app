@extends('layouts.masterStudent')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="content">
    <div class="container-fluid">
        <div class="row">                      
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Course Registration</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('student-add-course') }}">
                            @csrf                                             
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Full Name (disabled)</label>
                                        <input type="text" class="form-control" disabled placeholder="FullName" value="{{ $student->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Faculty Name (disabled)</label>
                                        <input type="text" class="form-control" disabled placeholder="facultySelect" value="{{ $faculty->name }}">
                                    </div>  
                                    <div class="form-group">
                                        <label for="course">Course</label>
                                        <select class="form-control" id="course" name="teach_id">
                                            @foreach($teaches as $teach)
                                                <option value="{{ $teach->id }}">{{ $teach->course->name }} ({{ $teach->course->code }}) - Lecturer {{ $teach->lecturer->name }}</option>
                                            @endforeach                                                            
                                        </select>
                                    </div>                                                    
                                </div>
                            </div>                                            
                            <button type="submit" class="btn btn-info btn-fill pull-right">Register Course</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
