@include('admin/include/header')
@include('admin/include/navbar')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 py-3 bg-white from-wrapper">
            <div class="container shadow-lg py-3">
                <h3>Edit Doctor Details</h3>
                <hr>
                <form action="edit_doctor/{{request()->get('id')}}" method="POST">
                    @csrf
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
@endif
                    <div class="row">
                        <!-- {{request()->get('id')}} -->
                        
                        

                        <div class="col-md-6 form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="full_name" id="name" class="form-control" value="" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="mobile" id="mobile" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="Department">Select Department</label>
                        <select name="department" id="Department" class="form-control" required>
                            <option value="">Choose One</option>
                            <option value="1">Surgery</option>
                            <option value="2">Ear specialty</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Choose One</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
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
                    <div class="form-group">
                        <label for="email"> Address</label>
                        <input type="text" name="full_address" id="email" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">City</label>
                        <input type="text" name="city" id="email" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Pincode</label>
                        <input type="number" name="pincode" id="email" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" name="password" id="email" class="form-control" value="" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="file">Profile Image image</label>
                        <input type="file" name="profile_image" id="file" class="form-control" value="" required>
                    </div>
                   -->


                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <input type="submit" value="edit" name="edit" class="btn btn-primary">
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('admin/include/footer')