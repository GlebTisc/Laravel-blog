<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Telephone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('@^(\+\d{1,2}\s?)?(\d{3}|\(\d{3}\))([-\/\.])?\d{3}\3?\d{4}$@', $value)) {
            $fail('Incorrect :attribute phone number, "+" must be at the beggining');
        }
    }
}
