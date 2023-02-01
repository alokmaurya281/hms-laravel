@include('include/header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('error') !!}
            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('success') !!}
            <div class="panel panel-default" style="margin-top: 30px;">
                <h3>Appointment Fees</h3><br>
                <div class="panel-heading">
                    <h2>Pay With Razorpay</h2>
                    @if($appointments = Session::get('appointments'))
                    @foreach($appointments as $appointment)
                    <!-- {{$appointment->id}} -->
                    @endforeach
                    @endif
                
                    <form action="{!!route('payment')!!}" method="POST" >

                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ env('RAZOR_KEY') }}"
                                data-prefill.amount="amount"
                                data-name="Myhospital"
                                data-description="Payment"
                                data-prefill.name="name"
                                data-prefill.email="email"
                                data-theme.color="#16C304">
                        </script>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                        <input type="hidden" name="id" value="{{$appointment->id}}">

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('include/footer')