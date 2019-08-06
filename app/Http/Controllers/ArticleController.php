<?php

namespace ARTICLES\Http\Controllers;

use Illuminate\Http\Request;
use ARTICLES\Article;

class ArticleController extends Controller
{
    public function article($articleId) {
        $articles = Article::find($articleId);
        return view('article', ['articles' => $articles]);
    }
}
