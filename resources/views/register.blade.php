<!DOCTYPE HTML>
<html>
@include('includes.header')
<body class="h-80">
<form action="{{route('Register')}}" method="POST">
    <h4 style="margin-left:50%; margin-top:5%;">Register</h4>
    <div class="col-6" style="margin-left: 24%;">@include('common.alert')</div>
@csrf
  <div class="form-group col-6">
    <label style="margin-left:50%; margin-top:5%;" for="exampleInputEmail1">Email address</label>
    <input style="margin-left:50%; margin-top:1%;" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small style="margin-left:50%; margin-top:1%;" id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group col-6">
    <label style="margin-left:50%; margin-top:1%;" for="exampleInputPassword1">Password</label>
    <input style="margin-left:50%; margin-top:1%;" name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group col-6">
    <label style="margin-left:50%; margin-top:1%;" for="Name">Name</label>
    <input style="margin-left:50%; margin-top:1%;" name="name" type="text" class="form-control" placeholder="Name">
  </div>
  <p style="margin-left:25%; margin-top:1%;">Already have account <a href="{{route('viewloginpage')}}">Login</a></p>
  <button style="margin-left:25%;" type="submit" class="btn btn-primary">Submit</button>
</form>
</body>    
</html>
