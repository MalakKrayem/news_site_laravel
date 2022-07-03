<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontSiteController extends Controller
{
    public function showHome(){
        $posts=Post::orderBy('created_at','desc')->get();
        return view('frontsite.index',compact('posts'));
    }
    public function showBlog(){
        $posts=Post::orderBy('created_at','desc')->get();
        return view('frontsite.blog',compact('posts'));

    }
    public function showSingle(Post $post){
        dd($post);
        return view('frontsite.single',compact("post"));

    }
    public function showContact(){
        return view('frontsite.Contact_us');

    }
}
