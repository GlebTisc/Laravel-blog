<?php

namespace App\Service;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function create(ArticleRequest $request) {
        $attributes = $request->validated();
        $article = Article::create($attributes);
        $article->users()->attach(auth()->user()->id, ['article_id' => $article->id]);

    }

    public static function destroy(Article $article) {
        if($article->isAuthor(auth()->user())) {
            Article::destroy($article->id);
        }
    }

    public static function erase($article_id) {
        $article = Article::withTrashed()->find($article_id);

        if($article->isAuthor(auth()->user()) != null) {
            return false;
        }

        return $article->forceDelete();
    }

    public static function restore($article_id) {
        $article = Article::withTrashed()->find($article_id);

        if($article->isAuthor(auth()->user()) != null) {
            return false;
        }

        return $article->restore();
    }
}
