<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post){
        //Validation
        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'post_id' =>$post->id,
            'author_id' => request()->user()->id,
            'text' => request('body')
        ]);

        return back();
    }
}
