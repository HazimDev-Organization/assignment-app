@extends('layouts.master')
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
                                        <h4 class="card-title">Register your course</h4>
                                    </div>
                                    <div class="card-body">
                                    <form method="POST" action="/add-course">
                                    @csrf                                             
                                    <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Full Name (disabled)</label>
                                                        <input type="text" class="form-control" disabled placeholder="FullName" value="{{ $lecturer->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Faculty Name (disabled)</label>
                                                        <input type="text" class="form-control" disabled placeholder="facultySelect" value="{{ $faculty->name }}">
                                                        <input type="hidden" name="faculty_id" value="{{ $faculty->id }}">
                                                    </div>  
                                                    <div class="form-group">
                                                        <label for="course">Course</label>
                                                        <select class="form-control" name="course_id" id="course">
                                                        @foreach($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->name }} ({{ $course->code }})</option>
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
</body>
</html>
