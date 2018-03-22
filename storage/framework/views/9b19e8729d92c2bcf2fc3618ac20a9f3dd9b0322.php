<!DOCTYPE html>
<html lang="en">
<head>
<title>	
<?php echo $__env->yieldContent('title'); ?>
</title>
<?php echo $__env->make('flower.inc._meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('meta'); ?>
<?php echo $__env->make('flower.inc._css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('css'); ?>
<head>
<body>
<?php echo $__env->make('flower.inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('flower.inc.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> ?>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>