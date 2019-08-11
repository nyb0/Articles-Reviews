<?php

namespace ARTICLES\Http\Controllers;

use Illuminate\Http\Request;
use ARTICLES\Article;

class MainController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('main', ['articles' => $articles]);
    }
}
