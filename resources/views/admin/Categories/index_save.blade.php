@extends('admin.master')
@section('title')
	Danh Mục
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
		if (! function_exists('generateCategoryLists')) {
		    function generateCategoryLists(array $elements, $parentId = 0,$indent = "",$stt=1,$flag = true) {
		        
		        foreach ($elements as $cate) {
		        	$cate_id = $cate['parent_id'];
		        	$vi_detail=null;
		        	$en_detail=null;
					if(isset($cate) && count($cate['lang']) > 0):
					 	foreach($cate['lang'] as $detail):
					 		if($detail['Locale'] == "vi"):
					 			$vi_detail = $detail;
					 		
					 		endif;

					 		if($detail['Locale'] == "en"):
					 			$en_detail = $detail;
					 		
					 		endif;
					 	endforeach;
					endif;
					

		            if ($cate['parent_id'] == $parentId) {
		                
		               if($flag == true){
		               	$indent = $stt;
		               }else{
		               	// $indent = ""; 
		               	// $indent += " - " ;
		               }

			                echo 
			                    '<tr>'.
				                    '<td > '.$indent. '</td>'.
				                    '<td > '.$vi_detail['pivot']['Name'] . '</td>'.
				                    '<td > '.$cate['Slug'] . '</td>'.
				                    '<td > '.$vi_detail['pivot']['Descriptions'] . '</td>'.
				                    '<td > '.$en_detail['pivot']['Descriptions'] . '</td>'.
				                    '<td > '.'<img src="/public/upload/categories/'.$cate['Image'].'" with="100%"/>'. '</td>'.
				                    '<td > '.
				                    	'<a href="/admin/categories/'.$cate['id'].'/edit" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>'.
			 							'<a href="'.route('categories.destroy',$cate['id']).'" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-xs fa-fw "></i></a>'.
				                    '</td>'.
			               		'</tr>'
			                      
			                ;
		                if($flag == true){
		                	$indent = "";
		                }
		                $children = generateCategoryLists($elements, $cate['id'],$indent." - ",$stt,false);
		               	$stt++;
		            }
		        }
		    }
		}
		//echo __('messages.welcome');
		//
		// echo "sdfsdf";
		echo '<pre>';
		print_r($category->toArray());
		echo '</pre>';
	 ?>
	  
	 <div class="row">
	 		<div class="ibox">
	 			<div class="ibox-title">Danh Mục</div>
	 			<div class="ibox-content">
			 			<table class="table table-bordered">
			 				<thead>
			 					<th>STT</th>
			 					<th>Tên Danh Mục</th>
			 					<th>Slug</th>
			 					<th>Mô Tả</th>
			 					<th>Mô Tả 1</th>
			 					<th>Ảnh</th>
			 					<th>Tác Vụ</th>
			 					<!-- <th>2</th>
			 					<th>3</th> -->
			 				</thead>
			 				<tbody>
			 					@if(isset($category) && $category != null )
			 						<?php $i = 0;?>
			 						@foreach($category as $item_cate)
			 					<tr>
			 						<td>{{$i+1}}	</td>
			 						<td>{{$item_cate->lang[0]->pivot->Name}}	</td>
			 						<td>{{$item_cate->Slug}}	</td>
			 						<td>{{$item_cate->lang[0]->pivot->Descriptions}}	</td>
			 						<td><img src="{{'/public/upload/thumbnail/'.$item_cate->Image}}" width="50" >	</td>
			 						<td>
			 							<a href="{{'/'.$item_cate->lang[0]->pivot->Name}}" class="btn btn-default btn-sm"><i class="fas fa-eye spin"></i></a>
			 							<a href="{{'/admin/categories/'.$item_cate->id.'/edit'}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
			 							<a href="{{route('categories.destroy',$item_cate->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-xs fa-fw "></i></a>
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
	 <div class="row">
	 		<div class="ibox">
	 			<div class="ibox-title">Danh Mục</div>
	 			<div class="ibox-content">
			 			<table class="table table-bordered">
			 				<thead>
			 					<th>STT</th>
			 					<th>Tên Danh Mục</th>
			 					<th>Slug</th>
			 					<th>Mô Tả</th>
			 					<th>Mô Tả(English)</th>
			 					<th>Ảnh</th>
			 					<th>Tác Vụ</th>
			 					<!-- <th>2</th>
			 					<th>3</th> -->
			 				</thead>
			 				<tbody>
			 					{{generateCategoryLists($category->toArray(),0)}}
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


 