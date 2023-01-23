@include('admin/include/header')
@include('admin/include/navbar')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 py-3 bg-white from-wrapper">
            <div class="container shadow-lg py-3">
            	<h3>Edit Department</h3>
            	<hr>
                <form action="edit_department/{{request()->get('id')}}" method="POST">
                    @csrf
                    <div class="row">
                    <!-- {{request()->get('id')}} -->

                        <div class="col-md-6 form-group">
                            <label for="name">Department Name</label>
                            <input type="text" name="department" id="name" class="form-control" value="" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="mobile">Date</label>
                            <input type="text" name="date" id="mobile" class="form-control" value="" required>
                        </div>
                    </div>
                    
                    
                    
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