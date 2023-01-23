@include('admin/include/header')
@include('admin/include/navbar')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 py-3 bg-white from-wrapper">
            <div class="container shadow-lg py-3">
            	<h3>Edit User</h3>
            	<hr>
                <form action="edit_user/{{request()->get('id')}}" method="POST">
                    @csrf
                    <div class="row">
                    <!-- {{request()->get('id')}} -->

                        <div class="col-md-6 form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="" required>
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