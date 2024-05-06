@extends('layouts.master')
@section('content')
            <div class="content">
                    <div class="container-fluid">
                        <div class="row">                      
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Assign your Assignment</h4>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Faculty Name (disabled)</label>
                                                        <input type="text" class="form-control" disabled placeholder="facultySelect" value="Prof Mustaffa">
                                                    </div>                                                     
                                                    <div class="form-group">
                                                        <label for="courseSelect">Course Name</label>
                                                        <select class="form-control" id="courseSelect">
                                                            <option value="">Please select</option>
                                                            <option value="science">CDCS110</option>
                                                            <option value="engineering">CDCS240</option>
                                                            <option value="arts">CDCS266</option>
                                                            <option value="medicine">CDCS264</option>
                                                        </select>
                                                    </div>                                                    
                                            <div class="form-group">
                                                    <label class="form-check-label" style="margin-right: 10px;">
                                                        <input class="form-check-input" type="radio" name="status" id="statusActive" value="Active" checked="checked"> Active
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="status" id="statusInactive" value="Inactive"> Inactive
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
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
                                                <button type="submit" class="btn btn-info btn-fill pull-right">Register Course</button>
                                            <div class="clearfix"></div>
                                            </div>                                                                                        
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
