@include('include/header')
@if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

<h1>Welcome {{ Auth::user()->name }} </h1>
@include('include/footer')