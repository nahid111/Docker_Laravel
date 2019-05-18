<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }

    public function blogPosts(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('pages.blogposts')->with('posts', $posts);
    }


}
