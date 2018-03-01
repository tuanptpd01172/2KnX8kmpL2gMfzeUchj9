
<?php echo e(__('messages.ss')); ?>

<?php echo app('translator')->getFromJson('messages.ss'); ?>
<?php
	// echo __('ss');
	echo __('messages.welcome');
 ?>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script type="text/javascript">
 	

 	$.ajax({
	url:'http://flower.eve/hahas',
  
}).done(function(data){console.log(data);});
 </script>