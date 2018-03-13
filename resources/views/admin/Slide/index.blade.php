@extends('admin.master')
@section('title')
	Slide
@endsection
@section('meta')
	<!-- meta here -->
@endsection
@section('css')
	<!-- css here -->

	<link rel="stylesheet" href="/public/admin/vendor/ssi-uploader/styles/ssi-uploader.css">
@endsection
@section('content')
<!-- 
	{{ __('messages.ss') }}
	@lang('messages.ss')
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

	 				{!! Helper::ss_flash()!!}
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
			 					@if(isset($slide) && $slide != null )
			 						<?php $i = 0;?>
			 						@foreach($slide as $item_slide)
			 					<tr>
			 						<td>{{$i+1}}	</td>
			 						
			 						<td><img src="{{'/public/upload/thumbnail/'.$item_slide->image}}" width="50" >	</td>
			 						<td>{{$item_slide->slide_detail[0]->Title}}	</td>
			 						<td>{{$item_slide->slide_detail[0]->Descriptions}}	</td>
			 						<td>{{$item_slide->slide_detail[0]->url}}	</td>
			 						<td>
			 							<a href="{{'/'}}" class="btn btn-default btn-sm"><i class="fas fa-eye spin"></i></a>
			 							<a href="{{'/admin/slide/'.$item_slide->id.'/edit'}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
			 							<form action="{{route('slide.destroy',$item_slide->id)}}" method="POST" style="display: inline-block;">
			 								<input type="hidden" name="_method" value="DELETE">
			 								<button type="submit" " class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-xs fa-fw "></i></button>
			 							</form>
	 								</td>
			 						
			 					</tr>
			 						<?php $i++;?>
			 						@endforeach
			 					@endif
			 				</tbody>
			 			</table>


				<div class="row">
					<div class="col-md-12">
						
					</div>
				</div>
	 			</div>
	 		</div>
	 </div>
@endsection
@section('script')
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
@endsection


 