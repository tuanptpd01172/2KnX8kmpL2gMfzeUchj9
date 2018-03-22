<div class="slider">
			<ul id="sb-slider" class="sb-slider">
				<?php if(isset($slide) && count($slide) > 0): ?>
					<?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($item_slide->image != ""): ?>
						<li>
							<a href="#"><img src="<?php echo e(asset('/public/upload/thumbnail/'.$item_slide->image)); ?>" alt="image1" " /></a>
							<div class="sb-description">
								<h2><?php echo e($item_slide->lang[0]->pivot->Title); ?></h2>
								<h4>We provide best Interior living rooms</h4>
								<div class="w3ls-button">
									<a href="#" data-toggle="modal" data-target="#myModal">More About Our Designs</a>
								</div>
							</div>
						</li>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<!-- <li>
					<a href="#"><img src="<?php echo e(asset('public/flower/images/22.jpg')); ?>" alt="image2"/></a>
					<div class="sb-description">
						<h3><span>IF</span>We provide best design</h3>
						<h4>We provide best Interior living rooms</h4>
						<div class="w3ls-button">
							<a href="#" data-toggle="modal" data-target="#myModal">More About Our Designs</a>
						</div>
					</div>
				</li>
				<li>
					<a href="#"><img src="<?php echo e(asset('public/flower/images/33.jpg')); ?>" alt="image1"/></a>
					<div class="sb-description">
						<h3><span>IF</span>We provide best design</h3>
						<h4>We provide best Interior living rooms</h4>
						<div class="w3ls-button">
							<a href="#" data-toggle="modal" data-target="#myModal">More About Our Designs</a>
						</div>
					</div>
				</li>
				<li>
					<a href="#"><img src="<?php echo e(asset('public/flower/images/44.jpg')); ?>" alt="image1"/></a>
					<div class="sb-description">
						<h3><span>IF</span>We provide best design</h3>
						<h4>We provide best Interior living rooms</h4>
						<div class="w3ls-button">
							<a href="#" data-toggle="modal" data-target="#myModal">More About Our Designs</a>
						</div>
					</div>
				</li>
				<li>
					<a href="#"><img src="<?php echo e(asset('public/flower/images/55.jpg')); ?>" alt="image1"/></a>
					<div class="sb-description">
						<h3><span>IF</span>We provide best design</h3>
						<h4>We provide best Interior living rooms</h4>
						<div class="w3ls-button">
							<a href="#" data-toggle="modal" data-target="#myModal">More About Our Designs</a>
						</div>
					</div>
				</li>
				<li>
					<a href="#"><img src="<?php echo e(asset('public/flower/images/33.jpg')); ?>" alt="image1"/></a>
					<div class="sb-description">
						<h3><span>IF</span>We provide best design</h3>
						<h4>We provide best Interior living rooms</h4>
						<div class="w3ls-button">
							<a href="#" data-toggle="modal" data-target="#myModal">More About Our Designs</a>
						</div>
					</div>
				</li> -->
			</ul>

			<div id="nav-arrows" class="nav-arrows">
				<a href="#">Next</a>
				<a href="#">Previous</a>
			</div>
			<div class="agile_banner_social">
				<ul class="agileits_social_list">
					<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	
<!-- //banner -->

<?php
	// echo '<pre>';
	// print_r($slide->toArray());
	// echo '</pre>';
?>