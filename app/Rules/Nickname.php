<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Nickname implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('@^[A-Za-z][A-Za-z0-9_]{7,32}$@', $value)) {
            $fail(':attribute must be minimum 8 and maximum 32 letters length');
        }
    }
}
