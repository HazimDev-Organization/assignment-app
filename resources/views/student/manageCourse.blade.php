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
                        <h4 class="card-title">List of Registered Course</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">No.</th>
                                    <th style="width: 40%;">Lecturer</th>
                                    <th style="width: 30%;">Course ID</th>
                                    <th style="width: 30%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1; // Initialize count variable
                            @endphp
                            @foreach($learns as $learn)
                            <tr>    
                                <td>{{ $count }}</td>
                                    <td>{{ $learn->teach->lecturer->name }}</td>
                                    <td>{{ $learn->teach->course->code}}</td>
                                    <td>
                                    <form method="POST" action="{{ route('delete-learn', ['learn' => $learn->id]) }}" onsubmit="return confirm('Are you sure you want to delete this course record?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                    </form>
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
