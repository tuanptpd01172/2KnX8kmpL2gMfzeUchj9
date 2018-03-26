@extends('flower.master')
@section('css')
<style type="text/css">
	
</style>
@endsection
@section('content')
<?php
	// echo '<pre>';
	// print_r($result->toArray());
	// echo '</pre>';
	?>
<!-- banner -->
	<div class="banner1 jarallax">
	</div>
<!-- //banner -->	
<!-- projects -->
	<div class="gallery-grids">
		<div class="container">
		<h2 class="w3ls_head"><span>Sản</span>phẩm</h2>
			<p class="w3agile">While designing your living room, it’s a good idea to think about certain key aspects like space available, the colours to be used, the kind of furniture and accessories you fancy.
				</p>
			<div class="show-reel tel-prj">
			@if(isset($result) && count($result) > 0)
				@foreach($result as $diff)
				<div class="col-md-4 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/s1.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="{{asset('/public/upload/post').'/'.$diff->Avatar}}" alt="" />
							<div class="agileits-caption">
								<!-- <h4></h4> -->
								<p>{{$diff->lang[0]->pivot->Short_Descriptions}}</p>
							</div>
						</a>
					</div>
					<div class="agile-gallery-dt">
						<div class="title-flower">
							<a href="detail.php">{{$diff->lang[0]->pivot->Title}}</a>
						</div>
						<div class="price">
						@if(isset($diff->lang[0]->pivot->Price_Sale) && $diff->lang[0]->pivot->Price_Sale != "")
							<span class="oprice">{{$diff->lang[0]->pivot->Price}}</span>
							<span>{{$diff->lang[0]->pivot->Price_Sale}}đ</span>
						@else
							<span>{{$diff->lang[0]->pivot->Price}}đ</span>
						@endif	
						</div>
					</div>
				</div>
				@endforeach
			@endif
				
				<!-- <div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/s9.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/s9.jpg" alt="" />
							<div class="agileits-caption">
								<h4>Upholstery</h4>
								<p>Sed ultricies non sem sit amet laoreet. Ut semper erat erat.</p>
							</div>
						</a>
					</div>
				</div> -->
				<div class="clearfix"> </div>
			</div>
			<!-- <script>
				$(window).load(function() {
				  $.fn.lightspeedBox();
				});

			</script> -->
		</div>
	</div>
	<!-- //projects -->


<!-- //footer -->
@endsection