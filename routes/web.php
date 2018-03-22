
<?php
// use Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*middeware lang*/
Route::group(['middleware'=>'locale'],function (){
	
	Route::get('/', function () {
	    return view('welcome');
	});

	Route::get('/langs/en', function () {
	    return view('admin.test');
	});
	Route::get('welcome/{locale?}', function ($locale = null) {
	    
	    return view('admin.test');
	});
	/*choose language*/
	Route::get('/change-lang/{locale?}', function ($locale) {
	    Session::put('locale',$locale);
	    return Redirect::route('test');
	   
	});
	
	Route::group(['prefix'=>'admin'],function (){

		/**
		 * Restful post
		 */
		Route::resource('/post','Post\PostController');
		Route::resource('/post_detail','Post\Post_DetailController');
		/**
		 * Restful Categories
		 */
		Route::resource('/categories','Categories\CategoriesController');
		Route::resource('/categories_detail','Categories\Categories_DetailController');
		/**
		 * Restful Color
		 */
		Route::resource('/color','Color\ColorController');
		Route::resource('/color_detail','Color\Color_DetailController');
		/**
		 * Restful comment
		 */
		Route::resource('/comment','Comment\CommentController');
		/**
		 * Restful customer
		 */
		Route::resource('/customer','Customer\CustomerController');
		/**
		 * Restful lang
		 */
		Route::resource('/lang','Lang\LangController');
		/**
		 * Restful images
		 */
		Route::resource('/images','Images\ImagesController');
		/**
		 * Restful order
		 */
		Route::resource('/order','Order\OrderController');
		Route::resource('/order_detail','Order\Order_DetailController');
		/**
		 * Restful slide
		 */
		Route::resource('/slide','Slide\SlideController');
		Route::resource('/slide_detail','Slide\Slide_DetailController');

	

		/*new post*/
		// Route::get('/posts/add', function () {  return view('admin.Post.add'); })->name('test');




	});


	/**
	 * view 
	 */
	/*Post detail */
	Route::get('/master',function (){
		return view('admin.master');
	})->name('post_slug');

	Route::get('/test', function () {
	    // App::setLocale('en');
	    return view('admin.test');
	   
	})->name('test');

	/**
	 * Public view
	 */
	Route::get('/','Flower\FlowerController@index')->name('home');
	Route::get('/','Flower\FlowerController@index')->name('home');
	
	
	/**
	 * test request
	 */
	Route::post('/requests','Post\PostController@requests')->name('requests');
	Route::get('/san-pham/{slug?}/','Post\PostController@getBySlug_FL')->name('flower_slug');
	Route::get('/{slug?}','Post\PostController@getBySlug')->name('post_slug');
}); 