@extends('layouts.masterStudent')
@section('content')
            <div class="content">
                    <div class="container-fluid">
                        <div class="row">                      
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Course Registration</h4>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Full Name (disabled)</label>
                                                        <input type="text" class="form-control" disabled placeholder="FullName" value="Sofea Rose">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Faculty Name (disabled)</label>
                                                        <input type="text" class="form-control" disabled placeholder="facultySelect" value="KPPIM">
                                                    </div>  
                                                    <div class="form-group">
                                                        <label for="courseSelect">Course</label>
                                                        <select class="form-control" id="courseSelect">
                                                            <option value="">Please select</option>
                                                            <option value="science">CDCS110</option>
                                                            <option value="engineering">CDCS240</option>
                                                            <option value="arts">CDCS266</option>
                                                            <option value="medicine">CDCS264</option>
                                                        </select>
                                                    </div>            
                                                    <div class="form-group">
                                                        <label for="lecturerSelect">Lecturer</label>
                                                        <select class="form-control" id="lecturerSelect">
                                                            <option value="">Please select</option>
                                                            <option value="science">Prof Mustaffa</option>
                                                            <option value="engineering">Dr. Sarah</option>
                                                            <option value="arts">Miss Sharifah</option>
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
