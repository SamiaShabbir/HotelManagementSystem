<!DOCTYPE HTML>
<html>
@include('includes.header')
<body class="h-80">
<form action="{{route('LoginPost')}}" method="POST">
    <h4 style="margin-left:50%; margin-top:5%;">Login</h4>
    <div class="col-6" style="margin-left: 24%;">@include('common.alert')</div>

    <div class="form-group col-6">
    @csrf
    <label style="margin-left:50%; margin-top:5%;" for="exampleInputEmail1">Email address</label>
    <input style="margin-left:50%; margin-top:1%;" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small style="margin-left:50%; margin-top:1%;" id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    @if ($errors->has('email'))
            <span class="error text-bolder"
             style="margin-left: 3%; margin-left: 3%; font-size:12px;">{{ $errors->first('email') }}</span>
    @endif
  </div>
  <div class="form-group col-6">
    <label style="margin-left:50%; margin-top:1%;" for="exampleInputPassword1">Password</label>
    <input style="margin-left:50%; margin-top:1%;" name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    @if ($errors->has('password'))
            <span class="error text-bolder"
             style="margin-left: 3%; margin-left: 3%; font-size:12px;">{{ $errors->first('password') }}</span>
    @endif 
  </div>
  <p style="margin-left:25%; margin-top:1%;">Doesn't have account <a href="{{route('viewregisterpage')}}">Create Account</a></p>
  <button style="margin-left:25%;" type="submit" class="btn btn-primary">Submit</button>
</form>
</body>    
</html>
