<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $category=Category::all();
        if($category){
            return $this->apiResponse($category,"Ok",200);
        }
        return $this->apiResponse(null,"Not Found!",404);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'code' => 'required|max:3|min:3',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $category=Category::create($request->all());
        if($category){
            return $this->apiResponse($category,"Saved sucessfuly!",201);
        }
        return $this->apiResponse(null,"Not saved!",404);
    }

    public function show($id){
        $category=Category::find($id);
        if($category){
            return $this->apiResponse($category,"Ok",200);
        }
        return $this->apiResponse(null,"Not Found!",404);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'code' => 'required|max:3|min:3',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $category=Category::find($id);
        if (!$category) {
            return $this->apiResponse(null,"Not Found!",404);
        }
        $category->update($request->all());
        if($category){
            return $this->apiResponse($category,"Updated sucessfuly!",201);
        }
        return $this->apiResponse(null,"Not updated!",404);
    }
    public function destroy($id){
        $category=Category::find($id);
        if($category){
            $category->delete();
            return $this->apiResponse(null,"Deleteed sucessfuly!",200);
        }
        return $this->apiResponse(null,"Not Found!",404);
    }
}
