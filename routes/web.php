
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
	Route::get('/change-lang/{locale?}', function ($locale) {
	    Session::put('locale',$locale);
	    return Redirect::route('test');
	    
	   
	});
	Route::get('/test', function () {
	    // App::setLocale('en');
	    return view('admin.test');
	   
	})->name('test');

	/**
	 * Restful post
	 */
	Route::resource('/post','Post\PostController');
	Route::get('/{slug?}','Post\PostController@getBySlug')->name('post_slug');


});