@extends('layouts.master')
@section('content')
            <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- User Details Card now comes first and takes up 4 columns try commit-->
                            <div class="col-md-4">
                                <div class="card card-user">
                                    <div class="card-image">
                                        <img src="{{ asset('/img/background-card.jpg') }}" alt="Background Image">
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="author">
                                            <a href="#">
                                                <img class="avatar border-gray" src="{{ asset('img/faces/face-3.jpg') }}" alt="Profile Image">
                                                <h5 class="title">Lecturer Details</h5>
                                            </a>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-left">Full Name</th>
                                                            <td class="text-right">Professor Mustaffa</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left">Faculty Name</th>
                                                            <td class="text-right">KPPIM</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Profile Card now comes second and takes up 8 columns -->
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Profile</h4>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control" placeholder="FullName" value="Prof Mustaffa">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="facultySelect">Faculty</label>
                                                        <select class="form-control" id="facultySelect">
                                                            <option value="">Please select</option>
                                                            <option value="science">Science</option>
                                                            <option value="engineering">Engineering</option>
                                                            <option value="arts">Arts</option>
                                                            <option value="medicine">Medicine</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
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
