@extends('admin.master')
@section('title')
	<!-- title here -->
@endsection
@section('meta')
	<!-- meta here -->
@endsection
@section('css')
	<!-- css here -->
@endsection
@section('content')
	{{ __('messages.ss') }}
	@lang('messages.ss')
	<?php
		// echo __('ss');
		echo __('messages.welcome');
	 ?>
@endsection
@section('script')
	
	<script type="text/javascript">
 	

	 	$.ajax({
			url:'http://flower.eve/haha',
		  
		}).done(function(data){console.log(data);});
	</script>
@endsection


 