<?php $__env->startSection('title'); ?>
	<!-- title here -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta'); ?>
	<!-- meta here -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
	<!-- css here -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<?php echo e(__('messages.ss')); ?>

	<?php echo app('translator')->getFromJson('messages.ss'); ?>
	<?php
		// echo __('ss');
		echo __('messages.welcome');
	 ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
	
	<script type="text/javascript">
 	

	 	$.ajax({
			url:'http://flower.eve/haha',
		  
		}).done(function(data){console.log(data);});
	</script>
<?php $__env->stopSection(); ?>


 
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>