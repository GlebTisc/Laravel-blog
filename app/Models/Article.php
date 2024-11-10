<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;
    use SoftDeletes;

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function isAuthor(User $user) {
        if(!$user) {
            return Config::get('constants.mismatch');
        }

        if($this->trashed()) {
            return null;
        }

        if($this->users()->find($user->id)) {
            return true;
        }
        else {
            return false;
        }
    }
}
