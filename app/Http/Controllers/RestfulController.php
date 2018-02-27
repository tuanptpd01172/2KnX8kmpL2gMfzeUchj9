<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


Trait  RestfulController 
{


    // public $model;

    // public function __construct(ProductInterface $ProductInterface)
    // {
    //  $this->model = $ProductInterface;
    // }

    public function index(Request $data=null)
    {
        $result = $this->model->getAll();
        if(isset($data) && ($data->ajax() || $data->wantsJson())){
            
            return response()->json($result);
        }
        return $result;
    }
    public function show($id,Request $data)
    {

        $result = $this->model->getById($id);
        if(isset($data) && ($data->ajax() || $data->wantsJson())){
            return response()->json($result);
        }
        return $result;
    }
    public function create()
    {
        
    }
    public function store(Request $data)
    {
        $result = $this->model->postInsert($data);
        if(isset($data) && ($data->ajax() || $data->wantsJson())){
            return response()->json($result);
                }
        return $result;
    }
    public function edit($id)
    {
        $result = $this->model->getById($id);
        if(Request::ajax() || Request::wantsJson()){
            return response()->json($result);
        }
        return $result;
    }
    public function update($id, Request $data)
    {
         $result =    $this->model->putUpdate($id, $data);
        if(isset($data) && ($data->ajax() || $data->wantsJson())){
            return response()->json($result);
        }
        return $result;
    }
    public function destroy($id)
    {
        $result = $this->model->getDelete($id);
        
        return $result;
    }
}
