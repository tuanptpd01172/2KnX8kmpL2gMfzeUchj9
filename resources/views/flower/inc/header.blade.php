
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
							<li class="active"><a href="index.php">{{__('title.Home')}}</a></li>
							@if(isset($vi_cate) && count($vi_cate))
								@foreach($vi_cate as $item_cate)
									@if($item_cate['parent_id'] == "")
									
									
										<li class="dropdown">

											<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$item_cate['lang']['pivot']['Name']}}<b class="caret"></b></a>
											<ul class="dropdown-menu agile_short_dropdown">
										@foreach($vi_cate as $item_cate1)
											@if($item_cate1['parent_id'] == $item_cate['id'])
													<li><a href="">{{$item_cate1['lang']['pivot']['Name']}}</a></li>
													
											@endif
										@endforeach
											</ul>
										</li>

									@endif
								@endforeach
							@endif
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

							<li><a href="contact.php">{{__('title.About')}}</a></li>
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
	