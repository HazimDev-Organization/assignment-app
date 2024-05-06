@extends('layouts.master')
@section('content')
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
                                    <th style="width: 20%;">ID</th>
                                    <th style="width: 20%;">Name</th>
                                    <th style="width: 20%;">Course</th>
                                    <th style="width: 20%;">Faculty</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Prof Mustaffa</td>
                                    <td>CDCS266</td>
                                    <td>KPPIM</td>
                                    <td><button class="btn btn-danger btn-sm">DELETE</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Prof Mustaffa</td>
                                    <td>CDCS110</td>
                                    <td>KPPIM</td>
                                    <td><button class="btn btn-danger btn-sm">DELETE</button></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Prof Mustaffa</td>
                                    <td>CDCS264</td>
                                    <td>KPPIM</td>
                                    <td><button class="btn btn-danger btn-sm">DELETE</button></td>
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
