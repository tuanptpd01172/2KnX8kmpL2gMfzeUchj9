<?php

namespace App\Http\Controllers\Color;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Color\Color_DetailInterface;

class Color_DetailController extends Controller
{
    protected $model;

    public function __construct(Color_DetailInterface $Color_DetailInterface)
    {
    	$this->model = $Color_DetailInterface;
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
    public function Color_Details(Request $data)
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
