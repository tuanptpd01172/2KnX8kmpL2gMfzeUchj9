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
		

		
		$vi_detail=null;
		$en_detail=null;
		//echo __('messages.welcome');
		//
		// echo "sdfsdf";
		// echo '<pre>';
		// print_r($slide->toArray());
		// echo '</pre>';
	 ?>
	 @if(isset($slide) && count($slide->lang) > 0)
	 	@foreach($slide->lang as $detail)
	 		@if($detail->Locale == "vi")
	 			<?php $vi_detail = $detail;?>
	 		@elseif($detail->Locale == "en")
	 			<?php $en_detail = $detail;?>
			@else
	 		@endif
	 	@endforeach
	@endif
	<?php
	 // echo '<pre>';
	// 		    print_r($vi_detail->toArray());
	// 		    echo '</pre>';
	 			?>
	
		<!--  -->
	 <div class="row">
	 		<div class="ibox">
	 			<div class="ibox-title">{{ __('title.New_Post') }}</div>
	 			<div class="ibox-content">
	 			{!! Helper::ss_flash()!!}	
		 			<form action="{{route('slide.update',$slide->id)}}" method="POST" enctype="multipart/form-data" >
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
							 							<label>Liên Kết</label>
						                                <input type="text" placeholder="http://..." class="form-control"  name="url_vi" value="{{$vi_detail->pivot->url}}">     
						                            </div>
					                            	<div class="form-group">
					                            		<textarea id="descriptions_slide_vi" class="form-control descriptions_slide" name="Descriptions_vi">{{$vi_detail->pivot->Descriptions}}</textarea>

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
							 							<label>Liên Kết</label>
						                                <input type="text" placeholder="http://..." class="form-control"  name="url_en" value="{{$en_detail->pivot->url}}">     
						                            </div> 
					                            	<div class="form-group">
							 							<label>Mô Tả</label>
					                            		<textarea id="descriptions_slide_en" class="form-control descriptions_slide" name="Descriptions_en">{{$en_detail->pivot->Descriptions}}</textarea>

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
			 							<label>Ảnh Slide</label>

	                                    <!-- <input type="file" placeholder="{{ __('title.Avatar') }}" class="form-control"  name="Title"> --> 
	                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
										    <div class="form-control" data-trigger="fileinput">
										        <i class="glyphicon glyphicon-file fileinput-exists"></i>
										    <span class="fileinput-filename"></span>
										    </div>
										    <span class="input-group-addon btn btn-default btn-file">
										        <span class="fileinput-new">Select file</span>
										        <span class="fileinput-exists">Change</span>
										        <input type="file" name="Image"/>
										    </span>
										    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
										</div>
										<img src="{{'/public/upload/Slide/'.$slide->image}}" width="100%">

		                            </div>
			 						
		                          
		                            
		                           <div class="form-group">
			 						<label>Trạng Thái</label>
	                                    <select class="form-control m-b" name="Status">
                                        <option value="1">Hiển Thị</option>
                                        <option value="0" @if(isset($slide->Status) && $slide->Status == 0){{'selected="selected"'}} @endif>Ẩn</option>
                                        
                                    </select>    
		                            </div>
		                            <!-- <div class="form-group">
			 						<label>css</label>
		                                    <input id="css_id" type="text" placeholder="css" class="form-control"  name="css">     
		                            </div>
			 						
		                            <div class="form-group">
			 						<label>top</label>
		                                    <input id="top_id" type="text" placeholder="Top" class="form-control"  name="Top">     
		                            </div>
			 						
		                            <div class="form-group">
			 						<label>right</label>
		                                    <input id="right_id" type="text" placeholder="Right" class="form-control"  name="Right">     
		                            </div>
			 						
		                            <div class="form-group">
			 						<label>left</label>
		                                    <input id="left_id" type="text" placeholder="Left" class="form-control"  name="Left">     
		                            </div>
			 						
		                            <div class="form-group">
			 						<label>bottom</label>
		                                    <input id="bot_id" type="text" placeholder="Bottom" class="form-control"  name="Bottom">     
		                            </div> -->
			 						
		                           
			 						
			 					</div>
		 				</div>	
	 					
	 					<div class=" row">
		 					<div class=" col-md-12">
		 						<input type="submit" name="Btn-newpost" class="btn btn-primary" value="Cập Nhật">
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



		 
	</script>
@endsection


 