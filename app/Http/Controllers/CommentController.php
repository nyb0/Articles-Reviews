<?php

namespace ARTICLES\Http\Controllers;

use Illuminate\Http\Request;
use ARTICLES\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request){

        Comment::addComment($request);
        return back();
    }
}
