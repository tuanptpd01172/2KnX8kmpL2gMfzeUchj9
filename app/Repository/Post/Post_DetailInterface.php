<?php
	namespace App\Repository\Post;
	/**
	* 
	*/
	interface Post_DetailInterface 
	{
		
		public function getAll($data);
		public function getById($id);
		public function getBySlug($slug);
		public function postInsert($attribute);
		public function putUpdate($attribute,$id);
		public function updateStatus($id);
		public function getDelete($id);
		
		
		
		

		
			
		
	}