@extends('layouts.masterStudent')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">                      
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List of Assignment Results</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>title</th>
                                    <th>Course</th>
                                    <th>Lecturer</th>
                                    <th>Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1; // Initialize count variable
                            @endphp
                            @foreach($submits as $submit)
                            <tr>    
                                <td>{{ $count }}</td>
                                <td>{{ $submit->assignment->title}}</td>
                                    <td>{{ $submit->assignment->teach->course->name }} ({{ $submit->assignment->teach->course->code }})</td>
                                    <td>{{ $submit->assignment->teach->lecturer->name }}</td>
                                    <td>{{ $submit->marks}}</td>
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
