<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class PasswordRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $name = strtolower(request()->name);
        $password = strtolower($value);

        $names = explode(' ', $name);

        collect($names)->each(function ($name) use ($password, $fail) {
            if (Str::contains($password, $name)) {
                $fail('The :attribute must not contain parts of your name.');
            }
        });
    }
}