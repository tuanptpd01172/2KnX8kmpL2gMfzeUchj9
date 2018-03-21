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
		if (! function_exists('generateCategoryLists_')) {
		    function generateCategoryLists_(array $elements, $parentId = 0,$indent = "",$stt=1,$flag = true) {
		        
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
		               }
		               if($cate['Image'] != ""){
		               		$img = '<img alt="'.$vi_detail['pivot']['Name'].'" src="/public/upload/category/'.$cate['Image'].'" width="60px"/>';
		               }else{
		               	
		               		$img = '';
		               }
			                echo 
			                    '<tr>'.
				                    '<td style="font-weight:900;"> '.$indent. '</td>'.
				                    '<td > '.$vi_detail['pivot']['Name'] . '</td>'.
				                    '<td > '.$cate['Slug'] . '</td>'.
				                    '<td > '.$vi_detail['pivot']['Descriptions'] . '</td>'.
				                    '<td > '.$en_detail['pivot']['Descriptions'] . '</td>'.
				                    '<td > '.$img. '</td>'.
				                    '<td > '.
				                    	'<a href="/admin/categories/'.$cate['id'].'/edit" class="btn btn-primary btn-sm" style="margin-right:1px;"><i class="far fa-edit" ></i></a>'.
				                    	'<form action="'.route('categories.destroy',$cate['id']).'" method="POST" style=" display: inline-block;">'.
				                    	'<input type="hidden" name="_method" value="DELETE">'.
			 							'<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-xs fa-fw "></i></button>'.
			 							'</form>'.
				                    '</td>'.
			               		'</tr>'
			                      
			                ;
		                if($flag == true){
		                	$indent = "|";
		                }
		                $children = generateCategoryLists_($elements, $cate['id'],$indent."-",$stt,false);
		               	$stt++;
		            }
		        }
		    }
		}
		//echo __('messages.welcome');
		//
		// echo "sdfsdf";
		// echo '<pre>';
		// print_r($category->toArray());
		// echo '</pre>';
	 ?>
	  
	
	 <div class="row">
	 		<div class="ibox">
	 			<div class="ibox-title">Danh Mục</div>
	 			<div class="ibox-content">
					
							{!!Helper::ss_flash("")!!}
							
		 			

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
			 					{{generateCategoryLists_($category->toArray(),0)}}
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


 