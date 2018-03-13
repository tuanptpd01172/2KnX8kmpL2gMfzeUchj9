<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Categories\CategoriesInterface;
use Session;
class CategoriesController extends Controller
{
    protected $model;

    public function __construct(CategoriesInterface $CategoriesInterface)
    {
    	$this->model = $CategoriesInterface;
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
    public function Categoriess(Request $data)
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
    public function create(Request $data)
    {
        try{

            $result = $this->model->create();
            return $result;
         }catch (\Exception $e){
            Session::flash('errors','Không Thể Tạo Danh Mục Thành Công! vui lòng thử lại.');
            return redirect()->route('categories.create');
        }
        
    }
    public function store(Request $data)
    {
        try{

            $result = $this->model->postInsert($data);
            Session::flash('success','Tạo Danh Mục Thành Công!');
            return redirect()->route('categories.index')->with('id',$result);;
            
         }catch (\Exception $e){
            Session::flash('errors','Không Thể Tạo Danh Mục Thành Công! vui lòng thử lại.');
            return redirect()->route('categories.create');
        }
        
    }
    public function update(Request $data,$id)
    {
        try{

            $result = $this->model->putUpdate($data,$id);
            Session::flash('success','Cập Nhật Danh Mục Thành Công!');
            return redirect()->route('categories.index')->with('id',$result);;
            
         }catch (\Exception $e){
            Session::flash('errors','Không Thể Cập Nhật Danh Mục Thành Công! Vui lòng thử lại.');
            return back()->withInput();
        }
        
    }
    public function edit(Request $data,$id)
    {
        $result = $this->model->edit($id);
        return $result;
        
    }

    public function index(Request $data)
    {
         $result =    $this->model->index($data);
        if(isset($data) && ($data->ajax() || $data->wantsJson())){
            return response()->json($result);
        }
        
        return $result;
    }
}
