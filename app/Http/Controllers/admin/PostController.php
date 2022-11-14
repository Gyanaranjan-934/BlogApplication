<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }
    // public function create()
    // {
    //     $categories = Category::all();
    //     return view('blogPosts.create-blog-post',compact('categories'));
    // }
}
