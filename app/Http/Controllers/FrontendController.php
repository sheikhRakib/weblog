<?php

namespace App\Http\Controllers;

use App\Models\Article;

class FrontendController extends Controller
{
    public function index() {
        $data['featured'] = cache()->remember('weblog.featured', 60, function(){
            return Article::isPublished(true)
            ->inRandomOrder()
            ->limit(5)->get();
        });
        
        $data['articles'] = Article::isPublished(true)
            ->inRandomOrder()
            ->paginate(3);
        
        return view('frontend.index', $data);
    }

    public function show($slug) {
        $data['article'] = Article::where('slug', $slug)
        ->isPublished(true)
        ->first();

        return $data['article'] ? view('frontend.show', $data) : abort(404);
    }

    public function query($query) {
        $data['query'] = $query;
        $data['articles'] = Article::isPublished(true)->searchArticle($query)->paginate(5);

        return view('frontend.searched', $data);
    }
}
