
<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible text-light" role="alert">
        <strong>Success !</strong> <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <div class="alert alert-dismissible text-dark" role="alert" style="background-color: #842029;">
        <strong>Error !</strong> <?php echo e(session()->get('error')); ?>

    </div>
<?php endif; ?><?php /**PATH /home/samia/MyProjects/HotelManagement/resources/views/common/alert.blade.php ENDPATH**/ ?>