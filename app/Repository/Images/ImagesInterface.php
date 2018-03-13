<?php
	namespace App\Repository\Images;
	/**
	* 
	*/
	interface ImagesInterface 
	{
		
		public function getAll($data);
		public function create();
		public function getById($id);
		public function getBySlug($slug);
		public function ImagesInsert($attribute);
		public function putUpdate($attribute,$id);
		public function updateStatus($id);
		public function getDelete($id);
		
		
		
		

		
			
		
	}