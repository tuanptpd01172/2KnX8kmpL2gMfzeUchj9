<?php
	namespace App\Repository\Customer;
	/**
	* 
	*/
	interface CustomerInterface 
	{
		
		public function getAll($data);
		public function getById($id);
		public function getBySlug($slug);
		public function postInsert($attribute);
		public function putUpdate($attribute,$id);
		public function updateStatus($id);
		public function getDelete($id);
		
		
		
		

		
			
		
	}