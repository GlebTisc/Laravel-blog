<?php

namespace App\Service;

use App\Models\User;

class ExperienceService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * @throws \Exception
     */
    public static function setExperience() {
       if(empty(request()->user_id)) {
           return false;
       }

       $user = User::find(request()->user_id);

       if(empty($user)) {
           return null;
       }

       $user->experience = random_int(0, 35);

       return $user->update();
    }

    public static function getExperience() {
        if(empty(request()->user_id)) {
            return false;
        }

        return User::find(request()->user_id)->experience;
    }
}
