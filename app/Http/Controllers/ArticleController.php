<?php

namespace ARTICLES\Http\Controllers;

use Illuminate\Http\Request;
use ARTICLES\Article;

class ArticleController extends Controller
{
    public function article($articleId) {
        
        $articles = Article::find($articleId);

        $comments = $articles->comments->where('article_id', $articleId)->where('comment_message', '!=', null);

        $avgGrade = $comments->where('article_id', $articleId)->avg('grade');
        $avgGrade = round($avgGrade, 2);
        $comments->avgGrade = $avgGrade;
        
        return view('article', ['articles' => $articles] , ['comments' => $comments]);
    }
}
