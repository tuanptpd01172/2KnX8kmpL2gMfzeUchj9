<?php
	namespace App\Repository\Post;
	use App\Model\Post\Post_Detail;
	use App\Repository\Post\Post_DetailInterface;
	
	
	use Session;

/**
* 
*/
class Post_DetailRepository implements Post_DetailInterface
{
	protected $model;
	
	public function __construct(Post_Detail $Post_Detail)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->model = $Post_Detail;
		
		
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

			}]);
									//->where('Status',$status);

			// if(isset($data->categories_id) && $data->categories_id != "" ){
			// 	$result->where('categories_id',$data->categories_id);
			// }
			

			// if(isset($data->user_id) && $data->user_id != "" ){
			// 	$result->where('user_id',$data->user_id);
			// }

			// if(isset($data->View) && $data->View != "" ){
			// 	$result->where('View',$data->View);
			// }


			$result->get();
			return $result;
		}
		return $this->model->all();
	}


	public function getById($id)
	{
		return $this->model->find($id);
	}
	public function getBySlug($slug)
	{
	 //    $result =   $this->model->where('Slug',$slug)
	 //    						->with(['post_detail'])
	 //    						->get();
		// if(count($result) > 0 ){
		// 	 return $result;
		// }else{
		// 	return [];
		// }
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
		 $this->model->Title=$attribute->Title;
		 $this->model->post_id=$attribute->post_id;
		 $this->model->lang_id=$attribute->lang_id;
		 $this->model->Price=$attribute->Price;
		 $this->model->Descriptions=$attribute->Descriptions;
		 $this->model->View=0;


		 $this->model->save();
		 return $this->model->id;
	}

	
	public function putUpdate($attribute,$id)
	{
		$abc = $this->model->find($id);
		 $abc->Title=$attribute->Title;
		 $abc->post_id=$attribute->post_id;
		 $abc->lang_id=$attribute->lang_id;
		 $abc->Price=$attribute->Price;
		 $abc->Descriptions=$attribute->Descriptions;
		 $abc->View=0;
		

		 $abc->save();
	}

	public function getDelete($id)
	{
		$del = $this->model->find($id);
		return$del->destroy($id);
	}

	
		
		
		
	

}