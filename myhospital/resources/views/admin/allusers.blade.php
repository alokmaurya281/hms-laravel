@include('admin/include/header')
@include('admin/include/navbar')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>
<div class="accordion pt-3" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Add New User
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-10 offset-md-1 mt-5 py-3 bg-white ">
                    <div class="container pb-5 shadow-lg ">
                        <h3>Registration for User</h3>
                        <hr>
                        <form action="add_users" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
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
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" value=""
                                    required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="">Choose One</option>
                                        <option value="1">Admin</option>
                                        <!-- <option value="2">Doctor</option> -->
                                        <option value="3">User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-4">
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

<div class="table-responsive">
    <table class="table table-striped table-sm table-primary">
        <thead>
            <tr>

                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Type</th>
                <th>Manage Users</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>



                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->mobile}}</td>
                <td>{{$user->type}}</td>
                <td><a href="edit_user?id={{$user->id}}">Edit User</a></td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@include('admin/include/footer')