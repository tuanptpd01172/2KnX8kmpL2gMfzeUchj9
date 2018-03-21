<?php
	namespace App\Repository\Slide;
	use App\Model\Slide\Slide;
	use App\Model\Slide\Slide_Detail;
	
	use App\Repository\Slide\SlideInterface;
	
	use Illuminate\Http\Request;
	
	use Session;
	use Image;
	use Helper;
	use File;
/**
* 
*/
class SlideRepository implements SlideInterface
{
	protected $model;
	protected $Slide_detail;
	protected $color;
	protected $category;
	
	public function __construct(Slide $Slide,Slide_DetailRepository $Slide_DetailRepository)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->model = $Slide;
		$this->Slide_detail = $Slide_DetailRepository;
		
		
		
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

			$result =   $this->model->with(['Slide_detail'=>function (){

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

			$result->orderBy('id','DESC');
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
	    $result =   $this->model->where('Slug',$slug)
	    						->with(['Slide_detail'])
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
	 * New Slide
	 * @param  [type] $attribute [description]
	 * @return [type]            [description]
	 */
	public function postInsert($attribute)
	{
		if ($attribute->hasFile('Image')) {
	        $image = $attribute->file('Image');
	        $filename = Helper::gen_slug($attribute->Title_vi).'-'.time() . '.' . $image->getClientOriginalExtension();
	        $path = public_path('upload/slide/' . $filename);
	        $path1 = public_path('upload/thumbnail/' . $filename);
	        Image::make($image->getRealPath())->save($path);
	        
	        Image::make($image->getRealPath())->resize(1920, 900)->save($path1);
	        $this->model->image=$filename;
	    }

		 



        $this->model->Status=$attribute->Status;;
		$this->model->save();
		$id = $this->model->id;
		/**
		 * [$Slide_vi description vietnamese]
		 * @var Slide_DetailRepository
		 */
		$slide_vi = new Slide_Detail;
		$slide_vi->slide_id = $id;
		$slide_vi->Title = $attribute->Title_vi;
		$slide_vi->url = $attribute->url_vi;
		$slide_vi->lang_id =1;
		$slide_vi->css = $attribute->css;
		$slide_vi->Top = $attribute->Top;
		$slide_vi->Right = $attribute->Right;
		$slide_vi->Bottom = $attribute->Bottom;
		$slide_vi->Left = $attribute->Left;
		$slide_vi->Descriptions = $attribute->Descriptions_vi;
		$slide_vi->save();
		$vi = $slide_vi->id;
		 /**
		  * [$Slide_vi description english]
		  * @var Slide_DetailRepository
		  */
		 if(isset($attribute->Title_en) && $attribute->Title_en != null){

			 $slide_en = new Slide_Detail;
			 $slide_en->Slide_id = $id;
			 $slide_en->Title = $attribute->Title_en;
			 $slide_en->url = $attribute->url_en;
			 $slide_en->lang_id =2;
			 $slide_en->css = $attribute->css;
			 $slide_en->Top = $attribute->Top;
			 $slide_en->Right = $attribute->Right;
			 $slide_en->Bottom = $attribute->Bottom;
			 $slide_en->Left = $attribute->Left;
			 $slide_en->Descriptions = $attribute->Descriptions_en;
			 $slide_en->save();
			 $en = $slide_en->id;
		 }{
		 	$en = [];
		 }
		

		 return ['slide_id'=>$id,'slide_detail_vi'=>$vi,'slide_detail_en'=>$en];
	}

	
	public function putUpdate($attribute,$id)
	{
		$slide = $this->model->where('id',$id)->with(['Slide_detail','lang'=>function ($lang){}])->get();
		// return $Slide;
		$abc = $this->model->find($id);

		if ($attribute->hasFile('Image')) {
	        $image = $attribute->file('Image');
	        $filename = $attribute->Slug.'-'.time() . '.' . $image->getClientOriginalExtension();
	        $path = public_path('upload/slide/' . $filename);
	        $path1 = public_path('upload/thumbnail/' . $filename);
	        Image::make($image->getRealPath())->resize(1920, 900)->save($path1);
	        Image::make($image->getRealPath())->save($path);
	        File::delete(public_path('upload/slide/' .$abc->image));
	        File::delete(public_path('upload/thumbnail/' .$abc->image));
	        
	         $abc->image=$filename;
	    }
	         $abc->Status=$attribute->Status;
		 $abc->save();
		


	    /***update detail*****/
	    $slide_vi = Slide_Detail::find($slide[0]->lang[0]->pivot->id);
		$slide_vi->slide_id = $id;
		$slide_vi->Title = $attribute->Title_vi;
		$slide_vi->url = $attribute->url_vi;
		$slide_vi->lang_id =1;
		$slide_vi->css = $attribute->css;
		$slide_vi->Top = $attribute->Top;
		$slide_vi->Right = $attribute->Right;
		$slide_vi->Bottom = $attribute->Bottom;
		$slide_vi->Left = $attribute->Left;
		$slide_vi->Descriptions = $attribute->Descriptions_vi;
		$slide_vi->save();
		$vi = $slide_vi->id;
		if(isset($slide[0]) && count($slide[0]->lang) > 1){

		    $slide_en = Slide_Detail::find($slide[0]->lang[1]->pivot->id);
		}else{

		    $slide_en = new Slide_Detail;
		}
			$slide_en->slide_id = $id;
			$slide_en->Title = $attribute->Title_en;
			$slide_en->url = $attribute->url_en;
			$slide_en->lang_id =2;
			$slide_en->css = $attribute->css;
			$slide_en->Top = $attribute->Top;
			$slide_en->Right = $attribute->Right;
			$slide_en->Bottom = $attribute->Bottom;
			$slide_en->Left = $attribute->Left;
			$slide_en->Descriptions = $attribute->Descriptions_en;
			$slide_en->save();
			$en = $slide_en->id;

		 
		 // return $img_pre;
		 
	}

	public function getDelete($id)
	{
		$del = $this->model->find($id);
		return $del->destroy($id);
	}


	public function create()
	{

			
	        return view('admin.Slide.add');
	}


	public function edit($id,$messsage = null)
	{		
			$message = $messsage;
			$slide = $this->model->where('id',$id)->with(['slide_detail','lang'])->first();
			
	        return view('admin.Slide.edit',compact(['slide']));//->with('category',$category)->with('color',$color)->with('Slide',$Slide);
	}

	public function index($data=null)
	{		
			
			$slide = $this->model->with(['slide_detail','lang'=>function ($slide){$slide->with(['slide']);}])->get();
			
	        return view('admin.Slide.index',compact(['slide']));//->with('category',$category)->with('color',$color)->with('Slide',$Slide);
	}

	
		
		
		
	

}