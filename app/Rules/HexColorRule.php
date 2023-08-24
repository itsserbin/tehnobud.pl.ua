<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class HexColorRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param   string  $attribute
     * @param   mixed   $value
     *
     * @return bool
     */
    public function passes($attribute, mixed $value): bool
    {
        return (bool)preg_match(
            '/^#(?:[0-9a-fA-F]{3}){1,2}$/',
            $value
        );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Color is not valid';
    }

}
