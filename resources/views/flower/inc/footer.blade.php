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
 @if(isset($cate) && count($cate) > 0)
	 	@foreach($cate as $cate_)
			<?php 
			$vi_cate[$i]=
			 ['id' => $cate_->id,
              'Image' => $cate_->Image,
              'Slug' => $cate_->Slug,
              'parent_id'=> $cate_->parent_id,
              'Status' => $cate_->Status]

			?>
		 	@foreach($cate_->lang as $detail)
		 		@if($detail->Locale == $lc)

		 			<?php $vi_cate[$i]['lang'] = $detail->toArray();?>
		 		
				
		 		@endif
		 	@endforeach
		 	<?php $i++?>
	 	@endforeach
	@endif
	<?php
	// echo '<pre>';
	// print_r($post_ft->toArray());
	// echo '</pre>';
	?>
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_agile_footer_grids">
				<div class="col-md-4 w3_agile_footer_grid">
					<h3>{{__('title.Infomation')}}</h3>
					<ul class="agile_footer_grid_list">
					@if(isset($post_ft[0]->post) && count($post_ft[0]->post) > 0)
							
						@foreach($post_ft[0]->post as $item_post)
							@foreach($item_post->lang as $item_lang)
	
								@if($item_lang->Locale == $lc)
							<li><i class="fa fa-pagelines" aria-hidden="true"></i><a style="color: #fff;" href="{{asset('/').$item_post->Slug}}">{{$item_lang->pivot->Title}}
								</a></li>
								@endif
							<!-- <li><i class="fa fa-twitter" aria-hidden="true"></i>Cam kết: Nhanh nhất, giá tốt nhất, chất lượng nhất.</li>
							<li><i class="fa fa-twitter" aria-hidden="true"></i>Trở thành công ty điện hoa số 1 tại Việt Nam</li>
							<li><i class="fa fa-twitter" aria-hidden="true"></i>Topiary.com là một công ty khởi nghiệp về công nghệ (IT Startup).</li> -->
							@endforeach
						@endforeach
					@endif
					</ul>
				</div>
				<div class="col-md-4 w3_agile_footer_grid">
					<h3>Danh mục</h3>
					<ul class="agileits_w3layouts_footer_grid_list">
						@if(isset($vi_cate) && count($vi_cate) >0)
						<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="{{{route('home')}}}">{{__('title.Home')}}</a></li>
								@foreach($vi_cate as $item_cate)
									@if($item_cate['parent_id'] == "")
									
									
									<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="services.html">{{$item_cate['lang']['pivot']['Name']}}</a></li>
										

									@endif
								@endforeach
							@endif
						<!-- <li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="projects.html">Projects</a></li>
						<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="contact.html">Contact</a></li> -->
					</ul>
				</div>
				<div class="col-md-4 w3_agile_footer_grid">
					<h3>Các tác phẩm mới nhất</h3>
					<div class="w3_agileits_footer_grid_left">
						<a href="#"><img src="{{asset('public/flower/images/s6.jpg')}}" alt=" " class="img-responsive" /></a>
					</div>
					<div class="w3_agileits_footer_grid_left">
						<a href="#"><img src="{{asset('public/flower/images/s2.jpg')}}" alt=" " class="img-responsive" /></a>
					</div>
					<div class="w3_agileits_footer_grid_left">
						<a href="#"><img src="{{asset('public/flower/images/s1.jpg')}}" alt=" " class="img-responsive" /></a>
					</div>
					<div class="w3_agileits_footer_grid_left">
						<a href="#"><img src="{{asset('public/flower/images/s3.jpg')}}" alt=" " class="img-responsive" /></a>
					</div>
					<div class="w3_agileits_footer_grid_left">
						<a href="#"><img src="{{asset('public/flower/images/s4.jpg')}}" alt=" " class="img-responsive" /></a>
					</div>
					<div class="w3_agileits_footer_grid_left">
						<a href="#"><img src="{{asset('public/flower/images/s5.jpg')}}" alt=" " class="img-responsive" /></a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3_newsletter_footer_grids">
				<div class="w3_newsletter_footer_grid_left">
					<form action="#" method="post">
						<input type="email" name="Email" placeholder="Email" required="">
						<input type="submit" value="Send">
					</form>
				</div>
				
				
			</div>
		
			<div class="agileinfo_copyright">
				<p>© 2018 Design by <a href="https://w3layouts.com/">M5</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
	<script type="text/javascript" src="{{asset('/public/flower/js/move-top.js')}}"></script>
	<script type="text/javascript" src="{{asset('/public/flower/js/easing.js')}}"></script>
	<script type="text/javascript" src="{{asset('/public/flower/js/aos.js')}}"></script>
	<script type="text/javascript" src="{{asset('/public/flower/js/lazyload.js')}}"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<!-- for bootstrap working -->
	<script src="{{asset('public/flower/js/bootstrap.js')}}"></script>
<!-- //for bootstrap working -->
<!-- carousal -->
	<script src="{{asset('public/flower/js/slick.js')}}" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).on('ready', function() {
		  $(".center").slick({
			dots: true,
			infinite: true,
			centerMode: true,
			slidesToShow: 2,
			slidesToScroll: 2,
			responsive: [
				{
				  breakpoint: 768,
				  settings: {
					arrows: true,
					centerMode: false,
					slidesToShow: 2
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					arrows: true,
					centerMode: false,
					centerPadding: '40px',
					slidesToShow: 1
				  }
				}
			 ]
		  });
		});
	</script>
<!-- //carousal -->
	<script src="{{asset('public/flower/js/jarallax.js')}}"></script>
	<script src="{{asset('public/flower/js/SmoothScroll.min.js')}}"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>

	<!-- banner slider js -->
		<script type="text/javascript" src="{{asset('public/flower/js/modernizr.custom.46884.js')}}"></script>
		<script type="text/javascript" src="{{asset('public/flower/js/jquery.slicebox.js')}}"></script>
		<script type="text/javascript">
			$(function() {
				
				var Page = (function() {

					var $navArrows = $( '#nav-arrows' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {

								$navArrows.show();
								$shadow.show();

							},
							orientation : 'r',
							cuboidsRandom : true
						} ),
						
						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {

								slicebox.next();
								return false;

							} );

							$navArrows.children( ':last' ).on( 'click', function() {
								
								slicebox.previous();
								return false;

							} );

							slicebox.play();

						};

						return { init : init };

				})();

				Page.init();

			});
		</script>
	<!-- //banner slider js -->

