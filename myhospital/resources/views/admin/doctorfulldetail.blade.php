@include('admin/include/header')

@include('admin/include/navbar')
    
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Doctor Detail</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
      </div>
<div class="mx-3 shadow p-3 m-2"> 
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="card p-5 shadow-sm text-center">
                        @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
@endif
                            @foreach($details as $detail)

                            
                            <h3>Name :-<span class="text-info p-2">{{$detail->name}}</span></h3>
                            <h3>Email :-<span class="text-info p-2">{{$detail->email}}</span></h3>
                            <h3>Gender :-<span class="text-info p-2">{{$detail->gender}}</span></h3>
                            <h3>Mobile :-<span class="text-info p-2">{{$detail->mobile}}</span></h3>
                            <h3>Address :-<span class="text-info p-2">{{$detail->address}}</span></h3>
                            <h3>ID type :-<span class="text-info p-2">{{$detail->govt_id_type}}</span></h3>
                            <h3>ID Number :-<span class="text-info p-2">{{$detail->id_number}}</span></h3>
                            <h3>Department :-<span class="text-info p-2">{{$detail->department}}</span></h3>
                            <div >
                                <div class="text-center">
                                    <a href="edit_doctor?id={{request()->get('id')}}"><button type="button" class="btn btn-sm btn-outline-primary">Update</button></a>
                                    <form action="deletedoctor/{{request()->get('id')}}" method="POST">
                                        @csrf
                                    <button  type="submit" name="delete" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                                </div>
                                
                            </div>
                          
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card mb-4 shadow-sm">
                            <h3 class="text-muted text-center">Professional Image</h3>
                            <img class="card-img-top" src="../storage/{{$detail->professional_image}}"alt="Card image cap">
                            <form method="POST" enctype="multipart/form-data" action="updateprofessionalimage/{{request()->get('id')}}">
                                @csrf
                                <div class="row p-4">
                                <input type="file" name="professional_image" class="form-control col-md-8">
                                <input type="submit" name="change" value="change" class="btn btn-info col-md-4">
                                </div>
                            </form>
                            <h3 class="text-muted text-center">Profile Image</h3>
                            <img class="card-img-top" src="../storage/{{$detail->profile_image}}"alt="Card image cap">
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
     
@include('admin/include/footer')