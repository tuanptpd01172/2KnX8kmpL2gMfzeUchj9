<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Categories\Categories_DetailInterface;

class Categories_DetailController extends Controller
{
    protected $model;

    public function __construct(Categories_DetailInterface $Categories_DetailInterface)
    {
    	$this->model = $Categories_DetailInterface;
    }

    use \App\Http\Controllers\RestfulController;


    public function getBySlug($slug,Request $data = null)
    {
        $result = $this->model->getBySlug($slug);
        if(count($result) > 0 ){

            if(isset($data) && ($data->ajax() || $data->wantsJson())){
                
                return response()->json($result);
            }
            return $result;
        }else{
            $data_['name'] = 'Page not found';
            if(isset($data) && ($data->ajax() || $data->wantsJson())){
                
                return response()->json($data_,404);
            }
            return response()->view('errors.404',$data_,404);
        }
    }
    public function Categories_Details(Request $data)
    {
        $result = $this->model->getAll($data);
	    if(count($result) > 0 ){

	        if(isset($data) && ($data->ajax() || $data->wantsJson())){
	            
	            return response()->json($result);
	        }
	        return $result;
        }else{
        	$data_['name'] = 'Page not found';
        	if(isset($data) && ($data->ajax() || $data->wantsJson())){
	            
	            return response()->json($data_,404);
	        }
    		return response()->view('errors.404',$data_,404);
        }
    }
}
