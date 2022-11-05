<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CommentsRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Post $post,CommentsRequest $request)
    {
        if (Auth::user()) {
            $data = $request->validated();
        $comment = new Comment();

        $comment->post_id = $post->id;
        $comment->author = Auth::user()->name;
        $comment->text = $data['text'];
        $comment->save();

        return back();
        
        }else{
            return redirect('/login')->with('status','log in to commment');
        }
        
    }
    public function destroy(Comment $comment):RedirectResponse
    {
        $comment->delete(); 
        return back();
    }
}
