<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => ['required', 'string']
        ]);

        $comment                = new Comment();
        $comment->by            = $request['by'] ? $request['by'] : 'Anonymous';
        $comment->text          = $request['text'];
        $comment->article_id    = $request['article_id'];
        
        $comment->save();

        return redirect()->back();
    }
}
