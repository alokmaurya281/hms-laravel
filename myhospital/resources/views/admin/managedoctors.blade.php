@include('admin/include/header')
@include('admin/include/navbar')
<div class="container">
    <div class="accordion pt-3" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
          @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
@endif
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Add New Doctor
                  </button>
                </h2>
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-10 offset-md-1 mt-5 py-3 bg-white ">
                    <div class="container pb-5 shadow-lg ">
                        <h3>Registration for Doctor's</h3>
                        <hr>
                        <form action="add_doctors" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="row">
                            @foreach ($errors->all() as $error)
    <div class=" col-md-6  form-group alert alert-danger">
    {{ $error }}<br/>
</div>
@endforeach
                                <div class="col-md-6 form-group">
                                    <label for="Department">Select Department</label>
                                    <select name="department" id="Department" class="form-control" required>
                                        <option value="">Choose One</option>
                                        @foreach($departments as $department)
                                        <option value="{{$department->department}}">{{$department->department}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="full_name" id="name" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control" value="" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" value="" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="">Choose One</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="address">Full Address</label>
                                    <input type="text" name="full_address" id="address" class="form-control" value="" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="city">city</label>
                                    <input type="text" name="city" id="city" class="form-control" value="" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="pin_code">pin code</label>
                                    <input type="number" name="pincode" id="pin_code" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="idtype">Select GOVT id type</label>
                                    <select name="govt_id_type" id="idtype" class="form-control" required>
                                        <option value="">Choose One</option>
                                        <option value="aadhar">AAdhar</option>
                                        <option value="pancard">PanCard</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="idnum">Id number</label>
                                    <input type="text" name="id_number" id="idnum" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-5 form-group">
                                    <label for="file">Profile Image image</label>
                                    <input type="file" name="profile_image" id="file" class="form-control" value="" required>
                                </div>
                                <div class="col-md-5 form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" value="" required>
                                </div>
                                <div class="col-md-2 form-group pt-3 mt-3">
                                    <input type="submit" value="register" name="register" class="btn btn-primary">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div> 
          </div>
        </div>    
    </div> 
    <div class="table-responsive pt-5">
        <table class="table shadow-lg table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Doctor Id</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($doctors as $doctor)
              <tr>
                <th scope="row">{{$doctor->id}}</th>
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->department}}</td>
                <td><form action="doctorfulldetail/{{request()->get('id')}}" method="POST">
                    @csrf
                    
                </form><a href="doctorfulldetail?id={{$doctor->id}}" > <button class="btn btn-info"><span data-feather="eye"></span>View Full Detail</button> </a></td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@include('admin/include/footer')