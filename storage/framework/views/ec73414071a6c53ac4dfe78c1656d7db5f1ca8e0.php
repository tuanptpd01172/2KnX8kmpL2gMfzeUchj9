
<?php 
	if(Session::has('locale') && Session::get('locale') != ""){
		$lc = Session::get('locale');
	}else{
		$lc = App::getlocale();
	}
	$vi_cate=null;
	$all_cate=null;
	$i = 0;
?>
 <?php if(isset($cate) && count($cate) > 0): ?>
	 	<?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php 
			$vi_cate[$i]=
			 ['id' => $cate_->id,
              'Image' => $cate_->Image,
              'Slug' => $cate_->Slug,
              'parent_id'=> $cate_->parent_id,
              'Status' => $cate_->Status]

			?>
		 	<?php $__currentLoopData = $cate_->lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 		<?php if($detail->Locale == $lc): ?>

		 			<?php $vi_cate[$i]['lang'] = $detail->toArray();?>
		 		
				
		 		<?php endif; ?>
		 	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		 	<?php $i++?>
	 	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
<!-- banner -->
	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- <h1><a class="navbar-brand" href="index.html">Minh Florist</a></h1> -->
					<div class="agileits_logo">
						<h1><a href="index.php" class="navbar-brand">T<i class="fa fa-pagelines" aria-hidden="true"></i>opiary <span>Minh Florist</span></a></h1>
					</div>
				</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-8" id="link-effect-8">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php"><?php echo e(__('title.Home')); ?></a></li>
							<?php if(isset($vi_cate) && count($vi_cate)): ?>
								<?php $__currentLoopData = $vi_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($item_cate['parent_id'] == ""): ?>
									
									
										<li class="dropdown">

											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo e($item_cate['lang']['pivot']['Name']); ?><b class="caret"></b></a>
											<ul class="dropdown-menu agile_short_dropdown">
										<?php $__currentLoopData = $vi_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_cate1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($item_cate1['parent_id'] == $item_cate['id']): ?>
													<li><a href=""><?php echo e($item_cate1['lang']['pivot']['Name']); ?></a></li>
													
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</ul>
										</li>

									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
							<!-- <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hoa Tươi <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="icons.php">Bó Hoa</a></li>
									<li><a href="typography.php">Lẵng Hoa</a></li>
									<li><a href="typography.php">Giỏ Hoa</a></li>
									<li><a href="typography.php">Hoa Cắm Bình</a></li>
								</ul>
							</li>
							<li><a href="projects.php">Hoa Cao Cấp</a></li>
							<li><a href="services.php">Ý Nghĩa Hoa</a></li> -->

							<li><a href="contact.php"><?php echo e(__('title.About')); ?></a></li>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>
	<?php 

	// echo '<pre>';
	// print_r($cate->toArray());
	// echo '</pre>';

	

	
	?>
	