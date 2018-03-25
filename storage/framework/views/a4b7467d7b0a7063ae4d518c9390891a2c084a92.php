<?php $__env->startSection('css'); ?>
<style type="text/css">
	.w3l-special-grid{
	    height: 233px;
   		overflow: hidden;
   		position: relative;
    	display: flex;
    	overflow: hidden;
	}

	.info-cs{
		position: absolute;
	    left: 0;
	    top: 0;
	    z-index: 10;
	}
	.info-cs h4{
		/*border-bottom: 1px solid #ffb262;*/

	}
	.agileits-special-info h4:after{
		/*background: none;*/
		

	}
	.w3l_testimonial_grid_pos{
		
		position: absolute;
    	width: 120px;
	    height: 120px;
	    text-align: center;
	    top: -25%;
	    left: 30%;
	    border-radius: 50%;
	    overflow: hidden;

	}
	.w3l_testimonial_grid_pos img{
		
		    height: 100%;

	}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

		
<?php echo $__env->make('flower.inc.slide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php 
		// if(isset($about) && count($about) > 0 ){
		// 	$about_ = $about[0]->lang[0]->post;
		// }

		// echo '<pre>';
		// print_r($customer_say->toArray());
		// echo '</pre>';

	?>
<!-- //banner -->	

<!-- agile-about -->

	<div class="jarallax agile-about w3ls-section">
		<div class="container">
			<h2 class="w3ls_head"><span><?php echo e(__('title.Wel__')); ?></span><?php echo e(__('title.__Come')); ?></h2>
					<!-- <p class="w3agile">While designing your living room, it’s a good idea to think about certain key aspects like space available, the colours to be used, the kind of furniture and accessories you fancy.</p> -->
			<div class="agile-about-grids">
					
				<div class="col-md-6 col-sm-6 agile-about-grid agile-about-grid1 " >
					<h5><?php echo e($about[0]->post[0]->lang[0]->pivot->Title); ?></h3>
					<h4><?php echo e($about[0]->post[0]->lang[0]->pivot->Short_Descriptions); ?></h4>
					<p><?php echo e($about[0]->post[0]->lang[0]->pivot->Descriptions); ?></p>
				</div>

				<div class="col-md-6 col-sm-6 agile-about-grid agile-about-grid2 " style="background-image: url('<?php echo e(asset('/public/upload/post').'/'.$about[0]->post[0]->Avatar); ?>');background-size:cover;">
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="about-info-grids">
				<div class="col-md-4 col-sm-4 about-info about-info1">
					<i class="fa fa-info-circle agile-sicon" aria-hidden="true"></i>
					<h4>how we work</h4>
					<div class="h4-underline"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
					</div>
				<div class="col-md-4 col-sm-4 about-info about-info2">
					<i class="fa fa-question-circle agile-sicon" aria-hidden="true"></i>
					<h4>what we do</h4>
					<div class="h4-underline"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
					</div>
				<div class="col-md-4 col-sm-4 about-info about-info3">
					<i class="fa fa-registered agile-sicon" aria-hidden="true"></i>
					<h4>why choose us</h4>
					<div class="h4-underline"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
					</div>
				<div class="clearfix"></div>
			</div>
			
		</div>
	</div>
<!-- //agile-about -->

<!--/welcome-->
	<div class="w3agile welcome" id="about"> 
		<div class="container">
			<!-- <h3 class="wthree_head"><i class="fa fa-pagelines" aria-hidden="true"></i>About US</h3> -->
			<h3 class="w3ls_head"><span class="thr"><?php echo e(__('title.Post__')); ?></span><?php echo e(__('title.__News')); ?></h3>
			<div class="w3l_gallery_grids">
				<div class="col-md-6 col-xs-12 banner_bottom_left">
					<h3><?php echo e($new_post[0]->post[0]->lang[0]->pivot->Title); ?></h3>
					<p><i><?php echo e($new_post[0]->post[0]->lang[0]->pivot->Short_Descriptions); ?></i> <?php echo $new_post[0]->post[0]->lang[0]->pivot->Descriptions; ?></p>
					<!-- <div class="read"><a href="#" data-toggle="modal" data-target="#myModal" class="hvr-rectangle-in">Read More</a></div> -->
				</div>
				<div class="col-md-6 col-xs-12 banner_bottom_right">
					<div class="row">
							
							
						<div class="agile_w3l_info_gds col-md-6 col-sm-6 col-xs-12">
							<div class="banner_bottom_right_grid">
								<div class="view view-tenth">
						<?php if(isset($new_post[0]->post[0]->image[0])): ?>
								<img src="<?php echo e(asset('public/upload/post/').'/'.$new_post[0]->post[0]->image[0]->url); ?>" class="img-responsive" alt="">
						<?php else: ?>
								<img src="<?php echo e(asset('public/flower/images/a1.jpg')); ?>" class="img-responsive" alt="">

						<?php endif; ?>
									
									<div class="mask">
										 <a href="#">
											  <div class="agile_text_box">
													<i class="fa fa-pagelines" aria-hidden="true"></i>
													<h3>Topiary</h3>
													
											  </div>
										 </a>
									</div>
								</div>
							</div>
							<div class="banner_bottom_right_grid">
								<div class="view view-tenth">
								<!-- <img src="<?php echo e(asset('public/flower/images/a2.jpg')); ?>" class="img-responsive" alt=""> -->
								<?php if(isset($new_post[0]->post[0]->image[1])): ?>
										<img src="<?php echo e(asset('public/upload/post/').'/'.$new_post[0]->post[0]->image[1]->url); ?>" class="img-responsive" alt="">
								<?php else: ?>
										<img src="<?php echo e(asset('public/flower/images/a1.jpg')); ?>" class="img-responsive" alt="">

								<?php endif; ?>	
									<div class="mask">
									   <a href="#">
											<div class="agile_text_box">
												<i class="fa fa-pagelines" aria-hidden="true"></i>
												<h3>Topiary</h3>
												
											</div>
										</a>
									</div>
								</div>
							</div>
						   <div class="clearfix"> </div>
						</div>
							
						<div class="agile_w3l_info_gds col-md-6 col-sm-6 col-xs-12 two">
							<div class="banner_bottom_right_grid">
								<div class="view view-tenth">
								<?php if(isset($new_post[0]->post[0]->image[2])): ?>
										<img src="<?php echo e(asset('public/upload/post/').'/'.$new_post[0]->post[0]->image[2]->url); ?>" class="img-responsive" alt="">
								<?php else: ?>
										<img src="<?php echo e(asset('public/flower/images/a1.jpg')); ?>" class="img-responsive" alt="">

								<?php endif; ?>
								<!-- <img src="<?php echo e(asset('public/flower/images/a3.jpg')); ?>" class="img-responsive" alt=""> -->
									
									<div class="mask">
										 <a href="#">
											  <div class="agile_text_box">
													<i class="fa fa-pagelines" aria-hidden="true"></i>
													<h3>Topiary</h3>
													
											  </div>
										 </a>
									</div>
								</div>
							</div>
							<div class="banner_bottom_right_grid">
								<div class="view view-tenth">
								<!-- <img src="<?php echo e(asset('public/flower/images/a4.jpg')); ?>" class="img-responsive" alt=""> -->
								<?php if(isset($new_post[0]->post[0]->image[3])): ?>
										<img src="<?php echo e(asset('public/upload/post/').'/'.$new_post[0]->post[0]->image[3]->url); ?>" class="img-responsive" alt="">
								<?php else: ?>
										<img src="<?php echo e(asset('public/flower/images/a1.jpg')); ?>" class="img-responsive" alt="">

								<?php endif; ?>	
									<div class="mask">
									   <a href="#">
											<div class="agile_text_box">
												<i class="fa fa-pagelines" aria-hidden="true"></i>
											<h3>Topiary</h3>
												
											</div>
										</a>
									</div>
								</div>
							</div>
						   <div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>	
	</div>
<!--//welcome-->

<!-- special -->
	<div class="special jarallax">
		<div class="container">
		<h3 class="w3ls_head"><span class="thr"><?php echo e(__('title.Cate__')); ?></span><?php echo e(__('title.__Flower')); ?></h3>
					<p class="w3agile fru">While designing your living room, it’s a good idea to think about certain key aspects like space available, the colours to be used, the kind of furniture and accessories you fancy.
				</p>
			<div class="special-grids">
				<?php if(isset($special_post) && count($special_post) > 0): ?>
				<?php $i=0;?>
					<?php $__currentLoopData = $special_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php $__currentLoopData = $item_special->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_special_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php $clss = "wthree-img".$i;?>
						<?php if($i == 2 || $i == 3): ?>
							
							<div class="col-md-6 w3l-special-grid <?php echo e($clss); ?>" >
								
									<div class="col-md-6 agileits-special-info">
									</div>
								
									
								<div class="col-md-6 agileits-special-info info-cs">
									<h4><a href="<?php echo e(route('post_slug',$item_special_->Slug)); ?>"><?php echo e($item_special_->lang[0]->pivot->Title); ?></a></h4>
									<p><?php echo $item_special_->lang[0]->pivot->Short_Descriptions; ?></p>
								</div>
								<div class="col-md-6 w3ls-special-img" style="background-image: url('<?php echo e(asset('/public/upload/post/'.$item_special_->Avatar)); ?>'); ">
								<a href="<?php echo e(url('/').'/'.$item_special_->Slug); ?>"> <img src="<?php echo e(asset('/public/upload/post/'.$item_special_->Avatar)); ?>" alt="<?php echo e($item_special_->lang[0]->pivot->Title); ?>" width="100%" height="100%"></a>
									
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php else: ?> 
							<div class="col-md-6 w3l-special-grid <?php echo e($clss); ?>">
								<div class="col-md-6 w3ls-special-img" style="background-image: url('<?php echo e(asset('/public/upload/post/'.$item_special_->Avatar)); ?>'); ">
									<a href=" <?php echo e(url('/').'/'.$item_special_->Slug); ?>"> <img src="<?php echo e(asset('/public/upload/post/'.$item_special_->Avatar)); ?>" alt="<?php echo e($item_special_->lang[0]->pivot->Title); ?>" width="100%" height="100%"></a>
								</div>
								<div class="col-md-6 agileits-special-info">
									<h4><a href="<?php echo e(url('/').'/'.$item_special_->Slug); ?>"><?php echo e($item_special_->lang[0]->pivot->Title); ?></a></h4>
									<p><?php echo $item_special_->lang[0]->pivot->Short_Descriptions; ?></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							
						<?php endif; ?>
					 <?php $i++;?>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<!-- <div class="col-md-6 w3l-special-grid">
					<div class="col-md-6 w3ls-special-img wthree-img">
						
					</div>
					<div class="col-md-6 agileits-special-info">
						<h4>Roof</h4>
						<p>Maecenas ac hendrerit purus. Lorem ipsum dolor sit amet</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 w3l-special-grid">
					<div class="col-md-6 agileits-special-info">
						<h4>Electrical</h4>
						<p>Maecenas ac hendrerit purus. Lorem ipsum dolor sit amet</p>
					</div>
					<div class="col-md-6 w3ls-special-img wthree-img2">
						
					</div>
					
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 w3l-special-grid">
					<div class="col-md-6 agileits-special-info">
						<h4>Structure</h4>
						<p>Maecenas ac hendrerit purus. Lorem ipsum dolor sit amet</p>
					</div>
					<div class="col-md-6 w3ls-special-img wthree-img3">
						
					</div>
				
					<div class="clearfix"> </div>
				</div> -->
				
				
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //special -->

<!-- testimonials -->
	<div class="testimonials jarallax">
		<div class="container">
			<h3 class="w3ls_head"><span><?php echo e(__('title.Our__')); ?></span><?php echo e(__('title.__Client_Say')); ?></h3>
			<p class="w3agile">While designing your living room, it’s a good idea to think about certain key aspects like space available, the colours to be used, the kind of furniture and accessories you fancy.
				</p>
				
			<div class="w3ls_testimonials_grids">
				 <section class="center slider">
				 	<?php if(isset($customer_say) && count($customer_say) > 0): ?>
					<?php $i=0;?>
					<?php $__currentLoopData = $customer_say[0]->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_cs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
						<div class="agileits_testimonial_grid">
							<div class="w3l_testimonial_grid">
								<p>In eu auctor felis, id eleifend dolor. Integer bibendum dictum erat, 
									non laoreet dolor.</p>
								<h4><?php echo e($item_cs->lang[0]->pivot->Title); ?></h4>
								<h5><?php echo $item_cs->lang[0]->pivot->Short_Descriptions; ?></h5>
								<div class="w3l_testimonial_grid_pos">
									<img src="<?php echo e(asset('public/upload/post/').'/'.$item_cs->Avatar); ?>" alt=" " class="img-responsive" />
								</div>
							</div>
						</div>

							
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>

						<!-- <div class="agileits_testimonial_grid">
							<div class="w3l_testimonial_grid">
								<p>In eu auctor felis, id eleifend dolor. Integer bibendum dictum erat, 
									non laoreet dolor.</p>
								<h4>Laura Paul</h4>
								<h5>Lorem</h5>
								<div class="w3l_testimonial_grid_pos">
									<img src="<?php echo e(asset('public/flower/images/2.png')); ?>" alt=" " class="img-responsive" />
								</div>
							</div>
						</div>
						<div class="agileits_testimonial_grid">
							<div class="w3l_testimonial_grid">
								<p>In eu auctor felis, id eleifend dolor. Integer bibendum dictum erat, 
									non laoreet dolor.</p>
								<h4>Michael Doe</h4>
								<h5>Lorem</h5>
								<div class="w3l_testimonial_grid_pos">
									<img src="<?php echo e(asset('public/flower/images/1.png')); ?>" alt=" " class="img-responsive" />
								</div>
							</div>
						</div> -->
				</section>
			</div>
		</div>
	</div>
<!-- //testimonials -->

<!-- team -->
	<!-- <div class="team">
		<div class="container">
			<h3 class="w3ls_head"><span>Our </span>Team</h3>
			<p class="w3agile">While designing your living room, it’s a good idea to think about certain key aspects like space available, the colours to be used, the kind of furniture and accessories you fancy.
				</p>
			<div class="agileits_team_grids">
				<div class="col-md-4 agileits_team_grid">
					<div class="agileits_team_grid_figure">
						<img src="<?php echo e(asset('public/flower/images/t1.jpg')); ?>" alt=" " class="img-responsive" />
					</div>
					<h4>Jane Nguyen</h4>
					<p>General Manager</p>
					<p>+21 345 287 4556</p>
					<div class="social-icon">
						<a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
						<a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
						<a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
						<a href="#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a> 
					</div>
				</div>
				<div class="col-md-4 agileits_team_grid">
					<div class="agileits_team_grid_figure">
						<img src="<?php echo e(asset('public/flower/images/t2.jpg')); ?>" alt=" " class="img-responsive" />
					</div>
					<h4>James Doe</h4>
					<p>Finance Executive</p>
					<p>+21 345 287 4556</p>
					<div class="social-icon">
						<a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
						<a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
						<a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
						<a href="#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a> 
					</div>
				</div>
				<div class="col-md-4 agileits_team_grid">
					<div class="agileits_team_grid_figure">
						<img src="<?php echo e(asset('public/flower/images/t3.jpg')); ?>" alt=" " class="img-responsive" />
					</div>
					<h4>Laura Carl</h4>
					<p>Management</p>
					<p>+21 345 287 4556</p>
					<div class="social-icon">
						<a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
						<a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
						<a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
						<a href="#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a> 
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div> -->
<!-- //team -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('flower.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>