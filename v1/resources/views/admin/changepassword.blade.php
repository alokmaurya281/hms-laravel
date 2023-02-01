@include('admin/include/header')
@include('admin/include/navbar')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 py-3 bg-white from-wrapper">
            <div class="container shadow-lg py-3">
            	<h3>Change Password</h3>
            	<hr>
                                <form action="changepassword" method="POST">
                                {{ csrf_field() }}
                                   
                    <div class="form-group">
                        <label for="email">New Password</label>
                        <input type="password" name="password" id="email" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password" class="form-control" value="" required>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
@endif
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <input type="submit" value="change" name="change" class="btn btn-primary" />
                        </div>
                      
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>  
</div>
@include('include/footer')