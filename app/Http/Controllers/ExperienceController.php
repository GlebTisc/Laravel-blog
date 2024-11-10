<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ExperienceService;

class ExperienceController extends Controller
{

    public function index() {
        return view('experience.experience');
    }
    public function getExperience() {
        return \response()->json([
            'success' => ExperienceService::getExperience()
        ]);

    }

    /**
     * @throws \Exception
     */
    public function setExperience() {
        return \response()->json([
           'success' => ExperienceService::setExperience()
        ]);
    }
}
