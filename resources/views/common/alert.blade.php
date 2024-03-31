{{-- Message --}}
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible text-light" role="alert">
        <strong>Success !</strong> {{ session()->get('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-dismissible text-dark" role="alert" style="background-color: #842029;">
        <strong>Error !</strong> {{ session()->get('error') }}
    </div>
@endif