<?php
	namespace App\Repository\Images;
	use App\Model\Images\Images;
	use App\Model\Images\Images_Detail;
	use App\Repository\Images\ImagesInterface;
	use App\Repository\Images\Images_DetailRepository;
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
class ImagesRepository implements ImagesInterface
{
	protected $model;
	protected $Images_detail;
	protected $color;
	protected $category;
	
	public function __construct(Images $Images)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->model = $Images;
		
		
		
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

			$result =   $this->model->with(['post'=>function (){

			}]);

			if(isset($data->post_id) && $data->post_id != "" ){
				$result->where('post_id',$data->post_id);
			}

			$result->orderBy('id');
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
	 //    						->with(['Images_detail'])
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
	 * New Images
	 * @param  [type] $attribute [description]
	 * @return [type]            [description]
	 */
	public function ImagesInsert($attribute)
	{
		if ($attribute->hasFile('Avatar')) {
	        $image = $attribute->file('Avatar');
	        $filename = $attribute->Slug.'-'.time() . '.' . $image->getClientOriginalExtension();
	        $path = public_path('upload/Images/' . $filename);
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
		  * [$Images_vi description vietnamese]
		  * @var Images_DetailRepository
		  */
		 $Images_vi = new Images_Detail;
		 $Images_vi->Images_id = $id;
		 $Images_vi->Title = $attribute->Title_vi;
		 $Images_vi->Price = $attribute->Price_vi;
		 $Images_vi->lang_id =1;
		 $Images_vi->Descriptions = $attribute->Description_vi;
		 $Images_vi->save();
		 $vi = $Images_vi->id;
		 /**
		  * [$Images_vi description english]
		  * @var Images_DetailRepository
		  */
		 if(isset($attribute->Title_en) && $attribute->Title_en != null){

			 $Images_en = new Images_Detail;
			 $Images_en->Images_id = $id;
			 $Images_en->Title = $attribute->Title_en;
			 $Images_en->Price = $attribute->Price_en;
			 $Images_en->lang_id =2;
			 $Images_en->Descriptions = $attribute->Description_en;
			 $Images_en->save();
			 $en = $Images_en->id;
		 }


		 return ['Images_id'=>$id,'Images_detail_vi'=>$vi,'Images_detail_en'=>$en];
	}

	
	public function putUpdate($attribute,$id)
	{
		$Images = $this->model->where('id',$id)->with(['Images_detail','lang'=>function ($lang){}])->get();
		// return $Images;
		// $abc = $this->model->find($id);

		if ($attribute->hasFile('Avartar')) {
	        $image = $attribute->file('Avatar');
	        $filename = $attribute->Slug.'-'.time() . '.' . $image->getClientOriginalExtension();
	        $path = public_path('upload/Images/' . $filename);
	        // Image::make($image->getRealPath())->resize(200, 200)->save($path);
	        Image::make($image->getRealPath())->save($path);
	        File::delete(public_path('upload/Images/' .$abc->Avatar));
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

			// $category = $this->category->getAll(null);
			// $color = $this->color->getAll(null);
	  //       return view('admin.Images.add')->with('category',$category)->with('color',$color);
	}

	
		
		
		
	

}