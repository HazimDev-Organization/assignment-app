@extends('layouts.master')
@section('content')
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
                                    <th>ID</th>
                                    <th>Course</th>
                                    <th>Created at</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>CDCS266</td>
                                    <td>2023-08-31 13:05:55</td>
                                    <td>2023-09-01</td>
                                    <td>                                
                                    <button class="btn btn-success btn-sm">ACTIVE</button>
                                    </td>
                                    <td><a class="btn btn-primary btn-sm" href="/take-course/manage/details">DETAILS</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>CDCS240</td>
                                    <td>2023-08-31 13:05:55</td>
                                    <td>2023-09-01</td>
                                    <td>
                                    <button class="btn btn-default btn-sm">INACTIVE</button>
                                    </td>
                                    <td><a class="btn btn-primary btn-sm" href="/take-course/manage/details">DETAILS</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>CDCS264</td>
                                    <td>2023-08-31 13:05:55</td>
                                    <td>2023-09-01</td>
                                    <td>
                                    <button class="btn btn-default btn-sm">INACTIVE</button>
                                    </td>
                                    <td><button class="btn btn-primary btn-sm">DETAILS</button></td>
                                </tr>            
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
