@include('include/header')
@if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

<h3>Welcome {{ Auth::user()->name }} </h3>



<hr>
<div class="table-responsive">
    <h3>Appointment List</h3>
    <br>
        <table class="table table-striped table-sm table-primary">
          <thead>
            <tr>
              <th>ID</th>
              <th>Patient Name</th>
              <th>Doctor Name</th>
              <th>Department </th>
              <th>Appointment Date</th>
              <th>Mobile No</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <!-- {{$i=1}} -->
            @foreach($appointments as $list)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$list->patient_name}}</td>
              <td>{{$list->doctor_name}}</td>
              <td>{{$list->department}}</td>
              <td>{{$list->appointment_date}}</td>
              <td>{{$list->mobile}}</td>
              <td>{{$list->status}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@include('include/footer')