<?php

namespace App\Http\Controllers\Slide;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Slide\SlideInterface;

use Session;

class SlideController extends Controller
{
    protected $model;

    public function __construct(SlideInterface $SlideInterface)
    {
    	$this->model = $SlideInterface;
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

    public function Slides(Request $data)
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

    public function update(Request $data , $id)
    {
        try {

            $result =    $this->model->putUpdate($data ,$id);
            if(isset($data) && ($data->ajax() || $data->wantsJson())){
                return response()->json($result);
            }
            $data->session()->flash('success', 'Cập nhật slide thành công!');
            return redirect()->route('slide.edit',$id);
        }catch (\Exception $e){
        
            $data->session()->flash('errors', 'Không Thể Cập nhật slide thành công!');
            return back()->withInput();
        }
    }

    public function index(Request $data)
    {
         $result =    $this->model->index($data);
        if(isset($data) && ($data->ajax() || $data->wantsJson())){
            return response()->json($result);
        }
        
        return $result;
    }
    /**
     * [update delete slide admin]
     * @param  Request $data [description]
     * @param  [type]  $id   [description]
     * @return [type]        [description]
     */
    public function destroy($id)
    {
        try{

            $result = $this->model->getDelete($id);
            Session::flash('success','Xóa Slide Thành Công!');
            return redirect()->route('slide.index')->with('id',$result);;
            
         }catch (\Exception $e){
            Session::flash('errors','Không Thể Xóa Slide Thành Công! Vui lòng thử lại.');
            return back()->withInput();
        }
        
    }
    public function requests(Request $data)
    {
       return response($data->all());
    }
}
