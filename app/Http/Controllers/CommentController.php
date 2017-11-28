<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postComment(Request $request, $id)
    {
        $comment = new Comment();
        $comment->plan_id = $id;
        $comment->user_id = Auth::user()->id;
        $content = $request->content;
        $comment->content = $content;
        $comment->save();
        $time = Comment::all()->pluck('created_at')->last();
        $html = view('sites._component.show_comment', compact('content', 'time'))->render();

        return response($html);
    }
}
