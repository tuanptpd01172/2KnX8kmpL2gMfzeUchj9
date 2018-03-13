<?php
	namespace App\Repository\Categories;
	use App\Model\Categories\Categories;
	use App\Model\Categories\Categories_Detail;
	use App\Repository\Categories\CategoriesInterface;
	
	
	use Session;
	use Image;
	use File;
	use Hash;

/**
* 
*/
class CategoriesRepository implements CategoriesInterface
{
	protected $model;
	
	public function __construct(Categories $Categories)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->model = $Categories;
		
		
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

			$result =   $this->model->with(['categories_detail'=>function (){

			},'lang']);
									//->where('Status',$status);

			if(isset($data->Slug) && $data->Slug != "" ){
				$result->where('Slug',$data->Slug);
			}


			$result->get();
			return $result;
		}
		return $this->model->with(['categories_detail'=>function (){

			},'lang'=>function ($lang){}])->get();
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

		if ($attribute->hasFile('Image')) {
	        $image = $attribute->file('Image');
	        $filename = $attribute->Slug.'-'.time() . '.' . $image->getClientOriginalExtension();
	        $path = public_path('upload/category/' . $filename);
	        $path1 = public_path('upload/thumbnail/' . $filename);
	        Image::make($image->getRealPath())->save($path);
	        
	        Image::make($image->getRealPath())->resize(200, 200)->save($path1);
	        $this->model->Image=$filename;
	    }

		$this->model->Slug=$attribute->Slug;
		$this->model->Status=$attribute->Status;
		if(isset($attribute->parent_id) && $attribute->parent_id != ""){

			$this->model->parent_id=$attribute->parent_id;
		 
		}
		$this->model->save();
		$id = $this->model->id;
		$vi_detail = new Categories_Detail;
		$vi_detail->categories_id = $id;
		$vi_detail->lang_id = 1;
		$vi_detail->Name = $attribute->Name_vi;
		$vi_detail->Descriptions = $attribute->Descriptions_vi;
		$vi_detail->save();
		$en_detail = new Categories_Detail;
		$en_detail->categories_id = $id;
		$en_detail->lang_id = 2;
		$en_detail->Name = $attribute->Name_en;
		$en_detail->Descriptions = $attribute->Descriptions_en;
		$en_detail->save();


		 return $id ;
	}

	
	public function putUpdate($attribute,$id)
	{
		$cate = $this->model->where('id',$id)->with(['categories_detail','lang'=>function ($lang){}])->get();
		$abc = $this->model->find($id);

		if ($attribute->hasFile('Image')) {
	        $image = $attribute->file('Image');
	        $filename = $attribute->Slug.'-'.time() . '.' . $image->getClientOriginalExtension();
	        $path = public_path('upload/category/' . $filename);
	        $path1 = public_path('upload/thumbnail/' . $filename);
	        Image::make($image->getRealPath())->save($path);
	        Image::make($image->getRealPath())->resize(200, 200)->save($path1);
	        File::delete(public_path('upload/category/' .$abc->Image));
	        File::delete(public_path('upload/thumbnail/' .$abc->Image));
	        
	         $abc->Image=$filename;
	    }
		
		$abc->Slug=$attribute->Slug;
		$abc->Status=$attribute->Status;
		if(isset($attribute->parent_id) && $attribute->parent_id != ""){

			$abc->parent_id=$attribute->parent_id;
		 
		}else{
			$abc->parent_id=null;
		}

		$abc->save();


		/***update detail*****/
		$vi_detail = Categories_Detail::find($cate[0]->lang[0]->pivot->id);
		$vi_detail->categories_id = $id;
		$vi_detail->lang_id = 1;
		$vi_detail->Name = $attribute->Name_vi;
		$vi_detail->Descriptions = $attribute->Descriptions_vi;
		$vi_detail->save();
		$en_detail = Categories_Detail::find($cate[0]->lang[1]->pivot->id);;
		$en_detail->categories_id = $id;
		$en_detail->lang_id = 2;
		$en_detail->Name = $attribute->Name_en;
		$en_detail->Descriptions = $attribute->Descriptions_en;
		$en_detail->save();
		$vi = $vi_detail->id;
		$en = $en_detail->id;
		Session::flash('success','Cập Nhật Danh Mục Thành Công');

	}

	public function getDelete($id)
	{
		$del = $this->model->find($id);
		$del->destroy($id);
		Session::flash('success','Xóa Thành Công Danh Mục');
		return redirect()->route('categories.index')->with('id',$id);
	}



	public function create()
	{
		$category = $this->getAll(null);
		return view('admin.Categories.add')->with('category',$category);
		
	}


	public function edit($id)
	{
		$category = $this->model->where('id',$id)->with(['categories_detail','lang'])->get();
		$category_all = $this->model->with(['categories_detail','lang'])->get();
		return view('admin.Categories.edit')->with('category',$category)->with('category_all',$category_all);
		
	}

	public function index($data)
	{
		
		$category = $this->model->with(['categories_detail','lang'])->get();
		return view('admin.Categories.index')->with('category',$category);
		
	}

	
		
		
		
	

}