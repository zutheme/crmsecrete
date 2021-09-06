
<?php $__env->startSection('other_styles'); ?>
    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.1.3')); ?>" rel="stylesheet">  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

   <div class="col-md-12 col-sm-12 col-xs-12 text-center">

        <div>

        <h5>Login success</h5>

        </div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('other_scripts'); ?>
    <script src="<?php echo e(asset('gentelella/build/js/custom.js')); ?>"></script>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crmenergy/domains/crm.secretenergy.net/public_html/resources/views/admin/welcome/loginsuccess.blade.php ENDPATH**/ ?>