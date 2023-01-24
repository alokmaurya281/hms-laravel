@include('admin/include/header')

@include('admin/include/navbar')
    
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Detail</h1>
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
                            <h3>Mobile :-<span class="text-info p-2">{{$detail->mobile}}</span></h3>
                           
                            
                            <!-- <div >
                                <div class="text-center">
                                    <a href="edit_doctor?id={{request()->get('id')}}"><button type="button" class="btn btn-sm btn-outline-primary">Update</button></a>
                                    <form action="deletedoctor/{{request()->get('id')}}" method="POST">
                                        @csrf
                                    <button  type="submit" name="delete" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                                </div>
                                
                            </div> -->
                          
                        </div>
                    </div>
                    
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
     
@include('admin/include/footer')