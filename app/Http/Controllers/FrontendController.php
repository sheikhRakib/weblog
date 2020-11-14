<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $data['featured'] = Article::limit(5)->get();
        $data['articles'] = Article::paginate(3);

        return view('frontend.index', $data);
    }

    public function show(Article $article)
    {
        return view('frontend.show', compact('article'));
    }

    public function query($query)
    {
        $data['query'] = $query;
        $data['articles'] = Article::where('is_published', true)->where('title','like', '%'.$query.'%')->paginate(5);

        return view('frontend.searched', $data);
    }
}
