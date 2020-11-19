<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function showDraftedArticles()
    {
        $data['articles'] = Article::where('user_id', Auth::id())
        ->where('is_published', false)
        ->orderByDesc('updated_at')->paginate(5);
        
        return view('backend.article.list', $data);
    }

    public function showPublishedArticles()
    {
        $data['articles'] = Article::where('user_id', Auth::id())
        ->where('is_published', true)
        ->orderByDesc('updated_at')->paginate(5);
        
        return view('backend.article.list', $data);
    }

    public function create()
    {
        return view('backend.article.create');
    }

    public function edit(Article $article)
    {
        return view('backend.article.edit', compact('article'));
    }

    public function store(ArticleRequest $request, Article $article){
        $article->title = $request['title'];
        $article->user_id = Auth::id();
        $article->description = $request['description'];
        
        if ($request->has('publish')) {
            $article->is_published = true;
            $message = 'Published Successfully';
            $url = route('article.published');
        } else {
            $article->is_published = false;
            $message = 'Saved as a Draft Copy';
            $url = route('article.drafted');
        }
        $article->save();
        
        Session::flash('success', $message); 
        return redirect($url);
    }

    public function update(ArticleRequest $request, Article $article) {
        $article->title = $request['title'];
        $article->user_id = Auth::id();
        $article->description = $request['description'];
        
        if ($request->has('publish')) {
            $article->is_published = true;
            $message = 'Published Successfully';
            $url = route('article.published');
        } else {
            $article->is_published = false;
            $message = 'Saved as a Draft Copy';
            $url = route('article.drafted');
        }
        $article->save();
        
        Session::flash('success', $message); 
        return redirect($url);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        Session::flash('success', 'Article Deleted');

        return redirect()->back();
    }
}
