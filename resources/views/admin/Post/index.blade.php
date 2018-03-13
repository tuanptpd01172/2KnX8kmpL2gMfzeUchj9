@extends('admin.master')
@section('title')
	{{ __('title.New_Post') }}
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
		// print_r($post->toArray());
		// echo '</pre>';
	 ?>
	  
		<!--  -->
	 <div class="row">
	 		<div class="ibox">
	 			<div class="ibox-title">Bộ Lọc Bài Viết</div>
	 			<div class="ibox-content">
			 			<form action="{{route('post.index')}}" method="GET" enctype="multipart/form-data" >
	 				<div class="row">
			 				
				 					{{ csrf_field() }}
				 					<!-- <input type="hidden" name="_method" value="POST"> -->
				 					
				 					
			 				
			 					<div class=" col-md-3">
			 						<div class="form-group">
		 								<label>Danh Mục</label>
	                                     <select class="form-control m-b" name="categories_id">
	                                     	<option value="">Tất Cả</option>
	                                       
	                                        {!! Helper::gen_cate($category->toArray(), $parentId=0, $indent="") !!}
	                                    </select>     
	                            	</div>
			 					</div>
			 					<div class=" col-md-3">
			 						<div class="form-group">
		 								<label>Màu Sắc</label>
	                                     <select class="form-control m-b" name="color_id">
	                                     	<option value="">Tất Cả</option>
	                                        @if(count($color) > 0)
		                                   	 @foreach($color as $item_color)
		                                   	 	@if($item_color->id == Input::get('color_id'))
		                                        	<option selected="selected" value="{{$item_color->id}}">{{$item_color->lang[0]->pivot->Name}}</option>
	                                        	@else
	                                        		<option value="{{$item_color->id}}">{{$item_color->lang[0]->pivot->Name}}</option>

	                                        	@endif	
	                                        @endforeach
	                                        @endif
	                                    </select>     
	                            	</div>
			 					</div>
			 					<div class=" col-md-3">
			 						<div class="form-group">
		 								<label>Hiển Thị</label>
	                                     <select class="form-control m-b" name="Status">
	                                        <option value="1">Hiển Thị</option>
	                                        <option value="0">Ẩn</option>
	                                        
	                                    </select>     
	                            	</div>
			 					</div>	
			 				
			 					<div class=" col-md-2">
			 						<label>&nbsp;</label>
			 						<input type="submit" name="Btn-newpost" class="btn btn-primary form-control" value="Tìm Kiếm">
			 					</div>
 					</div>
			 			</form>


				
	 			</div>
	 		</div>
	</div>
	 	<!--  -->
	 <div class="row">
	 		<div class="ibox">
	 			<div class="ibox-title">Bài Viết</div>
	 			<div class="ibox-content">
			 			<table class="table table-bordered">
			 				<thead>
			 					<th>ID</th>
			 					<th>Tên Bài Viết</th>
			 					<th>Slug</th>
			 					<th>Danh Mục</th>
			 					<th>Ảnh</th>
			 					<th>Tác Vụ</th>
			 					<!-- <th>2</th>
			 					<th>3</th> -->
			 				</thead>
			 				<tbody>
			 					@if(isset($post) && $post != null )
			 						@foreach($post as $item_post)
			 					<tr>
			 						<td>{{$item_post->id}}	</td>
			 						<td>{{$item_post->lang[0]->pivot->Title}}	</td>
			 						<td>{{$item_post->Slug}}	</td>
			 						<td>{{$item_post->categories->categories_detail[0]->Name}}	</td>
			 						<td><img src="{{'/public/upload/thumbnail/'.$item_post->Avatar}}" width="50" >	</td>
			 						<td>
			 							<a href="{{'/'.$item_post->lang[0]->pivot->Title}}" class="btn btn-default btn-sm"><i class="fas fa-eye spin"></i></a>
			 							<a href="{{'/admin/post/'.$item_post->id.'/edit'}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
			 							<a href="{{route('post.destroy',$item_post->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-xs fa-fw "></i></a>
	 								</td>
			 						
			 					</tr>
			 						@endforeach
			 					@endif
			 				</tbody>
			 			</table>


				<div class="row">
					<div class="col-md-12">
						{{$post->render()}}
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


 