@include('include/header')
<div class="container bg-transparent">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 py-3 bg-white from-wrapper">

            <div class="container pb-5 shadow-lg ">
                <h3>Book Appointment</h3>
                <hr>
                <form action="bookappointment" method="POST">
                    {{ csrf_field() }}

                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}<br />
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Patient Name</label>
                            <input type="text" name="patient_name" id="name" class="form-control" value="" required>
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
                    @foreach($doctors as $doctor)

                    <input type="text" name="doctor_id" value="{{$doctor->id}}" hidden>
                    <input type="text" name="doctor_name" value="{{$doctor->name}}" hidden>
                    <input type="text" name="department" value="{{$doctor->department}}" hidden>
                    @endforeach
                                        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                        
                    <div class="form-group">
                        <label for="date">Appointment Date</label>
                        <input type="date" name="appointment_date" id="empid"  value=""  class="form-control" onchange="getData(this.value, 'displaydata')">
                            <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#empid').attr('min',today);
    </script>
                    </div>
                    
                        <div class="form-group">
                            <label for="type">Gender</label>
                            <select name="gender" id="type" class="form-control" required>
                                <option value="">Choose One</option>
                                <option value="M">Male</option>

                                <option value="F">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="prescription">Prescription </label>
                        <textarea id="prescription" name="prescription" rows="5" cols="10" class="form-control"></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <input type="submit" value="Submit" name="register" class="btn btn-primary">
                        </div>

                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
@include('include/footer')