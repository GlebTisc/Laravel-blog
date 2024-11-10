<?php

namespace App\Service;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function auth(ProfileRequest $request) {
        $attributes = $request->validated();

        $attributes["nickname"] = strip_tags($attributes["nickname"]);
        $attributes["name"] = strip_tags($attributes["name"]);
        $attributes['surname'] = strip_tags($attributes['surname']);
        $attributes['phone'] = strip_tags($attributes['phone']);

        $attributes['email'] = fake()->unique()->email;
        $attributes['password'] = fake()->password;
        $attributes['avatar'] = Storage::disk('avatars')->put('avatars', $attributes['avatar']);

        auth()->login(User::create($attributes));
    }
}
