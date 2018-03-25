<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Post\PostInterface;

class PostController extends Controller
{
    protected $model;

    public function __construct(PostInterface $PostInterface)
    {
    	$this->model = $PostInterface;
    }

    use \App\Http\Controllers\RestfulController;


    public function getBySlug($slug,Request $data = null)
    {
        $result = $this->model->getBySlug($slug);
        if(count($result) > 0 ){
            $req = new Request;
            $req->categories_id = $result->categories_id;
            $req->limit = 3;
            $diff_post = $this->model->getAll($req);
        // $diff_post = [];

            if(isset($data) && ($data->ajax() || $data->wantsJson())){
                
                return response()->json($result);
            }
            return view('flower.detail',compact(['result','diff_post']));
        }else{
            $data_['name'] = 'Page not found';
            if(isset($data) && ($data->ajax() || $data->wantsJson())){
                
                return response()->json($data_,404);
            }
            return response()->view('errors.404',$data_,404);
        }
    }
    public function getBySlug_FL($slug,Request $data = null)
    {
        $result = $this->model->getBySlug($slug);
        if(count($result) > 0 ){
            $req = new Request;
            $req->categories_id = $result->categories_id;
            $req->limit = 2;
            $diff_post = $this->model->getAll($req);
            if(isset($data) && ($data->ajax() || $data->wantsJson())){
                
                return response()->json($result);
            }
            return view('flower.detail',compact(['result','diff_post']));
        }else{
            $data_['name'] = 'Page not found';
            if(isset($data) && ($data->ajax() || $data->wantsJson())){
                
                return response()->json($data_,404);
            }
            return response()->view('errors.404',$data_,404);
        }
    }
    public function flower_list(Request $data = null)
    {
        // $result = $this->model->getBySlug($slug);
            $req = new Request;
            $req->categories_id = 1;
            $req->limit = 2;
            $result = $this->model->getAll($req);
        if(count($result) > 0 ){
            if(isset($data) && ($data->ajax() || $data->wantsJson())){
                
                return response()->json($result);
            }
            return view('flower.flower_list',compact(['result']));
        }else{
            $data_['name'] = 'Page not found';
            if(isset($data) && ($data->ajax() || $data->wantsJson())){
                
                return response()->json($data_,404);
            }
            return response()->view('errors.404',$data_,404);
        }
    }

    public function create($slug,Request $data = null)
    {
        $result = $this->model->create();
        return $result;
    }

    public function edit($id)
    {
        $result = $this->model->edit($id);
        return $result;
    }

    public function Posts(Request $data)
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

    public function store(Request $data)
    {
         $result =    $this->model->postInsert($data );
        if(isset($data) && ($data->ajax() || $data->wantsJson())){
            return response()->json($result);
        }
        $data->session()->flash('message', 'Thêm mới bài viết thành công!');
        return redirect()->route('post.index');
    }

    public function update(Request $data , $id)
    {
         $result =    $this->model->putUpdate($data ,$id);
        if(isset($data) && ($data->ajax() || $data->wantsJson())){
            return response()->json($result);
        }
        $data->session()->flash('message', 'Cập nhật bài viết thành công!');
        return redirect()->route('post.edit',$id);
    }

    public function index(Request $data)
    {
         $result =    $this->model->index($data);
        if(isset($data) && ($data->ajax() || $data->wantsJson())){
            return response()->json($result);
        }
        
        return $result;
    }

    public function requests(Request $data)
    {
       return response($data->all());
    }
}
