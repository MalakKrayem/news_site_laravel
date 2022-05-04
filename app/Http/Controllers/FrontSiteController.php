<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontSiteController extends Controller
{
    public function showHome(){
        return view('frontsite.index');
    }
    public function showBlog(){
        return view('frontsite.blog');

    }
    public function showSingle(){
        return view('frontsite.blog');

    }
    public function showContact(){
        return view('frontsite.Contact_us');

    }
}
