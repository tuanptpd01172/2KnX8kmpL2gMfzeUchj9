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
		$vi_detail=null;
		$en_detail=null;
		//echo __('messages.welcome');
		//
		// echo "sdfsdf";
		// echo '<pre>';
		// print_r($category->toArray());
		// echo '</pre>';
	 ?>
	 @if(isset($post[0]) && count($post[0]->lang) > 0)
	 	@foreach($post[0]->lang as $detail)
	 		@if($detail->Locale == "vi")
	 			<?php $vi_detail = $detail;?>
	 		@elseif($detail->Locale == "en")
	 			<?php $en_detail = $detail;?>
			@else
	 		@endif
	 	@endforeach
	@endif
	
	
		<!--  -->
	 <div class="row">
	 		<div class="ibox">
	 			<div class="ibox-title">{{ __('title.New_Post') }}</div>
	 			<div class="ibox-content">
	 			@if(Session::has('message'))
		 			<div class="alert alert-success">
							{{Session::get('message')}}
		 			</div>
				@endif	
		 			<form action="{{route('post.update',$post[0]->id)}}" method="POST" enctype="multipart/form-data" >
		 				<div class="row">
			 					{{ csrf_field() }}
			 					<input type="hidden" name="_method" value="PUT">
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
					                                    <input id="title_vi" type="text" placeholder="Tiêu Đề" class="form-control"  name="Title_vi" value="{{$vi_detail->pivot->Title}}">     
					                            	</div>
													<div class="form-group">
							 							<label>Giá VND</label>
						                                <input type="text" placeholder="200000VND" class="form-control"  name="Price_vi" value="{{$vi_detail->pivot->Price}}">     
						                            </div>
													<div class="form-group">
							 							<label>Giá(Sale) VND</label>
						                                <input type="text" placeholder="200000VND" class="form-control"  name="Price_Sale_vi" value="{{$vi_detail->pivot->Price_Sale}}">     
						                            </div>
					                            	<div class="form-group">
					                            		<textarea id="descriptions_vi" class="ckeditor" name="Descriptions_vi">{{$vi_detail->pivot->Descritions}}</textarea>

					                            	</div>
				                                </div>
				                            </div>
				                            <div id="tab-2" class="tab-pane">
				                                <div class="panel-body">
				                                	<div class="form-group">
						 								<label>{{ __('title.Title') }}</label>
					                                    <input type="text" placeholder="Title" class="form-control"  name="Title_en" value="{{$en_detail->pivot->Title}}">     
					                            	</div>
					                            	<div class="form-group">
							 							<label>Giá $</label>
						                                <input type="text" placeholder="10$" class="form-control"  name="Price_en" value="{{$en_detail->pivot->Price}}">     
						                            </div> 
					                            	<div class="form-group">
							 							<label>Giá(Sale) $</label>
						                                <input type="text" placeholder="10$" class="form-control"  name="Price_Sale_en" value="{{$en_detail->pivot->Price_Sale}}">     
						                            </div> 
					                            	<div class="form-group">
					                            		<textarea id="descriptions_en" class="ckeditor" name="Descriptions_en">{{$en_detail->pivot->Descriptions}}</textarea>

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
											<img src="{{'/public/upload/post/'.$post[0]->Avatar}}"  width="100%" />
		                            </div>
			 						<div class="form-group">
			 						<label>{{ __('title.Slug') }}</label>
		                                    <input id="slug" type="text" placeholder="{{ __('title.Slug') }}" class="form-control"  name="Slug" value="{{$post[0]->Slug}}">     
		                            </div>
		                            <div class="form-group">
			 							<label>{{ __('title.Category') }}</label>
		                                <select class="form-control m-b" name="categories_id">
	                                		    {!! generateCategoryLists($category->toArray(), $parentId=0, $indent="",$post[0]->categories_id) !!}
		                                	   
	                                    </select>    
		                            </div>
		                            <div class="form-group">
			 						<label>Màu Sắc</label>
		                                    <select class="form-control m-b" name="color_id">
	                                        @if(count($color) > 0)
		                                   	 @foreach($color as $item_color)
		                                   	 	@if($post[0]->color_id == $item_color->id)
		                                        	<option selected="selected" value="{{$item_color->id}}">{{$item_color->lang[0]->pivot->Name}}</option>
	                                        	@else
	                                        		<option value="{{$item_color->id}}">{{$item_color->lang[0]->pivot->Name}}</option>

	                                        	@endif	
	                                        @endforeach
	                                        @endif
	                                    </select>    
		                            </div>
		                            <div class="form-group">
			 						<label>Trạng Thái</label>
	                                    <select class="form-control m-b" name="Status">
                                        <option value="1">Hiển Thị</option>
                                        <option value="0" @if(isset($post[0]->Status) && $post[0]->Status == 0){{'selected="selected"'}} @endif>Ẩn</option>
                                        
                                    </select>    
		                            </div>
		                           
			 						
			 					</div>
		 				</div>	
 						<?php $image_ = "";?>
		 				@if(count($post) > 0)
		 					@foreach($post[0]->image as $item_img)
		 						<?php $image_ =  $image_.$item_img->id.",";?>
		 						
		 					@endforeach
		 				@endif
	 					<div class="row admin-gallery">
		 					<div class=" col-md-12">
	 							<label>Bộ Sưu Tập</label>
		 							<div class="row ">
		 							@if(count($post) > 0)
					 					@foreach($post[0]->image as $item_img)
					 						
					 						
					 				
				                        <div class="col-md-2 img-item img-item-{{$item_img->id}}">
		                       					   
				                        	<img title="{{$item_img->url}}" src="{{'/public/upload/post/'.$item_img->url}}" width="100%" height="100%">
				                        	<div class="row">
				                        		<div class="col-md-9 img-title">
				                        			<label class="label label " title="{{$item_img->url}}">{{$item_img->url}}</label>
				                        		</div>
				                        		<div class="col-md-3 img-trash">
				                        			<label class="btn btn-danger btn-xs btn-del-img" data-id = "{{$item_img->id}}" title="{{$item_img->url}}"><i class="fa fa-trash"></i></label>
				                        		</div>
				                        	</div>
				                        </div> 
		 								
		 								@endforeach
					 				@endif
		 							</div>
		                        
		 					</div>
	 					</div>
	 					<div class="row">
		 					<div class=" col-md-12">
		 						<div class="form-group">
			 						<label>Thêm Bộ Sưu Tập</label>
			                        <input type="file" name="Images[]"  multiple id="ssi-upload"/>   
		                        </div>
		 					</div>
	 					</div>	
	 					<div class=" row">
		 					<div class=" col-md-12">
		 						<input id="btn-newpost" type="submit" name="Btn-newpost" class="btn btn-primary" value="Cập Nhật">
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

		
	 // 	$.ajax({
		// 	url:'http://flower.eve/haha',
		  
		// }).done(function(data){console.log(data);});
				$('#ssi-upload').ssi_uploader({
			        url: 'http://localhost:3300/upload',
			        inForm:true,
			        maxFileSize:200
			    });
		// 
		$(document).ready(function() {
			setTimeout(function() {
				
				// $('.ssi-button').trigger('click');
				// $('.ssi-button').trigger('change');
				// $('#ssi-upload').val('D:\\thanhtuan\\desktop_2017\\aa1.png');
				

			}, 2000);
		});



		$(document).on('click', '.btn-del-img', function(event) {
			event.preventDefault();
			/* Act on the event */
			var id = $(this).attr('data-id');
			console.log(id);
			$('.img-item-'+id).empty();
			$('.admin-gallery').append('<input id="hd-img-'+id+'" type="hidden" name="Images_Pre[]" value="'+id+'"  multiple id="image_pre"/>')
		});
	</script>
@endsection


 