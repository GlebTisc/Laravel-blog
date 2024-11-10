<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Service\ProfileService;
use Propaganistas\LaravelPhone\PhoneNumber;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.update_profile');
    }

    public function store(ProfileRequest $request) {
        ProfileService::auth($request);
        return redirect('profile/view');
    }

    public function show() {
        return view('profile.profile_view', [
            'phone' => new PhoneNumber(auth()->user()->phone)
        ]);
    }
}
