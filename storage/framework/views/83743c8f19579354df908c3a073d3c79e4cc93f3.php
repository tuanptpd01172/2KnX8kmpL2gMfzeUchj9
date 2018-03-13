<?php $__env->startSection('title'); ?>
	Cập Nhật Danh Mục
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
		

		if (! function_exists('generateCategoryLists')) {
		    function generateCategoryLists(array $elements, $parentId = 0,$indent = "",$select_id=null) {
		        
		        foreach ($elements as $key => $cate) {
		            if ($cate['parent_id'] == $parentId) {
		                if($select_id != null && $select_id == $cate['id']){

			                echo '<option selected="selected" value = "'.$cate['id'].'"> '.$indent. $cate['categories_detail'][0]['Name'] . '</option>';
		                }else{
			                	
			                echo '<option value = "'.$cate['id'].'"> '.$indent. $cate['categories_detail'][0]['Name'] . '</option>';
		                }
		                
		                $children = generateCategoryLists($elements, $cate['id'],$indent." - ",$select_id);
		            }
		        }
		    }
		}
		$vi_detail=null;
		$en_detail=null;
		//echo __('messages.welcome');
		//
		// echo "sdfsdf";
		// echo '<pre>';
		// print_r($category->toArray());
		// echo '</pre>';
	 ?>
	 <?php if(isset($category) && count($category[0]->lang) > 0): ?>
	 	<?php $__currentLoopData = $category[0]->lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	 		<?php if($detail->Locale == "vi"): ?>
	 			<?php $vi_detail = $detail;?>
	 		<?php elseif($detail->Locale == "en"): ?>
	 			<?php $en_detail = $detail;?>
			<?php else: ?>
	 		<?php endif; ?>
	 	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	
	
		<!--  -->
	 <div class="row">
	 		<div class="ibox">
	 			<div class="ibox-title"><?php echo e(__('title.New_Post')); ?></div>
	 			<div class="ibox-content">
	 			<?php echo Helper::ss_flash(); ?>	
		 			<form action="<?php echo e(route('categories.update',$category[0]->id)); ?>" method="POST" enctype="multipart/form-data" >
		 				<div class="row">
			 					<?php echo e(csrf_field()); ?>

			 					<input type="hidden" name="_method" value="PUT">
			 					<div class="col-md-7 ">
			 						<div class="tabs-container">
				                        <ul class="nav nav-tabs">
				                            <li class="active"><a data-toggle="tab" href="#tab-1"> Tiếng Việt</a></li>
				                            <li class=""><a data-toggle="tab" href="#tab-2">Tiếng Anh</a></li>
				                        </ul>
				                        <div class="tab-content">
				                            <div id="tab-1" class="tab-pane active">
				                                <div class="panel-body">
				                                 	<div class="form-group">
						 								<label>Tên Danh Mục</label>
					                                    <input id="title_vi" type="text" placeholder="Tên Danh Mục..." class="form-control"  name="Name_vi" value="<?php echo e($vi_detail->pivot->Name); ?>">     
					                            	</div>
													
					                            	<div class="form-group">
						 								<!-- <label>Mô Tả Danh Mục</label> -->
					                            		<textarea id="descriptions_slide_vi" class="form-control descriptions_slide" name="Descriptions_vi"><?php echo e($vi_detail->pivot->Descriptions); ?></textarea>

					                            	</div>
				                                </div>
				                            </div>
				                            <div id="tab-2" class="tab-pane">
				                                <div class="panel-body">
				                                	<div class="form-group">
						 								<label><?php echo e(__('title.Title')); ?></label>
					                                    <input type="text" placeholder="Title" class="form-control"  name="Name_en" value="<?php echo e($en_detail->pivot->Name); ?>">     
					                            	</div>
					                            	
					                            	<div class="form-group">
							 							<label>Mô Tả</label>
					                            		<textarea id="descriptions_slide_en" class="form-control descriptions_slide" name="Descriptions_en"><?php echo e($en_detail->pivot->Descriptions); ?></textarea>

					                            	</div>  
				                                </div>
				                            </div>
				                        </div>


				                    </div>

			 					</div>
			 					<div class="col-md-5 ">
			 						 <div class="form-group">
			 						 </div>
			 						<div class="form-group">
			 						<label>Ảnh Category</label>

		                                    <!-- <input type="file" placeholder="<?php echo e(__('title.Avatar')); ?>" class="form-control"  name="Title"> --> 
		                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
											    <div class="form-control" data-trigger="fileinput">
											        <i class="glyphicon glyphicon-file fileinput-exists"></i>
											    <span class="fileinput-filename"></span>
											    </div>
											    <span class="input-group-addon btn btn-default btn-file">
											        <span class="fileinput-new">Select file</span>
											        <span class="fileinput-exists">Change</span>
											        <input type="file" name="Image"/>
											    </span>
											    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
	                                    <img src="<?php echo e('/public/upload/category/'.$category[0]->image); ?>" width="100%">   
		                            </div>
			 						
		                          	<div class="form-group">
		 								<label>Slug</label>
	                                    <input id="slug" type="text" placeholder="slug..." class="form-control"  name="Slug" value="<?php echo e($category[0]->Slug); ?>">  
	                            	</div>
		                            
		                            <div class="form-group">
				 						<label>Trạng Thái</label>
		                                    <select class="form-control m-b" name="Status">
	                                        <option value="1">Hiển Thị</option>
	                                        <option value="0" <?php if(isset($category[0]->Status) && $category[0]->Status == 0): ?><?php echo e('selected="selected"'); ?><?php endif; ?>>Ẩn</option>
	                                        
	                                    </select>    
		                            </div>

		                            <div class="form-group">
				 						<label>Danh Mục Cha</label>
		                                    <select class="form-control m-b" name="parent_id">	
		                                    	<option value="">Không</option>
	                                        <?php if(isset($category_all) && count($category_all) > 0): ?>
	                                        	<?php echo e(Helper::gen_cate($category_all->toArray(),0,"",$category[0]->parent_id)); ?>

	                                        <?php endif; ?>
	                                        
	                                    </select>    
		                            </div>
		                            
			 						
		                           
			 						
			 					</div>
		 				</div>	
	 					
	 					<div class=" row">
		 					<div class=" col-md-12">
		 						<input type="submit" name="Btn-newpost" class="btn btn-primary" value="Cập Nhật">
		 					</div>
	 					</div>
		 			</form>

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

		
	 // 	$.ajax({
		// 	url:'http://flower.eve/haha',
		  
		// }).done(function(data){console.log(data);});
				$('#ssi-upload').ssi_uploader({
			        url: 'http://localhost:3300/upload',
			        inForm:true,
			        maxFileSize:200
			    });
		// 
		$(document).ready(function() {
			setTimeout(function() {
				
				// $('.ssi-button').trigger('click');
				// $('.ssi-button').trigger('change');
				// $('#ssi-upload').val('D:\\thanhtuan\\desktop_2017\\aa1.png');
				

			}, 2000);
		});



		$(document).on('click', '.btn-del-img', function(event) {
			event.preventDefault();
			/* Act on the event */
			var id = $(this).attr('data-id');
			console.log(id);
			$('.img-item-'+id).empty();
			$('.admin-gallery').append('<input id="hd-img-'+id+'" type="hidden" name="Images_Pre[]" value="'+id+'"  multiple id="image_pre"/>')
		});
	</script>
<?php $__env->stopSection(); ?>


 
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>