<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $last_name = strtolower(request()->last_name);
        if (empty($last_name)) {
            return;
        }
        $password = strtolower($value);

        if (str_contains($password, $last_name)) {
            $fail('The password cannot contain your last name.');
        }
    }
}
