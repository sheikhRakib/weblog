<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $data['featured'] = cache()->remember('weblog.featured', 60, function(){
            return Article::where('is_published', true)
            ->inRandomOrder()
            ->limit(5)->get();
        });
        
        $data['articles'] = Article::where('is_published', true)
            ->inRandomOrder()
            ->paginate(3);
        
        return view('frontend.index', $data);
    }

    public function show($slug)
    {
        $data['article'] = Article::where('slug', $slug)
        ->where('is_published', true)
        ->first();

        if(!$data['article']) abort(404);
        return view('frontend.show', $data);
    }

    public function query($query)
    {
        $data['query'] = $query;
        $data['articles'] = Article::where('is_published', true)->where('title','like', '%'.$query.'%')->paginate(5);

        return view('frontend.searched', $data);
    }
}
