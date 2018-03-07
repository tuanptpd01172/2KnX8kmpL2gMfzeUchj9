<?php
	namespace App\Repository\Post;
	use App\Model\Post\Post;
	use App\Model\Post\Post_Detail;
	use App\Repository\Post\PostInterface;
	use App\Repository\Post\Post_DetailRepository;
	use App\Repository\Categories\CategoriesInterface;
	use App\Repository\Color\ColorInterface;
	use Illuminate\Http\Request;
	
	use Session;
	use Image;
	use Helper;
	use File;
/**
* 
*/
class PostRepository implements PostInterface
{
	protected $model;
	protected $post_detail;
	protected $color;
	protected $category;
	
	public function __construct(Post $Post,Post_DetailRepository $Post_DetailRepository,CategoriesInterface $CategoriesInterface,ColorInterface $ColorInterface)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->model = $Post;
		$this->post_detail = $Post_DetailRepository;
		$this->category = $CategoriesInterface;
		$this->color = $ColorInterface;
		
		
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
	 * New Post
	 * @param  [type] $attribute [description]
	 * @return [type]            [description]
	 */
	public function postInsert($attribute)
	{
		if ($attribute->hasFile('Avatar')) {
	        $image = $attribute->file('Avatar');
	        $filename = $attribute->Slug.'-'.time() . '.' . $image->getClientOriginalExtension();
	        $path = public_path('upload/post/' . $filename);
	        $path1 = public_path('upload/thumbnail/' . $filename);
	        Image::make($image->getRealPath())->save($path);
	        
	        Image::make($image->getRealPath())->resize(200, 200)->save($path1);
	        $this->model->Avatar=$filename;
	    }

		 $this->model->Slug=$attribute->Slug;
		 $this->model->user_id=1;//$attribute->user_id;
		 $this->model->categories_id=$attribute->categories_id;
		 $this->model->color_id=$attribute->color_id;
		 $this->model->Status=$attribute->Status;
		 $this->model->View=0;



		 $this->model->save();
		 $id = $this->model->id;
		 /**
		  * [$post_vi description vietnamese]
		  * @var Post_DetailRepository
		  */
		 $post_vi = new Post_Detail;
		 $post_vi->post_id = $id;
		 $post_vi->Title = $attribute->Title_vi;
		 $post_vi->Price = $attribute->Price_vi;
		 $post_vi->lang_id =1;
		 $post_vi->Descriptions = $attribute->Description_vi;
		 $post_vi->save();
		 $vi = $post_vi->id;
		 /**
		  * [$post_vi description english]
		  * @var Post_DetailRepository
		  */
		 if(isset($attribute->Title_en) && $attribute->Title_en != null){

			 $post_en = new Post_Detail;
			 $post_en->post_id = $id;
			 $post_en->Title = $attribute->Title_en;
			 $post_en->Price = $attribute->Price_en;
			 $post_en->lang_id =2;
			 $post_en->Descriptions = $attribute->Description_en;
			 $post_en->save();
			 $en = $post_en->id;
		 }


		 return ['post_id'=>$id,'post_detail_vi'=>$vi,'post_detail_en'=>$en];
	}

	
	public function putUpdate($attribute,$id)
	{
		$post = $this->model->where('id',$id)->with(['post_detail','lang'=>function ($lang){}])->get();
		// return $post;
		// $abc = $this->model->find($id);

		if ($attribute->hasFile('Avartar')) {
	        $image = $attribute->file('Avatar');
	        $filename = $attribute->Slug.'-'.time() . '.' . $image->getClientOriginalExtension();
	        $path = public_path('upload/post/' . $filename);
	        // Image::make($image->getRealPath())->resize(200, 200)->save($path);
	        Image::make($image->getRealPath())->save($path);
	        File::delete(public_path('upload/post/' .$abc->Avatar));
	        File::delete(public_path('upload/thumbnail/' .$abc->Avatar));
	        
	         $abc->Avatar=$filename;
	    }
		 $abc->Slug=$attribute->Slug;
		 $abc->categories_id=$attribute->categories_id;
		 $abc->color_id=$attribute->color_id;
		 $abc->Status=$attribute->Status;
		
		 $abc->View=0;

		

		 $abc->save();
	}

	public function getDelete($id)
	{
		$del = $this->model->find($id);
		return$del->destroy($id);
	}


	public function create()
	{

			$category = $this->category->getAll(null);
			$color = $this->color->getAll(null);
	        return view('admin.Post.add')->with('category',$category)->with('color',$color);
	}

	
		
		
		
	

}