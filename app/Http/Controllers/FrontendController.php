<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data['featured'] = Article::limit(5)->get();
        $data['articles'] = Article::paginate(3);

        return view('frontend.index', $data);
    }

    public function show($slug)
    {
        $data['article'] = Article::where('slug', $slug)->first();

        abort_unless($data['article'], 404);
        return view('frontend.show', $data);
    }
}
