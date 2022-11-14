<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comment.index',compact('comments'));
    }
    public function show($comment_id){
        $comment = Comment::find($comment_id);
        $post = Post::find($comment->post_id);
        return view('admin.comment.show',compact('comment','post'));
    }
    public function destroy($comment_id)
    {
        $comment = Comment::find($comment_id);
        if($comment){
            $comment->delete();
            return redirect('admin/comments')->with('status','deleted');
        }
    }
}
