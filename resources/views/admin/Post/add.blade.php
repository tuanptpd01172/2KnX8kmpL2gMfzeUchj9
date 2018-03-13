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
		if (! function_exists('generateCategoryLists')) {
		    function generateCategoryLists(array $elements, $parentId = 0,$indent = "",$select_id=null) {
		        
		        foreach ($elements as $key => $cate) {
		            if ($cate['parent_id'] == $parentId) {
		                if($select_id != null && $select_id == $cate['id']){

			                echo '<option selected="selected" value = "'.$cate['id'].'"> '.$indent. $cate['categories_detail'][0]['Name'] . '</option>';
		                }else{
			                	
			                echo '<option value = "'.$cate['id'].'"> '.$indent. $cate['categories_detail'][0]['Name'] . '</option>';
		                }
		                
		                $children = generateCategoryLists($elements, $cate['id'],$indent." - ",$select_id);
		            }
		        }
		    }
		}
		//echo __('messages.welcome');
		//
		// echo "sdfsdf";
		// echo '<pre>';
		// print_r($color);
		// echo '</pre>';
	 ?>
		<!--  -->
	 <div class="row">
	 		<div class="ibox">
	 			<div class="ibox-title">{{ __('title.New_Post') }}</div>
	 			<div class="ibox-content">
		 			<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" >
		 				<div class="row">
			 					{{ csrf_field() }}
			 					<input type="hidden" name="_method" value="POST">
			 					<div class="col-md-7 ">
			 						
			 						<div class="tabs-container">
				                        <ul class="nav nav-tabs">
				                            <li class="active"><a data-toggle="tab" href="#tab-1"> Tiếng Việt</a></li>
				                            <li class=""><a data-toggle="tab" href="#tab-2">Tiếng Anh</a></li>
				                        </ul>
				                        <div class="tab-content">
				                            <div id="tab-1" class="tab-pane active">
				                                <div class="panel-body">
				                                 	<div class="form-group">
						 								<label>{{ __('title.Title') }}</label>
					                                    <input id="title_vi" type="text" placeholder="Tiêu Đề" class="form-control"  name="Title_vi">     
					                            	</div>
													<div class="form-group">
							 							<label>Giá VND</label>
						                                <input type="text" placeholder="200000VND" class="form-control"  name="Price_vi">     
						                            </div>
						                            <div class="form-group">
							 							<label>Giá(Sale) VND</label>
						                                <input type="text" placeholder="200000VND" class="form-control"  name="Price_Sale_vi" value="{{$vi_detail->pivot->Price_Sale}}">     
						                            </div>
					                            	<div class="form-group">
					                            		<textarea id="descriptions_vi" class="ckeditor" name="Descriptions_vi"></textarea>

					                            	</div>
				                                </div>
				                            </div>
				                            <div id="tab-2" class="tab-pane">
				                                <div class="panel-body">
				                                	<div class="form-group">
						 								<label>{{ __('title.Title') }}</label>
					                                    <input type="text" placeholder="Title" class="form-control"  name="Title_en">     
					                            	</div>
					                            	<div class="form-group">
							 							<label>Giá $</label>
						                                <input type="text" placeholder="10$" class="form-control"  name="Price_en">     
						                            </div>
						                            <div class="form-group">
							 							<label>Giá(Sale) $</label>
						                                <input type="text" placeholder="10$" class="form-control"  name="Price_Sale_en" value="{{$en_detail->pivot->Price_Sale}}">     
						                            </div>  
					                            	<div class="form-group">
					                            		<textarea id="descriptions_en" class="ckeditor" name="Descriptions_en"></textarea>

					                            	</div>  
				                                </div>
				                            </div>
				                        </div>


				                    </div>

			 					</div>
			 					<div class="col-md-5 ">
			 						 <div class="form-group">
			 						 </div>
			 						<div class="form-group">
			 						<label>{{ __('title.Avatar') }}</label>

		                                    <!-- <input type="file" placeholder="{{ __('title.Avatar') }}" class="form-control"  name="Title"> --> 
		                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
											    <div class="form-control" data-trigger="fileinput">
											        <i class="glyphicon glyphicon-file fileinput-exists"></i>
											    <span class="fileinput-filename"></span>
											    </div>
											    <span class="input-group-addon btn btn-default btn-file">
											        <span class="fileinput-new">Select file</span>
											        <span class="fileinput-exists">Change</span>
											        <input type="file" name="Avatar"/>
											    </span>
											    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
		                            </div>
			 						<div class="form-group">
			 						<label>{{ __('title.Slug') }}</label>
		                                    <input id="slug" type="text" placeholder="{{ __('title.Slug') }}" class="form-control"  name="Slug">     
		                            </div>
		                            <div class="form-group">
			 							<label>{{ __('title.Category') }}</label>
		                                <select class="form-control m-b" name="categories_id">
		                                	{{generateCategoryLists($category->toArray(),0)}}   
	                                    </select>    
		                            </div>
		                            <div class="form-group">
			 						<label>Màu Sắc</label>
		                                    <select class="form-control m-b" name="color_id">
	                                        @if(count($color) > 0)
		                                   	 @foreach($color as $item_color)
	                                        <option value="{{$item_color->id}}">{{$item_color->lang[0]->pivot->Name}}</option>
	                                        @endforeach
	                                        @endif
	                                    </select>    
		                            </div>
		                            <div class="form-group">
			 						<label>Trạng Thái</label>
		                                    <select class="form-control m-b" name="Status">
	                                        <option value="1">Hiển Thị</option>
	                                        <option value="0">Ẩn</option>
	                                        
	                                    </select>    
		                            </div>
		                           
			 						
			 					</div>
		 				</div>	
	 					<div class=" row">
		 					<div class=" col-md-12">
		 						 <div class="form-group">
			 						<label>Bộ Sưu Tập</label>
			                              <input type="file" name="Images[]" multiple id="ssi-upload"/>   
		                            </div>
		 					</div>
	 					</div>	
	 					<div class=" row">
		 					<div class=" col-md-12">
		 						<input type="submit" name="Btn-newpost" class="btn btn-primary" value="Thêm Mới">
		 					</div>
	 					</div>
		 			</form>

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


 