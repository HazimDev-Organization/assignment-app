@extends('layouts.masterStudent')
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
                                    <th>Lecturer</th>
                                    <th>Course</th>
                                    <th>Assignment File</th>
                                    <th>Deadline</th>
                                    <th>Submit Assignment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Prof. Mustaffa</td>
                                    <td>CDCS266</td>
                                    <td><a href="path/to/your/assignment/file.pdf" target="_blank">2222dsds.pdf</a></td>
                                    <td>2023-09-01</td>
                                    <td>
                                    <form>
                                    <div class="form-group">
                                                        <input type="file" class="form-control-file" id="fileInput" name="fileInput">
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill btn-sm">Submit</button>
                                    </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Prof. Mustaffa</td>
                                    <td>CDCS266</td>
                                    <td><a href="path/to/your/assignment/file.pdf" target="_blank">2222dsds.pdf</a></td>
                                    <td>2023-09-01</td>
                                    <td>
                                    <form>
                                    <div class="form-group">
                                                        <input type="file" class="form-control-file" id="fileInput" name="fileInput">
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill btn-sm">Submit</button>
                                    </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Prof. Mustaffa</td>
                                    <td>CDCS266</td>
                                    <td><a href="path/to/your/assignment/file.pdf" target="_blank">2222dsds.pdf</a></td>
                                    <td>2023-09-01</td>
                                    <td>
                                    <form>
                                    <div class="form-group">
                                                        <input type="file" class="form-control-file" id="fileInput" name="fileInput">
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill btn-sm">Submit</button>
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
