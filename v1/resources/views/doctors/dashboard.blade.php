@include('doctors/include/header')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Appointment's </h1>
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
      <div class="table-responsive">
        <table class="table table-striped table-sm table-primary">
          <thead>
            <tr>
              <th>ID</th>
              <th>Doctor Name</th>
              <th>Patient Name</th>
              <th>Mobile</th>
              <th>Appointment Date</th>
              <th>Payment Id</th>
              <th>Payment Status</th>
              <th>Booking Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($app_lists as $list)
            <tr>
              <td>{{$list->id}}</td>
              <td>{{$list->doctor_name}}</td>
              <td>{{$list->patient_name}}</td>
              <td>{{$list->mobile}}</td>
              <td>{{$list->appointment_date}}</td>
              <td>{{$list->razorpay_payment_id}}</td>
              <td>{{$list->payment_status}}</td>
              <td>{{$list->status}} <a href="updateappointmentstatus?id={{$list->id}}" > <button class="btn btn-sm btn-outline-success">Update Status</button> </a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@include('doctors/include/footer')