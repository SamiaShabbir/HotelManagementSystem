<!DOCTYPE HTML>
<html>
<?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="h-80">
<form action="<?php echo e(route('LoginPost')); ?>" method="POST">
    <h4 style="margin-left:50%; margin-top:5%;">Login</h4>
    <div class="col-6" style="margin-left: 24%;"><?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>

    <div class="form-group col-6">
    <?php echo csrf_field(); ?>
    <label style="margin-left:50%; margin-top:5%;" for="exampleInputEmail1">Email address</label>
    <input style="margin-left:50%; margin-top:1%;" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small style="margin-left:50%; margin-top:1%;" id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <?php if($errors->has('email')): ?>
            <span class="error text-bolder"
             style="margin-left: 3%; margin-left: 3%; font-size:12px;"><?php echo e($errors->first('email')); ?></span>
    <?php endif; ?>
  </div>
  <div class="form-group col-6">
    <label style="margin-left:50%; margin-top:1%;" for="exampleInputPassword1">Password</label>
    <input style="margin-left:50%; margin-top:1%;" name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <?php if($errors->has('password')): ?>
            <span class="error text-bolder"
             style="margin-left: 3%; margin-left: 3%; font-size:12px;"><?php echo e($errors->first('password')); ?></span>
    <?php endif; ?> 
  </div>
  <p style="margin-left:25%; margin-top:1%;">Doesn't have account <a href="<?php echo e(route('viewregisterpage')); ?>">Create Account</a></p>
  <button style="margin-left:25%;" type="submit" class="btn btn-primary">Submit</button>
</form>
</body>    
</html>
<?php /**PATH /home/samia/MyProjects/HotelManagement/resources/views/login.blade.php ENDPATH**/ ?>