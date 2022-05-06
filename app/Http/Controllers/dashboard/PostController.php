<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$posts=Post::orderBy('created_at','desc')->get();
        $posts=Post::orderBy('created_at','desc')->paginate(20);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.posts.addPost',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'title'=>'required|unique:posts|max:50|min:5',
            'body'=>'required|string',
            'category'=>'required|integer'
        ];
        $messages=[
            'title.required'=>'The title can not be empty!',
            'title.uniqu'=>'This title is taken before!',
            'title.max'=>'The title can not be more than 50 charachter!',
            'title.min'=>'The title can not be less than 5 charachter!',
            'body.required'=>'The post content can not be empty!',
            'body.string'=>'The post content should be sttring!',
            'category.required'=>'You should select category!',
        ];
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $post=new Post();
        $post->title=$request->title;
        $post->post_content=$request->body;
        $post->featured_image=$request->featured_image;
        $post->large_image=$request->large_image;
        $post->category_id=$request->category;
        $post->save();
        return redirect()->route('post.index')->with('success','Post added successfuly!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.viewPost',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        return view('admin.posts.editPost',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title=$request->title;
        $post->post_content=$request->body;
        $post->featured_image=$request->featured_image;
        $post->large_image=$request->large_image;
        $post->category_id=$request->category;
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');

    }
}
