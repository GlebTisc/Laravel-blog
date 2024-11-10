<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\User;
use App\Service\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;

class ArticleController extends Controller
{
    public function index() {
        return view('articles.articles', [
            'articles' => Article::latest()->paginate(5)
        ]);
    }

    public function userShow(User $user) {
        return view('articles.articles', [
            'articles' => $user->articles
        ]);
    }

    public function create(ArticleRequest $request) {
        ArticleService::create($request);
        return redirect('/');
    }

    public function destroy(Article $article) {
        ArticleService::destroy($article);
        return redirect('/');
    }

    public function show() {
        return view('articles.trash', [
            'articles' => auth()->user()->articles()->onlyTrashed()->paginate(5)
        ]);
    }

    public function erase($article_id) {
        if(ArticleService::erase($article_id)) {
            return redirect('/article/trash');
        }

        return redirect('/');
    }

    public function restore($article_id) {
        if(ArticleService::restore($article_id)) {
            return redirect('/article/trash');
        }

        return redirect('/');
    }
}
