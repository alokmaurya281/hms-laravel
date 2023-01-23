@include('admin/include/header')
@include('admin/include/navbar')
    <div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-10 offset-md-1 mt-5 py-3 bg-white from-wrapper">
            <div class="container shadow-lg py-3">
            @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
@endif
            	<h3>Manage Department</h3><hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Department Id</th>
                            <th>Department Name</th>
                            <th>Date Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            
                            <td>{{$department->id}}</td>
                            <td>{{$department->department}}</td>
                            <td>{{$department->date}}</td>
                            <td><a href="edit_department?id={{$department->id}}" > <button class="btn btn-sm btn-outline-success">Update</button> </a></td>
                            <td>
                            <form action="deletedepartment/{{$department->id}}" method="POST">
                                        @csrf
                                    <button  type="submit" name="delete" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                          
                        </tr>
                        @endforeach
                    <form action="add_department" method="POST">
                        @csrf
                        <tr>
                            <td></td>
                            <td class="align-middle">
                            <input type="text" class="form-control mt-0" placeholder="Enter Department Name" name="department"  required>
                            </td>
                            <td>
                            <input type="text" class="form-control mt-0" placeholder="Date" name="date"  required>
                            </td>
                            <td class="align-middle text-center">

                                <button class="btn btn-success"  type="submit" name="add_department" value="add_department">Add</button>
                                <button class="btn btn-danger" type="button" onclick="javascript:window.location='manageservices';">Back</button>
                            </td>
                        </tr>
                    </form>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>  
</div>
     
@include('admin/include/footer')