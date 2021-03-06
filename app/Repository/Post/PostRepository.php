<?php
	namespace App\Repository\Post;
	use App\Model\Post\Post;
	use App\Model\Post\Post_Detail;
	use App\Model\Images\Images;
	use App\Repository\Post\PostInterface;
	use App\Repository\Post\Post_DetailRepository;
	use App\Repository\Categories\CategoriesInterface;
	use App\Repository\Color\ColorInterface;
	use Illuminate\Http\Request;
	
	use App;
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

			$result =   $this->model->with([
				'post_detail'=>function (){

				},
				'lang'=>function ($lang){
					
					$lang->where('Locale',$GLOBALS['locale']);
				},
				'image',
				

			])->where('Status',$status);

			if(isset($data->categories_id) && $data->categories_id != null ){
				$result->where('categories_id',$data->categories_id);
			}
			

			if(isset($data->user_id) && $data->user_id != "" ){
				$result->where('user_id',$data->user_id);
			}

			if(isset($data->View) && $data->View != "" ){
				$result->where('View',$data->View);
			}


			if(isset($data->limit) && $data->limit != "" ){
				$result->limit($data->limit);
			}
			$result->orderBy('id','DESC');
			// $result->get();
			return $result->get();
			// return [];
		}
		return $this->model->all();
	}
	
	public function getById($id)
	{
		return $this->model->find($id);
	}
	public function getBySlug($slug)
	{
		$locale =App::getLocale(); 
		$GLOBALS['locale'] = App::getLocale();

	    $result =   $this->model->where('Slug',$slug)
	    						->with(['post_detail','lang'=>function ($lang){$lang->where('Locale',$GLOBALS['locale']);},'color'=>function ($color){$color->with(['lang']);}])
	    						->first();
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
		 $post_vi->Price_Sale = $attribute->Price_Sale_vi;
		 $post_vi->lang_id =1;
		 $post_vi->Short_Descriptions = $attribute->Short_Descriptions_vi;
		 $post_vi->Descriptions = $attribute->Descriptions_vi;
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
			 $post_en->Price_Sale = $attribute->Price_Sale_en;
			 $post_en->lang_id =2;
			 $post_en->Short_Descriptions = $attribute->Short_Descriptions_en;
			 $post_en->Descriptions = $attribute->Descriptions_en;
			 $post_en->save();
			 $en = $post_en->id;
		 }
		 /****add gallery*******/
		 $list_img = [];
		 if ($attribute->hasFile('Images')) {
	        $image_ = $attribute->file('Images');
	        $i = 0;
		 	foreach ($image_ as $img) {
		        $filename_ = $attribute->Slug.'-'.$i.'-'.time() . '.' . $img->getClientOriginalExtension();
		        $path = public_path('upload/post/' . $filename_);
		        $path1 = public_path('upload/thumbnail/' . $filename_);
		        Image::make($img->getRealPath())->save($path);
		        
		        Image::make($img->getRealPath())->resize(200, 200)->save($path1);
		 		

		 		$img_ = new Images;
		 		$img_->post_id = $id;
		 		$img_->url = $filename_;
		 		$img_->save();

		 		$list_img[] = $filename_;

		 		$i++;
		 	}
	        
	    }else{
	    	$image_ = '';
	    }

		 return ['post_id'=>$id,'post_detail_vi'=>$vi,'post_detail_en'=>$en,'filename_'=>$list_img,'filename1'=>$image_];
	}

	
	public function putUpdate($attribute,$id)
	{
		$post = $this->model->where('id',$id)->with(['post_detail','lang'=>function ($lang){}])->get();
		// return $post;
		$abc = $this->model->find($id);

		if ($attribute->hasFile('Avatar')) {
	        $image = $attribute->file('Avatar');
	        $filename = $attribute->Slug.'-'.time() . '.' . $image->getClientOriginalExtension();
	        $path = public_path('upload/post/' . $filename);
	        $path1 = public_path('upload/thumbnail/' . $filename);
	        Image::make($image->getRealPath())->resize(200, 200)->save($path1);
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
		 //update gallery
		 //
		 $gallery = Images::where('post_id',$id)->get();
		 $list_img = [];
		 if ($attribute->hasFile('Images')) {
	        $image_ = $attribute->file('Images');
	        $i = 0;

		 	foreach ($image_ as $img) {
		        $filename_ = $attribute->Slug.'-'.$i.'-'.time() . '.' . $img->getClientOriginalExtension();
		        $path = public_path('upload/post/' . $filename_);
		        $path1 = public_path('upload/thumbnail/' . $filename_);
		        Image::make($img->getRealPath())->save($path);		        
		        Image::make($img->getRealPath())->resize(200, 200)->save($path1);
		 		

		 		$img_ = new Images;
		 		$img_->post_id = $id;
		 		$img_->url = $filename_;
		 		$img_->save();

		 		$list_img[] = $filename_;

		 		$i++;
		 	}
	        
	    }
		 	$img_pre = Images::where('post_id',$id)->get();
		 	if(isset($attribute->Images_Pre) && $attribute->Images_Pre != null){
		 		foreach ($attribute->Images_Pre as $del_img) {
		 			
		 			$del_img_ = Images::find($del_img);
		 			$del_img_->destroy($del_img);
		 			foreach ($img_pre as $val_img) {
		 				if($val_img->id == $del_img){
		 					File::delete(public_path('upload/post/' .$val_img->url));
	        				File::delete(public_path('upload/thumbnail/' .$val_img->url));
		 				}
		 			}
		 		}
		 	}


	    /***update detail*****/
	     $post_en = Post_Detail::find($post[0]->lang[1]->pivot->id);
		 $post_en->post_id = $id;
		 $post_en->Title = $attribute->Title_en;
		 $post_en->Price = $attribute->Price_en;
		 $post_en->Price_Sale = $attribute->Price_Sale_en;
		 $post_en->lang_id =2;
		 $post_en->Short_Descriptions = $attribute->Short_Descriptions_en;
		 $post_en->Descriptions = $attribute->Descriptions_en;
		 $post_en->save();
		 $en = $post_en->id;
	     $post_vi = Post_Detail::find($post[0]->lang[0]->pivot->id);
		 $post_vi->post_id = $id;
		 $post_vi->Title = $attribute->Title_vi;
		 $post_vi->Price = $attribute->Price_vi;
		 $post_vi->Price_Sale = $attribute->Price_Sale_vi;
		 $post_vi->lang_id =1;
		 $post_vi->Short_Descriptions = $attribute->Short_Descriptions_vi;
		 $post_vi->Descriptions = $attribute->Descriptions_vi;
		 $post_vi->save();
		 $vi = $post_vi->id;

		 
		 return $attribute->Descriptions_vi;
		 
	}

	public function getDelete($id)
	{
		$del = $this->model->find($id);
		return $del->destroy($id);
	}


	public function create()
	{

			$category = $this->category->getAll(null);
			$color = $this->color->getAll(null);
	        return view('admin.Post.add')->with('category',$category)->with('color',$color);
	}


	public function edit($id,$messsage = null)
	{		
			$message = $messsage;
			$post = $this->model->where('id',$id)->with(['post_detail','lang','color','image'])->get();
			$category = $this->category->getAll(null);
			$color = $this->color->getAll(null);
	        return view('admin.Post.edit',compact(['color', 'category','post','message']));//->with('category',$category)->with('color',$color)->with('post',$post);
	}

	public function index($data=null)
	{		
			
			$posts = $this->model->with(['post_detail','lang','color','image','categories'=>function ($cate){$cate->with(['categories_detail']);}]);
			if(isset($data->categories_id) && $data->categories_id != ""){
				$posts->where('categories_id',$data->categories_id);
			}
			if(isset($data->color_id) && $data->color_id != ""){
				$posts->where('color_id',$data->color_id);
			}
			if(isset($data->Status) && $data->Status != ""){
				$posts->where('Status',$data->Status);
			}
			$post =$posts->orderBy('id','DESC')->paginate(10);
			// return $posts;
			$category = $this->category->getAll(null);
			$color = $this->color->getAll(null);
	        return view('admin.Post.index',compact(['color', 'category','post','message']));//->with('category',$category)->with('color',$color)->with('post',$post);
	}

	
		
		
		
	

}