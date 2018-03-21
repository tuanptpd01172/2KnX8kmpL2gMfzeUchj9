<?php
	namespace App\Repository\Flower;
	use App\Model\Lang\Lang;
	use App\Model\Categories\Categories;
	use App\Model\Post\Post;
	use App\Model\Slide\Slide;
	use App\Repository\Lang\LangInterface;
	
	use App;
	use Session;

/**
* 
*/
class FlowerRepository implements FlowerInterface
{
	protected $model;
	protected $category;
	protected $post;
	protected $slide;
	protected $lang;
	
	public function __construct(Categories $Categories,Post $Post,Slide $Slide,Lang $Lang)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->category = $Categories;
		$this->post = $Post;
		$this->slide = $Slide;
		$this->lang = $Lang;
		
		
	}

	public function home($data=null)
	{	
		
		$locale =App::getLocale(); 
		$GLOBALS['locale'] = App::getLocale();
		// $cate = $this->category->where('Status',1)->with(['lang'=>function ($lang){$lang->where('Locale',$GLOBALS['locale'])->get();}])->get();
		$post = $this->post->where('Status',1)->with(['lang'=>function ($lang){$lang->where('Locale',$GLOBALS['locale'])->orderBy('id','DESC')->get();}])->orderBy('id','DESC')->get();
		$special_post = $this->category->where('Slug','hoa')->orWhere('Slug','tiec-cuoi')->with([

			'post'=>function ($post){
				$post->with(['lang'=>function ($lang){
					$lang->where('Locale',$GLOBALS['locale']);}])->offset(0)->limit(4)->orderBy('id','DESC')->get();

		}])->get();
		$new_post = $this->category->where('Slug','tin-tuc')->with([

			'post'=>function ($post){
				$post->with(['lang'=>function ($lang){
					$lang->where('Locale',$GLOBALS['locale']);},'image'])->orderBy('id','DESC')->get();

		}])->get();
		$about = $this->category->where('Slug','gioi-thieu')->with([

			'post'=>function ($post){
				$post->with(['lang'=>function ($lang){
					$lang->where('Locale',$GLOBALS['locale']);}])->orderBy('id','DESC')->get();

		}])->get();
		$customer_say = $this->category->where('Slug','danh-gia-cua-khach-hang')->with([

			'post'=>function ($post){
				$post->with(['lang'=>function ($lang){
					$lang->where('Locale',$GLOBALS['locale']);}])->offset(0)->limit(4)->orderBy('id','DESC')->get();

		}])->get();
		$slide = $this->slide->where('Status',1)->with(['lang'=>function ($lang){$lang->where('Locale',$GLOBALS['locale'])->orderBy('id','DESC')->get();}])->get();
		$lang_post = $this->lang->where('Locale',$GLOBALS['locale'])->with(['category'=>function ($category){$category->with(['post'=>function ($post){$post->with(['post_detail']);}])->orderBy('id','DESC');}])->get();


		return view('flower.index',compact(['locale','post','slide','lang_post','about','new_post','special_post','customer_say']));
	}

	

	
		
		
		
	

}