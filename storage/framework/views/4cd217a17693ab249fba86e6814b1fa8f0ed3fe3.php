<?php $__env->startSection('title'); ?>
	Slide
<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta'); ?>
	<!-- meta here -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
	<!-- css here -->

	<link rel="stylesheet" href="/public/admin/vendor/ssi-uploader/styles/ssi-uploader.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- 
	<?php echo e(__('messages.ss')); ?>

	<?php echo app('translator')->getFromJson('messages.ss'); ?>
 -->
	<?php
		use Illuminate\Support\Facades\Input;
		
		//echo __('messages.welcome');
		//
		// echo "sdfsdf";
		// echo '<pre>';
		// print_r($slide->toArray());
		// echo '</pre>';
	 ?>
	  

	 	<!--  -->
	 <div class="row">
	 		<div class="ibox">
	 			<div class="ibox-title">Danh Sách Slide</div>
	 			<div class="ibox-content">

	 				<?php echo Helper::ss_flash(); ?>

			 			<table class="table table-bordered">
			 				<thead>
			 					<th>STT</th>
			 					<th>Ảnh</th>
			 					<th>Tiêu Đề</th>
			 					<th>Nội Dung</th>
			 					<th>Liên Kết Tiêu Đề & Ảnh</th>
			 					<th>Tác Vụ</th>
			 					<!-- <th>2</th>
			 					<th>3</th> -->
			 				</thead>
			 				<tbody>
			 					<?php if(isset($slide) && $slide != null ): ?>
			 						<?php $i = 0;?>
			 						<?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 					<tr>
			 						<td><?php echo e($i+1); ?>	</td>
			 						
			 						<td><img src="<?php echo e('/public/upload/thumbnail/'.$item_slide->image); ?>" width="50" >	</td>
			 						<td><?php echo e($item_slide->slide_detail[0]->Title); ?>	</td>
			 						<td><?php echo e($item_slide->slide_detail[0]->Descriptions); ?>	</td>
			 						<td><?php echo e($item_slide->slide_detail[0]->url); ?>	</td>
			 						<td>
			 							<a href="<?php echo e('/'); ?>" class="btn btn-default btn-sm"><i class="fas fa-eye spin"></i></a>
			 							<a href="<?php echo e('/admin/slide/'.$item_slide->id.'/edit'); ?>" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
			 							<form action="<?php echo e(route('slide.destroy',$item_slide->id)); ?>" method="POST" style="display: inline-block;">
			 								<input type="hidden" name="_method" value="DELETE">
			 								<button type="submit" " class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-xs fa-fw "></i></button>
			 							</form>
	 								</td>
			 						
			 					</tr>
			 						<?php $i++;?>
			 						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			 					<?php endif; ?>
			 				</tbody>
			 			</table>


				<div class="row">
					<div class="col-md-12">
						
					</div>
				</div>
	 			</div>
	 		</div>
	 </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
	<script type="text/javascript" src="/public/vendor/ckeditor3/ckeditor.js"></script>
	<script type="text/javascript" src="/public/vendor/ckfinder2/ckfinder.js"></script>
	<script type="text/javascript" src="/public/vendor/slug.js"></script>
	<script type="text/javascript" src="/public/admin/vendor/ssi-uploader/js/ssi-uploader.js"></script>

	<script type="text/javascript">
 	
		// CKEDITOR.on('instanceCreated', function (e) {
  //           e.editor.on('change', function (event) {
		// 	 var value = CKEDITOR.instances['descriptions'].getData();//Value of Editor
		// 	  $('#descriptions_vi').val(value);
		// 	 console.log(value);
		// 	});
  //       });
		$(document).on('change keyup', '#title_vi', function(event) {
            event.preventDefault();
            ChangeToSlug('title_vi','slug');
        });

		$('#ssi-upload').ssi_uploader({
	        url: 'http://localhost:3300/upload',
	        inForm:true,
	        maxFileSize:200
	    });
	 // 	$.ajax({
		// 	url:'http://flower.eve/haha',
		  
		// }).done(function(data){console.log(data);});
	</script>
<?php $__env->stopSection(); ?>


 
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>