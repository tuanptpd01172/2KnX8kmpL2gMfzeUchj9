<?php
	namespace App\Repository\Color;
	use App\Model\Color\Color_Detail;
	use App\Repository\Color\Color_DetailInterface;
	
	
	use Session;

/**
* 
*/
class Color_DetailRepository implements Color_DetailInterface
{
	protected $model;
	
	public function __construct(Color_Detail $Color_Detail)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->model = $Color_Detail;
		
		
	}

	public function getAll($data=null)
	{	
		$GLOBALS['locale'] = 'vi';
		if(Session::has('Locale')){
			$GLOBALS['locale'] = Session::get('Locale');
		}
		if(isset($data) && $data != null){
			$status = 1;
			if(isset($data->Status) && $data->Status != "" ){
				$status = $data->Status ;
			}

			$result =   $this->model->with(['post_detail'=>function (){

			}])
									->where('Status',$status);

			if(isset($data->categories_id) && $data->categories_id != "" ){
				$result->where('categories_id',$data->categories_id);
			}
			

			if(isset($data->user_id) && $data->user_id != "" ){
				$result->where('user_id',$data->user_id);
			}

			if(isset($data->View) && $data->View != "" ){
				$result->where('View',$data->View);
			}


			$result->get();
			return $result;
		}
		return $this->model->all();
	}

	// public function getAll_Search($chinhanh_id,$data)
	// {
				
	// 	$result= $this->model->where('chinhanh_id',$chinhanh_id)->with('chinhanh','khoi','lophoc');//->where('chinhanh_id',$chinhanh_id)->where('Active',$active);


	// 	// if(isset($khoi_lop_name_id->name) && $khoi_lop_name_id->name!=""){
	// 	// 	$result->where('name',$khoi_lop_name_id->name);
			
	// 	// }

	// 	if(isset($data->Nam) && $data->Nam !=""){
	// 		$result->where('Nam',$data->Nam);
			
	// 	}
	// 	if(isset($data->id) && $data->id !=""){
	// 		$result->where('id',$data->id);
			
	// 	}

	// 	if(isset($data->Thang) && $data->Thang!=""){
	// 		$result->where('Thang',$data->Thang);
			
	// 	}

	// 	if (isset($data->lop_id) && $data->lop_id!=""){
	// 		$result->where('lop_id',$data->lop_id);
			
	// 	}
	// 	if (isset($data->khoi_id) && $data->khoi_id!=""){
	// 		$result->where('khoi_id',$data->khoi_id);
	// 	}
		

	// 	return $result->get();
		
		
		
	// }
	public function getById($id)
	{
		return $this->model->find($id);
	}
	public function getBySlug($slug)
	{
	    $result =   $this->model->where('Slug',$slug)
	    						->with(['post_detail'])
	    						->get();
		if(count($result) > 0 ){
			 return $result;
		}else{
			return [];
		}
	}
	public function updateStatus($status)
	{
		return $this->model->find($id);
	}
	/**
	 * Thêm Học Phí 
	 * @param  [type] $attribute [description]
	 * @return [type]            [description]
	 */
	public function postInsert($attribute)
	{
		 $this->model->Nam=$attribute->Nam;
		 $this->model->Thang=$attribute->Thang;
		 $this->model->So_Ngay="26";//$attribute->So_Ngay;
		 $this->model->Tien_Hoc_Phi=$attribute->Tien_Hoc_Phi;
		 $this->model->Tien_Hoc_Phi_Toi=$attribute->Tien_Hoc_Phi_Toi;
		 $this->model->Tien_An_Sang=$attribute->Tien_An_Sang;
		 $this->model->Tien_An_Toi=$attribute->Tien_An_Toi;
		 $this->model->Sua_Sang=0;//$attribute->Sua_Sang;
		 $this->model->Sua_Toi=0;//$attribute->Sua_Toi;
		 $this->model->Ban_Tru=$attribute->Ban_Tru;
		 $this->model->Nang_Khieu=$attribute->Nang_Khieu;
		 $this->model->Phuc_Vu_Ban_Tru=$attribute->Phuc_Vu_Ban_Tru;
		


		 
		 $this->model->chinhanh_id=$attribute->chinhanh_id;
		 $this->model->khoi_id=$attribute->khoi_id;
		 $this->model->lop_id=$attribute->lop_id;
		


		 $this->model->save();
		 return $this->model->id;
	}

	
	public function putUpdate($attribute,$id)
	{
		$abc = $this->model->find($id);
		 $abc->Nam=$attribute->Nam;
		 $abc->Thang=$attribute->Thang;
		 $abc->So_Ngay="26";//$attribute->So_Ngay;
		 $abc->Tien_Hoc_Phi=$attribute->Tien_Hoc_Phi;
		 $abc->Tien_Hoc_Phi_Toi=$attribute->Tien_Hoc_Phi_Toi;
		 $abc->Tien_An_Sang=$attribute->Tien_An_Sang;
		 $abc->Tien_An_Toi=$attribute->Tien_An_Toi;
		 $abc->Sua_Sang=0;//$attribute->Sua_Sang;
		 $abc->Sua_Toi=0;//$attribute->Sua_Toi;
		 $abc->Ban_Tru=$attribute->Ban_Tru;
		 $abc->Nang_Khieu=$attribute->Nang_Khieu;
		 $abc->Phuc_Vu_Ban_Tru=$attribute->Phuc_Vu_Ban_Tru;
		
		
		 
		 $abc->chinhanh_id=$attribute->chinhanh_id;
		 $abc->khoi_id=$attribute->khoi_id;
		 $abc->lop_id=$attribute->lop_id;
		

		 $abc->save();
	}

	public function getDelete($id)
	{
		$del = $this->model->find($id);
		return$del->destroy($id);
	}

	
		
		
		
	

}