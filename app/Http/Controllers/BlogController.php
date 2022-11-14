<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index','show');
    }
    public function index(Request $request){
        if ($request->search) {
            //"select * from `posts` where `title` like ? or `body` like ?" (for the search-bar searching)
            $posts = Post::where('title','like','%'.$request->search.'%')->orWhere('body','like','%'.$request->search.'%')->latest()->paginate(4);
        }elseif($request->category){
            //"select * from `posts` where `posts`.`category_id` = ? and `posts`.`category_id` is not null"
            $posts = Category::where('name',$request->category)->firstOrFail()->posts()->paginate(3)->withQueryString();
        }
        else{
            //"select * from `posts` order by `created_at` desc" (home page)
            $posts = Post::latest()->paginate(6);
        }
        
        //select * from `categories` order by `created_at` desc
        $categories = Category::all();
        return view('blogPosts.blog',compact('posts','categories'));
    }
    public function create(){
        // "select * from `categories`"
        $categories = Category::all();
        return view('blogPosts.create-blog-post',compact('categories'));
    }
    public function store(Request $request){
        
        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if (Post::latest()->first() !== null) {
            $post_id = Post::latest()->first()->id+1;
        }else{
            $post_id = 1;
        }
        
        $category_id = $request->input('category_id');
        $title = $request->input('title');
        $slug = Str::slug($title,'-').'-'. $post_id;
        $user_id = Auth::user()->id;
        $body = $request->input('body');

        $imagePath =  'storage/' . $request -> file('image')->store('postImages','public');
        // DB::insert('insert into posts (title,slug,user_id,category_id,imagePath,body,created_at,updated_at) values (?,?,?,?,?,?,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)',[$title,$slug,$user_id,$category_id,$imagePath,$body]);
        $post = new Post();
        $post->title = $title;
        $post->category_id = $category_id;
        $post->slug = $slug;
        $post->body = $body;
        $post->imagePath = $imagePath;
        $post->user_id = $user_id;
        $post->save();

        return redirect()->back()->with('status','created');

    }

    public function edit(Post $post){

        if (auth()->user()->id !== $post->user->id && auth()->user()->role_as != '1' ) {
            abort(403);
        }
        $categories = Category::all();
        return view('blogPosts.edit-blog-post',compact('post','categories'));
    }
    public function update(Request $request,Post $post){
        if (auth()->user()->id !== $post->user->id) {
            abort(403);
        }
        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'body' => 'required'
        ]);

        $post_id = $post->id;
        $title = $request->input('title');
        $slug = Str::slug($title,'-').'-'. $post_id;
        $body = $request->input('body');

        $imagePath =  'storage/' . $request -> file('image')->store('postImages','public');

        $post->title = $title;
        $post->slug = $slug;
        $post->body = $body;
        $post->imagePath = $imagePath;

        $post->save();

        return redirect()->back()->with('status','Edited');
    }
    // public function show($slug){
    //     $post = Post::where('slug', $slug)->first();
    //     return view('blogPosts.single-blog-post',compact('post'));
    // }

    public function show(Post $post){
        $category = $post->category;
        //"select * from `posts` where `posts`.`category_id` = ? and `posts`.`category_id` is not null and `id` != ? order by `created_at` desc"
        $relatedPosts = $category->posts()->where('id','!=',$post->id)->latest()->take(3)->get();
        $comments = $post->comments()->latest()->paginate(1);
        $categories = Category::all();
        return view('blogPosts.single-blog-post',compact('post','relatedPosts','comments','categories'));
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->back()->with('status','Deleted');
    }
    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}
