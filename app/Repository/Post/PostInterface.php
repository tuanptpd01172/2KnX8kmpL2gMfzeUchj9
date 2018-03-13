<?php
	namespace App\Repository\Post;
	/**
	* 
	*/
	interface PostInterface 
	{
		
		public function getAll($data);
		public function index($data);
		public function create();
		public function edit($id);
		public function getById($id);
		public function getBySlug($slug);
		public function postInsert($attribute);
		public function putUpdate($attribute,$id);
		public function updateStatus($id);
		public function getDelete($id);
		
		
		
		

		
			
		
	}