<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        //$posts=PostResource::collection(Post::all());
          $posts=Post::all();
       return $this->apiResponse($posts,"ok",200);

    }
    public function show($id){
        $post=Post::find($id);
        if($post){
            return $this->apiResponse(new PostResource($post),"Ok",200);
        }else{
            return $this->apiResponse(null,"Not Found!",404);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'post_content' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }


        $post=Post::create($request->all());
        if($post){
            return $this->apiResponse($post,"The poste saved sucessfuly!",201);
        }
        return $this->apiResponse(null,"The post not saved!",404);
    }

    public  function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'post_content' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $post=Post::find($id);
        if($post){
            $post->update($request->all());
            if($post){
                return $this->apiResponse($post,"The post updated sucessfuly!",201);
            }
        }else{
            return $this->apiResponse(null,"Not Found!",404);
        }
    }

    public function destroy($id){
        $post=Post::find($id);
        if($post){
            $post->delete();
            return $this->apiResponse(null,"The post deleted sucessfuly!",200);
        }else{
            return $this->apiResponse(null,"Not Found!",404);

        }

    }

}
