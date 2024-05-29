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
                                        <h4 class="card-title">Assign your Assignment</h4>
                                    </div>
                                    <div class="card-body">
                                    <form method="POST" action="{{ route('register-assignment') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Assignment Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Task 1">
                </div>                                                     
                <div class="form-group">
                    <label for="teach">Course Name</label>
                    <select class="form-control" name="teach_id" id="teach">
                        @foreach($teaches as $teach)
                        <option value="{{ $teach->course->id }}">{{ $teach->course->name }} ({{ $teach->course->code }})</option>
                        @endforeach
                    </select>
                </div>                                                    
                <div class="form-group">
                    <label>Status</label><br>
                    <label class="form-check-label" style="margin-right: 10px;">
                        <input class="form-check-input" type="radio" name="status" id="statusActive" value="Active" checked="checked"> Active
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="status" id="statusInactive" value="Inactive"> Inactive
                    </label>
                </div>
                <div class="form-group">
                    <label for="dateline">Dateline</label>
                    <input type="date" class="form-control" id="dateline" name="dateline">
                </div>
                <div class="form-group">
                    <label for="fileInput">Choose a file</label>
                    <input type="file" class="form-control-file" id="fileInput" name="fileInput">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info btn-fill pull-right">Register Assignment</button>
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
