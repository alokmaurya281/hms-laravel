@include('include/header')
<div class="mx-3 shadow-lg p-3 m-2">
    <div class="row">
        <div class="col-12 col-md-12">
            <h1 class="text-center">Docter's </h1>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="mx-3 shadow p-3 m-2">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                @foreach($doctors as $doctor)


                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="../storage/{{$doctor->professional_image}}" alt="Card image cap">
                        <div class="card-body">
                            <h3>{{$doctor->department}}</h3>
                            <p class="card-text">{{$doctor->name}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    @if (Auth::guest())
                                    <button type="button" class="btn btn-sm btn-outline-secondary"> <a
                                            href="login">Login to book appointment
                                        </a>
                                    </button>
                                    
                                    @else
                                   
                                    <form action="book" method="post">
                                        @csrf
                                        <input type="text" name="doctor_id" value="{{$doctor->id}}" hidden>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Book
                                            Appointment</button>
                                    </form>
                                    <!-- <a type="button" class="btn btn-secondary" href="bookappointment?doctor_id={{$doctor->id}}">Book Appointment</a> -->

                                    @endif
                                </div>

                            </div>
                            <small class="text-muted">10:00 AM to 1:00 PM</small>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@include('include/footer')