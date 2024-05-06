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
                                                    <td>Professor Mustaffa</td>
                                                </tr>
                                                <tr class="table table-bordered">
                                                    <th>Course</th>
                                                    <td>CDCS266</td>
                                                </tr>
                                                <tr class="table table-bordered">
                                                    <th>Status</th>
                                                    <td>Active</td>
                                                </tr>
                                                <tr class="table table-bordered">
                                                    <th>File Attached</th>
                                                    <td><a href="path/to/your/assignment/file.pdf" target="_blank">2222dsds.pdf</a></td>
                                                </tr>
                                                <tr class="table table-bordered">
                                                    <th>Total Registered Students</th>
                                                    <td>13</td>
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
                                <tr>
                                    <td>1</td>
                                    <td>Sofea Rose</td>
                                    <td>2023118623</td>
                                    <td><a href="path/to/your/assignment/file.pdf" target="_blank">2222dsds.pdf</a></td>
                                    <td>n/a</td>
                                    <td>
                                    <form>    
                                    <div class="form-group">
                                                        <input type="text" class="form-control"  placeholder="facultySelect" value="5">
                                                    </div> 
                                                    <button type="submit" class="btn btn-info btn-fill btn-sm"">Submit</button>  
                                    </form>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Taufiq</td>
                                    <td>2023118623</td>
                                    <td><a href="path/to/your/assignment/file.pdf" target="_blank">2222dsds.pdf</a></td>
                                    <td>n/a</td>
                                    <td>
                                    <form>    
                                    <div class="form-group">
                                                        <input type="text" class="form-control"  placeholder="facultySelect" value="5">
                                                    </div> 
                                                    <button type="submit" class="btn btn-info btn-fill btn-sm"">Submit</button>  
                                    </form>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sofea Rose</td>
                                    <td>2023118623</td>
                                    <td><a href="path/to/your/assignment/file.pdf" target="_blank">2222dsds.pdf</a></td>
                                    <td>n/a</td>
                                    <td>
                                    <form>    
                                    <div class="form-group">
                                                        <input type="text" class="form-control"  placeholder="facultySelect" value="5">
                                                    </div> 
                                                    <button type="submit" class="btn btn-info btn-fill btn-sm"">Submit</button>  
                                    </form>    
                                    </td>
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
